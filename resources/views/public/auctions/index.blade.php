<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Auctions | BidZone</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    >


    <link
        rel="stylesheet"
        href="{{ asset('css/bidzone-theme.css') }}"
    >

  <style>

    /* =========================================================
       PAGE
    ========================================================= */

    body {
        margin: 0;
        background:
            radial-gradient(
                circle at 10% 0%,
                rgba(103, 232, 249, 0.08),
                transparent 30%
            ),
            radial-gradient(
                circle at 90% 5%,
                rgba(245, 158, 11, 0.08),
                transparent 28%
            ),
            var(--bg-primary);
        color: var(--text-primary);
        font-family: Arial, sans-serif;
    }

    .page-wrapper {
        max-width: 1300px;
        margin: auto;
        padding: 45px 25px 80px;
    }


    /* =========================================================
       NAVBAR BUTTONS
    ========================================================= */

    .bidzone-navbar .btn-outline-light {
        color: var(--text-primary);
        border-color: var(--border-color);
        background: rgba(255, 255, 255, 0.03);
    }

    .bidzone-navbar .btn-outline-light:hover {
        color: #111827;
        background: var(--accent);
        border-color: var(--accent);
    }

    html[data-theme="light"]
    .bidzone-navbar .btn-outline-light {
        color: #111827;
        border-color: #d7dde7;
    }


    /* =========================================================
       HERO
    ========================================================= */

    .hero {
        position: relative;
        overflow: hidden;

        background:
            linear-gradient(
                135deg,
                rgba(13, 16, 24, 0.98),
                rgba(17, 21, 34, 0.96)
            );

        color: #ffffff;
        padding: 95px 20px;

        border-bottom:
            1px solid rgba(255, 255, 255, 0.07);
    }

    .hero::before {
        content: "";
        position: absolute;

        width: 420px;
        height: 420px;

        top: -230px;
        right: 8%;

        border-radius: 50%;

        background:
            rgba(103, 232, 249, 0.12);

        filter: blur(70px);

        pointer-events: none;
    }

    .hero::after {
        content: "";
        position: absolute;

        width: 360px;
        height: 360px;

        bottom: -250px;
        left: 5%;

        border-radius: 50%;

        background:
            rgba(245, 158, 11, 0.12);

        filter: blur(70px);

        pointer-events: none;
    }

    .hero-inner {
        position: relative;
        z-index: 2;

        max-width: 1200px;
        margin: auto;
    }

    .hero h1 {
        margin: 0;

        font-size: clamp(
            42px,
            6vw,
            70px
        );

        font-weight: 900;
        line-height: 1.05;

        letter-spacing: -2px;
    }

    .hero h1 span {
        color: var(--accent);

        text-shadow:
            0 0 35px
            rgba(245, 158, 11, 0.18);
    }

    .hero p {
        color: #aeb8ca;

        max-width: 700px;

        margin-top: 22px;

        font-size: 18px;
        line-height: 1.75;
    }


    /* =========================================================
       FILTER CARD
    ========================================================= */

    .filter-card {
        position: relative;

        background:
            linear-gradient(
                145deg,
                rgba(255, 255, 255, 0.05),
                rgba(255, 255, 255, 0.015)
            ),
            var(--surface);

        border:
            1px solid var(--border-color);

        border-radius: 22px;

        padding: 26px;

        margin-bottom: 35px;

        box-shadow:
            var(--card-shadow);

        backdrop-filter: blur(18px);

        -webkit-backdrop-filter:
            blur(18px);
    }

    html[data-theme="light"]
    .filter-card {
        background:
            var(--surface);
    }

    .filter-title {
        color: var(--text-primary);

        font-size: 18px;
        font-weight: 900;

        margin-bottom: 22px;

        letter-spacing: .2px;
    }


    /* =========================================================
       FORM
    ========================================================= */

    .form-label {
        color: var(--text-primary);
    }

    .form-control,
    .form-select,
    .input-group-text {
        min-height: 48px;

        background:
            var(--surface-light);

        color:
            var(--text-primary);

        border:
            1px solid
            var(--border-color);
    }

    .form-control {
        border-radius: 10px;
    }

    .form-select {
        border-radius: 10px;
    }

    .input-group-text {
        color: var(--text-muted);
    }

    .form-control::placeholder {
        color: var(--text-muted);
        opacity: .75;
    }

    .form-control:focus,
    .form-select:focus {
        background:
            var(--surface-light);

        color:
            var(--text-primary);

        border-color:
            var(--accent);

        box-shadow:
            0 0 0 .2rem
            rgba(245, 158, 11, .12);
    }

    .form-select option {
        background:
            var(--surface);

        color:
            var(--text-primary);
    }


    /* =========================================================
       SEARCH BUTTON
    ========================================================= */

    .search-btn {
        min-height: 48px;

        background:
            linear-gradient(
                135deg,
                #f59e0b,
                #fbbf24
            );

        color: #111827;

        border: none;
        border-radius: 10px;

        font-weight: 900;

        transition:
            .2s ease;
    }

    .search-btn:hover {
        color: #111827;

        transform:
            translateY(-2px);

        box-shadow:
            0 10px 30px
            rgba(245, 158, 11, .22);
    }

    .reset-btn {
        min-height: 48px;

        display: flex;
        align-items: center;
        justify-content: center;

        color:
            var(--text-primary);

        border-color:
            var(--border-color);

        border-radius: 10px;
    }

    .reset-btn:hover {
        background:
            var(--surface-light);

        color:
            var(--accent);

        border-color:
            var(--accent);
    }


    /* =========================================================
       RESULT HEADER
    ========================================================= */

    .result-header {
        display: flex;
        justify-content: space-between;
        align-items: center;

        gap: 15px;

        margin-bottom: 25px;
    }

    .result-header h2 {
        margin: 0;

        color:
            var(--text-primary);

        font-size: 30px;
        font-weight: 900;

        letter-spacing: -.6px;
    }

    .result-header .text-muted {
        color:
            var(--text-muted)
            !important;
    }

    .result-header a {
        color:
            var(--text-muted)
            !important;
    }

    .result-header a:hover {
        color:
            var(--accent)
            !important;
    }


    /* =========================================================
       AUCTION CARD
    ========================================================= */

    .auction-card {
        position: relative;

        height: 100%;

        overflow: hidden;

        background:
            linear-gradient(
                145deg,
                rgba(255, 255, 255, .045),
                rgba(255, 255, 255, .012)
            ),
            var(--surface);

        border:
            1px solid
            var(--border-color);

        border-radius: 22px;

        box-shadow:
            0 16px 45px
            rgba(0, 0, 0, .16);

        transition:
            transform .3s ease,
            border-color .3s ease,
            box-shadow .3s ease;
    }

    html[data-theme="light"]
    .auction-card {
        background:
            var(--surface);
    }

    .auction-card:hover {
        transform:
            translateY(-7px);

        border-color:
            rgba(245, 158, 11, .40);

        box-shadow:
            0 25px 60px
            rgba(0, 0, 0, .24),
            0 0 35px
            rgba(245, 158, 11, .05);
    }


    /* =========================================================
       AUCTION IMAGE
    ========================================================= */

    .auction-image {
        height: 255px;

        position: relative;
        overflow: hidden;

        background:
            var(--surface-light);
    }

    .auction-image::after {
        content: "";

        position: absolute;
        inset: auto 0 0 0;

        height: 45%;

        background:
            linear-gradient(
                to top,
                rgba(13, 16, 24, .72),
                transparent
            );

        pointer-events: none;
    }

    .auction-image img {
        width: 100%;
        height: 100%;

        object-fit: cover;

        transition:
            transform .45s ease;
    }

    .auction-card:hover
    .auction-image img {
        transform:
            scale(1.055);
    }

    .no-image {
        width: 100%;
        height: 100%;

        display: flex;
        justify-content: center;
        align-items: center;

        color:
            var(--text-muted);

        font-size: 50px;
    }


    /* =========================================================
       STATUS
    ========================================================= */

    .status-badge {
        position: absolute;

        z-index: 2;

        top: 14px;
        left: 14px;

        border-radius: 999px;

        padding:
            7px 12px;

        font-size: 10px;
        font-weight: 900;

        letter-spacing: .5px;

        text-transform:
            uppercase;

        backdrop-filter:
            blur(10px);
    }

    .status-active {
        background:
            rgba(34, 197, 94, .16);

        color:
            #86efac;

        border:
            1px solid
            rgba(34, 197, 94, .30);

        box-shadow:
            0 0 20px
            rgba(34, 197, 94, .10);
    }

    .status-scheduled {
        background:
            rgba(56, 189, 248, .15);

        color:
            #7dd3fc;

        border:
            1px solid
            rgba(56, 189, 248, .28);
    }

    html[data-theme="light"]
    .status-active {
        background: #dcfce7;
        color: #166534;
    }

    html[data-theme="light"]
    .status-scheduled {
        background: #dbeafe;
        color: #1e40af;
    }


    /* =========================================================
       BID COUNT
    ========================================================= */

    .bid-count {
        position: absolute;

        z-index: 2;

        top: 14px;
        right: 14px;

        background:
            rgba(13, 16, 24, .74);

        color: #ffffff;

        border:
            1px solid
            rgba(255,255,255,.10);

        backdrop-filter:
            blur(10px);

        border-radius:
            999px;

        padding:
            7px 11px;

        font-size:
            10px;

        font-weight:
            800;
    }


    /* =========================================================
       CARD BODY
    ========================================================= */

    .auction-body {
        padding: 23px;
    }

    .category {
        color:
            var(--accent);

        font-size:
            11px;

        font-weight:
            900;

        letter-spacing:
            1px;

        text-transform:
            uppercase;
    }

    .auction-title {
        margin-top:
            7px;

        font-size:
            21px;

        font-weight:
            900;

        line-height:
            1.3;
    }

    .auction-title a {
        color:
            var(--text-primary);

        text-decoration:
            none;

        transition:
            color .2s ease;
    }

    .auction-title a:hover {
        color:
            var(--accent);
    }

    .seller {
        color:
            var(--text-muted);

        font-size:
            13px;

        margin-top:
            10px;
    }

    .seller strong {
        color:
            var(--text-primary);
    }

    .description {
        color:
            var(--text-muted);

        margin-top:
            14px;

        min-height:
            48px;

        line-height:
            1.6;

        font-size:
            14px;
    }


    /* =========================================================
       PRICE
    ========================================================= */

    .price-box {
        position: relative;

        overflow: hidden;

        background:
            var(--surface-light);

        border:
            1px solid
            var(--border-color);

        border-radius:
            14px;

        padding:
            16px;

        margin-top:
            20px;
    }

    .price-box::before {
        content: "";

        position: absolute;

        left: 0;
        top: 0;
        bottom: 0;

        width: 3px;

        background:
            linear-gradient(
                to bottom,
                var(--accent),
                var(--cyan)
            );
    }

    .price-label {
        color:
            var(--text-muted);

        font-size:
            11px;

        text-transform:
            uppercase;

        letter-spacing:
            .6px;
    }

    .price {
        margin-top:
            3px;

        color:
            var(--accent);

        font-size:
            27px;

        font-weight:
            900;

        letter-spacing:
            -.5px;
    }

    .price-box .text-muted {
        color:
            var(--text-muted)
            !important;
    }


    /* =========================================================
       COUNTDOWN
    ========================================================= */

    .card-countdown {
        background:
            linear-gradient(
                135deg,
                #111522,
                #0d1018
            );

        color:
            #dbe5f5;

        border:
            1px solid
            rgba(103, 232, 249, .14);

        padding:
            13px 14px;

        margin-top:
            15px;

        border-radius:
            11px;

        font-size:
            12px;

        font-weight:
            800;

        letter-spacing:
            .25px;

        text-align:
            center;
    }


    /* =========================================================
       VIEW BUTTON
    ========================================================= */

    .view-btn {
        min-height:
            46px;

        display:
            flex;

        align-items:
            center;

        justify-content:
            center;

        background:
            linear-gradient(
                135deg,
                #f59e0b,
                #fbbf24
            );

        color:
            #111827;

        border:
            none;

        border-radius:
            11px;

        font-weight:
            900;

        transition:
            transform .2s ease,
            box-shadow .2s ease;
    }

    .view-btn:hover {
        color:
            #111827;

        transform:
            translateY(-2px);

        box-shadow:
            0 12px 28px
            rgba(245, 158, 11, .22);
    }


    /* =========================================================
       EMPTY
    ========================================================= */

    .empty-box {
        background:
            var(--surface);

        border:
            1px solid
            var(--border-color);

        border-radius:
            22px;

        padding:
            80px 25px;

        text-align:
            center;

        box-shadow:
            var(--card-shadow);
    }

    .empty-box h3 {
        color:
            var(--text-primary);
    }

    .empty-box .text-muted {
        color:
            var(--text-muted)
            !important;
    }

    .empty-icon {
        width:
            90px;

        height:
            90px;

        margin:
            auto;

        border-radius:
            50%;

        background:
            rgba(245, 158, 11, .12);

        color:
            var(--accent);

        border:
            1px solid
            rgba(245, 158, 11, .20);

        display:
            flex;

        justify-content:
            center;

        align-items:
            center;

        font-size:
            36px;
    }


    /* =========================================================
       PAGINATION
    ========================================================= */

    .pagination-box {
        display:
            flex;

        justify-content:
            center;

        align-items:
            center;

        gap:
            12px;

        margin-top:
            42px;
    }

    .page-number {
        background:
            var(--surface);

        border:
            1px solid
            var(--border-color);

        padding:
            9px 15px;

        border-radius:
            10px;

        color:
            var(--text-muted);
    }

    .pagination-box
    .btn-outline-dark,
    .pagination-box
    .btn-outline-secondary {
        color:
            var(--text-primary);

        border-color:
            var(--border-color);

        background:
            var(--surface);
    }

    .pagination-box
    .btn-outline-dark:hover {
        color:
            #111827;

        background:
            var(--accent);

        border-color:
            var(--accent);
    }


    /* =========================================================
       LIGHT THEME SMALL FIXES
    ========================================================= */

    html[data-theme="light"]
    .hero {
        background:
            linear-gradient(
                135deg,
                #111827,
                #1f2937
            );
    }

    html[data-theme="light"]
    .card-countdown {
        background:
            #111827;

        color:
            #ffffff;
    }


    /* =========================================================
       MOBILE
    ========================================================= */

    @media(max-width: 768px) {

        .hero {
            padding:
                70px 20px;
        }

        .hero h1 {
            font-size:
                42px;
        }

        .result-header {
            align-items:
                flex-start;

            flex-direction:
                column;
        }

        .auction-image {
            height:
                230px;
        }

        .page-wrapper {
            padding:
                35px 15px
                65px;
        }

    }

