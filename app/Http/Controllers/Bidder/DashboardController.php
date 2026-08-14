<?php

namespace App\Http\Controllers\Bidder;

use App\Http\Controllers\Controller;
use App\Models\Auction;
use App\Models\Bid;
use App\Services\AuctionLifecycleService;

class DashboardController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Bidder Dashboard
    |--------------------------------------------------------------------------
    */

    public function index(
        AuctionLifecycleService $lifecycleService
    ) {
        /*
         * Update scheduled / ended auctions
         * before showing dashboard statistics.
         */
        $lifecycleService
            ->processDueAuctions();


        $bidderId = auth()->id();


        /*
        |--------------------------------------------------------------------------
        | Total Bid History
        |--------------------------------------------------------------------------
        */

        $totalBids = Bid::where(
            'user_id',
            $bidderId
        )->count();


        /*
        |--------------------------------------------------------------------------
        | Active Auctions Where User Has Bid
        |--------------------------------------------------------------------------
        */

        $activeBids = Bid::where(
                'user_id',
                $bidderId
            )
            ->whereHas(
                'auction',
                function ($query) {

                    $query->where(
                        'status',
                        'active'
                    );
                }
            )
            ->distinct()
            ->count('auction_id');


        /*
        |--------------------------------------------------------------------------
        | Auctions Won
        |--------------------------------------------------------------------------
        */

        $auctionsWon = Auction::where(
                'winner_id',
                $bidderId
            )
            ->where(
                'status',
                'ended'
            )
            ->count();


        /*
        |--------------------------------------------------------------------------
        | Recent Bids
        |--------------------------------------------------------------------------
        */

        $recentBids = Bid::with([
                'auction.category',
                'auction.images',
                'auction.highestBid',
                'auction.winner',
            ])
            ->where(
                'user_id',
                $bidderId
            )
            ->latest()
            ->limit(5)
            ->get();


        return view(
            'bidder.dashboard',
            compact(
                'totalBids',
                'activeBids',
                'auctionsWon',
                'recentBids'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Full Bid History
    |--------------------------------------------------------------------------
    */

    public function history(
        AuctionLifecycleService $lifecycleService
    ) {
        /*
         * Make sure auction statuses
         * are up to date.
         */
        $lifecycleService
            ->processDueAuctions();


        $bidderId = auth()->id();


        /*
         * One record/card per auction
         * where this bidder participated.
         */
        $auctionHistories = Auction::query()

            ->with([
                'category',
                'seller',
                'images',
                'winner',
                'highestBid',

                /*
                 * Load only this user's bids.
                 */
                'bids' => function (
                    $query
                ) use (
                    $bidderId
                ) {

                    $query
                        ->where(
                            'user_id',
                            $bidderId
                        )
                        ->orderByDesc(
                            'created_at'
                        );
                },
            ])

            /*
             * Only auctions where
             * current bidder participated.
             */
            ->whereHas(
                'bids',
                function (
                    $query
                ) use (
                    $bidderId
                ) {

                    $query->where(
                        'user_id',
                        $bidderId
                    );
                }
            )

            /*
             * Number of bids by this user
             * on each auction.
             */
            ->withCount([
                'bids as user_bid_count'
                    => function (
                        $query
                    ) use (
                        $bidderId
                    ) {

                        $query->where(
                            'user_id',
                            $bidderId
                        );
                    },
            ])

            /*
             * Highest bid placed by
             * current user.
             */
            ->withMax([
                'bids as user_highest_bid'
                    => function (
                        $query
                    ) use (
                        $bidderId
                    ) {

                        $query->where(
                            'user_id',
                            $bidderId
                        );
                    },
            ], 'amount')

            ->orderByDesc('updated_at')

            ->paginate(8)

            ->withQueryString();


        /*
        |--------------------------------------------------------------------------
        | Determine Bidder Status
        |--------------------------------------------------------------------------
        */

        $auctionHistories
            ->getCollection()
            ->transform(
                function (
                    $auction
                ) use (
                    $bidderId
                ) {

                    /*
                     * Auction finished.
                     */
                    if (
                        $auction->status
                        === 'ended'
                    ) {

                        if (
                            (int) $auction->winner_id
                            ===
                            (int) $bidderId
                        ) {

                            $auction->bidder_status =
                                'Won';

                        } else {

                            $auction->bidder_status =
                                'Lost';
                        }


                        return $auction;
                    }


                    /*
                     * Auction currently active.
                     */
                    if (
                        $auction->status
                        === 'active'
                    ) {

                        if (
                            $auction->highestBid
                            &&
                            (int)
                            $auction
                                ->highestBid
                                ->user_id
                            ===
                            (int) $bidderId
                        ) {

                            $auction->bidder_status =
                                'Winning';

                        } else {

                            $auction->bidder_status =
                                'Outbid';
                        }


                        return $auction;
                    }


                    /*
                     * Fallback status.
                     */
                    $auction->bidder_status =
                        ucfirst(
                            $auction->status
                        );


                    return $auction;
                }
            );


        return view(
            'bidder.bid-history',
            compact(
                'auctionHistories'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Auctions Won
    |--------------------------------------------------------------------------
    */

    public function won(
        AuctionLifecycleService $lifecycleService
    ) {
        /*
         * Process expired auctions first.
         */
        $lifecycleService
            ->processDueAuctions();


        $wonAuctions = Auction::with([
                'seller',
                'category',
                'images',
                'bids',
            ])
            ->where(
                'winner_id',
                auth()->id()
            )
            ->where(
                'status',
                'ended'
            )
            ->orderByDesc(
                'closed_at'
            )
            ->get();


        return view(
            'bidder.auctions-won',
            compact(
                'wonAuctions'
            )
        );
    }
}