<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bid;
use Illuminate\Http\Request;

class BidController extends Controller
{
    public function index(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | Validate Filters
        |--------------------------------------------------------------------------
        */

        $request->validate([
            'search' => [
                'nullable',
                'string',
                'max:100',
            ],

            'status' => [
                'nullable',
                'in:all,active,scheduled,ended',
            ],

            'sort' => [
                'nullable',
                'in:newest,oldest,amount_high,amount_low',
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | Base Query
        |--------------------------------------------------------------------------
        */

        $query = Bid::query()
            ->with([
                'bidder',

                'auction.category',

                'auction.seller',

                'auction.winner',

                'auction.highestBid',
            ]);


        /*
        |--------------------------------------------------------------------------
        | Search
        |--------------------------------------------------------------------------
        |
        | Search by:
        | - Bidder name
        | - Bidder email
        | - Auction title
        |
        */

        if ($request->filled('search')) {

            $search = trim(
                $request->search
            );


            $query->where(
                function ($q) use ($search) {

                    $q->whereHas(
                        'bidder',
                        function ($bidderQuery) use ($search) {

                            $bidderQuery
                                ->where(
                                    'name',
                                    'like',
                                    '%' . $search . '%'
                                )
                                ->orWhere(
                                    'email',
                                    'like',
                                    '%' . $search . '%'
                                );
                        }
                    )

                    ->orWhereHas(
                        'auction',
                        function ($auctionQuery) use ($search) {

                            $auctionQuery->where(
                                'title',
                                'like',
                                '%' . $search . '%'
                            );
                        }
                    );
                }
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Auction Status Filter
        |--------------------------------------------------------------------------
        */

        if (
            $request->filled('status')
            &&
            $request->status !== 'all'
        ) {

            $query->whereHas(
                'auction',
                function ($auctionQuery) use ($request) {

                    $auctionQuery->where(
                        'status',
                        $request->status
                    );
                }
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Sorting
        |--------------------------------------------------------------------------
        */

        switch ($request->sort) {

            case 'oldest':

                $query->oldest();

                break;


            case 'amount_high':

                $query->orderBy(
                    'amount',
                    'desc'
                );

                break;


            case 'amount_low':

                $query->orderBy(
                    'amount',
                    'asc'
                );

                break;


            case 'newest':

            default:

                $query->latest();

                break;
        }


        /*
        |--------------------------------------------------------------------------
        | Pagination
        |--------------------------------------------------------------------------
        */

        $bids = $query
            ->paginate(15)
            ->withQueryString();


        /*
        |--------------------------------------------------------------------------
        | Statistics
        |--------------------------------------------------------------------------
        */

        $totalBids =
            Bid::count();


        $uniqueBidders =
            Bid::distinct()
                ->count('user_id');


        $activeAuctionBids =
            Bid::whereHas(
                'auction',
                function ($query) {

                    $query->where(
                        'status',
                        'active'
                    );
                }
            )
            ->count();


        $endedAuctionBids =
            Bid::whereHas(
                'auction',
                function ($query) {

                    $query->where(
                        'status',
                        'ended'
                    );
                }
            )
            ->count();


        return view(
            'admin.bids.index',
            compact(
                'bids',
                'totalBids',
                'uniqueBidders',
                'activeAuctionBids',
                'endedAuctionBids'
            )
        );
    }
}