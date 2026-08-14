<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Auction;
use App\Models\Bid;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | User List
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {
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

            'role' => [
                'nullable',
                'in:seller,bidder',
            ],

            'status' => [
                'nullable',
                'in:all,active,blocked',
            ],
        ]);


        $query = User::query()
            ->whereIn(
                'role',
                [
                    'seller',
                    'bidder',
                ]
            )
            ->withCount([
                'auctions',
                'bids',
                'wonAuctions',
            ]);


        /*
        |--------------------------------------------------------------------------
        | Search
        |--------------------------------------------------------------------------
        */

        if ($request->filled('search')) {

            $search = trim(
                $request->search
            );


            $query->where(
                function ($q) use ($search) {

                    $q->where(
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
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Role Filter
        |--------------------------------------------------------------------------
        */

        if (
            $request->filled('role')
            &&
            in_array(
                $request->role,
                [
                    'seller',
                    'bidder',
                ],
                true
            )
        ) {

            $query->where(
                'role',
                $request->role
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Account Status Filter
        |--------------------------------------------------------------------------
        */

        if (
            $request->status === 'active'
        ) {

            $query->where(
                'is_active',
                true
            );

        } elseif (
            $request->status === 'blocked'
        ) {

            $query->where(
                'is_active',
                false
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Pagination
        |--------------------------------------------------------------------------
        */

        $users = $query
            ->latest()
            ->paginate(12)
            ->withQueryString();


        /*
        |--------------------------------------------------------------------------
        | Statistics
        |--------------------------------------------------------------------------
        */

        $totalUsers = User::whereIn(
                'role',
                [
                    'seller',
                    'bidder',
                ]
            )
            ->count();


        $totalSellers = User::where(
                'role',
                'seller'
            )
            ->count();


        $totalBidders = User::where(
                'role',
                'bidder'
            )
            ->count();


        $blockedUsers = User::whereIn(
                'role',
                [
                    'seller',
                    'bidder',
                ]
            )
            ->where(
                'is_active',
                false
            )
            ->count();


        return view(
            'admin.users.index',
            compact(
                'users',
                'totalUsers',
                'totalSellers',
                'totalBidders',
                'blockedUsers'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | User Details
    |--------------------------------------------------------------------------
    */

    public function show(User $user)
    {
        /*
        |--------------------------------------------------------------------------
        | Security
        |--------------------------------------------------------------------------
        |
        | Admin accounts cannot be managed
        | through normal user management.
        |
        */

        if (
            $user->role === 'admin'
        ) {

            abort(
                403,
                'Admin accounts cannot be managed here.'
            );
        }


        /*
         * Only seller and bidder accounts
         * belong in this management section.
         */

        if (
            !in_array(
                $user->role,
                [
                    'seller',
                    'bidder',
                ],
                true
            )
        ) {

            abort(
                403,
                'This account cannot be managed here.'
            );
        }


        $user->loadCount([
            'auctions',
            'bids',
            'wonAuctions',
        ]);


        /*
        |--------------------------------------------------------------------------
        | Seller Recent Auctions
        |--------------------------------------------------------------------------
        */

        $recentAuctions = collect();


        if (
            $user->role === 'seller'
        ) {

            $recentAuctions =
                Auction::with([
                        'category',
                        'winner',
                    ])
                    ->where(
                        'user_id',
                        $user->id
                    )
                    ->latest()
                    ->limit(10)
                    ->get();
        }


        /*
        |--------------------------------------------------------------------------
        | Bidder Recent Bids
        |--------------------------------------------------------------------------
        */

        $recentBids = collect();


        if (
            $user->role === 'bidder'
        ) {

            $recentBids =
                Bid::with([
                        'auction.category',
                    ])
                    ->where(
                        'user_id',
                        $user->id
                    )
                    ->latest()
                    ->limit(10)
                    ->get();
        }


        return view(
            'admin.users.show',
            compact(
                'user',
                'recentAuctions',
                'recentBids'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Block / Unblock User
    |--------------------------------------------------------------------------
    */

    public function toggleStatus(
        Request $request,
        User $user
    ) {
        /*
        |--------------------------------------------------------------------------
        | SECURITY 1: ADMIN CANNOT MODIFY OWN ACCOUNT
        |--------------------------------------------------------------------------
        */

        if (
            (int) $user->id
            ===
            (int) auth()->id()
        ) {

            return back()->with(
                'error',
                'You cannot block or unblock your own administrator account.'
            );
        }


        /*
        |--------------------------------------------------------------------------
        | SECURITY 2: ADMIN ACCOUNTS ARE PROTECTED
        |--------------------------------------------------------------------------
        */

        if (
            $user->role === 'admin'
        ) {

            return back()->with(
                'error',
                'Administrator accounts cannot be blocked from this user management page.'
            );
        }


        /*
        |--------------------------------------------------------------------------
        | SECURITY 3: ONLY SELLER / BIDDER CAN BE MANAGED
        |--------------------------------------------------------------------------
        */

        if (
            !in_array(
                $user->role,
                [
                    'seller',
                    'bidder',
                ],
                true
            )
        ) {

            abort(
                403,
                'This account cannot be managed here.'
            );
        }


        /*
        |--------------------------------------------------------------------------
        | CURRENTLY ACTIVE -> BLOCK
        |--------------------------------------------------------------------------
        */

        if (
            $user->is_active
        ) {

            /*
             * Blocking reason is required.
             */

            $validated =
                $request->validate([

                    'blocked_reason' => [
                        'required',
                        'string',
                        'min:5',
                        'max:1000',
                    ],

                ]);


            /*
             * Block account.
             */

            $user->update([

                'is_active' =>
                    false,

                'blocked_at' =>
                    now(),

                'blocked_reason' =>
                    $validated[
                        'blocked_reason'
                    ],

            ]);


            return back()->with(
                'success',
                $user->name
                .
                ' has been blocked successfully.'
            );
        }


        /*
        |--------------------------------------------------------------------------
        | CURRENTLY BLOCKED -> UNBLOCK
        |--------------------------------------------------------------------------
        */

        $user->update([

            'is_active' =>
                true,

            'blocked_at' =>
                null,

            'blocked_reason' =>
                null,

        ]);


        return back()->with(
            'success',
            $user->name
            .
            ' has been unblocked successfully.'
        );
    }
}