<?php

namespace App\Services;

use App\Models\Auction;
use Illuminate\Support\Facades\DB;

class AuctionLifecycleService
{
    public function processDueAuctions(): array
    {
        $auctionIds = Auction::query()
            ->whereIn('status', [
                'scheduled',
                'active',
            ])
            ->where(function ($query) {

                $query
                    ->where('start_time', '<=', now())
                    ->orWhere('end_time', '<=', now());

            })
            ->pluck('id');

        $activated = 0;
        $ended = 0;

        foreach ($auctionIds as $auctionId) {

            $result = $this->processAuction(
                $auctionId
            );

            if ($result === 'active') {
                $activated++;
            }

            if ($result === 'ended') {
                $ended++;
            }
        }

        return [
            'activated' => $activated,
            'ended' => $ended,
        ];
    }


    public function processAuction(
        int $auctionId
    ): ?string {

        return DB::transaction(
            function () use ($auctionId) {

                $auction = Auction::query()
                    ->where('id', $auctionId)
                    ->lockForUpdate()
                    ->first();

                if (!$auction) {
                    return null;
                }


                /*
                |--------------------------------------------------------------------------
                | Ignore auctions that should not be processed
                |--------------------------------------------------------------------------
                */

                if (!in_array(
                    $auction->status,
                    [
                        'scheduled',
                        'active',
                    ]
                )) {
                    return $auction->status;
                }


                /*
                |--------------------------------------------------------------------------
                | End Auction
                |--------------------------------------------------------------------------
                */

                if ($auction->end_time->lte(now())) {

                    $winningBid = $auction
                        ->bids()
                        ->orderByDesc('amount')
                        ->orderBy('created_at')
                        ->first();


                    $auction->update([
                        'status' => 'ended',

                        'winner_id' =>
                            $winningBid
                                ? $winningBid->user_id
                                : null,

                        'closed_at' => now(),
                    ]);

                    return 'ended';
                }


                /*
                |--------------------------------------------------------------------------
                | Scheduled -> Active
                |--------------------------------------------------------------------------
                */

                if (
                    $auction->status === 'scheduled'
                    &&
                    $auction->start_time->lte(now())
                ) {

                    $auction->update([
                        'status' => 'active',
                    ]);

                    return 'active';
                }


                return $auction->status;

            },
            5
        );
    }
}