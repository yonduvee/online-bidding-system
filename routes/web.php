<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Controllers
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PublicAuctionController;
use App\Http\Controllers\BidController;

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\AuctionController as AdminAuctionController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\BidController as AdminBidController;

use App\Http\Controllers\Seller\DashboardController as SellerDashboardController;
use App\Http\Controllers\Seller\AuctionController as SellerAuctionController;

use App\Http\Controllers\Bidder\DashboardController as BidderDashboardController;


/*
|--------------------------------------------------------------------------
| PUBLIC AUCTION ROUTES
|--------------------------------------------------------------------------
|
| Login ছাড়াও সবাই approved public auctions দেখতে পারবে।
|
*/

Route::get(
    '/',
    [PublicAuctionController::class, 'index']
)->name('home');


Route::get(
    '/auctions',
    [PublicAuctionController::class, 'index']
)->name('auctions.index');


Route::get(
    '/auctions/{auction:slug}',
    [PublicAuctionController::class, 'show']
)->name('auctions.show');


/*
|--------------------------------------------------------------------------
| GUEST ROUTES
|--------------------------------------------------------------------------
|
| শুধুমাত্র logged-out users login/register page access করবে।
|
*/

Route::middleware('guest')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Registration
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/register',
        [AuthController::class, 'showRegister']
    )->name('register');


    Route::post(
        '/register',
        [AuthController::class, 'register']
    )->name('register.store');


    /*
    |--------------------------------------------------------------------------
    | Login
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/login',
        [AuthController::class, 'showLogin']
    )->name('login');


    Route::post(
    '/login',
    [AuthController::class, 'login']
)
->middleware('throttle:10,1')
->name('login.store');

});


/*
|--------------------------------------------------------------------------
| AUTHENTICATED ROUTES
|--------------------------------------------------------------------------
|
| যেকোনো logged-in account ব্যবহার করতে পারবে।
|
*/

Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | General Dashboard Redirect
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/dashboard',
        [DashboardController::class, 'index']
    )->name('dashboard');


    /*
    |--------------------------------------------------------------------------
    | Logout
    |--------------------------------------------------------------------------
    */

    Route::post(
        '/logout',
        [AuthController::class, 'logout']
    )->name('logout');

});


/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
|
| শুধুমাত্র:
|
| auth
| +
| role:admin
|
| Admin panel access করতে পারবে।
|
*/

