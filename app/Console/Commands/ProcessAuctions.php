<?php

namespace App\Console\Commands;

use App\Services\AuctionLifecycleService;
use Illuminate\Console\Command;

class ProcessAuctions extends Command
{
    protected $signature = 'auctions:process';

    protected $description =
        'Activate scheduled auctions and close expired auctions with winner selection.';


    public function handle(
        AuctionLifecycleService $lifecycleService
    ): int {

        $result =
            $lifecycleService
                ->processDueAuctions();


        $this->info(
            'Auction processing completed.'
        );


        $this->line(
            'Activated: '
            .
            $result['activated']
        );


        $this->line(
            'Ended: '
            .
            $result['ended']
        );


        return self::SUCCESS;
    }
}