</style>

</head>

<body>


<!-- =========================================
     NAVBAR
========================================== -->

<nav
    class="
        navbar
        bidzone-navbar
        px-4
        py-3
    "
>

    <a
        href="{{ route('home') }}"
        class="bidzone-brand"
    >
        Bid<span>Zone</span>
    </a>


    <div class="d-flex gap-2 align-items-center">


    <!-- DARK / LIGHT THEME BUTTON -->

    <button
        type="button"
        class="theme-toggle"
        onclick="toggleBidZoneTheme()"
        title="Switch theme"
        aria-label="Switch dark and light theme"
    >

        <i
            class="
                fa-solid
                fa-sun
                bidzone-theme-icon
            "
        ></i>

    </button>


    @auth

        <a
            href="{{ route('dashboard') }}"
            class="btn btn-outline-light"
        >

            <i class="fa-solid fa-user me-2"></i>

            Dashboard

        </a>


        <form
            method="POST"
            action="{{ route('logout') }}"
        >

            @csrf


            <button
                type="submit"
                class="btn btn-outline-light"
            >
                Logout
            </button>

        </form>


    @else


        <a
            href="{{ route('login') }}"
            class="btn btn-outline-light"
        >
            Login
        </a>


        <a
            href="{{ route('register') }}"
            class="btn btn-warning fw-bold"
        >
            Register
        </a>


    @endauth