Route::middleware([
        'auth',
        'role:admin'
    ])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {


        /*
        |--------------------------------------------------------------------------
        | ADMIN DASHBOARD
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/dashboard',
            [AdminDashboardController::class, 'index']
        )->name('dashboard');


        /*
        |--------------------------------------------------------------------------
        | USER MANAGEMENT
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/users',
            [AdminUserController::class, 'index']
        )->name('users.index');


        Route::get(
            '/users/{user}',
            [AdminUserController::class, 'show']
        )
        ->whereNumber('user')
        ->name('users.show');


        Route::patch(
            '/users/{user}/toggle-status',
            [AdminUserController::class, 'toggleStatus']
        )
        ->whereNumber('user')
        ->name('users.toggle-status');


        /*
        |--------------------------------------------------------------------------
        | CATEGORY MANAGEMENT
        |--------------------------------------------------------------------------
        */

        Route::patch(
            '/categories/{category}/toggle-status',
            [
                AdminCategoryController::class,
                'toggleStatus'
            ]
        )
        ->whereNumber('category')
        ->name('categories.toggle-status');


        Route::resource(
            'categories',
            AdminCategoryController::class
        )->except([
            'show'
        ]);


        /*
        |--------------------------------------------------------------------------
        | AUCTION MANAGEMENT
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/auctions',
            [AdminAuctionController::class, 'index']
        )->name('auctions.index');


        Route::get(
            '/auctions/{auction}',
            [AdminAuctionController::class, 'show']
        )
        ->whereNumber('auction')
        ->name('auctions.show');


        Route::patch(
            '/auctions/{auction}/approve',
            [AdminAuctionController::class, 'approve']
        )
        ->whereNumber('auction')
        ->name('auctions.approve');


        Route::patch(
            '/auctions/{auction}/reject',
            [AdminAuctionController::class, 'reject']
        )
        ->whereNumber('auction')
        ->name('auctions.reject');


        /*
        |--------------------------------------------------------------------------
        | BID MANAGEMENT
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/bids',
            [AdminBidController::class, 'index']
        )->name('bids.index');

});


/*
|--------------------------------------------------------------------------
| SELLER ROUTES
|--------------------------------------------------------------------------
|
| শুধুমাত্র:
|
| auth
| +
| role:seller
|
| Seller routes access করতে পারবে।
|
*/

Route::middleware([
        'auth',
        'role:seller'
    ])
    ->prefix('seller')
    ->name('seller.')
    ->group(function () {


        /*
        |--------------------------------------------------------------------------
        | SELLER DASHBOARD
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/dashboard',
            [SellerDashboardController::class, 'index']
        )->name('dashboard');


        /*
        |--------------------------------------------------------------------------
        | MY AUCTIONS
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/auctions',
            [SellerAuctionController::class, 'index']
        )->name('auctions.index');


        /*
        |--------------------------------------------------------------------------
        | CREATE AUCTION
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/auctions/create',
            [SellerAuctionController::class, 'create']
        )->name('auctions.create');


        Route::post(
            '/auctions',
            [SellerAuctionController::class, 'store']
        )->name('auctions.store');


        /*
        |--------------------------------------------------------------------------
        | EDIT AUCTION
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/auctions/{auction}/edit',
            [SellerAuctionController::class, 'edit']
        )
        ->whereNumber('auction')
        ->name('auctions.edit');


        Route::put(
            '/auctions/{auction}',
            [SellerAuctionController::class, 'update']
        )
        ->whereNumber('auction')
        ->name('auctions.update');


        /*
        |--------------------------------------------------------------------------
        | RESUBMIT REJECTED AUCTION
        |--------------------------------------------------------------------------
        */

        Route::patch(
            '/auctions/{auction}/resubmit',
            [SellerAuctionController::class, 'resubmit']
        )
        ->whereNumber('auction')
        ->name('auctions.resubmit');


        /*
        |--------------------------------------------------------------------------
        | DELETE AUCTION
        |--------------------------------------------------------------------------
        */

        Route::delete(
            '/auctions/{auction}',
            [SellerAuctionController::class, 'destroy']
        )
        ->whereNumber('auction')
        ->name('auctions.destroy');


        /*
        |--------------------------------------------------------------------------
        | COMPLETED AUCTIONS
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/completed-auctions',
            [
                SellerDashboardController::class,
                'completed'
            ]
        )->name('auctions.completed');

});


/*
|--------------------------------------------------------------------------
| BIDDER ROUTES
|--------------------------------------------------------------------------
|
| IMPORTANT:
|
| Bid placement route এখানেই থাকবে।
|
| তাই seller/admin manually POST request করলেও
| role:bidder middleware তাকে block করবে।
|
*/

Route::middleware([
        'auth',
        'role:bidder'
    ])
    ->prefix('bidder')
    ->name('bidder.')
    ->group(function () {


        /*
        |--------------------------------------------------------------------------
        | BIDDER DASHBOARD
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/dashboard',
            [BidderDashboardController::class, 'index']
        )->name('dashboard');


        /*
        |--------------------------------------------------------------------------
        | FULL BID HISTORY
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/bid-history',
            [BidderDashboardController::class, 'history']
        )->name('bids.history');


        /*
        |--------------------------------------------------------------------------
        | AUCTIONS WON
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/auctions-won',
            [BidderDashboardController::class, 'won']
        )->name('auctions.won');


        /*
        |--------------------------------------------------------------------------
        | SECURE BID ROUTE
        |--------------------------------------------------------------------------
        |
        | এই route:
        |
        | 1. Login ছাড়া access করা যাবে না
        | 2. Bidder role ছাড়া access করা যাবে না
        | 3. Auction ID numeric হতে হবে
        |
        */

        Route::post(
            '/auctions/{auction}/bid',
            [BidController::class, 'store']
        )
        ->whereNumber('auction')
        ->name('auctions.bid');

});