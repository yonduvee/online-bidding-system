<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Seller Dashboard | BidZone</title>


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
           SIDEBAR
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

            border-radius: 13px;

            background:
                rgba(245,158,11,.10);

            color:
                var(--accent);

            border:
                1px solid
                rgba(245,158,11,.20);

            font-size: 17px;

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

            color: white;

            border-color:
                #ef4444;

            transform:
                translateY(-2px);
        }


        /* =========================================================
           WELCOME HERO
        ========================================================= */

        .welcome-card {
            position: relative;

            overflow: hidden;

            padding:
                38px;

            margin-bottom:
                25px;

            color: #ffffff;

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


        .welcome-card::before {
            content: "";

            position: absolute;

            width: 270px;
            height: 270px;

            top: -170px;
            right: 110px;

            border-radius: 50%;

            background:
                rgba(103,232,249,.10);

            filter:
                blur(40px);
        }


        .welcome-card::after {
            content: "";

            position: absolute;

            width: 290px;
            height: 290px;

            right: -130px;
            bottom: -170px;

            border-radius: 50%;

            background:
                rgba(245,158,11,.16);

            filter:
                blur(45px);
        }


        .welcome-content {
            position: relative;

            z-index: 2;
        }


        .welcome-label {
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


        .welcome-card h1 {
            max-width: 700px;

            margin:
                0 0 10px;

            color: #ffffff;

            font-size: 34px;

            font-weight: 900;

            letter-spacing: -1px;
        }


        .welcome-card h1 span {
            color:
                var(--accent);
        }


        .welcome-card p {
            max-width: 680px;

            margin: 0;

            color: #aab4c5;

            line-height: 1.7;
        }


        /* =========================================================
           ACTION BUTTONS
        ========================================================= */

        .quick-actions {
            display: flex;

            flex-wrap: wrap;

            gap: 10px;

            margin-bottom: 25px;
        }


        .create-btn {
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

            color: #111827;

            font-weight: 900;

            transition:
                .2s ease;
        }


        .create-btn:hover {
            color:
                #111827;

            transform:
                translateY(-2px);

            box-shadow:
                0 10px 28px
                rgba(245,158,11,.20);
        }


        .secondary-action {
            min-height: 47px;

            display: inline-flex;

            align-items: center;

            justify-content: center;

            padding:
                10px 18px;

            background:
                var(--surface);

            color:
                var(--text-primary);

            border:
                1px solid
                var(--border-color);

            border-radius: 11px;

            font-weight: 800;

            transition:
                .2s ease;
        }


        .secondary-action:hover {
            color:
                var(--accent);

            border-color:
                rgba(245,158,11,.40);

            background:
                var(--surface-light);

            transform:
                translateY(-2px);
        }


        /* =========================================================
           STAT CARDS
        ========================================================= */

        .dashboard-card {
            position: relative;

            overflow: hidden;

            height: 100%;

            padding:
                23px;

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
        .dashboard-card {
            background:
                var(--surface);
        }


        .dashboard-card::after {
            content: "";

            position: absolute;

            width: 100px;
            height: 100px;

            top: -50px;
            right: -45px;

            border-radius: 50%;

            background:
                rgba(103,232,249,.055);

            filter:
                blur(14px);
        }


        .dashboard-card:hover {
            transform:
                translateY(-4px);

            border-color:
                rgba(245,158,11,.28);
        }


        .icon-box {
            position: relative;

            z-index: 2;

            width: 49px;
            height: 49px;

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


        .dashboard-card p {
            position: relative;

            z-index: 2;

            margin-bottom: 4px;

            color:
                var(--text-muted);

            font-size: 12px;

            font-weight: 700;
        }


        .dashboard-card h3 {
            position: relative;

            z-index: 2;

            margin: 0;

            color:
                var(--text-primary);

            font-size: 29px;

            font-weight: 900;
        }


        /* =========================================================
           RECENT AUCTIONS
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

            border-radius: 10px;

            background:
                rgba(245,158,11,.10);

            color:
                var(--accent);

            border:
                1px solid
                rgba(245,158,11,.18);
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


        .auction-price {
            color:
                var(--accent);

            font-weight: 900;

            white-space: nowrap;
        }


        /* =========================================================
           STATUS BADGES
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

            letter-spacing: .5px;

            text-transform: uppercase;
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


        .status-rejected {
            background:
                rgba(239,68,68,.11);

            color:
                #fca5a5;

            border:
                1px solid
                rgba(239,68,68,.22);
        }


        html[data-theme="light"]
        .status-pending {
            background:
                #fff3cd;

            color:
                #8a6100;
        }


        html[data-theme="light"]
        .status-active {
            background:
                #dcfce7;

            color:
                #166534;
        }


        html[data-theme="light"]
        .status-scheduled {
            background:
                #dbeafe;

            color:
                #1e40af;
        }


        html[data-theme="light"]
        .status-ended {
            background:
                #e5e7eb;

            color:
                #374151;
        }


        html[data-theme="light"]
        .status-rejected {
            background:
                #fee2e2;

            color:
                #991b1b;
        }


        /* =========================================================
           EMPTY STATE
        ========================================================= */

        .empty-state {
            padding:
                55px 20px !important;

            text-align: center;
        }


        .empty-state i {
            display: block;

            margin-bottom: 12px;

            color:
                var(--accent);

            font-size: 31px;
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


            .welcome-card {
                padding:
                    28px 23px;
            }


            .welcome-card h1 {
                font-size: 28px;
            }


            .quick-actions a {
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


            .seller-sidebar a {
                justify-content: center;
            }


            .welcome-card h1 {
                font-size: 25px;
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


        <a
            href="{{ route('seller.dashboard') }}"
            class="active"
        >

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


        <a href="{{ route('seller.auctions.completed') }}">

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
                Seller Dashboard
            </h4>

            <div class="topbar-subtitle">
                Manage your BidZone auction activity
            </div>

        </div>


        <div class="topbar-right">


            <!-- THEME TOGGLE -->

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

            <div class="seller-avatar-small">

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
         WELCOME HERO
    ====================================================== -->

    <div class="welcome-card">


        <div class="welcome-content">


            <div class="welcome-label">

                <i class="fa-solid fa-store"></i>

                Seller Command Center

            </div>


            <h1>

                Welcome back,

                <span>
                    {{ auth()->user()->name }}
                </span>

            </h1>


            <p>

                Manage your products, monitor auction
                performance and keep track of bidding
                activity from one workspace.

            </p>


        </div>


    </div>


    <!-- =====================================================
         QUICK ACTIONS
    ====================================================== -->

    <div class="quick-actions">


        <a
            href="{{ route('seller.auctions.create') }}"
            class="
                btn
                create-btn
            "
        >

            <i class="fa-solid fa-plus me-2"></i>

            Create New Auction

        </a>


        <a
            href="{{ route('seller.auctions.index') }}"
            class="
                btn
                secondary-action
            "
        >

            <i class="fa-solid fa-list me-2"></i>

            My Auctions

        </a>


        <a
            href="{{ route('seller.auctions.completed') }}"
            class="
                btn
                secondary-action
            "
        >

            <i class="fa-solid fa-circle-check me-2"></i>

            Completed Auctions

        </a>


    </div>


    <!-- =====================================================
         STATISTICS
    ====================================================== -->

    <div class="row g-4">


        <!-- TOTAL -->

        <div class="col-md-6 col-xl">

            <div class="dashboard-card">


                <div class="icon-box">

                    <i class="fa-solid fa-gavel"></i>

                </div>


                <p>
                    My Auctions
                </p>


                <h3>

                    {{ $totalAuctions }}

                </h3>


            </div>

        </div>


        <!-- PENDING -->

        <div class="col-md-6 col-xl">

            <div class="dashboard-card">


                <div class="icon-box">

                    <i class="fa-regular fa-clock"></i>

                </div>


                <p>
                    Pending
                </p>


                <h3>

                    {{ $pendingAuctions }}

                </h3>


            </div>

        </div>


        <!-- ACTIVE -->

        <div class="col-md-6 col-xl">

            <div class="dashboard-card">


                <div class="icon-box">

                    <i class="fa-solid fa-fire"></i>

                </div>


                <p>
                    Active Auctions
                </p>


                <h3>

                    {{ $activeAuctions }}

                </h3>


            </div>

        </div>


        <!-- BIDS -->

        <div class="col-md-6 col-xl">

            <div class="dashboard-card">


                <div class="icon-box">

                    <i class="fa-solid fa-hand"></i>

                </div>


                <p>
                    Bids Received
                </p>


                <h3>

                    {{ $totalBidsReceived }}

                </h3>


            </div>

        </div>


        <!-- COMPLETED -->

        <div class="col-md-6 col-xl">

            <div class="dashboard-card">


                <div class="icon-box">

                    <i class="fa-solid fa-trophy"></i>

                </div>


                <p>
                    Completed
                </p>


                <h3>

                    {{ $completedAuctions }}

                </h3>


            </div>

        </div>


    </div>


    <!-- =====================================================
         RECENT AUCTIONS
    ====================================================== -->

    <div class="recent-card">


        <div class="recent-header">


            <div class="recent-title">


                <div class="recent-title-icon">

                    <i class="fa-solid fa-clock-rotate-left"></i>

                </div>


                <div>

                    <h5>
                        Recent Auctions
                    </h5>

                    <p>
                        Latest auctions created by you
                    </p>

                </div>


            </div>


            <a
                href="{{ route('seller.auctions.index') }}"
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
                            Category
                        </th>

                        <th>
                            Current Price
                        </th>

                        <th>
                            Status
                        </th>

                        <th>
                            Winner
                        </th>

                    </tr>


                </thead>


                <tbody>


                    @forelse(
                        $recentAuctions
                        as $auction
                    )


                        <tr>


                            <!-- AUCTION -->

                            <td>

                                <strong>

                                    {{ $auction->title }}

                                </strong>

                            </td>


                            <!-- CATEGORY -->

                            <td>

                                {{ $auction
                                    ->category
                                    ->name
                                }}

                            </td>


                            <!-- PRICE -->

                            <td>


                                <span class="auction-price">

                                    ৳{{ number_format(
                                        $auction->current_price,
                                        2
                                    ) }}

                                </span>


                            </td>


                            <!-- STATUS -->

                            <td>


                                <span
                                    class="
                                        status-badge
                                        status-{{ $auction->status }}
                                    "
                                >

                                    {{ ucfirst(
                                        $auction->status
                                    ) }}

                                </span>


                            </td>


                            <!-- WINNER -->

                            <td>


                                @if(
                                    $auction->status === 'ended'
                                    &&
                                    $auction->winner
                                )


                                    <strong>

                                        <i
                                            class="
                                                fa-solid
                                                fa-trophy
                                                text-warning
                                                me-1
                                            "
                                        ></i>

                                        {{ $auction->winner->name }}

                                    </strong>


                                @elseif(
                                    $auction->status === 'ended'
                                )


                                    <span class="text-muted">

                                        No winner

                                    </span>


                                @else


                                    <span class="text-muted">

                                        —

                                    </span>


                                @endif


                            </td>


                        </tr>


                    @empty


                        <tr>


                            <td
                                colspan="5"
                                class="
                                    empty-state
                                    text-muted
                                "
                            >

                                <i class="fa-solid fa-gavel"></i>

                                You have not created
                                any auctions yet.

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