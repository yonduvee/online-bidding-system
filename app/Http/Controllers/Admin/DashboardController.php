<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Auction;
use App\Models\Bid;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();

        $totalBidders = User::where(
            'role',
            'bidder'
        )->count();

        $totalSellers = User::where(
            'role',
            'seller'
        )->count();

        $totalAuctions = Auction::count();

        $pendingAuctions = Auction::where(
            'status',
            'pending'
        )->count();

        $activeAuctions = Auction::where(
            'status',
            'active'
        )->count();

        $scheduledAuctions = Auction::where(
            'status',
            'scheduled'
        )->count();

        $completedAuctions = Auction::where(
            'status',
            'ended'
        )->count();

        $totalBids = Bid::count();

        /*
         * Total value of completed auctions
         * which actually have a winner.
         *
         * This is NOT platform revenue.
         */
        $completedAuctionValue = Auction::where(
                'status',
                'ended'
            )
            ->whereNotNull('winner_id')
            ->sum('current_price');


        $recentAuctions = Auction::with([
                'seller',
                'category',
            ])
            ->latest()
            ->limit(5)
            ->get();


        return view(
            'admin.dashboard',
            compact(
                'totalUsers',
                'totalBidders',
                'totalSellers',
                'totalAuctions',
                'pendingAuctions',
                'activeAuctions',
                'scheduledAuctions',
                'completedAuctions',
                'totalBids',
                'completedAuctionValue',
                'recentAuctions'
            )
        );
    }
}