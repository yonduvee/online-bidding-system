<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Auctions Won | BidZone</title>


    <!-- BOOTSTRAP -->

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >


    <!-- FONT AWESOME -->

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    >


    <!-- BIDZONE GLOBAL THEME -->

    <link
        rel="stylesheet"
        href="{{ asset('css/bidzone-theme.css') }}"
    >


    <style>

        * {
            box-sizing: border-box;
        }


        /* =========================================================
           BODY
        ========================================================= */

        body {
            margin: 0;

            min-height: 100vh;

            background:
                radial-gradient(
                    circle at 12% 5%,
                    rgba(103,232,249,.07),
                    transparent 28%
                ),
                radial-gradient(
                    circle at 90% 10%,
                    rgba(245,158,11,.08),
                    transparent 30%
                ),
                var(--bg-primary);

            color:
                var(--text-primary);

            font-family:
                Arial,
                sans-serif;
        }


        /* =========================================================
           BIDDER SIDEBAR
        ========================================================= */

        .bidder-sidebar {
            width: 270px;

            min-height: 100vh;

            position: fixed;

            top: 0;
            left: 0;

            z-index: 1000;

            padding:
                28px 20px;

            overflow-y: auto;

            background:
                linear-gradient(
                    180deg,
                    rgba(13,16,24,.98),
                    rgba(17,21,34,.98)
                );

            border-right:
                1px solid
                rgba(255,255,255,.07);

            box-shadow:
                15px 0 50px
                rgba(0,0,0,.15);
        }


        .bidder-sidebar::before {
            content: "";

            position: absolute;

            width: 240px;
            height: 240px;

            top: -130px;
            left: -100px;

            border-radius: 50%;

            background:
                rgba(103,232,249,.09);

            filter:
                blur(55px);

            pointer-events: none;
        }


        .bidder-sidebar::after {
            content: "";

            position: absolute;

            width: 230px;
            height: 230px;

            right: -130px;
            bottom: -120px;

            border-radius: 50%;

            background:
                rgba(245,158,11,.09);

            filter:
                blur(55px);

            pointer-events: none;
        }


        /* =========================================================
           LOGO
        ========================================================= */

        .logo {
            position: relative;

            z-index: 2;

            margin-bottom: 42px;

            padding:
                0 12px;

            color: #ffffff;

            font-size: 29px;

            font-weight: 900;

            letter-spacing: -.8px;
        }


        .logo span {
            color:
                var(--accent);
        }


        .bidder-label {
            display: block;

            margin-top: 5px;

            color: #77849a;

            font-size: 9px;

            font-weight: 800;

            letter-spacing: 2px;

            text-transform: uppercase;
        }


        /* =========================================================
           SIDEBAR MENU
        ========================================================= */

        .sidebar-menu {
            position: relative;

            z-index: 2;
        }


        .menu-label {
            padding:
                0 13px;

            margin-bottom: 11px;

            color: #68758b;

            font-size: 10px;

            font-weight: 800;

            letter-spacing: 1.4px;

            text-transform: uppercase;
        }


        .bidder-sidebar a {
            display: flex;

            align-items: center;

            gap: 12px;

            margin-bottom: 7px;

            padding:
                13px 14px;

            color: #9ba8bb;

            text-decoration: none;

            border:
                1px solid transparent;

            border-radius: 12px;

            font-size: 14px;

            font-weight: 700;

            transition:
                .22s ease;
        }


        .bidder-sidebar a i {
            width: 22px;

            text-align: center;
        }


        .bidder-sidebar a:hover {
            color: #ffffff;

            background:
                rgba(255,255,255,.045);

            border-color:
                rgba(255,255,255,.07);

            transform:
                translateX(3px);
        }


        .bidder-sidebar a.active {
            color: #111827;

            background:
                linear-gradient(
                    135deg,
                    #f59e0b,
                    #fbbf24
                );

            border-color:
                rgba(245,158,11,.45);

            box-shadow:
                0 10px 28px
                rgba(245,158,11,.18);
        }


        /* =========================================================
           MAIN CONTENT
        ========================================================= */

        .main-content {
            margin-left: 270px;

            padding:
                32px;
        }


        /* =========================================================
           TOPBAR
        ========================================================= */

        .topbar {
            display: flex;

            justify-content: space-between;

            align-items: center;

            gap: 20px;

            margin-bottom: 28px;

            padding:
                20px 23px;

            background:
                linear-gradient(
                    145deg,
                    rgba(255,255,255,.045),
                    rgba(255,255,255,.012)
                ),
                var(--surface);

            border:
                1px solid
                var(--border-color);

            border-radius: 18px;

            box-shadow:
                var(--card-shadow);

            backdrop-filter:
                blur(18px);
        }


        html[data-theme="light"]
        .topbar {
            background:
                var(--surface);
        }


        .topbar-title {
            margin: 0;

            color:
                var(--text-primary);

            font-weight: 900;
        }


        .topbar-subtitle {
            color:
                var(--text-muted);

            font-size: 12px;
        }


        .topbar-right {
            display: flex;

            align-items: center;

            gap: 13px;
        }


        .bidder-avatar-small {
            width: 44px;
            height: 44px;

            display: flex;

            align-items: center;

            justify-content: center;

            flex-shrink: 0;

            border-radius: 13px;

            background:
                rgba(103,232,249,.09);

            color:
                var(--cyan);

            border:
                1px solid
                rgba(103,232,249,.18);

            font-weight: 900;
        }


        .bidder-name {
            color:
                var(--text-primary);

            font-weight: 800;
        }


        .bidder-role {
            color:
                var(--text-muted);

            font-size: 11px;
        }


        .logout-btn {
            min-height: 42px;

            padding:
                9px 16px;

            border:
                1px solid
                rgba(239,68,68,.22);

            border-radius: 10px;

            background:
                rgba(239,68,68,.10);

            color:
                #f87171;

            font-weight: 800;

            transition:
                .2s ease;
        }


        .logout-btn:hover {
            background:
                #ef4444;

            color:
                #ffffff;

            border-color:
                #ef4444;

            transform:
                translateY(-2px);
        }


        /* =========================================================
           BACK
        ========================================================= */

        .back-link {
            display: inline-flex;

            align-items: center;

            gap: 8px;

            margin-bottom: 18px;

            color:
                var(--text-muted);

            text-decoration: none;

            font-weight: 700;

            transition:
                .2s ease;
        }


        .back-link:hover {
            color:
                var(--accent);
        }


        /* =========================================================
           PAGE HEADER
        ========================================================= */

        .page-header {
            margin-bottom: 28px;
        }


        .page-label {
            display: inline-flex;

            align-items: center;

            gap: 7px;

            margin-bottom: 10px;

            padding:
                6px 10px;

            background:
                rgba(245,158,11,.08);

            color:
                var(--accent);

            border:
                1px solid
                rgba(245,158,11,.18);

            border-radius:
                999px;

            font-size: 9px;

            font-weight: 900;

            letter-spacing: 1px;

            text-transform: uppercase;
        }


        .page-header h1 {
            margin: 0;

            color:
                var(--text-primary);

            font-size: 35px;

            font-weight: 900;

            letter-spacing: -1px;
        }


        .page-header p {
            max-width: 680px;

            margin:
                8px 0 0;

            color:
                var(--text-muted);

            line-height: 1.6;
        }


        /* =========================================================
           WINNER CARD
        ========================================================= */

        .winner-card {
            height: 100%;

            display: flex;

            flex-direction: column;

            overflow: hidden;

            background:
                linear-gradient(
                    145deg,
                    rgba(255,255,255,.045),
                    rgba(255,255,255,.012)
                ),
                var(--surface);

            border:
                1px solid
                var(--border-color);

            border-radius: 19px;

            box-shadow:
                0 14px 38px
                rgba(0,0,0,.07);

            transition:
                .25s ease;
        }


        html[data-theme="light"]
        .winner-card {
            background:
                var(--surface);
        }


        .winner-card:hover {
            transform:
                translateY(-5px);

            border-color:
                rgba(245,158,11,.30);

            box-shadow:
                0 22px 50px
                rgba(0,0,0,.11);
        }


        /* =========================================================
           IMAGE
        ========================================================= */

        .auction-image {
            position: relative;

            height: 235px;

            overflow: hidden;

            background:
                var(--surface-light);

            border-bottom:
                1px solid
                var(--border-color);
        }


        .auction-image::after {
            content: "";

            position: absolute;

            left: 0;
            right: 0;
            bottom: 0;

            height: 85px;

            background:
                linear-gradient(
                    transparent,
                    rgba(13,16,24,.35)
                );

            pointer-events: none;
        }


        .auction-image img {
            width: 100%;
            height: 100%;

            object-fit: cover;

            transition:
                transform .35s ease;
        }


        .winner-card:hover
        .auction-image img {
            transform:
                scale(1.04);
        }


        .no-image {
            width: 100%;
            height: 100%;

            display: flex;

            align-items: center;

            justify-content: center;

            color:
                var(--text-muted);

            font-size: 45px;
        }


        /* =========================================================
           WON BADGE
        ========================================================= */

        .won-badge {
            position: absolute;

            top: 14px;
            left: 14px;

            z-index: 3;

            display: inline-flex;

            align-items: center;

            gap: 5px;

            padding:
                7px 11px;

            background:
                linear-gradient(
                    135deg,
                    #f59e0b,
                    #fbbf24
                );

            color:
                #111827;

            border:
                1px solid
                rgba(255,255,255,.18);

            border-radius:
                999px;

            box-shadow:
                0 7px 18px
                rgba(0,0,0,.18);

            font-size: 9px;

            font-weight: 900;

            letter-spacing: .6px;
        }


        /* =========================================================
           CARD BODY
        ========================================================= */

        .winner-body {
            display: flex;

            flex-direction: column;

            flex-grow: 1;

            padding:
                23px;
        }


        .category {
            display: inline-flex;

            align-items: center;

            gap: 6px;

            color:
                var(--accent);

            text-transform: uppercase;

            font-size: 10px;

            font-weight: 900;

            letter-spacing: .8px;
        }


        .auction-title {
            margin:
                7px 0 18px;

            color:
                var(--text-primary);

            font-size: 20px;

            font-weight: 900;

            line-height: 1.35;
        }


        /* =========================================================
           WINNING BOX
        ========================================================= */

        .winning-box {
            position: relative;

            overflow: hidden;

            margin-bottom: 17px;

            padding:
                17px;

            background:
                linear-gradient(
                    145deg,
                    rgba(245,158,11,.11),
                    rgba(245,158,11,.025)
                );

            border:
                1px solid
                rgba(245,158,11,.24);

            border-radius: 13px;
        }


        .winning-box::after {
            content: "";

            position: absolute;

            width: 100px;
            height: 100px;

            top: -60px;
            right: -45px;

            border-radius: 50%;

            background:
                rgba(245,158,11,.14);

            filter:
                blur(17px);

            pointer-events: none;
        }


        .winning-label {
            position: relative;

            z-index: 2;

            color:
                var(--text-muted);

            font-size: 10px;

            font-weight: 700;
        }


        .winning-price {
            position: relative;

            z-index: 2;

            margin-top: 3px;

            color:
                var(--accent);

            font-size: 29px;

            font-weight: 900;

            letter-spacing: -.5px;
        }


        /* =========================================================
           DETAILS
        ========================================================= */

        .details-panel {
            padding:
                3px 14px;

            background:
                var(--surface-light);

            border:
                1px solid
                var(--border-color);

            border-radius: 12px;
        }


        .details-row {
            display: flex;

            justify-content: space-between;

            align-items: center;

            gap: 15px;

            padding:
                10px 0;

            border-bottom:
                1px solid
                var(--border-color);

            font-size: 12px;
        }


        .details-row:last-child {
            border-bottom: none;
        }


        .details-row span {
            color:
                var(--text-muted);
        }


        .details-row strong {
            color:
                var(--text-primary);

            text-align: right;

            font-size: 12px;
        }


        /* =========================================================
           VIEW BUTTON
        ========================================================= */

        .view-btn {
            min-height: 44px;

            display: flex;

            align-items: center;

            justify-content: center;

            margin-top: auto;

            padding:
                9px 16px;

            background:
                var(--surface-light);

            color:
                var(--text-primary);

            border:
                1px solid
                var(--border-color);

            border-radius: 10px;

            font-weight: 800;

            transition:
                .2s ease;
        }


        .view-btn:hover {
            background:
                var(--accent);

            color:
                #111827;

            border-color:
                var(--accent);

            transform:
                translateY(-2px);
        }


        /* =========================================================
           EMPTY STATE
        ========================================================= */

        .empty-box {
            position: relative;

            overflow: hidden;

            padding:
                75px 25px;

            text-align: center;

            background:
                linear-gradient(
                    145deg,
                    rgba(255,255,255,.045),
                    rgba(255,255,255,.012)
                ),
                var(--surface);

            border:
                1px solid
                var(--border-color);

            border-radius: 20px;

            box-shadow:
                var(--card-shadow);
        }


        html[data-theme="light"]
        .empty-box {
            background:
                var(--surface);
        }


        .empty-icon {
            width: 84px;
            height: 84px;

            display: flex;

            align-items: center;

            justify-content: center;

            margin:
                0 auto 19px;

            background:
                rgba(245,158,11,.10);

            color:
                var(--accent);

            border:
                1px solid
                rgba(245,158,11,.20);

            border-radius: 21px;

            font-size: 33px;
        }


        .empty-box h4 {
            color:
                var(--text-primary);
        }


        .empty-box p {
            color:
                var(--text-muted)
                !important;
        }


        .browse-btn {
            min-height: 45px;

            display: inline-flex;

            align-items: center;

            justify-content: center;

            padding:
                9px 19px;

            border: none;

            border-radius: 10px;

            background:
                linear-gradient(
                    135deg,
                    #f59e0b,
                    #fbbf24
                );

            color:
                #111827;

            font-weight: 900;

            transition:
                .2s ease;
        }


        .browse-btn:hover {
            color:
                #111827;

            transform:
                translateY(-2px);

            box-shadow:
                0 10px 28px
                rgba(245,158,11,.20);
        }


        /* =========================================================
           RESPONSIVE
        ========================================================= */

        @media(max-width: 1000px) {

            .bidder-sidebar {
                position: static;

                width: 100%;

                min-height: auto;

                border-right: none;
            }


            .sidebar-menu {
                display: flex;

                flex-wrap: wrap;

                gap: 7px;
            }


            .menu-label {
                width: 100%;
            }


            .bidder-sidebar a {
                margin-bottom: 0;
            }


            .main-content {
                margin-left: 0;
            }

        }


        @media(max-width: 700px) {

            .main-content {
                padding: 18px;
            }


            .topbar {
                flex-direction: column;

                align-items: flex-start;
            }


            .topbar-right {
                width: 100%;

                flex-wrap: wrap;
            }


            .page-header h1 {
                font-size: 29px;
            }

        }


        @media(max-width: 500px) {

            .sidebar-menu {
                display: grid;

                grid-template-columns:
                    1fr 1fr;
            }


            .menu-label {
                grid-column:
                    1 / -1;
            }


            .bidder-sidebar a {
                justify-content: center;
            }


            .auction-image {
                height: 210px;
            }


            .details-row {
                flex-direction: column;

                align-items: flex-start;

                gap: 3px;
            }


            .details-row strong {
                text-align: left;
            }

        }

    </style>

