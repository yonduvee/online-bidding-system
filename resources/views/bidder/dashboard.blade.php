<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Bidder Dashboard | BidZone</title>


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
           HERO
        ========================================================= */

        .hero {
            position: relative;

            overflow: hidden;

            margin-bottom: 25px;

            padding:
                38px;

            color:
                #ffffff;

            background:
                linear-gradient(
                    135deg,
                    #111827 0%,
                    #151c2b 55%,
                    #172033 100%
                );

            border:
                1px solid
                rgba(255,255,255,.07);

            border-radius:
                22px;

            box-shadow:
                0 22px 55px
                rgba(0,0,0,.17);
        }


        .hero::before {
            content: "";

            position: absolute;

            width: 270px;
            height: 270px;

            top: -170px;
            right: 110px;

            border-radius: 50%;

            background:
                rgba(103,232,249,.12);

            filter:
                blur(40px);
        }


        .hero::after {
            content: "";

            position: absolute;

            width: 290px;
            height: 290px;

            right: -130px;
            bottom: -170px;

            border-radius: 50%;

            background:
                rgba(245,158,11,.15);

            filter:
                blur(45px);
        }


        .hero-content {
            position: relative;

            z-index: 2;
        }


        .hero-label {
            display: inline-flex;

            align-items: center;

            gap: 7px;

            margin-bottom: 14px;

            padding:
                6px 10px;

            color:
                #7dd3fc;

            background:
                rgba(103,232,249,.08);

            border:
                1px solid
                rgba(103,232,249,.15);

            border-radius:
                999px;

            font-size: 9px;

            font-weight: 900;

            letter-spacing: 1.1px;

            text-transform: uppercase;
        }


        .hero h1 {
            max-width: 760px;

            margin:
                0 0 10px;

            color:
                #ffffff;

            font-size: 34px;

            font-weight: 900;

            letter-spacing: -1px;
        }


        .hero h1 strong {
            color:
                var(--accent);
        }


        .hero p {
            max-width: 680px;

            margin: 0;

            color:
                #aab4c5;

            line-height: 1.7;
        }


        /* =========================================================
           HERO BUTTONS
        ========================================================= */

        .hero-actions {
            display: flex;

            flex-wrap: wrap;

            gap: 10px;

            margin-top: 22px;
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


        .hero-secondary-btn {
            min-height: 47px;

            display: inline-flex;

            align-items: center;

            justify-content: center;

            padding:
                10px 18px;

            color:
                #e5e7eb;

            background:
                rgba(255,255,255,.04);

            border:
                1px solid
                rgba(255,255,255,.12);

            border-radius: 11px;

            font-weight: 800;

            transition:
                .2s ease;
        }


        .hero-secondary-btn:hover {
            color:
                #ffffff;

            background:
                rgba(255,255,255,.08);

            border-color:
                rgba(245,158,11,.35);

            transform:
                translateY(-2px);
        }


        /* =========================================================
           STAT CARDS
        ========================================================= */

        .dash-card {
            position: relative;

            overflow: hidden;

            height: 100%;

            padding:
                24px;

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

            border-radius: 17px;

            box-shadow:
                0 14px 36px
                rgba(0,0,0,.07);

            transition:
                .25s ease;
        }


        html[data-theme="light"]
        .dash-card {
            background:
                var(--surface);
        }


        .dash-card::after {
            content: "";

            position: absolute;

            width: 110px;
            height: 110px;

            top: -55px;
            right: -50px;

            border-radius: 50%;

            background:
                rgba(103,232,249,.055);

            filter:
                blur(14px);
        }


        .dash-card:hover {
            transform:
                translateY(-4px);

            border-color:
                rgba(245,158,11,.28);
        }


        .icon-box {
            position: relative;

            z-index: 2;

            width: 50px;
            height: 50px;

            display: flex;

            align-items: center;

            justify-content: center;

            margin-bottom: 15px;

            border-radius: 13px;

            background:
                rgba(245,158,11,.10);

            color:
                var(--accent);

            border:
                1px solid
                rgba(245,158,11,.19);

            font-size: 19px;
        }


        .dash-card p {
            position: relative;

            z-index: 2;

            margin-bottom: 4px;

            color:
                var(--text-muted);

            font-size: 12px;

            font-weight: 700;
        }


        .dash-card h3 {
            position: relative;

            z-index: 2;

            margin: 0;

            color:
                var(--text-primary);

            font-size: 30px;

            font-weight: 900;
        }


        /* =========================================================
           RECENT CARD
        ========================================================= */

        .recent-card {
            overflow: hidden;

            margin-top: 28px;

            background:
                linear-gradient(
                    145deg,
                    rgba(255,255,255,.04),
                    rgba(255,255,255,.01)
                ),
                var(--surface);

            border:
                1px solid
                var(--border-color);

            border-radius:
                18px;

            box-shadow:
                0 14px 40px
                rgba(0,0,0,.07);
        }


        html[data-theme="light"]
        .recent-card {
            background:
                var(--surface);
        }


        .recent-header {
            display: flex;

            justify-content: space-between;

            align-items: center;

            gap: 15px;

            padding:
                21px 23px;

            border-bottom:
                1px solid
                var(--border-color);
        }


        .recent-title {
            display: flex;

            align-items: center;

            gap: 10px;
        }


        .recent-title-icon {
            width: 39px;
            height: 39px;

            display: flex;

            align-items: center;

            justify-content: center;

            flex-shrink: 0;

            border-radius: 10px;

            background:
                rgba(103,232,249,.08);

            color:
                var(--cyan);

            border:
                1px solid
                rgba(103,232,249,.15);
        }


        .recent-header h5 {
            margin: 0;

            color:
                var(--text-primary);

            font-weight: 900;
        }


        .recent-header p {
            margin:
                3px 0 0;

            color:
                var(--text-muted);

            font-size: 11px;
        }


        .view-all-btn {
            min-height: 38px;

            display: inline-flex;

            align-items: center;

            justify-content: center;

            padding:
                7px 13px;

            background:
                var(--surface-light);

            color:
                var(--text-primary);

            border:
                1px solid
                var(--border-color);

            border-radius: 9px;

            font-size: 12px;

            font-weight: 800;

            transition:
                .2s ease;
        }


        .view-all-btn:hover {
            background:
                var(--accent);

            color:
                #111827;

            border-color:
                var(--accent);
        }


        /* =========================================================
           TABLE
        ========================================================= */

        .table {
            margin-bottom: 0;

            --bs-table-bg:
                transparent;

            --bs-table-color:
                var(--text-primary);

            --bs-table-border-color:
                var(--border-color);
        }


        .table thead th {
            padding:
                15px 20px;

            background:
                var(--surface-light);

            color:
                var(--text-muted);

            border-bottom:
                1px solid
                var(--border-color);

            font-size: 9px;

            font-weight: 900;

            letter-spacing: .6px;

            text-transform: uppercase;

            white-space: nowrap;
        }


        .table tbody td {
            padding:
                17px 20px;

            color:
                var(--text-primary);

            border-bottom:
                1px solid
                var(--border-color);

            vertical-align: middle;
        }


        .table tbody tr:last-child td {
            border-bottom: none;
        }


        .table tbody tr {
            transition:
                .2s ease;
        }


        .table tbody tr:hover {
            background:
                rgba(255,255,255,.025);
        }


        html[data-theme="light"]
        .table tbody tr:hover {
            background:
                rgba(15,23,42,.025);
        }


        .table strong {
            color:
                var(--text-primary);
        }


        .table .text-muted {
            color:
                var(--text-muted)
                !important;
        }


        .bid-amount {
            color:
                var(--accent)
                !important;

            font-weight: 900;

            white-space: nowrap;
        }


        .current-price {
            color:
                var(--text-primary);

            font-weight: 800;

            white-space: nowrap;
        }


        .bid-date {
            color:
                var(--text-muted);

            font-size: 11px;

            white-space: nowrap;
        }


        /* =========================================================
           BID STATUS
        ========================================================= */

        .status-badge {
            display: inline-flex;

            align-items: center;

            padding:
                6px 10px;

            border-radius:
                999px;

            font-size: 9px;

            font-weight: 900;

            letter-spacing: .45px;

            text-transform: uppercase;

            white-space: nowrap;
        }


        .status-winning {
            background:
                rgba(34,197,94,.11);

            color:
                #86efac;

            border:
                1px solid
                rgba(34,197,94,.22);
        }


        .status-outbid {
            background:
                rgba(239,68,68,.11);

            color:
                #fca5a5;

            border:
                1px solid
                rgba(239,68,68,.22);
        }


        .status-won {
            background:
                rgba(245,158,11,.11);

            color:
                #fbbf24;

            border:
                1px solid
                rgba(245,158,11,.22);
        }


        .status-lost {
            background:
                rgba(148,163,184,.11);

            color:
                #cbd5e1;

            border:
                1px solid
                rgba(148,163,184,.20);
        }


        .status-active {
            background:
                rgba(34,197,94,.11);

            color:
                #86efac;

            border:
                1px solid
                rgba(34,197,94,.22);
        }


        .status-scheduled {
            background:
                rgba(56,189,248,.11);

            color:
                #7dd3fc;

            border:
                1px solid
                rgba(56,189,248,.22);
        }


        .status-ended {
            background:
                rgba(148,163,184,.11);

            color:
                #cbd5e1;

            border:
                1px solid
                rgba(148,163,184,.20);
        }


        .status-pending {
            background:
                rgba(245,158,11,.11);

            color:
                #fbbf24;

            border:
                1px solid
                rgba(245,158,11,.22);
        }


        html[data-theme="light"]
        .status-winning,
        html[data-theme="light"]
        .status-active {
            background:
                #dcfce7;

            color:
                #166534;
        }


        html[data-theme="light"]
        .status-outbid {
            background:
                #fee2e2;

            color:
                #991b1b;
        }


        html[data-theme="light"]
        .status-won,
        html[data-theme="light"]
        .status-pending {
            background:
                #fef3c7;

            color:
                #92400e;
        }


        html[data-theme="light"]
        .status-lost,
        html[data-theme="light"]
        .status-ended {
            background:
                #e5e7eb;

            color:
                #374151;
        }


        html[data-theme="light"]
        .status-scheduled {
            background:
                #dbeafe;

            color:
                #1e40af;
        }


        /* =========================================================
           VIEW BUTTON
        ========================================================= */

        .view-btn {
            min-height: 36px;

            display: inline-flex;

            align-items: center;

            justify-content: center;

            padding:
                6px 11px;

            background:
                var(--surface-light);

            color:
                var(--text-primary);

            border:
                1px solid
                var(--border-color);

            border-radius: 8px;

            font-size: 11px;

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
        }


        /* =========================================================
           EMPTY STATE
        ========================================================= */

        .empty-state {
            padding:
                55px 20px !important;

            text-align: center;
        }


        .empty-icon {
            width: 66px;
            height: 66px;

            display: flex;

            align-items: center;

            justify-content: center;

            margin:
                0 auto 14px;

            background:
                rgba(245,158,11,.10);

            color:
                var(--accent);

            border:
                1px solid
                rgba(245,158,11,.20);

            border-radius: 17px;

            font-size: 25px;
        }


        .empty-title {
            margin-bottom: 5px;

            color:
                var(--text-primary);

            font-weight: 900;
        }


        .empty-text {
            margin-bottom: 17px;

            color:
                var(--text-muted);
        }


        .empty-browse-btn {
            display: inline-flex;

            align-items: center;

            justify-content: center;

            padding:
                9px 16px;

            background:
                linear-gradient(
                    135deg,
                    #f59e0b,
                    #fbbf24
                );

            color:
                #111827;

            border: none;

            border-radius: 9px;

            font-weight: 900;
        }


        .empty-browse-btn:hover {
            color:
                #111827;
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


            .hero {
                padding:
                    28px 23px;
            }


            .hero h1 {
                font-size: 28px;
            }


            .hero-actions a {
                width: 100%;
            }


            .recent-header {
                flex-direction: column;

                align-items: flex-start;
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


            .hero h1 {
                font-size: 25px;
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


        <a
            href="{{ route('bidder.dashboard') }}"
            class="active"
        >

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
                Bidder Dashboard
            </h4>

            <div class="topbar-subtitle">
                Track bids, auction activity and wins
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
         HERO
    ====================================================== -->

    <div class="hero">


        <div class="hero-content">


            <div class="hero-label">

                <i class="fa-solid fa-bolt"></i>

                Live Auction Center

            </div>


            <h1>

                Hello,

                <strong>
                    {{ auth()->user()->name }}
                </strong>

            </h1>


            <p>

                Discover live auctions, place competitive
                bids and monitor your bidding results from
                one workspace.

            </p>


            <!-- ACTIONS -->

            <div class="hero-actions">


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


                <a
                    href="{{ route('bidder.bids.history') }}"
                    class="
                        btn
                        hero-secondary-btn
                    "
                >

                    <i class="fa-solid fa-clock-rotate-left me-2"></i>

                    Bid History

                </a>


                <a
                    href="{{ route('bidder.auctions.won') }}"
                    class="
                        btn
                        hero-secondary-btn
                    "
                >

                    <i class="fa-solid fa-trophy me-2"></i>

                    Auctions Won

                </a>


            </div>


        </div>


    </div>


    <!-- =====================================================
         STATISTICS
    ====================================================== -->

    <div class="row g-4">


        <!-- ACTIVE BIDS -->

        <div class="col-md-4">


            <div class="dash-card">


                <div class="icon-box">

                    <i class="fa-solid fa-gavel"></i>

                </div>


                <p>

                    Active Bids

                </p>


                <h3>

                    {{ $activeBids }}

                </h3>


            </div>


        </div>


        <!-- TOTAL BIDS -->

        <div class="col-md-4">


            <div class="dash-card">


                <div class="icon-box">

                    <i class="fa-solid fa-clock-rotate-left"></i>

                </div>


                <p>

                    Bid History

                </p>


                <h3>

                    {{ $totalBids }}

                </h3>


            </div>


        </div>


        <!-- WON -->

        <div class="col-md-4">


            <div class="dash-card">


                <div class="icon-box">

                    <i class="fa-solid fa-trophy"></i>

                </div>


                <p>

                    Auctions Won

                </p>


                <h3>

                    {{ $auctionsWon }}

                </h3>


            </div>


        </div>


    </div>


    <!-- =====================================================
         RECENT BID HISTORY
    ====================================================== -->

    <div class="recent-card">


        <div class="recent-header">


            <div class="recent-title">


                <div class="recent-title-icon">

                    <i class="fa-solid fa-clock-rotate-left"></i>

                </div>


                <div>

                    <h5>
                        Recent Bid History
                    </h5>

                    <p>
                        Your latest bidding activity
                    </p>

                </div>


            </div>


            <a
                href="{{ route('bidder.bids.history') }}"
                class="
                    btn
                    view-all-btn
                "
            >

                View All

                <i class="fa-solid fa-arrow-right ms-2"></i>

            </a>


        </div>


        <div class="table-responsive">


            <table class="table align-middle">


                <thead>


                    <tr>

                        <th>
                            Auction
                        </th>

                        <th>
                            Your Bid
                        </th>

                        <th>
                            Current Price
                        </th>

                        <th>
                            Status
                        </th>

                        <th>
                            Date
                        </th>

                        <th>
                            Action
                        </th>

                    </tr>


                </thead>


                <tbody>


                    @forelse(
                        $recentBids
                        as $bid
                    )


                        <tr>


                            <!-- =================================
                                 AUCTION
                            ================================== -->

                            <td>


                                <strong>

                                    {{ $bid
                                        ->auction
                                        ->title
                                    }}

                                </strong>


                                <div class="small text-muted mt-1">

                                    {{ $bid
                                        ->auction
                                        ->category
                                        ->name
                                    }}

                                </div>


                            </td>


                            <!-- =================================
                                 YOUR BID
                            ================================== -->

                            <td class="bid-amount">


                                ৳{{ number_format(
                                    $bid->amount,
                                    2
                                ) }}


                            </td>


                            <!-- =================================
                                 CURRENT PRICE
                            ================================== -->

                            <td>


                                <span class="current-price">

                                    ৳{{ number_format(
                                        $bid
                                            ->auction
                                            ->current_price,
                                        2
                                    ) }}

                                </span>


                            </td>


                            <!-- =================================
                                 STATUS
                            ================================== -->

                            <td>


                                @php

                                    /*
                                    |--------------------------------------------------------------------------
                                    | Auction Ended
                                    |--------------------------------------------------------------------------
                                    */

                                    if (
                                        $bid->auction->status
                                        === 'ended'
                                    ) {

                                        $myStatus =
                                            (int) $bid->auction->winner_id
                                            ===
                                            (int) auth()->id()
                                                ? 'Won'
                                                : 'Lost';


                                    /*
                                    |--------------------------------------------------------------------------
                                    | Auction Active
                                    |--------------------------------------------------------------------------
                                    */

                                    } elseif (
                                        $bid->auction->status
                                        === 'active'
                                    ) {

                                        $myStatus =
                                            $bid->auction->highestBid
                                            &&
                                            (int) $bid
                                                ->auction
                                                ->highestBid
                                                ->user_id
                                            ===
                                            (int) auth()->id()
                                                ? 'Winning'
                                                : 'Outbid';


                                    /*
                                    |--------------------------------------------------------------------------
                                    | Other Status
                                    |--------------------------------------------------------------------------
                                    */

                                    } else {

                                        $myStatus =
                                            ucfirst(
                                                $bid
                                                    ->auction
                                                    ->status
                                            );

                                    }

                                @endphp


                                <span
                                    class="
                                        status-badge
                                        status-{{ strtolower(
                                            $myStatus
                                        ) }}
                                    "
                                >


                                    @if(
                                        $myStatus
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
                                        $myStatus
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
                                        $myStatus
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
                                        $myStatus
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
                                        $myStatus
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


                                    {{ $myStatus }}


                                </span>


                            </td>


                            <!-- =================================
                                 DATE
                            ================================== -->

                            <td>


                                <span class="bid-date">

                                    {{ $bid
                                        ->created_at
                                        ->format(
                                            'd M Y, h:i A'
                                        )
                                    }}

                                </span>


                            </td>


                            <!-- =================================
                                 VIEW
                            ================================== -->

                            <td>


                                <a
                                    href="{{ route(
                                        'auctions.show',
                                        $bid
                                            ->auction
                                            ->slug
                                    ) }}"

                                    class="
                                        btn
                                        view-btn
                                    "
                                >

                                    <i class="fa-solid fa-eye me-1"></i>

                                    View

                                </a>


                            </td>


                        </tr>


                    @empty


                        <tr>


                            <td
                                colspan="6"
                                class="empty-state"
                            >


                                <div class="empty-icon">

                                    <i class="fa-solid fa-gavel"></i>

                                </div>


                                <div class="empty-title">

                                    No Bids Yet

                                </div>


                                <div class="empty-text">

                                    You have not placed any bids yet.

                                </div>


                                <a
                                    href="{{ route('auctions.index') }}"
                                    class="
                                        btn
                                        empty-browse-btn
                                    "
                                >

                                    <i class="fa-solid fa-gavel me-2"></i>

                                    Browse Auctions

                                </a>


                            </td>


                        </tr>


                    @endforelse


                </tbody>


            </table>


        </div>


    </div>


</div>


<!-- =========================================================
     BIDZONE DARK / LIGHT THEME
========================================================= -->

<script
    src="{{ asset('js/bidzone-theme.js') }}"
></script>


</body>

</html>