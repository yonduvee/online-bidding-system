<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Auction;
use App\Models\Bid;

class DashboardController extends Controller
{
    public function index()
    {
        $sellerId = auth()->id();


        /*
        |--------------------------------------------------------------------------
        | Total Auctions
        |--------------------------------------------------------------------------
        */

        $totalAuctions = Auction::where(
            'user_id',
            $sellerId
        )->count();


        /*
        |--------------------------------------------------------------------------
        | Pending Auctions
        |--------------------------------------------------------------------------
        */

        $pendingAuctions = Auction::where(
                'user_id',
                $sellerId
            )
            ->where(
                'status',
                'pending'
            )
            ->count();


        /*
        |--------------------------------------------------------------------------
        | Active Auctions
        |--------------------------------------------------------------------------
        */

        $activeAuctions = Auction::where(
                'user_id',
                $sellerId
            )
            ->where(
                'status',
                'active'
            )
            ->count();


        /*
        |--------------------------------------------------------------------------
        | Completed Auctions
        |--------------------------------------------------------------------------
        */

        $completedAuctions = Auction::where(
                'user_id',
                $sellerId
            )
            ->where(
                'status',
                'ended'
            )
            ->count();


        /*
        |--------------------------------------------------------------------------
        | Total Bids Received
        |--------------------------------------------------------------------------
        */

        $totalBidsReceived = Bid::whereHas(
                'auction',
                function ($query) use ($sellerId) {

                    $query->where(
                        'user_id',
                        $sellerId
                    );
                }
            )
            ->count();


        /*
        |--------------------------------------------------------------------------
        | Latest Auctions
        |--------------------------------------------------------------------------
        */

        $recentAuctions = Auction::with([
                'category',
                'images',
                'winner',
            ])
            ->where(
                'user_id',
                $sellerId
            )
            ->latest()
            ->limit(5)
            ->get();


        return view(
            'seller.dashboard',
            compact(
                'totalAuctions',
                'pendingAuctions',
                'activeAuctions',
                'completedAuctions',
                'totalBidsReceived',
                'recentAuctions'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Completed Auctions Page
    |--------------------------------------------------------------------------
    */

    public function completed()
    {
        $completedAuctions = Auction::with([
                'category',
                'images',
                'winner',
                'bids.bidder',
            ])
            ->where(
                'user_id',
                auth()->id()
            )
            ->where(
                'status',
                'ended'
            )
            ->orderByDesc('closed_at')
            ->get();


        return view(
            'seller.auctions.completed',
            compact(
                'completedAuctions'
            )
        );
    }
}