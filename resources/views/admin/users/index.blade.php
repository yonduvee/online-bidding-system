<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>User Management | BidZone Admin</title>


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

            top: 0;
            left: 0;

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

            width: 250px;
            height: 250px;

            top: -130px;
            left: -100px;

            border-radius: 50%;

            background:
                rgba(103, 232, 249, .08);

            filter:
                blur(55px);

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
                rgba(245, 158, 11, .09);

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
            padding:
                0 13px;

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

            position: relative;

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


        .sidebar a i {
            width: 22px;

            text-align: center;
        }


        .sidebar a:hover {
            color: #ffffff;

            background:
                rgba(255, 255, 255, .045);

            border-color:
                rgba(255, 255, 255, .07);

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
                rgba(245, 158, 11, .45);

            box-shadow:
                0 10px 28px
                rgba(245, 158, 11, .18);
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

            margin-bottom: 30px;

            padding:
                21px 24px;

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

            border-radius: 18px;

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


        .topbar-title {
            margin: 0;

            color:
                var(--text-primary);

            font-weight: 900;

            letter-spacing: -.5px;
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

            flex-shrink: 0;

            border-radius: 13px;

            background:
                rgba(245, 158, 11, .10);

            color:
                var(--accent);

            border:
                1px solid
                rgba(245, 158, 11, .20);

            font-size: 18px;
        }


        .admin-name {
            color:
                var(--text-primary);

            font-weight: 800;
        }


        .logout-btn {
            min-height: 42px;

            padding:
                9px 16px;

            border:
                1px solid
                rgba(239, 68, 68, .22);

            border-radius: 10px;

            background:
                rgba(239, 68, 68, .10);

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
           PAGE HEADER
        ========================================================= */

        .page-header {
            display: flex;

            justify-content: space-between;

            align-items: flex-end;

            gap: 20px;

            margin-bottom: 25px;
        }


        .back-link {
            display: inline-flex;

            align-items: center;

            gap: 7px;

            margin-bottom: 17px;

            color:
                var(--text-muted);

            text-decoration: none;

            font-size: 14px;

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
           ALERTS
        ========================================================= */

        .alert-success {
            background:
                rgba(34, 197, 94, .10);

            color:
                #86efac;

            border-color:
                rgba(34, 197, 94, .22);

            border-radius: 12px;
        }


        .alert-danger {
            background:
                rgba(239, 68, 68, .10);

            color:
                #fca5a5;

            border-color:
                rgba(239, 68, 68, .22);

            border-radius: 12px;
        }


        html[data-theme="light"]
        .alert-success,
        html[data-theme="light"]
        .alert-danger {
            color:
                inherit;
        }


        /* =========================================================
           STATISTICS
        ========================================================= */

        .stat-card {
            position: relative;

            height: 100%;

            overflow: hidden;

            padding:
                23px;

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

            border-radius: 18px;

            box-shadow:
                0 14px 40px
                rgba(0, 0, 0, .08);

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
                rgba(0, 0, 0, .14);
        }


        .stat-card::after {
            content: "";

            position: absolute;

            width: 100px;
            height: 100px;

            right: -45px;
            top: -45px;

            border-radius: 50%;

            background:
                rgba(103, 232, 249, .05);

            filter:
                blur(13px);
        }


        .stat-icon {
            width: 50px;
            height: 50px;

            position: relative;

            z-index: 2;

            display: flex;

            align-items: center;

            justify-content: center;

            margin-bottom: 17px;

            border-radius: 13px;

            background:
                rgba(245, 158, 11, .10);

            color:
                var(--accent);

            border:
                1px solid
                rgba(245, 158, 11, .18);

            font-size: 20px;
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

            font-weight: 900;

            font-size: 29px;
        }


        /* =========================================================
           FILTER CARD
        ========================================================= */

        .filter-card {
            margin-top: 27px;

            padding:
                22px;

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

            border-radius: 18px;

            box-shadow:
                0 12px 35px
                rgba(0, 0, 0, .06);
        }


        html[data-theme="light"]
        .filter-card {
            background:
                var(--surface);
        }


        .filter-heading {
            display: flex;

            align-items: center;

            gap: 9px;

            margin-bottom: 17px;

            color:
                var(--text-primary);

            font-weight: 900;
        }


        .filter-heading i {
            color:
                var(--accent);
        }


        /* =========================================================
           FORM
        ========================================================= */

        .form-control,
        .form-select {
            min-height: 47px;

            border:
                1px solid
                var(--border-color);

            border-radius: 10px;

            background:
                var(--surface-light);

            color:
                var(--text-primary);
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
                rgba(245, 158, 11, .11);
        }


        .form-select option {
            background:
                var(--surface);

            color:
                var(--text-primary);
        }


        .search-btn {
            min-height: 47px;

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
            color: #111827;

            transform:
                translateY(-2px);

            box-shadow:
                0 10px 28px
                rgba(245, 158, 11, .20);
        }


        .reset-btn {
            min-height: 47px;

            display: flex;

            align-items: center;

            justify-content: center;

            color:
                var(--text-primary);

            background:
                var(--surface-light);

            border:
                1px solid
                var(--border-color);

            border-radius: 10px;
        }


        .reset-btn:hover {
            color:
                var(--accent);

            border-color:
                var(--accent);

            background:
                var(--surface-light);
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
                    rgba(255, 255, 255, .04),
                    rgba(255, 255, 255, .01)
                ),
                var(--surface);

            border:
                1px solid
                var(--border-color);

            border-radius: 18px;

            box-shadow:
                0 14px 40px
                rgba(0, 0, 0, .07);
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

            padding:
                21px 22px;

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


        .result-count {
            padding:
                6px 11px;

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
            padding:
                15px 18px;

            background:
                var(--surface-light);

            color:
                var(--text-muted);

            border-bottom:
                1px solid
                var(--border-color);

            font-size: 10px;

            font-weight: 900;

            letter-spacing: .6px;

            text-transform: uppercase;

            white-space: nowrap;
        }


        .table tbody td {
            padding:
                17px 18px;

            color:
                var(--text-primary);

            border-bottom:
                1px solid
                var(--border-color);

            vertical-align: middle;
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


        .table .text-muted {
            color:
                var(--text-muted)
                !important;
        }


        /* =========================================================
           USER AVATAR
        ========================================================= */

        .avatar {
            width: 45px;
            height: 45px;

            flex-shrink: 0;

            border-radius: 13px;

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
                rgba(245, 158, 11, .18);

            display: flex;

            justify-content: center;

            align-items: center;

            font-weight: 900;

            box-shadow:
                0 8px 20px
                rgba(0, 0, 0, .12);
        }


        /* =========================================================
           BADGES
        ========================================================= */

        .role-badge,
        .status-badge {
            display: inline-block;

            padding:
                6px 10px;

            border-radius:
                999px;

            font-size: 9px;

            font-weight: 900;

            letter-spacing: .5px;

            text-transform: uppercase;
        }


        .role-seller {
            background:
                rgba(56, 189, 248, .12);

            color:
                #7dd3fc;

            border:
                1px solid
                rgba(56, 189, 248, .22);
        }


        .role-bidder {
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


        .status-blocked {
            background:
                rgba(239, 68, 68, .11);

            color:
                #fca5a5;

            border:
                1px solid
                rgba(239, 68, 68, .22);
        }


        html[data-theme="light"]
        .role-seller {
            background:
                #dbeafe;

            color:
                #1e40af;
        }


        html[data-theme="light"]
        .role-bidder {
            background:
                #fef3c7;

            color:
                #92400e;
        }


        html[data-theme="light"]
        .status-active {
            background:
                #dcfce7;

            color:
                #166534;
        }


        html[data-theme="light"]
        .status-blocked {
            background:
                #fee2e2;

            color:
                #991b1b;
        }


        /* =========================================================
           VIEW BUTTON
        ========================================================= */

        .view-btn {
            border: none;

            border-radius: 9px;

            background:
                linear-gradient(
                    135deg,
                    #f59e0b,
                    #fbbf24
                );

            color:
                #111827;

            font-weight: 800;

            transition:
                .2s ease;
        }


        .view-btn:hover {
            color:
                #111827;

            transform:
                translateY(-2px);

            box-shadow:
                0 8px 20px
                rgba(245, 158, 11, .20);
        }


        /* =========================================================
           PAGINATION
        ========================================================= */

        .pagination-wrapper {
            padding:
                20px;

            border-top:
                1px solid
                var(--border-color);
        }


        .pagination {
            margin-bottom: 0;
        }


        .page-link {
            background:
                var(--surface-light);

            color:
                var(--text-primary);

            border-color:
                var(--border-color);
        }


        .page-link:hover {
            background:
                var(--accent);

            color:
                #111827;

            border-color:
                var(--accent);
        }


        .page-item.active
        .page-link {
            background:
                var(--accent);

            color:
                #111827;

            border-color:
                var(--accent);
        }


        .page-item.disabled
        .page-link {
            background:
                var(--surface);

            color:
                var(--text-muted);

            border-color:
                var(--border-color);
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

                border-bottom:
                    1px solid
                    rgba(255, 255, 255, .07);
            }


            .logo {
                margin-bottom: 25px;
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
                align-items: flex-start;

                flex-direction: column;
            }

        }


        @media(max-width: 500px) {

            .sidebar {
                padding:
                    22px 15px;
            }


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

                padding: 11px;
            }


            .topbar-right
            .admin-info {
                flex: 1;
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


        <a
            href="{{ route('admin.users.index') }}"
            class="active"
        >

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

            <h4 class="topbar-title">
                User Management
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


            <!-- ADMIN AVATAR -->

            <div class="admin-avatar">

                <i class="fa-solid fa-user-shield"></i>

            </div>


            <!-- ADMIN INFO -->

            <div class="admin-info">

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
         PAGE HEADER
    ====================================================== -->

    <div class="page-header">


        <div>


            <a
                href="{{ route('admin.dashboard') }}"
                class="back-link"
            >

                <i class="fa-solid fa-arrow-left"></i>

                Admin Dashboard

            </a>


            <h1 class="page-title">
                User Management
            </h1>


            <p class="page-subtitle">

                Manage registered sellers and bidders.

            </p>


        </div>


    </div>


    <!-- =====================================================
         MESSAGES
    ====================================================== -->

    @if(session('success'))

        <div class="alert alert-success">

            <i
                class="
                    fa-solid
                    fa-circle-check
                    me-2
                "
            ></i>

            {{ session('success') }}

        </div>

    @endif


    @if(session('error'))

        <div class="alert alert-danger">

            <i
                class="
                    fa-solid
                    fa-circle-exclamation
                    me-2
                "
            ></i>

            {{ session('error') }}

        </div>

    @endif


    <!-- =====================================================
         STATISTICS
    ====================================================== -->

    <div class="row g-4 mt-1">


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


        <!-- SELLERS -->

        <div class="col-md-6 col-xl-3">

            <div class="stat-card">


                <div class="stat-icon">

                    <i class="fa-solid fa-store"></i>

                </div>


                <p>
                    Sellers
                </p>


                <h3>
                    {{ $totalSellers }}
                </h3>


            </div>

        </div>


        <!-- BIDDERS -->

        <div class="col-md-6 col-xl-3">

            <div class="stat-card">


                <div class="stat-icon">

                    <i class="fa-solid fa-gavel"></i>

                </div>


                <p>
                    Bidders
                </p>


                <h3>
                    {{ $totalBidders }}
                </h3>


            </div>

        </div>


        <!-- BLOCKED -->

        <div class="col-md-6 col-xl-3">

            <div class="stat-card">


                <div class="stat-icon">

                    <i class="fa-solid fa-user-lock"></i>

                </div>


                <p>
                    Blocked Users
                </p>


                <h3>
                    {{ $blockedUsers }}
                </h3>


            </div>

        </div>


    </div>


    <!-- =====================================================
         FILTER
    ====================================================== -->

    <div class="filter-card">


        <div class="filter-heading">

            <i class="fa-solid fa-sliders"></i>

            Search & Filter Users

        </div>


        <form
            method="GET"
            action="{{ route('admin.users.index') }}"
        >


            <div class="row g-3">


                <!-- SEARCH -->

                <div class="col-lg-5">

                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        class="form-control"
                        placeholder="Search name or email..."
                    >

                </div>


                <!-- ROLE -->

                <div class="col-lg-2">

                    <select
                        name="role"
                        class="form-select"
                    >

                        <option value="">
                            All Roles
                        </option>


                        <option
                            value="seller"
                            @selected(
                                request('role') === 'seller'
                            )
                        >
                            Seller
                        </option>


                        <option
                            value="bidder"
                            @selected(
                                request('role') === 'bidder'
                            )
                        >
                            Bidder
                        </option>


                    </select>

                </div>


                <!-- STATUS -->

                <div class="col-lg-2">

                    <select
                        name="status"
                        class="form-select"
                    >

                        <option value="">
                            All Status
                        </option>


                        <option
                            value="active"
                            @selected(
                                request('status') === 'active'
                            )
                        >
                            Active
                        </option>


                        <option
                            value="blocked"
                            @selected(
                                request('status') === 'blocked'
                            )
                        >
                            Blocked
                        </option>


                    </select>

                </div>


                <!-- BUTTONS -->

                <div class="col-lg-3 d-flex gap-2">


                    <button
                        type="submit"
                        class="
                            btn
                            search-btn
                            flex-fill
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


                    <a
                        href="{{ route('admin.users.index') }}"
                        class="
                            btn
                            reset-btn
                        "
                    >

                        <i class="fa-solid fa-rotate-left"></i>

                    </a>


                </div>


            </div>


        </form>


    </div>


    <!-- =====================================================
         USER TABLE
    ====================================================== -->

    <div class="table-card">


        <div class="table-card-header">


            <h5>

                <i
                    class="
                        fa-solid
                        fa-users
                        me-2
                        text-warning
                    "
                ></i>

                Registered Users

            </h5>


            <div class="result-count">

                {{ $users->total() }}

                {{ $users->total() === 1
                    ? 'User'
                    : 'Users'
                }}

            </div>


        </div>


        <div class="table-responsive">


            <table class="table align-middle">


                <thead>

                    <tr>

                        <th>
                            User
                        </th>

                        <th>
                            Role
                        </th>

                        <th>
                            Auctions
                        </th>

                        <th>
                            Bids
                        </th>

                        <th>
                            Won
                        </th>

                        <th>
                            Status
                        </th>

                        <th>
                            Joined
                        </th>

                        <th>
                            Action
                        </th>

                    </tr>

                </thead>


                <tbody>


                    @forelse(
                        $users
                        as $user
                    )


                        <tr>


                            <!-- USER -->

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
                                                $user->name,
                                                0,
                                                1
                                            )
                                        ) }}

                                    </div>


                                    <div>


                                        <strong>

                                            {{ $user->name }}

                                        </strong>


                                        <div
                                            class="
                                                small
                                                text-muted
                                                mt-1
                                            "
                                        >

                                            {{ $user->email }}

                                        </div>


                                    </div>


                                </div>


                            </td>


                            <!-- ROLE -->

                            <td>


                                <span
                                    class="
                                        role-badge
                                        role-{{ $user->role }}
                                    "
                                >

                                    {{ $user->role }}

                                </span>


                            </td>


                            <!-- AUCTIONS -->

                            <td>

                                {{ $user->auctions_count }}

                            </td>


                            <!-- BIDS -->

                            <td>

                                {{ $user->bids_count }}

                            </td>


                            <!-- WON -->

                            <td>

                                {{ $user->won_auctions_count }}

                            </td>


                            <!-- STATUS -->

                            <td>


                                @if($user->is_active)


                                    <span
                                        class="
                                            status-badge
                                            status-active
                                        "
                                    >

                                        <i
                                            class="
                                                fa-solid
                                                fa-circle
                                                me-1
                                            "
                                            style="font-size:6px;"
                                        ></i>

                                        Active

                                    </span>


                                @else


                                    <span
                                        class="
                                            status-badge
                                            status-blocked
                                        "
                                    >

                                        <i
                                            class="
                                                fa-solid
                                                fa-ban
                                                me-1
                                            "
                                        ></i>

                                        Blocked

                                    </span>


                                @endif


                            </td>


                            <!-- JOINED -->

                            <td>

                                {{ $user
                                    ->created_at
                                    ->format('d M Y')
                                }}

                            </td>


                            <!-- ACTION -->

                            <td>


                                <a
                                    href="{{ route(
                                        'admin.users.show',
                                        $user
                                    ) }}"
                                    class="
                                        btn
                                        btn-sm
                                        view-btn
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
                                colspan="8"
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

                                No users found.

                            </td>


                        </tr>


                    @endforelse


                </tbody>


            </table>


        </div>


        <!-- =================================================
             PAGINATION
        ================================================== -->

        @if($users->hasPages())


            <div class="pagination-wrapper">

                {{ $users->links() }}

            </div>


        @endif


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