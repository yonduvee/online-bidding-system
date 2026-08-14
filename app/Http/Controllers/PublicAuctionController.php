<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use App\Models\Category;
use App\Services\AuctionLifecycleService;
use Illuminate\Http\Request;

class PublicAuctionController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Public Auction Listing
    |--------------------------------------------------------------------------
    */

    public function index(
        Request $request,
        AuctionLifecycleService $lifecycleService
    ) {
        /*
         * Update scheduled / expired auctions.
         */
        $lifecycleService->processDueAuctions();


        /*
        |--------------------------------------------------------------------------
        | Filter Validation
        |--------------------------------------------------------------------------
        */

        $request->validate([

            'search' => [
                'nullable',
                'string',
                'max:100',
            ],

            'category' => [
                'nullable',
                'string',
                'max:255',
            ],

            'status' => [
                'nullable',
                'in:all,active,scheduled',
            ],

            'min_price' => [
                'nullable',
                'numeric',
                'min:0',
            ],

            'max_price' => [
                'nullable',
                'numeric',
                'min:0',
            ],

            'sort' => [
                'nullable',
                'in:ending_soon,newest,price_low,price_high',
            ],

        ]);


        /*
        |--------------------------------------------------------------------------
        | Price Validation
        |--------------------------------------------------------------------------
        */

        if (
            $request->filled('min_price')
            &&
            $request->filled('max_price')
            &&
            (float) $request->max_price
            <
            (float) $request->min_price
        ) {

            return back()
                ->withErrors([
                    'max_price' =>
                        'Maximum price must be greater than or equal to minimum price.',
                ])
                ->withInput();
        }


        /*
        |--------------------------------------------------------------------------
        | Base Query
        |--------------------------------------------------------------------------
        */

        $query = Auction::query()

            ->with([
                'category',
                'seller',
                'images',
            ])

            ->withCount('bids')

            ->whereIn(
                'status',
                [
                    'active',
                    'scheduled',
                ]
            );


        /*
        |--------------------------------------------------------------------------
        | Search
        |--------------------------------------------------------------------------
        */

        if ($request->filled('search')) {

            $search =
                trim($request->search);


            $query->where(
                function ($q) use ($search) {

                    $q->where(
                        'title',
                        'like',
                        '%' . $search . '%'
                    )

                    ->orWhere(
                        'description',
                        'like',
                        '%' . $search . '%'
                    )

                    ->orWhereHas(
                        'category',
                        function ($categoryQuery) use ($search) {

                            $categoryQuery->where(
                                'name',
                                'like',
                                '%' . $search . '%'
                            );
                        }
                    )

                    ->orWhereHas(
                        'seller',
                        function ($sellerQuery) use ($search) {

                            $sellerQuery->where(
                                'name',
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
        | Category
        |--------------------------------------------------------------------------
        */

        if ($request->filled('category')) {

            $categorySlug =
                $request->category;


            $query->whereHas(
                'category',
                function ($q) use ($categorySlug) {

                    $q->where(
                        'slug',
                        $categorySlug
                    );
                }
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Status
        |--------------------------------------------------------------------------
        */

        if ($request->status === 'active') {

            $query->where(
                'status',
                'active'
            );

        } elseif (
            $request->status
            === 'scheduled'
        ) {

            $query->where(
                'status',
                'scheduled'
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Minimum Price
        |--------------------------------------------------------------------------
        */

        if (
            $request->filled(
                'min_price'
            )
        ) {

            $query->where(
                'current_price',
                '>=',
                (float) $request->min_price
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Maximum Price
        |--------------------------------------------------------------------------
        */

        if (
            $request->filled(
                'max_price'
            )
        ) {

            $query->where(
                'current_price',
                '<=',
                (float) $request->max_price
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Sorting
        |--------------------------------------------------------------------------
        */

        switch ($request->sort) {

            case 'price_low':

                $query->orderBy(
                    'current_price',
                    'asc'
                );

                break;


            case 'price_high':

                $query->orderBy(
                    'current_price',
                    'desc'
                );

                break;


            case 'newest':

                $query->latest();

                break;


            case 'ending_soon':

            default:

                $query
                    ->orderByRaw(
                        "
                        CASE
                            WHEN status = 'active'
                            THEN 0
                            ELSE 1
                        END
                        "
                    )
                    ->orderBy(
                        'end_time',
                        'asc'
                    );

                break;
        }


        /*
        |--------------------------------------------------------------------------
        | Pagination
        |--------------------------------------------------------------------------
        */

        $auctions =
            $query
                ->paginate(9)
                ->withQueryString();


        /*
        |--------------------------------------------------------------------------
        | Active Categories
        |--------------------------------------------------------------------------
        */

        $categories =
            Category::where(
                'is_active',
                true
            )
            ->orderBy('name')
            ->get();


        return view(
            'public.auctions.index',
            compact(
                'auctions',
                'categories'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Auction Details
    |--------------------------------------------------------------------------
    */

    public function show(
        Auction $auction,
        AuctionLifecycleService $lifecycleService
    ) {
        /*
        |--------------------------------------------------------------------------
        | Update Auction Status
        |--------------------------------------------------------------------------
        */

        $lifecycleService
            ->processAuction(
                $auction->id
            );


        $auction->refresh();


        /*
        |--------------------------------------------------------------------------
        | Public Visibility Protection
        |--------------------------------------------------------------------------
        */

        if (
            !in_array(
                $auction->status,
                [
                    'scheduled',
                    'active',
                    'ended',
                ],
                true
            )
        ) {

            abort(404);
        }


        /*
        |--------------------------------------------------------------------------
        | Load Auction Relationships
        |--------------------------------------------------------------------------
        */

        $auction->load([
            'category',
            'seller',
            'winner',
            'images',

            'highestBid.bidder',

            'bids' => function ($query) {

                $query
                    ->with('bidder')
                    ->orderByDesc('amount')
                    ->orderByDesc('created_at')
                    ->limit(20);
            },
        ]);


        /*
        |--------------------------------------------------------------------------
        | Total Bid Count
        |--------------------------------------------------------------------------
        */

        $auction->loadCount('bids');


        /*
        |--------------------------------------------------------------------------
        | Total Unique Bidders
        |--------------------------------------------------------------------------
        */

        $totalBidders =
            $auction
                ->bids()
                ->distinct()
                ->count('user_id');


        /*
        |--------------------------------------------------------------------------
        | Minimum Allowed Bid
        |--------------------------------------------------------------------------
        */

        if (
            $auction
                ->bids()
                ->exists()
        ) {

            $minimumBid =
                (float)
                $auction->current_price
                +
                (float)
                $auction->bid_increment;

        } else {

            $minimumBid =
                (float)
                $auction->starting_price;
        }


        /*
        |--------------------------------------------------------------------------
        | Logged-In Bidder Information
        |--------------------------------------------------------------------------
        */

        $bidderStatus = null;

        $userHighestBid = null;

        $userBidCount = 0;


        if (
            auth()->check()
            &&
            auth()->user()->role
            === 'bidder'
        ) {

            $bidderId =
                auth()->id();


            /*
             * Number of bids this bidder
             * placed on this auction.
             */
            $userBidCount =
                $auction
                    ->bids()
                    ->where(
                        'user_id',
                        $bidderId
                    )
                    ->count();


            /*
             * Highest bid placed by
             * current bidder.
             */
            $userHighestBid =
                $auction
                    ->bids()
                    ->where(
                        'user_id',
                        $bidderId
                    )
                    ->max('amount');


            /*
            |--------------------------------------------------------------------------
            | ACTIVE AUCTION
            |--------------------------------------------------------------------------
            */

            if (
                $auction->status
                === 'active'
                &&
                $userBidCount > 0
            ) {

                if (
                    $auction->highestBid
                    &&
                    (int)
                    $auction
                        ->highestBid
                        ->user_id
                    ===
                    (int)
                    $bidderId
                ) {

                    $bidderStatus =
                        'winning';

                } else {

                    $bidderStatus =
                        'outbid';
                }
            }


            /*
            |--------------------------------------------------------------------------
            | ENDED AUCTION
            |--------------------------------------------------------------------------
            */

            if (
                $auction->status
                === 'ended'
                &&
                $userBidCount > 0
            ) {

                if (
                    (int)
                    $auction->winner_id
                    ===
                    (int)
                    $bidderId
                ) {

                    $bidderStatus =
                        'won';

                } else {

                    $bidderStatus =
                        'lost';
                }
            }
        }


        return view(
            'public.auctions.show',
            compact(
                'auction',
                'minimumBid',
                'totalBidders',
                'bidderStatus',
                'userHighestBid',
                'userBidCount'
            )
        );
    }
}