</head>


<body>


<!-- =========================================================
     BIDDER SIDEBAR
========================================================= -->

<div class="bidder-sidebar">


    <div class="logo">

        Bid<span>Zone</span>

        <span class="bidder-label">
            Bidder Workspace
        </span>

    </div>


    <div class="sidebar-menu">


        <div class="menu-label">
            Bidder Menu
        </div>


        <a href="{{ route('bidder.dashboard') }}">

            <i class="fa-solid fa-chart-line"></i>

            Dashboard

        </a>


        <a href="{{ route('auctions.index') }}">

            <i class="fa-solid fa-gavel"></i>

            Browse Auctions

        </a>


        <a href="{{ route('bidder.bids.history') }}">

            <i class="fa-solid fa-clock-rotate-left"></i>

            Bid History

        </a>


        <a
            href="{{ route('bidder.auctions.won') }}"
            class="active"
        >

            <i class="fa-solid fa-trophy"></i>

            Auctions Won

        </a>


    </div>


</div>


<!-- =========================================================
     MAIN CONTENT
========================================================= -->

<div class="main-content">


    <!-- =====================================================
         TOPBAR
    ====================================================== -->

    <div class="topbar">


        <div>

            <h4 class="topbar-title">

                Auctions Won

            </h4>


            <div class="topbar-subtitle">

                Review your successful auction results

            </div>

        </div>


        <div class="topbar-right">


            <!-- THEME -->

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


            <!-- USER -->

            <div class="bidder-avatar-small">

                {{ strtoupper(
                    substr(
                        auth()->user()->name,
                        0,
                        1
                    )
                ) }}

            </div>


            <div>

                <div class="bidder-name">

                    {{ auth()->user()->name }}

                </div>

                <div class="bidder-role">

                    Bidder Account

                </div>

            </div>


            <!-- LOGOUT -->

            <form
                method="POST"
                action="{{ route('logout') }}"
                class="m-0"
            >

                @csrf


                <button
                    type="submit"
                    class="logout-btn"
                >

                    <i
                        class="
                            fa-solid
                            fa-right-from-bracket
                            me-1
                        "
                    ></i>

                    Logout

                </button>


            </form>


        </div>


    </div>


    <!-- =====================================================
         BACK
    ====================================================== -->

    <a
        href="{{ route('bidder.dashboard') }}"
        class="back-link"
    >

        <i class="fa-solid fa-arrow-left"></i>

        Bidder Dashboard

    </a>


    <!-- =====================================================
         PAGE HEADER
    ====================================================== -->

    <div class="page-header">


        <div class="page-label">

            <i class="fa-solid fa-trophy"></i>

            Winning Collection

        </div>


        <h1>

            Auctions Won

        </h1>


        <p>

            View all auctions where you placed
            the highest winning bid and review
            the final auction details.

        </p>


    </div>


    <!-- =====================================================
         WON AUCTIONS
    ====================================================== -->

    @if(
        $wonAuctions->count()
    )


        <div class="row g-4">


            @foreach(
                $wonAuctions
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


                <div class="col-md-6 col-xl-4">


                    <div class="winner-card">


                        <!-- =====================================
                             IMAGE
                        ====================================== -->

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

                                    <i class="fa-regular fa-image"></i>

                                </div>


                            @endif


                            <!-- WON BADGE -->

                            <span class="won-badge">

                                <i class="fa-solid fa-trophy"></i>

                                WON

                            </span>


                        </div>


                        <!-- =====================================
                             BODY
                        ====================================== -->

                        <div class="winner-body">


                            <!-- CATEGORY -->

                            <div class="category">

                                <i class="fa-solid fa-layer-group"></i>

                                {{ $auction
                                    ->category
                                    ->name
                                }}

                            </div>


                            <!-- TITLE -->

                            <div class="auction-title">

                                {{ $auction->title }}

                            </div>


                            <!-- =================================
                                 WINNING PRICE
                            ================================== -->

                            <div class="winning-box">


                                <div class="winning-label">

                                    Your Winning Bid

                                </div>


                                <div class="winning-price">

                                    ৳{{ number_format(
                                        $auction->current_price,
                                        2
                                    ) }}

                                </div>


                            </div>


                            <!-- =================================
                                 DETAILS
                            ================================== -->

                            <div class="details-panel">


                                <!-- SELLER -->

                                <div class="details-row">

                                    <span>

                                        Seller

                                    </span>


                                    <strong>

                                        {{ $auction
                                            ->seller
                                            ->name
                                        }}

                                    </strong>

                                </div>


                                <!-- STARTING PRICE -->

                                <div class="details-row">

                                    <span>

                                        Starting Price

                                    </span>


                                    <strong>

                                        ৳{{ number_format(
                                            $auction->starting_price,
                                            2
                                        ) }}

                                    </strong>

                                </div>


                                <!-- TOTAL BIDS -->

                                <div class="details-row">

                                    <span>

                                        Total Bids

                                    </span>


                                    <strong>

                                        {{ $auction
                                            ->bids
                                            ->count()
                                        }}

                                    </strong>

                                </div>


                                <!-- CLOSED -->

                                <div class="details-row">

                                    <span>

                                        Closed

                                    </span>


                                    <strong>

                                        {{ $auction->closed_at

                                            ? $auction
                                                ->closed_at
                                                ->format(
                                                    'd M Y, h:i A'
                                                )

                                            : $auction
                                                ->end_time
                                                ->format(
                                                    'd M Y, h:i A'
                                                )
                                        }}

                                    </strong>

                                </div>


                            </div>


                            <!-- =================================
                                 VIEW AUCTION
                            ================================== -->

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

                                <i class="fa-solid fa-eye me-2"></i>

                                View Auction

                            </a>


                        </div>


                    </div>


                </div>


            @endforeach


        </div>


    @else


        <!-- =================================================
             EMPTY STATE
        ================================================== -->

        <div class="empty-box">


            <div class="empty-icon">

                <i class="fa-solid fa-trophy"></i>

            </div>


            <h4 class="fw-bold">

                No Auctions Won Yet

            </h4>


            <p>

                Keep bidding. Auctions you win will
                automatically appear on this page.

            </p>


            <a
                href="{{ route('auctions.index') }}"

                class="
                    btn
                    browse-btn
                    mt-2
                "
            >

                <i class="fa-solid fa-gavel me-2"></i>

                Browse Auctions

            </a>


        </div>


    @endif


</div>


<!-- =========================================================
     BIDZONE DARK / LIGHT THEME
========================================================= -->

<script
    src="{{ asset('js/bidzone-theme.js') }}"
></script>


</body>

</html>