</div>


<!-- =========================================
     HERO
========================================== -->

<section class="hero">

    <div class="hero-inner">

        <h1>

            Bid. Win.
            <span>Own It.</span>

        </h1>


        <p>

            Explore live and upcoming auctions,
            find the products you want and place
            competitive bids securely through BidZone.

        </p>

    </div>

</section>


<div class="page-wrapper">


    <!-- =====================================
         FILTER / SEARCH
    ====================================== -->

    <div class="filter-card">


        <div class="filter-title">

            <i
                class="
                    fa-solid
                    fa-sliders
                    me-2
                    text-warning
                "
            ></i>

            Find Auctions

        </div>


        <form
            method="GET"
            action="{{ route('auctions.index') }}"
        >


            <div class="row g-3">


                <!-- SEARCH -->

                <div class="col-lg-5">


                    <label class="form-label fw-bold">

                        Search

                    </label>


                    <div class="input-group">


                        <span class="input-group-text">

                            <i class="fa-solid fa-magnifying-glass"></i>

                        </span>


                        <input
                            type="text"
                            name="search"
                            class="form-control"
                            value="{{ request('search') }}"
                            placeholder="Search auction, seller or category..."
                        >


                    </div>


                </div>


                <!-- CATEGORY -->

                <div class="col-lg-3">


                    <label class="form-label fw-bold">

                        Category

                    </label>


                    <select
                        name="category"
                        class="form-select"
                    >


                        <option value="">

                            All Categories

                        </option>


                        @foreach(
                            $categories
                            as $category
                        )


                            <option
                                value="{{ $category->slug }}"

                                @selected(
                                    request('category')
                                    ===
                                    $category->slug
                                )
                            >

                                {{ $category->name }}

                            </option>


                        @endforeach


                    </select>


                </div>


                <!-- STATUS -->

                <div class="col-lg-2">


                    <label class="form-label fw-bold">

                        Status

                    </label>


                    <select
                        name="status"
                        class="form-select"
                    >


                        <option
                            value="all"

                            @selected(
                                request(
                                    'status',
                                    'all'
                                )
                                ===
                                'all'
                            )
                        >
                            All Auctions
                        </option>


                        <option
                            value="active"

                            @selected(
                                request('status')
                                ===
                                'active'
                            )
                        >
                            Live
                        </option>


                        <option
                            value="scheduled"

                            @selected(
                                request('status')
                                ===
                                'scheduled'
                            )
                        >
                            Upcoming
                        </option>


                    </select>


                </div>


                <!-- SORT -->

                <div class="col-lg-2">


                    <label class="form-label fw-bold">

                        Sort By

                    </label>


                    <select
                        name="sort"
                        class="form-select"
                    >


                        <option
                            value="ending_soon"

                            @selected(
                                request(
                                    'sort',
                                    'ending_soon'
                                )
                                ===
                                'ending_soon'
                            )
                        >
                            Ending Soon
                        </option>


                        <option
                            value="newest"

                            @selected(
                                request('sort')
                                ===
                                'newest'
                            )
                        >
                            Newest
                        </option>


                        <option
                            value="price_low"

                            @selected(
                                request('sort')
                                ===
                                'price_low'
                            )
                        >
                            Price: Low to High
                        </option>


                        <option
                            value="price_high"

                            @selected(
                                request('sort')
                                ===
                                'price_high'
                            )
                        >
                            Price: High to Low
                        </option>


                    </select>


                </div>


                <!-- MIN PRICE -->

                <div class="col-md-4 col-lg-3">


                    <label class="form-label fw-bold">

                        Minimum Price

                    </label>


                    <div class="input-group">


                        <span class="input-group-text">

                            ৳

                        </span>


                        <input
                            type="number"
                            name="min_price"
                            class="form-control"
                            min="0"
                            step="0.01"
                            value="{{ request('min_price') }}"
                            placeholder="0"
                        >


                    </div>


                </div>


                <!-- MAX PRICE -->

                <div class="col-md-4 col-lg-3">


                    <label class="form-label fw-bold">

                        Maximum Price

                    </label>


                    <div class="input-group">


                        <span class="input-group-text">

                            ৳

                        </span>


                        <input
                            type="number"
                            name="max_price"
                            class="form-control"
                            min="0"
                            step="0.01"
                            value="{{ request('max_price') }}"
                            placeholder="Any"
                        >


                    </div>


                </div>


                <!-- SEARCH BUTTON -->

                <div
                    class="
                        col-md-2
                        col-lg-3
                        d-flex
                        align-items-end
                    "
                >


                    <button
                        type="submit"
                        class="
                            btn
                            search-btn
                            w-100
                        "
                    >

                        <i
                            class="
                                fa-solid
                                fa-magnifying-glass
                                me-2
                            "
                        ></i>

                        Search Auctions

                    </button>


                </div>


                <!-- RESET -->

                <div
                    class="
                        col-md-2
                        col-lg-3
                        d-flex
                        align-items-end
                    "
                >


                    <a
                        href="{{ route('auctions.index') }}"
                        class="
                            btn
                            btn-outline-secondary
                            reset-btn
                            w-100
                        "
                    >

                        <i
                            class="
                                fa-solid
                                fa-rotate-left
                                me-2
                            "
                        ></i>

                        Reset Filters

                    </a>


                </div>


            </div>


        </form>


        @if($errors->any())


            <div class="alert alert-danger mt-3 mb-0">


                @foreach(
                    $errors->all()
                    as $error
                )

                    <div>
                        {{ $error }}
                    </div>

                @endforeach


            </div>


        @endif


    </div>


    <!-- =====================================
         RESULT HEADER
    ====================================== -->

    <div class="result-header">


        <div>


            <h2>

                @if(
                    request('status')
                    === 'active'
                )

                    Live Auctions

                @elseif(
                    request('status')
                    === 'scheduled'
                )

                    Upcoming Auctions

                @else

                    Explore Auctions

                @endif

            </h2>


            <div class="text-muted mt-1">

                {{ $auctions->total() }}

                {{ $auctions->total() === 1
                    ? 'auction'
                    : 'auctions'
                }}

                found

            </div>


        </div>


        @if(
            request()->hasAny([
                'search',
                'category',
                'min_price',
                'max_price'
            ])
            ||
            (
                request('status')
                &&
                request('status') !== 'all'
            )
        )


            <a
                href="{{ route('auctions.index') }}"
                class="text-decoration-none text-secondary"
            >

                <i
                    class="
                        fa-solid
                        fa-xmark
                        me-1
                    "
                ></i>

                Clear all filters

            </a>


        @endif


    </div>


    <!-- =====================================
         AUCTION GRID
    ====================================== -->

    @if($auctions->count())


        <div class="row g-4">


            @foreach(
                $auctions
                as $auction
            )


                @php

                    $primary =
                        $auction
                            ->images
                            ->firstWhere(
                                'is_primary',
                                true
                            )
                        ??
                        $auction
                            ->images
                            ->first();

                @endphp


                <div
                    class="
                        col-md-6
                        col-xl-4
                    "
                >


                    <div class="auction-card">


                        <!-- IMAGE -->

                        <div class="auction-image">


                            @if($primary)


                                <img
                                    src="{{ asset(
                                        'storage/'
                                        .
                                        $primary->image_path
                                    ) }}"
                                    alt="{{ $auction->title }}"
                                >


                            @else


                                <div class="no-image">

                                    <i
                                        class="
                                            fa-regular
                                            fa-image
                                        "
                                    ></i>

                                </div>


                            @endif


                            <!-- STATUS -->

                            <span
                                class="
                                    status-badge
                                    status-{{ $auction->status }}
                                "
                            >


                                @if(
                                    $auction->status
                                    === 'active'
                                )

                                    <i
                                        class="
                                            fa-solid
                                            fa-circle
                                            me-1
                                        "
                                        style="font-size:7px;"
                                    ></i>

                                    LIVE

                                @else

                                    <i
                                        class="
                                            fa-regular
                                            fa-clock
                                            me-1
                                        "
                                    ></i>

                                    UPCOMING

                                @endif


                            </span>


                            <!-- BID COUNT -->

                            <span class="bid-count">

                                <i
                                    class="
                                        fa-solid
                                        fa-gavel
                                        me-1
                                    "
                                ></i>

                                {{ $auction->bids_count }}

                                {{ $auction->bids_count === 1
                                    ? 'Bid'
                                    : 'Bids'
                                }}

                            </span>


                        </div>


                        <!-- BODY -->

                        <div class="auction-body">


                            <div class="category">

                                {{ $auction
                                    ->category
                                    ->name
                                }}

                            </div>


                            <div class="auction-title">


                                <a
                                    href="{{ route(
                                        'auctions.show',
                                        $auction->slug
                                    ) }}"
                                >

                                    {{ $auction->title }}

                                </a>


                            </div>


                            <div class="seller">

                                <i
                                    class="
                                        fa-regular
                                        fa-user
                                        me-1
                                    "
                                ></i>

                                Seller:

                                <strong>

                                    {{ $auction
                                        ->seller
                                        ->name
                                    }}

                                </strong>

                            </div>


                            <div class="description">

                                {{ \Illuminate\Support\Str::limit(
                                    $auction->description,
                                    90
                                ) }}

                            </div>


                            <!-- PRICE -->

                            <div class="price-box">


                                <div class="price-label">

                                    {{ $auction->status
                                        === 'active'
                                        ? 'Current Price'
                                        : 'Starting Price'
                                    }}

                                </div>


                                <div class="price">

                                    ৳{{ number_format(
                                        $auction->status
                                            === 'active'
                                                ? $auction->current_price
                                                : $auction->starting_price,
                                        2
                                    ) }}

                                </div>


                                <div
                                    class="
                                        small
                                        text-muted
                                        mt-1
                                    "
                                >

                                    Bid increment:

                                    ৳{{ number_format(
                                        $auction->bid_increment,
                                        2
                                    ) }}

                                </div>


                            </div>


                            <!-- COUNTDOWN -->

                            <div
                                class="card-countdown auction-timer"

                                data-status="{{ $auction->status }}"

                                data-start="{{ $auction
                                    ->start_time
                                    ->toIso8601String()
                                }}"

                                data-end="{{ $auction
                                    ->end_time
                                    ->toIso8601String()
                                }}"
                            >

                                Loading...

                            </div>


                            <!-- VIEW -->

                            <a
                                href="{{ route(
                                    'auctions.show',
                                    $auction->slug
                                ) }}"
                                class="
                                    btn
                                    view-btn
                                    w-100
                                    mt-3
                                "
                            >

                                @if(
                                    $auction->status
                                    === 'active'
                                )

                                    <i
                                        class="
                                            fa-solid
                                            fa-gavel
                                            me-2
                                        "
                                    ></i>

                                    View & Bid

                                @else

                                    <i
                                        class="
                                            fa-solid
                                            fa-eye
                                            me-2
                                        "
                                    ></i>

                                    View Auction

                                @endif


                            </a>


                        </div>


                    </div>


                </div>


            @endforeach


        </div>


        <!-- =================================
             PAGINATION
        ================================== -->

        @if(
            $auctions->hasPages()
        )


            <div class="pagination-box">


                @if(
                    $auctions->onFirstPage()
                )


                    <button
                        class="
                            btn
                            btn-outline-secondary
                        "
                        disabled
                    >

                        <i
                            class="
                                fa-solid
                                fa-arrow-left
                                me-2
                            "
                        ></i>

                        Previous

                    </button>


                @else


                    <a
                        href="{{ $auctions
                            ->previousPageUrl()
                        }}"
                        class="
                            btn
                            btn-outline-dark
                        "
                    >

                        <i
                            class="
                                fa-solid
                                fa-arrow-left
                                me-2
                            "
                        ></i>

                        Previous

                    </a>


                @endif


                <div class="page-number">

                    Page

                    <strong>
                        {{ $auctions->currentPage() }}
                    </strong>

                    of

                    <strong>
                        {{ $auctions->lastPage() }}
                    </strong>

                </div>


                @if(
                    $auctions->hasMorePages()
                )


                    <a
                        href="{{ $auctions
                            ->nextPageUrl()
                        }}"
                        class="
                            btn
                            btn-outline-dark
                        "
                    >

                        Next

                        <i
                            class="
                                fa-solid
                                fa-arrow-right
                                ms-2
                            "
                        ></i>

                    </a>


                @else


                    <button
                        class="
                            btn
                            btn-outline-secondary
                        "
                        disabled
                    >

                        Next

                        <i
                            class="
                                fa-solid
                                fa-arrow-right
                                ms-2
                            "
                        ></i>

                    </button>


                @endif


            </div>


        @endif


    @else


        <!-- =================================
             NO RESULTS
        ================================== -->

        <div class="empty-box">


            <div class="empty-icon">

                <i
                    class="
                        fa-solid
                        fa-magnifying-glass
                    "
                ></i>

            </div>


            <h3 class="fw-bold mt-4">

                No Auctions Found

            </h3>


            <p class="text-muted">

                No auctions match the selected
                search or filters.

            </p>


            <a
                href="{{ route('auctions.index') }}"
                class="
                    btn
                    btn-warning
                    fw-bold
                    px-4
                "
            >

                Clear Filters

            </a>


        </div>


    @endif


