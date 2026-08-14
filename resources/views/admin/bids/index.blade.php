<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Bid Management | BidZone Admin</title>


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
                    circle at 90% 8%,
                    rgba(245, 158, 11, .07),
                    transparent 30%
                ),
                var(--bg-primary);

            color: var(--text-primary);

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
            top: 0;
            left: 0;

            z-index: 1000;

            padding: 28px 20px;

            overflow-y: auto;

            background:
                linear-gradient(
                    180deg,
                    rgba(13, 16, 24, .97),
                    rgba(17, 21, 34, .98)
                );

            border-right:
                1px solid
                rgba(255,255,255,.07);

            box-shadow:
                15px 0 50px
                rgba(0,0,0,.15);
        }


        .sidebar::before {
            content: "";

            position: absolute;

            width: 250px;
            height: 250px;

            top: -130px;
            left: -100px;

            border-radius: 50%;

            background:
                rgba(103,232,249,.08);

            filter: blur(55px);

            pointer-events: none;
        }


        .sidebar::after {
            content: "";

            position: absolute;

            width: 230px;
            height: 230px;

            right: -130px;
            bottom: -120px;

            border-radius: 50%;

            background:
                rgba(245,158,11,.09);

            filter: blur(55px);

            pointer-events: none;
        }


        /* =========================================================
           LOGO
        ========================================================= */

        .logo {
            position: relative;
            z-index: 2;

            margin-bottom: 42px;
            padding: 0 12px;

            color: #ffffff;

            font-size: 29px;
            font-weight: 900;

            letter-spacing: -.8px;
        }


        .logo span {
            color: var(--accent);
        }


        .admin-label {
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
            padding: 0 13px;
            margin-bottom: 11px;

            color: #68758b;

            font-size: 10px;
            font-weight: 800;

            text-transform: uppercase;

            letter-spacing: 1.4px;
        }


        .sidebar a {
            display: flex;

            align-items: center;

            gap: 12px;

            margin-bottom: 7px;

            padding: 13px 14px;

            color: #9ba8bb;

            text-decoration: none;

            border:
                1px solid transparent;

            border-radius: 12px;

            font-size: 14px;
            font-weight: 700;

            transition: .22s ease;
        }


        .sidebar a i {
            width: 22px;

            text-align: center;
        }


        .sidebar a:hover {
            color: #ffffff;

            background:
                rgba(255,255,255,.045);

            border-color:
                rgba(255,255,255,.07);

            transform:
                translateX(3px);
        }


        .sidebar a.active {
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
           MAIN
        ========================================================= */

        .main-content {
            margin-left: 270px;

            padding: 32px;
        }


        /* =========================================================
           TOPBAR
        ========================================================= */

        .topbar {
            display: flex;

            justify-content: space-between;
            align-items: center;

            gap: 20px;

            margin-bottom: 30px;

            padding: 21px 24px;

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


        .topbar h4 {
            margin: 0;

            color:
                var(--text-primary);

            font-weight: 900;
        }


        .topbar .text-muted {
            color:
                var(--text-muted)
                !important;
        }


        .topbar-right {
            display: flex;

            align-items: center;

            gap: 13px;
        }


        .admin-avatar {
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

            font-size: 18px;
        }


        .admin-name {
            color:
                var(--text-primary);

            font-weight: 800;
        }


        .logout-btn {
            min-height: 42px;

            padding: 9px 16px;

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
            background: #ef4444;

            color: #ffffff;

            border-color: #ef4444;

            transform:
                translateY(-2px);
        }


        /* =========================================================
           PAGE HEADER
        ========================================================= */

        .back-link {
            display: inline-flex;

            align-items: center;

            gap: 8px;

            margin-bottom: 18px;

            color:
                var(--text-muted);

            text-decoration: none;

            transition:
                .2s ease;
        }


        .back-link:hover {
            color:
                var(--accent);
        }


        .page-title {
            margin: 0;

            color:
                var(--text-primary);

            font-size: 34px;

            font-weight: 900;

            letter-spacing: -1px;
        }


        .page-subtitle {
            margin:
                7px 0 0;

            color:
                var(--text-muted);
        }


        /* =========================================================
           STAT CARDS
        ========================================================= */

        .stat-card {
            position: relative;

            overflow: hidden;

            height: 100%;

            padding: 22px;

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
        .stat-card {
            background:
                var(--surface);
        }


        .stat-card:hover {
            transform:
                translateY(-4px);

            border-color:
                rgba(245,158,11,.28);
        }


        .stat-card::after {
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


        .stat-icon {
            position: relative;

            z-index: 2;

            width: 48px;
            height: 48px;

            display: flex;

            align-items: center;
            justify-content: center;

            margin-bottom: 14px;

            border-radius: 12px;

            background:
                rgba(245,158,11,.10);

            color:
                var(--accent);

            border:
                1px solid
                rgba(245,158,11,.20);

            font-size: 19px;
        }


        .stat-card p {
            position: relative;
            z-index: 2;

            margin-bottom: 4px;

            color:
                var(--text-muted);

            font-size: 13px;

            font-weight: 700;
        }


        .stat-card h3 {
            position: relative;
            z-index: 2;

            margin: 0;

            color:
                var(--text-primary);

            font-size: 29px;

            font-weight: 900;
        }


        /* =========================================================
           FILTER CARD
        ========================================================= */

        .filter-card {
            margin-top: 28px;

            padding: 22px;

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

            border-radius: 18px;

            box-shadow:
                0 12px 35px
                rgba(0,0,0,.06);
        }


        html[data-theme="light"]
        .filter-card {
            background:
                var(--surface);
        }


        .filter-title {
            display: flex;

            align-items: center;

            gap: 9px;

            margin-bottom: 18px;

            color:
                var(--text-primary);

            font-weight: 900;
        }


        .filter-title i {
            color:
                var(--accent);
        }


        .form-label {
            color:
                var(--text-primary);

            font-weight: 800;
        }


        .form-control,
        .form-select {
            min-height: 48px;

            background:
                var(--surface-light);

            color:
                var(--text-primary);

            border:
                1px solid
                var(--border-color);

            border-radius: 10px;
        }


        .form-control::placeholder {
            color:
                var(--text-muted);
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
                0 0 0 3px
                rgba(245,158,11,.11);
        }


        .form-select option {
            background:
                var(--surface);

            color:
                var(--text-primary);
        }


        .search-btn {
            min-height: 48px;

            border: none;

            border-radius: 10px;

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


        .search-btn:hover {
            color:
                #111827;

            transform:
                translateY(-2px);

            box-shadow:
                0 10px 28px
                rgba(245,158,11,.20);
        }


        .reset-btn {
            min-height: 48px;

            display: flex;

            align-items: center;
            justify-content: center;

            background:
                var(--surface-light);

            color:
                var(--text-primary);

            border:
                1px solid
                var(--border-color);

            border-radius: 10px;
        }


        .reset-btn:hover {
            color:
                var(--accent);

            background:
                var(--surface-light);

            border-color:
                var(--accent);
        }


        /* =========================================================
           ALERT
        ========================================================= */

        .alert-danger {
            background:
                rgba(239,68,68,.10);

            color:
                #fca5a5;

            border:
                1px solid
                rgba(239,68,68,.22);

            border-radius: 12px;
        }


        html[data-theme="light"]
        .alert-danger {
            color:
                inherit;
        }


        /* =========================================================
           TABLE CARD
        ========================================================= */

        .table-card {
            overflow: hidden;

            margin-top: 22px;

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

            border-radius: 18px;

            box-shadow:
                0 14px 40px
                rgba(0,0,0,.07);
        }


        html[data-theme="light"]
        .table-card {
            background:
                var(--surface);
        }


        .table-card-header {
            display: flex;

            justify-content: space-between;
            align-items: center;

            gap: 15px;

            padding: 21px 22px;

            border-bottom:
                1px solid
                var(--border-color);
        }


        .table-card-header h5 {
            margin: 0;

            color:
                var(--text-primary);

            font-weight: 900;
        }


        .table-card-header h5 i {
            color:
                var(--accent);
        }


        .result-count {
            padding: 6px 11px;

            background:
                var(--surface-light);

            color:
                var(--text-muted);

            border:
                1px solid
                var(--border-color);

            border-radius: 999px;

            font-size: 11px;
            font-weight: 800;
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
            padding: 15px 16px;

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

            vertical-align: middle;

            white-space: nowrap;
        }


        .table tbody td {
            padding: 16px;

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


        .table .text-muted {
            color:
                var(--text-muted)
                !important;
        }


        .table strong {
            color:
                var(--text-primary);
        }


        /* =========================================================
           BIDDER
        ========================================================= */

        .avatar {
            width: 43px;
            height: 43px;

            display: flex;

            align-items: center;
            justify-content: center;

            flex-shrink: 0;

            border-radius: 12px;

            background:
                linear-gradient(
                    135deg,
                    #111827,
                    #1f2937
                );

            color:
                var(--accent);

            border:
                1px solid
                rgba(245,158,11,.20);

            font-weight: 900;
        }


        /* =========================================================
           PRICE
        ========================================================= */

        .bid-amount {
            color:
                var(--accent);

            font-size: 16px;

            font-weight: 900;

            white-space: nowrap;
        }


        /* =========================================================
           AUCTION STATUS
        ========================================================= */

        .auction-status {
            display: inline-flex;

            align-items: center;

            padding: 6px 10px;

            border-radius: 999px;

            font-size: 9px;

            font-weight: 900;

            letter-spacing: .5px;

            text-transform: uppercase;
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
        .status-active {
            background: #dcfce7;
            color: #166534;
        }


        html[data-theme="light"]
        .status-scheduled {
            background: #dbeafe;
            color: #1e40af;
        }


        html[data-theme="light"]
        .status-ended {
            background: #e5e7eb;
            color: #374151;
        }


        html[data-theme="light"]
        .status-pending {
            background: #fef3c7;
            color: #92400e;
        }


        html[data-theme="light"]
        .status-rejected {
            background: #fee2e2;
            color: #991b1b;
        }


        /* =========================================================
           POSITION
        ========================================================= */

        .position-badge {
            display: inline-flex;

            align-items: center;

            padding: 6px 10px;

            border-radius: 999px;

            font-size: 9px;

            font-weight: 900;

            letter-spacing: .4px;

            text-transform: uppercase;

            white-space: nowrap;
        }


        .position-highest {
            background:
                rgba(34,197,94,.10);

            color:
                #86efac;

            border:
                1px solid
                rgba(34,197,94,.20);
        }


        .position-winning {
            background:
                rgba(245,158,11,.11);

            color:
                #fbbf24;

            border:
                1px solid
                rgba(245,158,11,.22);
        }


        .position-outbid {
            background:
                rgba(148,163,184,.10);

            color:
                #aab4c5;

            border:
                1px solid
                rgba(148,163,184,.18);
        }


        html[data-theme="light"]
        .position-highest {
            background: #dcfce7;
            color: #166534;
        }


        html[data-theme="light"]
        .position-winning {
            background: #fef3c7;
            color: #92400e;
        }


        html[data-theme="light"]
        .position-outbid {
            background: #f3f4f6;
            color: #6b7280;
        }


        /* =========================================================
           AUCTION BUTTON
        ========================================================= */

        .auction-btn {
            min-height: 35px;

            display: inline-flex;

            align-items: center;
            justify-content: center;

            padding: 6px 11px;

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


        .auction-btn:hover {
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
           PAGINATION
        ========================================================= */

        .pagination-area {
            display: flex;

            justify-content: space-between;
            align-items: center;

            flex-wrap: wrap;

            gap: 15px;

            padding: 20px 22px;

            border-top:
                1px solid
                var(--border-color);
        }


        .page-info,
        .pagination-area .text-muted {
            color:
                var(--text-muted)
                !important;
        }


        .pagination-btn {
            color:
                var(--text-primary);

            background:
                var(--surface-light);

            border-color:
                var(--border-color);
        }


        .pagination-btn:hover {
            color:
                #111827;

            background:
                var(--accent);

            border-color:
                var(--accent);
        }


        /* =========================================================
           RESPONSIVE
        ========================================================= */

        @media(max-width: 1000px) {

            .sidebar {
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


            .sidebar a {
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


            .page-title {
                font-size: 29px;
            }


            .table-card-header {
                flex-direction: column;

                align-items: flex-start;
            }


            .pagination-area {
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


            .sidebar a {
                justify-content: center;
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


        <a href="{{ route('admin.dashboard') }}">

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


        <a
            href="{{ route('admin.bids.index') }}"
            class="active"
        >

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

            <h4>
                Bid Management
            </h4>

            <small class="text-muted">

                BidZone Administration

            </small>

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


            <!-- ADMIN -->

            <div class="admin-avatar">

                <i class="fa-solid fa-user-shield"></i>

            </div>


            <div>

                <div class="admin-name">

                    {{ auth()->user()->name }}

                </div>

                <div class="small text-muted">

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
         BACK
    ====================================================== -->

    <a
        href="{{ route('admin.dashboard') }}"
        class="back-link"
    >

        <i class="fa-solid fa-arrow-left"></i>

        Admin Dashboard

    </a>


    <!-- =====================================================
         TITLE
    ====================================================== -->

    <div>

        <h1 class="page-title">

            Bid Management

        </h1>


        <p class="page-subtitle">

            Monitor all bids placed across
            the BidZone auction system.

        </p>

    </div>


    <!-- =====================================================
         STATISTICS
    ====================================================== -->

    <div class="row g-4 mt-2">


        <!-- TOTAL BIDS -->

        <div class="col-md-6 col-xl-3">

            <div class="stat-card">


                <div class="stat-icon">

                    <i class="fa-solid fa-gavel"></i>

                </div>


                <p>
                    Total Bids
                </p>


                <h3>

                    {{ $totalBids }}

                </h3>


            </div>

        </div>


        <!-- UNIQUE BIDDERS -->

        <div class="col-md-6 col-xl-3">

            <div class="stat-card">


                <div class="stat-icon">

                    <i class="fa-solid fa-users"></i>

                </div>


                <p>
                    Unique Bidders
                </p>


                <h3>

                    {{ $uniqueBidders }}

                </h3>


            </div>

        </div>


        <!-- ACTIVE -->

        <div class="col-md-6 col-xl-3">

            <div class="stat-card">


                <div class="stat-icon">

                    <i class="fa-solid fa-fire"></i>

                </div>


                <p>
                    Bids on Active Auctions
                </p>


                <h3>

                    {{ $activeAuctionBids }}

                </h3>


            </div>

        </div>


        <!-- ENDED -->

        <div class="col-md-6 col-xl-3">

            <div class="stat-card">


                <div class="stat-icon">

                    <i class="fa-solid fa-flag-checkered"></i>

                </div>


                <p>
                    Bids on Ended Auctions
                </p>


                <h3>

                    {{ $endedAuctionBids }}

                </h3>


            </div>

        </div>


    </div>


    <!-- =====================================================
         FILTER
    ====================================================== -->

    <div class="filter-card">


        <div class="filter-title">

            <i class="fa-solid fa-sliders"></i>

            Search & Filter Bids

        </div>


        <form
            method="GET"
            action="{{ route('admin.bids.index') }}"
        >


            <div class="row g-3">


                <!-- SEARCH -->

                <div class="col-lg-5">


                    <label class="form-label">

                        Search

                    </label>


                    <input
                        type="text"
                        name="search"
                        class="form-control"
                        value="{{ request('search') }}"
                        placeholder="Bidder name, email or auction title..."
                    >


                </div>


                <!-- AUCTION STATUS -->

                <div class="col-md-6 col-lg-2">


                    <label class="form-label">

                        Auction Status

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
                                === 'all'
                            )
                        >
                            All
                        </option>


                        <option
                            value="active"
                            @selected(
                                request('status')
                                === 'active'
                            )
                        >
                            Active
                        </option>


                        <option
                            value="scheduled"
                            @selected(
                                request('status')
                                === 'scheduled'
                            )
                        >
                            Scheduled
                        </option>


                        <option
                            value="ended"
                            @selected(
                                request('status')
                                === 'ended'
                            )
                        >
                            Ended
                        </option>


                    </select>


                </div>


                <!-- SORT -->

                <div class="col-md-6 col-lg-2">


                    <label class="form-label">

                        Sort

                    </label>


                    <select
                        name="sort"
                        class="form-select"
                    >


                        <option
                            value="newest"
                            @selected(
                                request(
                                    'sort',
                                    'newest'
                                )
                                === 'newest'
                            )
                        >
                            Newest
                        </option>


                        <option
                            value="oldest"
                            @selected(
                                request('sort')
                                === 'oldest'
                            )
                        >
                            Oldest
                        </option>


                        <option
                            value="amount_high"
                            @selected(
                                request('sort')
                                === 'amount_high'
                            )
                        >
                            Amount High
                        </option>


                        <option
                            value="amount_low"
                            @selected(
                                request('sort')
                                === 'amount_low'
                            )
                        >
                            Amount Low
                        </option>


                    </select>


                </div>


                <!-- SEARCH BUTTON -->

                <div
                    class="
                        col-md-6
                        col-lg-2
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

                        Search

                    </button>


                </div>


                <!-- RESET -->

                <div
                    class="
                        col-md-6
                        col-lg-1
                        d-flex
                        align-items-end
                    "
                >


                    <a
                        href="{{ route('admin.bids.index') }}"
                        class="
                            btn
                            reset-btn
                            w-100
                        "
                        title="Reset filters"
                    >

                        <i class="fa-solid fa-rotate-left"></i>

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


    <!-- =====================================================
         BID TABLE
    ====================================================== -->

    <div class="table-card">


        <div class="table-card-header">


            <h5>

                <i class="fa-solid fa-gavel me-2"></i>

                Bid Activity

            </h5>


            <div class="result-count">

                {{ $bids->total() }}

                {{ $bids->total() === 1
                    ? 'Bid'
                    : 'Bids'
                }}

            </div>


        </div>


        <div class="table-responsive">


            <table class="table align-middle">


                <thead>


                    <tr>

                        <th>#</th>

                        <th>Bidder</th>

                        <th>Auction</th>

                        <th>Seller</th>

                        <th>Bid Amount</th>

                        <th>Position</th>

                        <th>Auction Status</th>

                        <th>Date & Time</th>

                        <th>Action</th>

                    </tr>


                </thead>


                <tbody>


                    @forelse(
                        $bids
                        as $bid
                    )


                        @php

                            /*
                            |--------------------------------------------------------------------------
                            | Determine position of this bid
                            |--------------------------------------------------------------------------
                            */

                            $isHighest =
                                $bid->auction->highestBid
                                &&
                                (int)
                                $bid->auction
                                    ->highestBid
                                    ->id
                                ===
                                (int)
                                $bid->id;


                            $isWinningBid =
                                $bid->auction->status
                                === 'ended'

                                &&

                                $isHighest

                                &&

                                (int)
                                $bid->auction->winner_id
                                ===
                                (int)
                                $bid->user_id;

                        @endphp


                        <tr>


                            <!-- ID -->

                            <td>

                                <span class="text-muted">

                                    #{{ $bid->id }}

                                </span>

                            </td>


                            <!-- BIDDER -->

                            <td>


                                <div
                                    class="
                                        d-flex
                                        align-items-center
                                        gap-3
                                    "
                                >


                                    <div class="avatar">

                                        {{ strtoupper(
                                            substr(
                                                $bid
                                                    ->bidder
                                                    ->name,
                                                0,
                                                1
                                            )
                                        ) }}

                                    </div>


                                    <div>


                                        <strong>

                                            {{ $bid
                                                ->bidder
                                                ->name
                                            }}

                                        </strong>


                                        <div class="small text-muted">

                                            {{ $bid
                                                ->bidder
                                                ->email
                                            }}

                                        </div>


                                    </div>


                                </div>


                            </td>


                            <!-- AUCTION -->

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


                            <!-- SELLER -->

                            <td>

                                {{ $bid
                                    ->auction
                                    ->seller
                                    ->name
                                }}

                            </td>


                            <!-- BID AMOUNT -->

                            <td>

                                <div class="bid-amount">

                                    ৳{{ number_format(
                                        $bid->amount,
                                        2
                                    ) }}

                                </div>

                            </td>


                            <!-- POSITION -->

                            <td>


                                @if($isWinningBid)


                                    <span
                                        class="
                                            position-badge
                                            position-winning
                                        "
                                    >

                                        <i class="fa-solid fa-trophy me-1"></i>

                                        Winning Bid

                                    </span>


                                @elseif($isHighest)


                                    <span
                                        class="
                                            position-badge
                                            position-highest
                                        "
                                    >

                                        <i class="fa-solid fa-crown me-1"></i>

                                        Highest

                                    </span>


                                @else


                                    <span
                                        class="
                                            position-badge
                                            position-outbid
                                        "
                                    >

                                        Outbid

                                    </span>


                                @endif


                            </td>


                            <!-- AUCTION STATUS -->

                            <td>


                                <span
                                    class="
                                        auction-status
                                        status-{{ $bid->auction->status }}
                                    "
                                >

                                    {{ $bid
                                        ->auction
                                        ->status
                                    }}

                                </span>


                            </td>


                            <!-- DATE & TIME -->

                            <td>


                                <div>

                                    {{ $bid
                                        ->created_at
                                        ->format(
                                            'd M Y'
                                        )
                                    }}

                                </div>


                                <div class="small text-muted">

                                    {{ $bid
                                        ->created_at
                                        ->format(
                                            'h:i:s A'
                                        )
                                    }}

                                </div>


                            </td>


                            <!-- ACTION -->

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
                                        btn-sm
                                        auction-btn
                                    "
                                    target="_blank"
                                >

                                    <i class="fa-solid fa-eye me-1"></i>

                                    Auction

                                </a>


                            </td>


                        </tr>


                    @empty


                        <tr>


                            <td
                                colspan="9"
                                class="
                                    text-center
                                    text-muted
                                    py-5
                                "
                            >

                                <i
                                    class="
                                        fa-solid
                                        fa-gavel
                                        d-block
                                        mb-3
                                    "
                                    style="font-size:35px;"
                                ></i>

                                No bids found.

                            </td>


                        </tr>


                    @endforelse


                </tbody>


            </table>


        </div>


        <!-- =================================================
             PAGINATION
        ================================================== -->

        @if($bids->hasPages())


            <div class="pagination-area">


                <div class="page-info">

                    Showing

                    <strong>
                        {{ $bids->firstItem() }}
                    </strong>

                    to

                    <strong>
                        {{ $bids->lastItem() }}
                    </strong>

                    of

                    <strong>
                        {{ $bids->total() }}
                    </strong>

                    bids

                </div>


                <div
                    class="
                        d-flex
                        gap-2
                        align-items-center
                    "
                >


                    @if($bids->onFirstPage())


                        <button
                            class="
                                btn
                                btn-sm
                                pagination-btn
                            "
                            disabled
                        >

                            <i class="fa-solid fa-arrow-left me-1"></i>

                            Previous

                        </button>


                    @else


                        <a
                            href="{{ $bids->previousPageUrl() }}"
                            class="
                                btn
                                btn-sm
                                pagination-btn
                            "
                        >

                            <i class="fa-solid fa-arrow-left me-1"></i>

                            Previous

                        </a>


                    @endif


                    <span class="small text-muted px-2">

                        Page

                        {{ $bids->currentPage() }}

                        of

                        {{ $bids->lastPage() }}

                    </span>


                    @if($bids->hasMorePages())


                        <a
                            href="{{ $bids->nextPageUrl() }}"
                            class="
                                btn
                                btn-sm
                                pagination-btn
                            "
                        >

                            Next

                            <i class="fa-solid fa-arrow-right ms-1"></i>

                        </a>


                    @else


                        <button
                            class="
                                btn
                                btn-sm
                                pagination-btn
                            "
                            disabled
                        >

                            Next

                            <i class="fa-solid fa-arrow-right ms-1"></i>

                        </button>


                    @endif


                </div>


            </div>


        @endif


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