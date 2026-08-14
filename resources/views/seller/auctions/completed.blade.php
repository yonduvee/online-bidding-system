<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Completed Auctions | BidZone</title>


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
           SELLER SIDEBAR
        ========================================================= */

        .seller-sidebar {
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


        .seller-sidebar::before {
            content: "";

            position: absolute;

            width: 240px;
            height: 240px;

            top: -130px;
            left: -100px;

            border-radius: 50%;

            background:
                rgba(103,232,249,.08);

            filter:
                blur(55px);

            pointer-events: none;
        }


        .seller-sidebar::after {
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


        .seller-label {
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


        .seller-sidebar a {
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


        .seller-sidebar a i {
            width: 22px;

            text-align: center;
        }


        .seller-sidebar a:hover {
            color: #ffffff;

            background:
                rgba(255,255,255,.045);

            border-color:
                rgba(255,255,255,.07);

            transform:
                translateX(3px);
        }


        .seller-sidebar a.active {
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


        .seller-avatar-small {
            width: 44px;
            height: 44px;

            display: flex;

            align-items: center;

            justify-content: center;

            flex-shrink: 0;

            border-radius: 13px;

            background:
                rgba(245,158,11,.10);

            color:
                var(--accent);

            border:
                1px solid
                rgba(245,158,11,.20);

            font-weight: 900;
        }


        .seller-name {
            color:
                var(--text-primary);

            font-weight: 800;
        }


        .seller-role {
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
           BACK LINK
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
                rgba(103,232,249,.07);

            color:
                var(--cyan);

            border:
                1px solid
                rgba(103,232,249,.14);

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
           AUCTION CARD
        ========================================================= */

        .auction-card {
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
        .auction-card {
            background:
                var(--surface);
        }


        .auction-card:hover {
            transform:
                translateY(-5px);

            border-color:
                rgba(245,158,11,.25);

            box-shadow:
                0 22px 48px
                rgba(0,0,0,.11);
        }


        /* =========================================================
           IMAGE
        ========================================================= */

        .auction-image {
            position: relative;

            height: 230px;

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

            height: 75px;

            background:
                linear-gradient(
                    transparent,
                    rgba(13,16,24,.32)
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


        .auction-card:hover
        .auction-image img {
            transform:
                scale(1.035);
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


        .completed-badge {
            position: absolute;

            top: 14px;
            right: 14px;

            z-index: 3;

            display: inline-flex;

            align-items: center;

            gap: 5px;

            padding:
                7px 11px;

            background:
                rgba(100,116,139,.92);

            color:
                #ffffff;

            border:
                1px solid
                rgba(255,255,255,.10);

            border-radius:
                999px;

            box-shadow:
                0 5px 15px
                rgba(0,0,0,.12);

            font-size: 9px;

            font-weight: 900;

            letter-spacing: .5px;

            text-transform: uppercase;
        }


        /* =========================================================
           BODY
        ========================================================= */

        .auction-body {
            display: flex;

            flex-direction: column;

            flex-grow: 1;

            padding:
                22px;
        }


        .category {
            display: inline-flex;

            align-items: center;

            gap: 6px;

            color:
                var(--accent);

            font-size: 10px;

            font-weight: 900;

            letter-spacing: .8px;

            text-transform: uppercase;
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
           INFO
        ========================================================= */

        .info-panel {
            padding:
                3px 14px;

            background:
                var(--surface-light);

            border:
                1px solid
                var(--border-color);

            border-radius: 12px;
        }


        .info-row {
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


        .info-row:last-child {
            border-bottom: none;
        }


        .info-row span {
            color:
                var(--text-muted);
        }


        .info-row strong {
            color:
                var(--text-primary);

            text-align: right;

            font-size: 12px;
        }


        .final-price {
            color:
                var(--accent)
                !important;

            font-weight: 900;
        }


        /* =========================================================
           WINNER
        ========================================================= */

        .winner-box {
            position: relative;

            overflow: hidden;

            margin-top: 17px;

            padding:
                16px;

            background:
                linear-gradient(
                    145deg,
                    rgba(245,158,11,.09),
                    rgba(245,158,11,.025)
                );

            border:
                1px solid
                rgba(245,158,11,.23);

            border-radius: 13px;
        }


        .winner-box::after {
            content: "";

            position: absolute;

            width: 90px;
            height: 90px;

            top: -55px;
            right: -40px;

            border-radius: 50%;

            background:
                rgba(245,158,11,.12);

            filter:
                blur(15px);
        }


        .winner-label {
            position: relative;

            z-index: 2;

            color:
                var(--text-muted);

            font-size: 10px;

            font-weight: 700;
        }


        .winner-name {
            position: relative;

            z-index: 2;

            margin-top: 4px;

            color:
                var(--text-primary);

            font-weight: 900;
        }


        .winner-name i {
            color:
                var(--accent);
        }


        .winning-price {
            position: relative;

            z-index: 2;

            margin-top: 2px;

            color:
                var(--accent);

            font-size: 21px;

            font-weight: 900;
        }


        /* =========================================================
           NO WINNER
        ========================================================= */

        .no-winner-box {
            margin-top: 17px;

            padding:
                14px;

            background:
                rgba(148,163,184,.08);

            color:
                var(--text-muted);

            border:
                1px solid
                var(--border-color);

            border-radius: 12px;

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
            width: 82px;
            height: 82px;

            display: flex;

            align-items: center;

            justify-content: center;

            margin:
                0 auto 18px;

            background:
                rgba(245,158,11,.10);

            color:
                var(--accent);

            border:
                1px solid
                rgba(245,158,11,.20);

            border-radius: 20px;

            font-size: 31px;
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


        /* =========================================================
           RESPONSIVE
        ========================================================= */

        @media(max-width: 1000px) {

            .seller-sidebar {
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


            .seller-sidebar a {
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


            .seller-sidebar a {
                justify-content: center;
            }


            .auction-image {
                height: 210px;
            }


            .info-row {
                flex-direction: column;

                align-items: flex-start;

                gap: 3px;
            }


            .info-row strong {
                text-align: left;
            }

        }

    </style>

</head>


<body>


<!-- =========================================================
     SELLER SIDEBAR
========================================================= -->

<div class="seller-sidebar">


    <div class="logo">

        Bid<span>Zone</span>

        <span class="seller-label">
            Seller Workspace
        </span>

    </div>


    <div class="sidebar-menu">


        <div class="menu-label">
            Seller Menu
        </div>


        <a href="{{ route('seller.dashboard') }}">

            <i class="fa-solid fa-chart-line"></i>

            Dashboard

        </a>


        <a href="{{ route('seller.auctions.create') }}">

            <i class="fa-solid fa-plus"></i>

            Create Auction

        </a>


        <a href="{{ route('seller.auctions.index') }}">

            <i class="fa-solid fa-gavel"></i>

            My Auctions

        </a>


        <a
            href="{{ route('seller.auctions.completed') }}"
            class="active"
        >

            <i class="fa-solid fa-circle-check"></i>

            Completed

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

                Completed Auctions

            </h4>


            <div class="topbar-subtitle">

                Review your finished auction results

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

            <div class="seller-avatar-small">

                {{ strtoupper(
                    substr(
                        auth()->user()->name,
                        0,
                        1
                    )
                ) }}

            </div>


            <div>

                <div class="seller-name">

                    {{ auth()->user()->name }}

                </div>

                <div class="seller-role">

                    Seller Account

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
        href="{{ route('seller.dashboard') }}"
        class="back-link"
    >

        <i class="fa-solid fa-arrow-left"></i>

        Seller Dashboard

    </a>


    <!-- =====================================================
         PAGE HEADER
    ====================================================== -->

    <div class="page-header">


        <div class="page-label">

            <i class="fa-solid fa-flag-checkered"></i>

            Auction Results

        </div>


        <h1>

            Completed Auctions

        </h1>


        <p>

            Review auctions that have ended,
            see their final prices and check
            the winning bidders.

        </p>


    </div>


    <!-- =====================================================
         AUCTIONS
    ====================================================== -->

    @if($completedAuctions->count())


        <div class="row g-4">


            @foreach(
                $completedAuctions
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


                    <div class="auction-card">


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


                            <span class="completed-badge">

                                <i class="fa-solid fa-check"></i>

                                Completed

                            </span>


                        </div>


                        <!-- =====================================
                             BODY
                        ====================================== -->

                        <div class="auction-body">


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
                                 INFO
                            ================================== -->

                            <div class="info-panel">


                                <div class="info-row">

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


                                <div class="info-row">

                                    <span>
                                        Final Price
                                    </span>

                                    <strong class="final-price">

                                        ৳{{ number_format(
                                            $auction->current_price,
                                            2
                                        ) }}

                                    </strong>

                                </div>


                                <div class="info-row">

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


                                <div class="info-row">

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
                                 WINNER
                            ================================== -->

                            @if($auction->winner)


                                <div class="winner-box">


                                    <div class="winner-label">

                                        Winner

                                    </div>


                                    <div class="winner-name">

                                        <i class="fa-solid fa-trophy me-2"></i>

                                        {{ $auction
                                            ->winner
                                            ->name
                                        }}

                                    </div>


                                    <div class="winner-label mt-3">

                                        Winning Bid

                                    </div>


                                    <div class="winning-price">

                                        ৳{{ number_format(
                                            $auction->current_price,
                                            2
                                        ) }}

                                    </div>


                                </div>


                            @else


                                <div class="no-winner-box">

                                    <i class="fa-solid fa-circle-info me-2"></i>

                                    No bidder won this auction.

                                </div>


                            @endif


                            <!-- =================================
                                 VIEW
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

                <i class="fa-solid fa-gavel"></i>

            </div>


            <h4 class="fw-bold">

                No Completed Auctions

            </h4>


            <p class="mb-0">

                Your ended auctions will appear here.

            </p>


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