</div>


<!-- =========================================
     COUNTDOWN
========================================== -->

<script>

const auctionTimers =
    document.querySelectorAll(
        '.auction-timer'
    );


function formatAuctionTime(
    distance
) {

    const days =
        Math.floor(
            distance /
            (
                1000
                *
                60
                *
                60
                *
                24
            )
        );


    const hours =
        Math.floor(
            (
                distance
                %
                (
                    1000
                    *
                    60
                    *
                    60
                    *
                    24
                )
            )
            /
            (
                1000
                *
                60
                *
                60
            )
        );


    const minutes =
        Math.floor(
            (
                distance
                %
                (
                    1000
                    *
                    60
                    *
                    60
                )
            )
            /
            (
                1000
                *
                60
            )
        );


    const seconds =
        Math.floor(
            (
                distance
                %
                (
                    1000
                    *
                    60
                )
            )
            /
            1000
        );


    return (
        days
        +
        'd '
        +
        hours
        +
        'h '
        +
        minutes
        +
        'm '
        +
        seconds
        +
        's'
    );
}


function updateAuctionTimers() {

    const now =
        new Date()
            .getTime();


    auctionTimers.forEach(
        function (timer) {


            const startTime =
                new Date(
                    timer.dataset.start
                ).getTime();


            const endTime =
                new Date(
                    timer.dataset.end
                ).getTime();


            /*
            |--------------------------------------------------------------------------
            | UPCOMING
            |--------------------------------------------------------------------------
            */

            if (
                now
                <
                startTime
            ) {

                timer.innerHTML =
                    '<i class="fa-regular fa-clock me-2"></i>'
                    +
                    'Starts in: '
                    +
                    formatAuctionTime(
                        startTime - now
                    );

                return;
            }


            /*
            |--------------------------------------------------------------------------
            | ACTIVE
            |--------------------------------------------------------------------------
            */

            if (
                now
                <
                endTime
            ) {

                timer.innerHTML =
                    '<i class="fa-solid fa-hourglass-half me-2"></i>'
                    +
                    'Ends in: '
                    +
                    formatAuctionTime(
                        endTime - now
                    );

                return;
            }


            /*
            |--------------------------------------------------------------------------
            | ENDED
            |--------------------------------------------------------------------------
            */

            timer.innerHTML =
                '<i class="fa-solid fa-flag-checkered me-2"></i>'
                +
                'Auction Ended';

        }
    );

}


updateAuctionTimers();


setInterval(
    updateAuctionTimers,
    1000
);

</script>


<!-- =========================================
     BIDZONE DARK / LIGHT THEME
========================================== -->

<script
    src="{{ asset('js/bidzone-theme.js') }}"
></script>


</body>
</html>