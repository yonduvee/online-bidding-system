<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use App\Models\Bid;
use App\Services\AuctionLifecycleService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class BidController extends Controller
{
    public function store(
        Request $request,
        Auction $auction,
        AuctionLifecycleService $lifecycleService
    ) {
        /*
        |--------------------------------------------------------------------------
        | BASIC REQUEST VALIDATION
        |--------------------------------------------------------------------------
        */

        $validated = $request->validate([
            'amount' => [
                'required',
                'numeric',
                'min:0.01',
                'decimal:0,2',
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | USER SECURITY CHECK
        |--------------------------------------------------------------------------
        */

        $bidder = $request->user();


        if (!$bidder) {

            return redirect()
                ->route('login');
        }


        /*
         * Only bidder role can bid.
         */
        if ($bidder->role !== 'bidder') {

            abort(
                403,
                'Only bidder accounts can place bids.'
            );
        }


        /*
         * Blocked user protection.
         */
        if (!$bidder->is_active) {

            abort(
                403,
                'Your account is currently blocked.'
            );
        }


        /*
        |--------------------------------------------------------------------------
        | UPDATE AUCTION LIFECYCLE FIRST
        |--------------------------------------------------------------------------
        */

        $lifecycleService
            ->processAuction(
                $auction->id
            );


        /*
        |--------------------------------------------------------------------------
        | SECURE TRANSACTION
        |--------------------------------------------------------------------------
        |
        | lockForUpdate prevents two bid requests
        | from updating the same auction price
        | at exactly the same time incorrectly.
        |
        */

        DB::transaction(
            function () use (
                $validated,
                $auction,
                $bidder
            ) {

                /*
                 * Reload and lock auction row.
                 */
                $lockedAuction =
                    Auction::query()
                        ->lockForUpdate()
                        ->findOrFail(
                            $auction->id
                        );


                /*
                |--------------------------------------------------------------------------
                | AUCTION MUST BE ACTIVE
                |--------------------------------------------------------------------------
                */

                if (
                    $lockedAuction->status
                    !== 'active'
                ) {

                    throw ValidationException::withMessages([
                        'amount' =>
                            'This auction is not currently accepting bids.',
                    ]);
                }


                /*
                |--------------------------------------------------------------------------
                | START TIME CHECK
                |--------------------------------------------------------------------------
                */

                if (
                    $lockedAuction->start_time
                    &&
                    $lockedAuction
                        ->start_time
                        ->gt(now())
                ) {

                    throw ValidationException::withMessages([
                        'amount' =>
                            'This auction has not started yet.',
                    ]);
                }


                /*
                |--------------------------------------------------------------------------
                | END TIME CHECK
                |--------------------------------------------------------------------------
                */

                if (
                    $lockedAuction->end_time
                    &&
                    $lockedAuction
                        ->end_time
                        ->lte(now())
                ) {

                    throw ValidationException::withMessages([
                        'amount' =>
                            'This auction has already ended.',
                    ]);
                }


                /*
                |--------------------------------------------------------------------------
                | SELLER CANNOT BID OWN AUCTION
                |--------------------------------------------------------------------------
                */

                if (
                    (int) $lockedAuction->user_id
                    ===
                    (int) $bidder->id
                ) {

                    throw ValidationException::withMessages([
                        'amount' =>
                            'You cannot bid on your own auction.',
                    ]);
                }


                /*
                |--------------------------------------------------------------------------
                | DETERMINE MINIMUM BID
                |--------------------------------------------------------------------------
                */

                $hasExistingBid =
                    Bid::where(
                        'auction_id',
                        $lockedAuction->id
                    )->exists();


                if ($hasExistingBid) {

                    $minimumBid =
                        (float)
                        $lockedAuction->current_price
                        +
                        (float)
                        $lockedAuction->bid_increment;

                } else {

                    $minimumBid =
                        (float)
                        $lockedAuction->starting_price;
                }


                /*
                |--------------------------------------------------------------------------
                | SERVER-SIDE BID VALIDATION
                |--------------------------------------------------------------------------
                |
                | Never trust HTML min="" value.
                | User can modify browser HTML manually,
                | তাই backend-এ আবার check করছি।
                |
                */

                $bidAmount =
                    round(
                        (float)
                        $validated['amount'],
                        2
                    );


                $minimumBid =
                    round(
                        $minimumBid,
                        2
                    );


                if (
                    $bidAmount
                    <
                    $minimumBid
                ) {

                    throw ValidationException::withMessages([
                        'amount' =>
                            'Your bid must be at least ৳'
                            .
                            number_format(
                                $minimumBid,
                                2
                            )
                            .
                            '.',
                    ]);
                }


                /*
                |--------------------------------------------------------------------------
                | CREATE BID
                |--------------------------------------------------------------------------
                */

                Bid::create([
                    'auction_id' =>
                        $lockedAuction->id,

                    'user_id' =>
                        $bidder->id,

                    'amount' =>
                        $bidAmount,
                ]);


                /*
                |--------------------------------------------------------------------------
                | UPDATE CURRENT PRICE
                |--------------------------------------------------------------------------
                */

                $lockedAuction->update([
                    'current_price' =>
                        $bidAmount,
                ]);

            },
            3
        );


        return back()
            ->with(
                'success',
                'Your bid has been placed successfully.'
            );
    }
}