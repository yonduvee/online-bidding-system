<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Admin Dashboard | BidZone</title>


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
                    circle at 15% 5%,
                    rgba(103, 232, 249, .07),
                    transparent 28%
                ),
                radial-gradient(
                    circle at 90% 10%,
                    rgba(245, 158, 11, .07),
                    transparent 28%
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

        .sidebar {
            width: 270px;

            min-height: 100vh;

            position: fixed;

            left: 0;
            top: 0;

            z-index: 1000;

            padding:
                28px 20px;

            overflow-y: auto;

            background:
                linear-gradient(
                    180deg,
                    rgba(13, 16, 24, .97),
                    rgba(17, 21, 34, .98)
                );

            border-right:
                1px solid
                rgba(255, 255, 255, .07);

            box-shadow:
                15px 0 50px
                rgba(0, 0, 0, .15);
        }


        .sidebar::before {
            content: "";

            position: absolute;

            width: 240px;
            height: 240px;

            top: -120px;
            left: -100px;

            border-radius: 50%;

            background:
                rgba(103, 232, 249, .08);

            filter:
                blur(50px);

            pointer-events:
                none;
        }


        .sidebar::after {
            content: "";

            position: absolute;

            width: 230px;
            height: 230px;

            bottom: -120px;
            right: -130px;

            border-radius: 50%;

            background:
                rgba(245, 158, 11, .09);

            filter:
                blur(55px);

            pointer-events:
                none;
        }


        /* =========================================================
           LOGO
        ========================================================= */

        .logo {
            position: relative;

            z-index: 2;

            margin-bottom:
                42px;

            padding:
                0 12px;

            color:
                #ffffff;

            font-size:
                29px;

            font-weight:
                900;

            letter-spacing:
                -.8px;
        }


        .logo span {
            color:
                var(--accent);
        }


        .admin-label {
            display: block;

            margin-top:
                5px;

            color:
                #77849a;

            font-size:
                9px;

            font-weight:
                800;

            text-transform:
                uppercase;

            letter-spacing:
                2px;
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

            margin-bottom:
                11px;

            color:
                #68758b;

            font-size:
                10px;

            font-weight:
                800;

            text-transform:
                uppercase;

            letter-spacing:
                1.4px;
        }


        .sidebar a {
            display: flex;

            align-items: center;

            gap:
                12px;

            position: relative;

            margin-bottom:
                7px;

            padding:
                13px 14px;

            overflow:
                hidden;

            color:
                #9ba8bb;

            text-decoration:
                none;

            border:
                1px solid
                transparent;

            border-radius:
                12px;

            font-size:
                14px;

            font-weight:
                700;

            transition:
                .22s ease;
        }


        .sidebar a i {
            width:
                22px;

            font-size:
                15px;

            text-align:
                center;
        }


        .sidebar a:hover {
            color:
                #ffffff;

            background:
                rgba(255, 255, 255, .045);

            border-color:
                rgba(255, 255, 255, .07);

            transform:
                translateX(3px);
        }


        .sidebar a.active {
            color:
                #111827;

            background:
                linear-gradient(
                    135deg,
                    #f59e0b,
                    #fbbf24
                );

            border-color:
                rgba(245, 158, 11, .45);

            box-shadow:
                0 10px 28px
                rgba(245, 158, 11, .18);
        }


        /* =========================================================
           MAIN CONTENT
        ========================================================= */

        .main-content {
            margin-left:
                270px;

            padding:
                32px;
        }


        /* =========================================================
           TOPBAR
        ========================================================= */

        .topbar {
            position: relative;

            overflow:
                hidden;

            display:
                flex;

            justify-content:
                space-between;

            align-items:
                center;

            gap:
                20px;

            margin-bottom:
                30px;

            padding:
                22px 25px;

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

            border-radius:
                18px;

            box-shadow:
                var(--card-shadow);

            backdrop-filter:
                blur(18px);

            -webkit-backdrop-filter:
                blur(18px);
        }


        html[data-theme="light"]
        .topbar {
            background:
                var(--surface);
        }


        .topbar::before {
            content: "";

            position: absolute;

            width:
                150px;

            height:
                150px;

            right:
                170px;

            top:
                -100px;

            border-radius:
                50%;

            background:
                rgba(103, 232, 249, .06);

            filter:
                blur(25px);

            pointer-events:
                none;
        }


        .topbar h4 {
            color:
                var(--text-primary);

            font-weight:
                900;

            letter-spacing:
                -.5px;
        }


        .topbar .text-muted {
            color:
                var(--text-muted)
                !important;
        }


        .topbar-user {
            position:
                relative;

            z-index:
                2;

            display:
                flex;

            align-items:
                center;

            gap:
                13px;
        }


        .admin-avatar {
            width:
                44px;

            height:
                44px;

            flex-shrink:
                0;

            display:
                flex;

            align-items:
                center;

            justify-content:
                center;

            border-radius:
                13px;

            color:
                var(--accent);

            background:
                rgba(245, 158, 11, .10);

            border:
                1px solid
                rgba(245, 158, 11, .20);

            font-size:
                18px;
        }


        .admin-name {
            color:
                var(--text-primary);

            font-weight:
                800;
        }


        /* =========================================================
           THEME BUTTON
        ========================================================= */

        .theme-toggle {
            flex-shrink:
                0;
        }


        /* =========================================================
           LOGOUT
        ========================================================= */

        .logout-btn {
            min-height:
                42px;

            padding:
                9px 16px;

            border:
                1px solid
                rgba(239, 68, 68, .22);

            border-radius:
                10px;

            background:
                rgba(239, 68, 68, .10);

            color:
                #f87171;

            font-weight:
                800;

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
           PAGE INTRO
        ========================================================= */

        .dashboard-intro {
            margin-bottom:
                24px;
        }


        .dashboard-intro h2 {
            margin:
                0;

            color:
                var(--text-primary);

            font-weight:
                900;

            letter-spacing:
                -.8px;
        }


        .dashboard-intro p {
            margin:
                7px 0 0;

            color:
                var(--text-muted);
        }


        /* =========================================================
           MAIN STAT CARDS
        ========================================================= */

        .stat-card {
            position:
                relative;

            height:
                100%;

            overflow:
                hidden;

            padding:
                24px;

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

            border-radius:
                18px;

            box-shadow:
                0 14px 40px
                rgba(0, 0, 0, .09);

            transition:
                transform .25s ease,
                border-color .25s ease,
                box-shadow .25s ease;
        }


        html[data-theme="light"]
        .stat-card {
            background:
                var(--surface);
        }


        .stat-card:hover {
            transform:
                translateY(-5px);

            border-color:
                rgba(245, 158, 11, .28);

            box-shadow:
                0 20px 50px
                rgba(0, 0, 0, .15);
        }


        .stat-card::after {
            content: "";

            position:
                absolute;

            width:
                100px;

            height:
                100px;

            right:
                -45px;

            top:
                -45px;

            border-radius:
                50%;

            background:
                rgba(103, 232, 249, .04);

            filter:
                blur(12px);
        }


        .stat-icon {
            width:
                52px;

            height:
                52px;

            position:
                relative;

            z-index:
                2;

            display:
                flex;

            align-items:
                center;

            justify-content:
                center;

            margin-bottom:
                20px;

            border-radius:
                13px;

            background:
                rgba(245, 158, 11, .10);

            color:
                var(--accent);

            border:
                1px solid
                rgba(245, 158, 11, .18);

            font-size:
                20px;

            box-shadow:
                0 0 25px
                rgba(245, 158, 11, .06);
        }


        .stat-card p {
            position:
                relative;

            z-index:
                2;

            margin-bottom:
                6px;

            color:
                var(--text-muted);

            font-size:
                13px;

            font-weight:
                700;
        }


        .stat-card h3 {
            position:
                relative;

            z-index:
                2;

            margin:
                0;

            color:
                var(--text-primary);

            font-size:
                29px;

            font-weight:
                900;

            letter-spacing:
                -.7px;
        }


        /* =========================================================
           SECONDARY STATS
        ========================================================= */

        .small-stat {
            position:
                relative;

            height:
                100%;

            padding:
                18px 19px;

            overflow:
                hidden;

            background:
                var(--surface);

            border:
                1px solid
                var(--border-color);

            border-radius:
                14px;

            transition:
                .2s ease;
        }


        .small-stat:hover {
            transform:
                translateY(-3px);

            border-color:
                rgba(103, 232, 249, .20);
        }


        .small-stat span {
            color:
                var(--text-muted);

            font-size:
                12px;

            font-weight:
                700;
        }


        .small-stat strong {
            display:
                block;

            margin-top:
                5px;

            color:
                var(--text-primary);

            font-size:
                23px;

            font-weight:
                900;
        }


        .small-stat::after {
            content: "";

            position:
                absolute;

            width:
                5px;

            height:
                45%;

            right:
                0;

            top:
                27%;

            border-radius:
                6px 0 0 6px;

            background:
                linear-gradient(
                    var(--accent),
                    var(--cyan)
                );

            opacity:
                .55;
        }


        /* =========================================================
           RECENT AUCTIONS SECTION
        ========================================================= */

        .section-card {
            overflow:
                hidden;

            margin-top:
                30px;

            background:
                linear-gradient(
                    145deg,
                    rgba(255, 255, 255, .04),
                    rgba(255, 255, 255, .01)
                ),
                var(--surface);

            border:
                1px solid
                var(--border-color);

            border-radius:
                18px;

            box-shadow:
                0 14px 40px
                rgba(0, 0, 0, .08);
        }


        html[data-theme="light"]
        .section-card {
            background:
                var(--surface);
        }


        .section-header {
            display:
                flex;

            justify-content:
                space-between;

            align-items:
                center;

            gap:
                15px;

            padding:
                22px 24px;

            border-bottom:
                1px solid
                var(--border-color);
        }


        .section-header h5 {
            margin:
                0;

            color:
                var(--text-primary);

            font-weight:
                900;
        }


        .section-header
        .btn-outline-dark {
            color:
                var(--text-primary);

            border-color:
                var(--border-color);

            background:
                var(--surface-light);

            font-weight:
                700;
        }


        .section-header
        .btn-outline-dark:hover {
            color:
                #111827;

            background:
                var(--accent);

            border-color:
                var(--accent);
        }


        /* =========================================================
           TABLE
        ========================================================= */

        .table {
            margin-bottom:
                0;

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

            font-size:
                11px;

            font-weight:
                800;

            letter-spacing:
                .5px;

            text-transform:
                uppercase;

            white-space:
                nowrap;
        }


        .table tbody td {
            padding:
                17px 20px;

            color:
                var(--text-secondary);

            border-bottom:
                1px solid
                var(--border-color);

            vertical-align:
                middle;
        }


        .table tbody tr:last-child td {
            border-bottom:
                none;
        }


        .table tbody tr {
            transition:
                background .2s ease;
        }


        .table tbody tr:hover {
            background:
                rgba(255, 255, 255, .025);
        }


        html[data-theme="light"]
        .table tbody tr:hover {
            background:
                rgba(15, 23, 42, .025);
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


        /* =========================================================
           STATUS BADGES
        ========================================================= */

        .status-badge {
            display:
                inline-block;

            padding:
                6px 10px;

            border-radius:
                999px;

            font-size:
                9px;

            font-weight:
                900;

            letter-spacing:
                .5px;

            text-transform:
                uppercase;
        }


        .status-pending {
            background:
                rgba(245, 158, 11, .12);

            color:
                #fbbf24;

            border:
                1px solid
                rgba(245, 158, 11, .22);
        }


        .status-active {
            background:
                rgba(34, 197, 94, .12);

            color:
                #86efac;

            border:
                1px solid
                rgba(34, 197, 94, .22);
        }


        .status-scheduled {
            background:
                rgba(56, 189, 248, .12);

            color:
                #7dd3fc;

            border:
                1px solid
                rgba(56, 189, 248, .22);
        }


        .status-ended {
            background:
                rgba(148, 163, 184, .11);

            color:
                #cbd5e1;

            border:
                1px solid
                rgba(148, 163, 184, .18);
        }


        .status-rejected {
            background:
                rgba(239, 68, 68, .11);

            color:
                #fca5a5;

            border:
                1px solid
                rgba(239, 68, 68, .20);
        }


        .status-cancelled {
            background:
                rgba(148, 163, 184, .10);

            color:
                #94a3b8;

            border:
                1px solid
                rgba(148, 163, 184, .17);
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
           VIEW BUTTON
        ========================================================= */

        .review-btn {
            border:
                none;

            border-radius:
                9px;

            background:
                linear-gradient(
                    135deg,
                    #f59e0b,
                    #fbbf24
                );

            color:
                #111827;

            font-weight:
                800;

            transition:
                .2s ease;
        }


        .review-btn:hover {
            color:
                #111827;

            transform:
                translateY(-2px);

            box-shadow:
                0 8px 22px
                rgba(245, 158, 11, .20);
        }


        /* =========================================================
           RESPONSIVE
        ========================================================= */

        @media(max-width: 1000px) {

            .sidebar {
                position:
                    static;

                width:
                    100%;

                min-height:
                    auto;

                border-right:
                    none;

                border-bottom:
                    1px solid
                    rgba(255, 255, 255, .07);
            }


            .logo {
                margin-bottom:
                    25px;
            }


            .sidebar-menu {
                display:
                    flex;

                flex-wrap:
                    wrap;

                gap:
                    7px;
            }


            .menu-label {
                width:
                    100%;
            }


            .sidebar a {
                margin-bottom:
                    0;
            }


            .main-content {
                margin-left:
                    0;
            }

        }


        @media(max-width: 700px) {

            .main-content {
                padding:
                    18px;
            }


            .topbar {
                flex-direction:
                    column;

                align-items:
                    flex-start;
            }


            .topbar-user {
                width:
                    100%;

                flex-wrap:
                    wrap;
            }


            .section-header {
                align-items:
                    flex-start;

                flex-direction:
                    column;
            }

        }


        @media(max-width: 500px) {

            .sidebar {
                padding:
                    22px 15px;
            }


            .sidebar-menu {
                display:
                    grid;

                grid-template-columns:
                    1fr 1fr;
            }


            .menu-label {
                grid-column:
                    1 / -1;
            }


            .sidebar a {
                justify-content:
                    center;

                padding:
                    11px;
            }


            .topbar-user > div:nth-child(2) {
                flex:
                    1;
            }

        }

    </style>

</head>


<body>


<!-- =========================================================
     SIDEBAR
========================================================= -->

<div class="sidebar">


    <div class="logo">

        Bid<span>Zone</span>

        <span class="admin-label">
            Administration
        </span>

    </div>


    <div class="sidebar-menu">


        <div class="menu-label">
            Management
        </div>


        <a
            href="{{ route('admin.dashboard') }}"
            class="active"
        >

            <i class="fa-solid fa-chart-line"></i>

            Dashboard

        </a>


        <a href="{{ route('admin.users.index') }}">

            <i class="fa-solid fa-users"></i>

            Users

        </a>


        <a href="{{ route('admin.categories.index') }}">

            <i class="fa-solid fa-layer-group"></i>

            Categories

        </a>


        <a href="{{ route('admin.auctions.index') }}">

            <i class="fa-solid fa-gavel"></i>

            Auctions

        </a>


        <a href="{{ route('admin.bids.index') }}">

            <i class="fa-solid fa-hand-holding-dollar"></i>

            Bids

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

            <h4 class="mb-1">
                Admin Dashboard
            </h4>

            <small class="text-muted">

                Overview of the BidZone auction system

            </small>

        </div>


        <div class="topbar-user">


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


            <!-- AVATAR -->

            <div class="admin-avatar">

                <i class="fa-solid fa-user-shield"></i>

            </div>


            <!-- ADMIN -->

            <div>

                <div class="admin-name">

                    {{ auth()->user()->name }}

                </div>

                <div class="text-muted small">

                    Administrator

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
         INTRO
    ====================================================== -->

    <div class="dashboard-intro">

        <h2>
            System Overview
        </h2>

        <p>

            Monitor users, auctions, bidding activity
            and completed auction value.

        </p>

    </div>


    <!-- =====================================================
         MAIN STATISTICS
    ====================================================== -->

    <div class="row g-4">


        <!-- TOTAL USERS -->

        <div class="col-md-6 col-xl-3">

            <div class="stat-card">


                <div class="stat-icon">

                    <i class="fa-solid fa-users"></i>

                </div>


                <p>
                    Total Users
                </p>


                <h3>
                    {{ $totalUsers }}
                </h3>


            </div>

        </div>


        <!-- TOTAL AUCTIONS -->

        <div class="col-md-6 col-xl-3">

            <div class="stat-card">


                <div class="stat-icon">

                    <i class="fa-solid fa-gavel"></i>

                </div>


                <p>
                    Total Auctions
                </p>


                <h3>
                    {{ $totalAuctions }}
                </h3>


            </div>

        </div>


        <!-- TOTAL BIDS -->

        <div class="col-md-6 col-xl-3">

            <div class="stat-card">


                <div class="stat-icon">

                    <i class="fa-solid fa-hand"></i>

                </div>


                <p>
                    Total Bids
                </p>


                <h3>
                    {{ $totalBids }}
                </h3>


            </div>

        </div>


        <!-- COMPLETED VALUE -->

        <div class="col-md-6 col-xl-3">

            <div class="stat-card">


                <div class="stat-icon">

                    <i
                        class="
                            fa-solid
                            fa-money-bill-wave
                        "
                    ></i>

                </div>


                <p>
                    Completed Auction Value
                </p>


                <h3>

                    ৳{{ number_format(
                        $completedAuctionValue,
                        2
                    ) }}

                </h3>


            </div>

        </div>


    </div>


    <!-- =====================================================
         SECONDARY STATISTICS
    ====================================================== -->

    <div class="row g-3 mt-2">


        <div class="col-6 col-md-4 col-xl-2">

            <div class="small-stat">

                <span>
                    Bidders
                </span>

                <strong>
                    {{ $totalBidders }}
                </strong>

            </div>

        </div>


        <div class="col-6 col-md-4 col-xl-2">

            <div class="small-stat">

                <span>
                    Sellers
                </span>

                <strong>
                    {{ $totalSellers }}
                </strong>

            </div>

        </div>


        <div class="col-6 col-md-4 col-xl-2">

            <div class="small-stat">

                <span>
                    Pending
                </span>

                <strong>
                    {{ $pendingAuctions }}
                </strong>

            </div>

        </div>


        <div class="col-6 col-md-4 col-xl-2">

            <div class="small-stat">

                <span>
                    Active
                </span>

                <strong>
                    {{ $activeAuctions }}
                </strong>

            </div>

        </div>


        <div class="col-6 col-md-4 col-xl-2">

            <div class="small-stat">

                <span>
                    Scheduled
                </span>

                <strong>
                    {{ $scheduledAuctions }}
                </strong>

            </div>

        </div>


        <div class="col-6 col-md-4 col-xl-2">

            <div class="small-stat">

                <span>
                    Completed
                </span>

                <strong>
                    {{ $completedAuctions }}
                </strong>

            </div>

        </div>


    </div>


    <!-- =====================================================
         RECENT AUCTIONS
    ====================================================== -->

    <div class="section-card">


        <div class="section-header">


            <h5>

                <i
                    class="
                        fa-solid
                        fa-clock-rotate-left
                        me-2
                        text-warning
                    "
                ></i>

                Recent Auctions

            </h5>


            <a
                href="{{ route('admin.auctions.index') }}"
                class="
                    btn
                    btn-sm
                    btn-outline-dark
                "
            >

                <i
                    class="
                        fa-solid
                        fa-gavel
                        me-1
                    "
                ></i>

                Pending Auctions

            </a>


        </div>


        <div class="table-responsive">


            <table class="table align-middle">


                <thead>

                    <tr>

                        <th>
                            Title
                        </th>

                        <th>
                            Seller
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
                            Action
                        </th>

                    </tr>

                </thead>


                <tbody>


                    @forelse(
                        $recentAuctions
                        as $auction
                    )


                        <tr>


                            <td>

                                <strong>

                                    {{ $auction->title }}

                                </strong>

                            </td>


                            <td>

                                {{ $auction
                                    ->seller
                                    ->name
                                }}

                            </td>


                            <td>

                                {{ $auction
                                    ->category
                                    ->name
                                }}

                            </td>


                            <td>

                                <strong>

                                    ৳{{ number_format(
                                        $auction->current_price,
                                        2
                                    ) }}

                                </strong>

                            </td>


                            <td>


                                <span
                                    class="
                                        status-badge
                                        status-{{ $auction->status }}
                                    "
                                >

                                    {{ $auction->status }}

                                </span>


                            </td>


                            <td>


                                <a
                                    href="{{ route(
                                        'admin.auctions.show',
                                        $auction
                                    ) }}"
                                    class="
                                        btn
                                        btn-sm
                                        review-btn
                                    "
                                >

                                    <i
                                        class="
                                            fa-solid
                                            fa-eye
                                            me-1
                                        "
                                    ></i>

                                    View

                                </a>


                            </td>


                        </tr>


                    @empty


                        <tr>

                            <td
                                colspan="6"
                                class="
                                    text-center
                                    text-muted
                                    py-5
                                "
                            >

                                <i
                                    class="
                                        fa-regular
                                        fa-folder-open
                                        me-2
                                    "
                                ></i>

                                No auctions found.

                            </td>

                        </tr>


                    @endforelse


                </tbody>


            </table>


        </div>


    </div>


</div>


<!-- =========================================================
     BIDZONE THEME
========================================================= -->

<script
    src="{{ asset('js/bidzone-theme.js') }}"
></script>


</body>

</html>