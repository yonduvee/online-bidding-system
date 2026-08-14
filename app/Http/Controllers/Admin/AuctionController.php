<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Auction;
use App\Services\AuctionLifecycleService;
use Illuminate\Http\Request;

class AuctionController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | ALL AUCTIONS
    |--------------------------------------------------------------------------
    */

    public function index(
        Request $request,
        AuctionLifecycleService $lifecycleService
    ) {
        /*
         * First update scheduled / expired auctions.
         */
        $lifecycleService->processDueAuctions();


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
                'in:all,pending,scheduled,active,ended,rejected',
            ],

            'sort' => [
                'nullable',
                'in:newest,oldest,start_soon,end_soon,price_high,price_low',
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | Base Query
        |--------------------------------------------------------------------------
        */

        $query = Auction::query()
            ->with([
                'seller',
                'category',
                'winner',
                'images',
            ])
            ->withCount('bids');


        /*
        |--------------------------------------------------------------------------
        | Search
        |--------------------------------------------------------------------------
        |
        | Search by:
        | - Auction title
        | - Seller name
        | - Seller email
        | - Category
        |
        */

        if ($request->filled('search')) {

            $search = trim(
                $request->search
            );


            $query->where(
                function ($q) use ($search) {

                    /*
                     * Auction title
                     */
                    $q->where(
                        'title',
                        'like',
                        '%' . $search . '%'
                    )

                    /*
                     * Seller
                     */
                    ->orWhereHas(
                        'seller',
                        function ($sellerQuery) use ($search) {

                            $sellerQuery
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

                    /*
                     * Category
                     */
                    ->orWhereHas(
                        'category',
                        function ($categoryQuery) use ($search) {

                            $categoryQuery->where(
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
        | Status Filter
        |--------------------------------------------------------------------------
        */

        if (
            $request->filled('status')
            &&
            $request->status !== 'all'
        ) {

            $query->where(
                'status',
                $request->status
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


            case 'start_soon':

                $query->orderBy(
                    'start_time',
                    'asc'
                );

                break;


            case 'end_soon':

                $query->orderBy(
                    'end_time',
                    'asc'
                );

                break;


            case 'price_high':

                $query->orderBy(
                    'current_price',
                    'desc'
                );

                break;


            case 'price_low':

                $query->orderBy(
                    'current_price',
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

        $auctions = $query
            ->paginate(12)
            ->withQueryString();


        /*
        |--------------------------------------------------------------------------
        | Statistics
        |--------------------------------------------------------------------------
        */

        $stats = [

            'all' =>
                Auction::count(),

            'pending' =>
                Auction::where(
                    'status',
                    'pending'
                )->count(),

            'scheduled' =>
                Auction::where(
                    'status',
                    'scheduled'
                )->count(),

            'active' =>
                Auction::where(
                    'status',
                    'active'
                )->count(),

            'ended' =>
                Auction::where(
                    'status',
                    'ended'
                )->count(),

            'rejected' =>
                Auction::where(
                    'status',
                    'rejected'
                )->count(),

        ];


        return view(
            'admin.auctions.index',
            compact(
                'auctions',
                'stats'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | AUCTION DETAILS
    |--------------------------------------------------------------------------
    */

    public function show(
        Auction $auction,
        AuctionLifecycleService $lifecycleService
    ) {
        /*
         * Update this auction first.
         */
        $lifecycleService
            ->processAuction(
                $auction->id
            );


        $auction->refresh();


        /*
         * Load all information.
         */
        $auction->load([
            'seller',
            'category',
            'winner',
            'images',

            'highestBid.bidder',

            'bids' => function ($query) {

                $query
                    ->with('bidder')
                    ->orderByDesc('amount')
                    ->orderByDesc('created_at');
            },
        ]);


        $auction->loadCount('bids');


        $totalBidders =
            $auction
                ->bids()
                ->distinct()
                ->count('user_id');


        return view(
            'admin.auctions.show',
            compact(
                'auction',
                'totalBidders'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | APPROVE AUCTION
    |--------------------------------------------------------------------------
    */

    public function approve(
        Auction $auction
    ) {
        /*
         * Only pending auctions can
         * be approved.
         */
        if (
            $auction->status
            !== 'pending'
        ) {

            return back()->with(
                'error',
                'Only pending auctions can be approved.'
            );
        }


        /*
         * Do not approve an auction
         * whose ending time already passed.
         */
        if (
            $auction->end_time
            &&
            $auction->end_time->lte(now())
        ) {

            return back()->with(
                'error',
                'This auction cannot be approved because its end time has already passed.'
            );
        }


        /*
         * If start time already reached,
         * make it active immediately.
         *
         * Otherwise schedule it.
         */
        $newStatus =
            $auction->start_time->lte(now())
                ? 'active'
                : 'scheduled';


        $auction->update([
            'status' =>
                $newStatus,

            'rejection_reason' =>
                null,

            'winner_id' =>
                null,

            'closed_at' =>
                null,
        ]);


        return redirect()
            ->route(
                'admin.auctions.index'
            )
            ->with(
                'success',
                $newStatus === 'active'
                    ? 'Auction approved and activated successfully.'
                    : 'Auction approved and scheduled successfully.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | REJECT AUCTION
    |--------------------------------------------------------------------------
    */

    public function reject(
        Request $request,
        Auction $auction
    ) {
        /*
         * Only pending auctions
         * can be rejected.
         */
        if (
            $auction->status
            !== 'pending'
        ) {

            return back()->with(
                'error',
                'Only pending auctions can be rejected.'
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Validation
        |--------------------------------------------------------------------------
        */

        $validated =
            $request->validate([
                'rejection_reason' => [
                    'required',
                    'string',
                    'min:10',
                    'max:1000',
                ],
            ]);


        /*
        |--------------------------------------------------------------------------
        | Reject
        |--------------------------------------------------------------------------
        */

        $auction->update([
            'status' =>
                'rejected',

            'rejection_reason' =>
                $validated[
                    'rejection_reason'
                ],

            'winner_id' =>
                null,

            'closed_at' =>
                null,
        ]);


        return redirect()
            ->route(
                'admin.auctions.index',
                [
                    'status' =>
                        'rejected',
                ]
            )
            ->with(
                'success',
                'Auction rejected successfully.'
            );
    }
}