<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Bid History | BidZone</title>


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
            display: flex;

            justify-content: space-between;

            align-items: flex-end;

            flex-wrap: wrap;

            gap: 18px;

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


        .page-title {
            margin: 0;

            color:
                var(--text-primary);

            font-size: 35px;

            font-weight: 900;

            letter-spacing: -1px;
        }


        .page-subtitle {
            max-width: 700px;

            margin:
                8px 0 0;

            color:
                var(--text-muted);

            line-height: 1.6;
        }


        .browse-btn {
            min-height: 47px;

            display: inline-flex;

            align-items: center;

            justify-content: center;

            padding:
                10px 19px;

            border: none;

            border-radius: 11px;

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
                rgba(245,158,11,.26);

            box-shadow:
                0 22px 48px
                rgba(0,0,0,.11);
        }


        /* =========================================================
           AUCTION IMAGE
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

            height: 80px;

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

            font-size: 46px;
        }


        /* =========================================================
           BID STATUS
        ========================================================= */

        .bid-status {
            position: absolute;

            top: 14px;
            right: 14px;

            z-index: 3;

            display: inline-flex;

            align-items: center;

            padding:
                7px 11px;

            border-radius:
                999px;

            box-shadow:
                0 5px 15px
                rgba(0,0,0,.14);

            backdrop-filter:
                blur(10px);

            font-size: 9px;

            font-weight: 900;

            letter-spacing: .5px;

            text-transform: uppercase;
        }


        .status-winning {
            background:
                rgba(34,197,94,.92);

            color:
                #052e16;
        }


        .status-outbid {
            background:
                rgba(239,68,68,.92);

            color:
                #ffffff;
        }


        .status-won {
            background:
                rgba(245,158,11,.94);

            color:
                #111827;
        }


        .status-lost {
            background:
                rgba(100,116,139,.92);

            color:
                #ffffff;
        }


        .status-scheduled {
            background:
                rgba(56,189,248,.92);

            color:
                #082f49;
        }


        /* =========================================================
           AUCTION BODY
        ========================================================= */

        .auction-body {
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

            font-size: 10px;

            font-weight: 900;

            letter-spacing: .8px;

            text-transform: uppercase;
        }


        .auction-title {
            margin:
                7px 0 5px;

            color:
                var(--text-primary);

            font-size: 20px;

            font-weight: 900;

            line-height: 1.35;
        }


        .seller {
            color:
                var(--text-muted);

            font-size: 12px;
        }


        .seller strong {
            color:
                var(--text-primary);
        }


        /* =========================================================
           BID SUMMARY
        ========================================================= */

        .bid-summary {
            margin-top: 18px;

            padding:
                3px 14px;

            background:
                var(--surface-light);

            border:
                1px solid
                var(--border-color);

            border-radius: 12px;
        }


        .summary-row {
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


        .summary-row:last-child {
            border-bottom: none;
        }


        .summary-row span {
            color:
                var(--text-muted);
        }


        .summary-row strong {
            color:
                var(--text-primary);

            text-align: right;
        }


        .highest-price {
            color:
                var(--accent)
                !important;

            font-weight: 900;
        }


        /* =========================================================
           HISTORY DETAILS
        ========================================================= */

        .history-details {
            margin-top: 17px;

            overflow: hidden;

            background:
                var(--surface-light);

            border:
                1px solid
                var(--border-color);

            border-radius: 12px;
        }


        .history-details summary {
            position: relative;

            display: flex;

            align-items: center;

            padding:
                14px 16px;

            cursor: pointer;

            color:
                var(--text-primary);

            background:
                var(--surface-light);

            list-style: none;

            font-size: 12px;

            font-weight: 900;

            user-select: none;
        }


        .history-details summary::-webkit-details-marker {
            display: none;
        }


        .history-details summary::after {
            content:
                "\f078";

            margin-left: auto;

            color:
                var(--text-muted);

            font-family:
                "Font Awesome 6 Free";

            font-weight: 900;

            transition:
                .2s ease;
        }


        .history-details[open]
        summary::after {
            transform:
                rotate(180deg);
        }


        .history-details[open]
        summary {
            border-bottom:
                1px solid
                var(--border-color);
        }


        .history-details summary i {
            color:
                var(--cyan);
        }


        .history-list {
            padding:
                0 16px;
        }


        .history-row {
            display: flex;

            justify-content: space-between;

            align-items: center;

            gap: 15px;

            padding:
                12px 0;

            border-bottom:
                1px solid
                var(--border-color);
        }


        .history-row:last-child {
            border-bottom: none;
        }


        .history-row .text-muted {
            color:
                var(--text-muted)
                !important;
        }


        .history-row .small {
            color:
                var(--text-primary);
        }


        .history-amount {
            color:
                var(--accent);

            font-weight: 900;

            white-space: nowrap;
        }


        /* =========================================================
           VIEW BUTTON
        ========================================================= */

        .view-auction-btn {
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


        .view-auction-btn:hover {
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
           PAGINATION
        ========================================================= */

        .pagination-box {
            display: flex;

            justify-content: center;

            align-items: center;

            flex-wrap: wrap;

            gap: 11px;

            margin-top: 35px;
        }


        .pagination-btn {
            min-height: 40px;

            display: inline-flex;

            align-items: center;

            justify-content: center;

            padding:
                8px 14px;

            background:
                var(--surface);

            color:
                var(--text-primary);

            border:
                1px solid
                var(--border-color);

            border-radius: 9px;

            font-size: 12px;

            font-weight: 800;

            text-decoration: none;

            transition:
                .2s ease;
        }


        .pagination-btn:hover {
            background:
                var(--accent);

            color:
                #111827;

            border-color:
                var(--accent);
        }


        .pagination-btn:disabled,
        .pagination-btn.disabled {
            cursor:
                not-allowed;

            opacity: .45;

            background:
                var(--surface-light);

            color:
                var(--text-muted);

            border-color:
                var(--border-color);
        }


        .page-info {
            padding:
                8px 13px;

            color:
                var(--text-muted);

            background:
                var(--surface);

            border:
                1px solid
                var(--border-color);

            border-radius: 9px;

            font-size: 11px;

            font-weight: 700;
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


            .page-header {
                flex-direction: column;

                align-items: flex-start;
            }


            .browse-btn {
                width: 100%;
            }


            .page-title {
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


            .summary-row {
                align-items: flex-start;

                flex-direction: column;

                gap: 3px;
            }


            .summary-row strong {
                text-align: left;
            }


            .pagination-box {
                flex-direction: column;
            }


            .pagination-btn,
            .page-info {
                width: 100%;

                text-align: center;
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


        <a
            href="{{ route('bidder.bids.history') }}"
            class="active"
        >

            <i class="fa-solid fa-clock-rotate-left"></i>

            Bid History

        </a>


        <a href="{{ route('bidder.auctions.won') }}">

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

                Bid History

            </h4>


            <div class="topbar-subtitle">

                Review all auctions you have participated in

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


            <!-- USER AVATAR -->

            <div class="bidder-avatar-small">

                {{ strtoupper(
                    substr(
                        auth()->user()->name,
                        0,
                        1
                    )
                ) }}

            </div>


            <!-- USER -->

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


        <div>


            <div class="page-label">

                <i class="fa-solid fa-chart-simple"></i>

                Bidding Activity

            </div>


            <h1 class="page-title">

                Bid History

            </h1>


            <p class="page-subtitle">

                Track every auction you participated in
                and see whether you are currently winning,
                outbid, won or lost.

            </p>


        </div>


        <a
            href="{{ route('auctions.index') }}"
            class="
                btn
                browse-btn
            "
        >

            <i class="fa-solid fa-gavel me-2"></i>

            Browse Auctions

        </a>


    </div>


    <!-- =====================================================
         BID HISTORY
    ====================================================== -->

    @if(
        $auctionHistories->count()
    )


        <div class="row g-4">


            @foreach(
                $auctionHistories
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


                    $statusClass =
                        strtolower(
                            $auction
                                ->bidder_status
                        );

                @endphp


                <div
                    class="
                        col-md-6
                        col-xl-4
                    "
                >


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


                            <!-- =================================
                                 STATUS
                            ================================== -->

                            <span
                                class="
                                    bid-status
                                    status-{{ $statusClass }}
                                "
                            >


                                @if(
                                    $auction->bidder_status
                                    === 'Winning'
                                )


                                    <i
                                        class="
                                            fa-solid
                                            fa-arrow-trend-up
                                            me-1
                                        "
                                    ></i>


                                @elseif(
                                    $auction->bidder_status
                                    === 'Outbid'
                                )


                                    <i
                                        class="
                                            fa-solid
                                            fa-arrow-trend-down
                                            me-1
                                        "
                                    ></i>


                                @elseif(
                                    $auction->bidder_status
                                    === 'Won'
                                )


                                    <i
                                        class="
                                            fa-solid
                                            fa-trophy
                                            me-1
                                        "
                                    ></i>


                                @elseif(
                                    $auction->bidder_status
                                    === 'Lost'
                                )


                                    <i
                                        class="
                                            fa-solid
                                            fa-circle-xmark
                                            me-1
                                        "
                                    ></i>


                                @elseif(
                                    $auction->bidder_status
                                    === 'Scheduled'
                                )


                                    <i
                                        class="
                                            fa-regular
                                            fa-clock
                                            me-1
                                        "
                                    ></i>


                                @endif


                                {{ $auction->bidder_status }}


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


                            <!-- SELLER -->

                            <div class="seller">

                                Seller:

                                <strong>

                                    {{ $auction
                                        ->seller
                                        ->name
                                    }}

                                </strong>

                            </div>


                            <!-- =================================
                                 SUMMARY
                            ================================== -->

                            <div class="bid-summary">


                                <!-- HIGHEST BID -->

                                <div class="summary-row">

                                    <span>
                                        Your Highest Bid
                                    </span>


                                    <strong class="highest-price">

                                        ৳{{ number_format(
                                            $auction
                                                ->user_highest_bid,
                                            2
                                        ) }}

                                    </strong>

                                </div>


                                <!-- CURRENT / FINAL PRICE -->

                                <div class="summary-row">

                                    <span>

                                        {{
                                            $auction->status
                                            === 'ended'
                                                ? 'Final Price'
                                                : 'Current Price'
                                        }}

                                    </span>


                                    <strong>

                                        ৳{{ number_format(
                                            $auction
                                                ->current_price,
                                            2
                                        ) }}

                                    </strong>

                                </div>


                                <!-- PERSONAL BID COUNT -->

                                <div class="summary-row">

                                    <span>
                                        Your Total Bids
                                    </span>


                                    <strong>

                                        {{ $auction
                                            ->user_bid_count
                                        }}

                                    </strong>

                                </div>


                                <!-- AUCTION STATUS -->

                                <div class="summary-row">

                                    <span>
                                        Auction Status
                                    </span>


                                    <strong>

                                        {{ ucfirst(
                                            $auction->status
                                        ) }}

                                    </strong>

                                </div>


                            </div>


                            <!-- =================================
                                 ALL USER BIDS
                            ================================== -->

                            <details class="history-details">


                                <summary>

                                    <i
                                        class="
                                            fa-solid
                                            fa-clock-rotate-left
                                            me-2
                                        "
                                    ></i>

                                    View My Bids

                                    ({{ $auction
                                        ->bids
                                        ->count()
                                    }})

                                </summary>


                                <div class="history-list">


                                    @foreach(
                                        $auction->bids
                                        as $bid
                                    )


                                        <div class="history-row">


                                            <div>


                                                <div
                                                    class="
                                                        small
                                                        text-muted
                                                    "
                                                >

                                                    {{ $bid
                                                        ->created_at
                                                        ->format(
                                                            'd M Y'
                                                        )
                                                    }}

                                                </div>


                                                <div class="small">

                                                    {{ $bid
                                                        ->created_at
                                                        ->format(
                                                            'h:i:s A'
                                                        )
                                                    }}

                                                </div>


                                            </div>


                                            <div class="history-amount">

                                                ৳{{ number_format(
                                                    $bid->amount,
                                                    2
                                                ) }}

                                            </div>


                                        </div>


                                    @endforeach


                                </div>


                            </details>


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
                                    view-auction-btn
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


        <!-- =================================================
             PAGINATION
        ================================================== -->

        @if(
            $auctionHistories->hasPages()
        )


            <div class="pagination-box">


                <!-- PREVIOUS -->

                @if(
                    $auctionHistories
                        ->onFirstPage()
                )


                    <button
                        class="
                            pagination-btn
                            disabled
                        "
                        disabled
                    >

                        <i class="fa-solid fa-arrow-left me-2"></i>

                        Previous

                    </button>


                @else


                    <a
                        href="{{ $auctionHistories
                            ->previousPageUrl()
                        }}"

                        class="pagination-btn"
                    >

                        <i class="fa-solid fa-arrow-left me-2"></i>

                        Previous

                    </a>


                @endif


                <!-- CURRENT PAGE -->

                <span class="page-info">

                    Page

                    {{ $auctionHistories
                        ->currentPage()
                    }}

                    of

                    {{ $auctionHistories
                        ->lastPage()
                    }}

                </span>


                <!-- NEXT -->

                @if(
                    $auctionHistories
                        ->hasMorePages()
                )


                    <a
                        href="{{ $auctionHistories
                            ->nextPageUrl()
                        }}"

                        class="pagination-btn"
                    >

                        Next

                        <i class="fa-solid fa-arrow-right ms-2"></i>

                    </a>


                @else


                    <button
                        class="
                            pagination-btn
                            disabled
                        "
                        disabled
                    >

                        Next

                        <i class="fa-solid fa-arrow-right ms-2"></i>

                    </button>


                @endif


            </div>


        @endif


    @else


        <!-- =================================================
             EMPTY STATE
        ================================================== -->

        <div class="empty-box">


            <div class="empty-icon">

                <i class="fa-solid fa-gavel"></i>

            </div>


            <h4 class="fw-bold">

                No Bid History Yet

            </h4>


            <p>

                You have not participated
                in any auctions yet.

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