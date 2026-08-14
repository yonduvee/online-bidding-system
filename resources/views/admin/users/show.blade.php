<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>{{ $user->name }} | BidZone Admin</title>


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
            color: white;

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
           BACK LINK
        ========================================================= */

        .back-link {
            display: inline-flex;

            align-items: center;

            gap: 8px;

            margin-bottom: 20px;

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


        /* =========================================================
           ALERTS
        ========================================================= */

        .alert-success {
            background:
                rgba(34, 197, 94, .10);

            color:
                #86efac;

            border:
                1px solid
                rgba(34, 197, 94, .22);

            border-radius:
                12px;
        }


        .alert-danger {
            background:
                rgba(239, 68, 68, .10);

            color:
                #fca5a5;

            border:
                1px solid
                rgba(239, 68, 68, .22);

            border-radius:
                12px;
        }


        html[data-theme="light"]
        .alert-success,
        html[data-theme="light"]
        .alert-danger {
            color:
                inherit;
        }


        /* =========================================================
           PROFILE
        ========================================================= */

        .profile-card {
            position: relative;

            overflow: hidden;

            padding:
                30px;

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
        .profile-card {
            background:
                var(--surface);
        }


        .profile-card::after {
            content: "";

            position: absolute;

            width: 220px;
            height: 220px;

            top: -130px;
            right: -100px;

            border-radius: 50%;

            background:
                rgba(103, 232, 249, .07);

            filter:
                blur(45px);

            pointer-events: none;
        }


        .avatar {
            width: 92px;
            height: 92px;

            flex-shrink: 0;

            display: flex;

            justify-content: center;

            align-items: center;

            border-radius: 22px;

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
                rgba(245, 158, 11, .22);

            box-shadow:
                0 15px 35px
                rgba(0,0,0,.18);

            font-size: 35px;

            font-weight: 900;
        }


        .profile-name {
            color:
                var(--text-primary);

            font-weight: 900;

            letter-spacing: -.6px;
        }


        .profile-email {
            color:
                var(--text-muted)
                !important;
        }


        .role-badge {
            display: inline-block;

            padding:
                7px 11px;

            border-radius:
                999px;

            background:
                rgba(56, 189, 248, .11);

            color:
                #7dd3fc;

            border:
                1px solid
                rgba(56, 189, 248, .22);

            font-size: 10px;

            font-weight: 900;

            letter-spacing: .5px;

            text-transform: uppercase;
        }


        .badge-status {
            display: inline-block;

            padding:
                7px 11px;

            border-radius:
                999px;

            font-size: 10px;

            font-weight: 900;

            letter-spacing: .5px;

            text-transform: uppercase;
        }


        .status-active {
            background:
                rgba(34, 197, 94, .11);

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
        .role-badge {
            background:
                #dbeafe;

            color:
                #1e40af;
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


        .joined-box {
            min-width: 145px;

            padding:
                13px 15px;

            background:
                var(--surface-light);

            border:
                1px solid
                var(--border-color);

            border-radius:
                12px;
        }


        .joined-box small {
            color:
                var(--text-muted);
        }


        .joined-box div {
            color:
                var(--text-primary);
        }


        /* =========================================================
           STAT CARDS
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
                    rgba(255,255,255,.04),
                    rgba(255,255,255,.01)
                ),
                var(--surface);

            border:
                1px solid
                var(--border-color);

            border-radius: 17px;

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


        .stat-icon {
            width: 45px;
            height: 45px;

            display: flex;

            align-items: center;

            justify-content: center;

            margin-bottom: 15px;

            border-radius: 12px;

            color:
                var(--accent);

            background:
                rgba(245,158,11,.09);

            border:
                1px solid
                rgba(245,158,11,.18);
        }


        .stat-card p {
            margin-bottom: 4px;

            color:
                var(--text-muted);

            font-size: 13px;

            font-weight: 700;
        }


        .stat-card h3 {
            margin: 0;

            color:
                var(--text-primary);

            font-size: 29px;

            font-weight: 900;
        }


        /* =========================================================
           BLOCK BOX
        ========================================================= */

        .block-box {
            position: relative;

            overflow: hidden;

            margin-top: 25px;

            padding:
                23px;

            background:
                linear-gradient(
                    145deg,
                    rgba(245,158,11,.07),
                    rgba(255,255,255,.01)
                ),
                var(--surface);

            border:
                1px solid
                rgba(245,158,11,.20);

            border-radius:
                17px;
        }


        .block-box h5 {
            color:
                var(--text-primary);

            font-weight: 900;
        }


        .block-box .text-muted {
            color:
                var(--text-muted)
                !important;
        }


        .form-control {
            background:
                var(--surface-light);

            color:
                var(--text-primary);

            border:
                1px solid
                var(--border-color);

            border-radius: 11px;
        }


        .form-control::placeholder {
            color:
                var(--text-muted);
        }


        .form-control:focus {
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


        .block-btn {
            min-height: 44px;

            border: none;

            border-radius: 10px;

            background:
                linear-gradient(
                    135deg,
                    #ef4444,
                    #dc2626
                );

            color: white;

            font-weight: 800;
        }


        .block-btn:hover {
            color: white;

            transform:
                translateY(-2px);

            box-shadow:
                0 10px 25px
                rgba(239,68,68,.20);
        }


        .unblock-btn {
            min-height: 44px;

            border: none;

            border-radius: 10px;

            background:
                linear-gradient(
                    135deg,
                    #22c55e,
                    #16a34a
                );

            color: white;

            font-weight: 800;
        }


        .unblock-btn:hover {
            color: white;

            transform:
                translateY(-2px);
        }


        /* =========================================================
           ACTIVITY CARD
        ========================================================= */

        .activity-card {
            overflow: hidden;

            margin-top: 25px;

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
        .activity-card {
            background:
                var(--surface);
        }


        .activity-header {
            padding:
                21px 23px;

            border-bottom:
                1px solid
                var(--border-color);
        }


        .activity-header h5 {
            color:
                var(--text-primary);

            font-weight: 900;
        }


        .activity-header i {
            color:
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

            font-size: 10px;

            font-weight: 900;

            letter-spacing: .6px;

            text-transform: uppercase;

            white-space: nowrap;
        }


        .table tbody td {
            padding:
                16px 20px;

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


        /* =========================================================
           AUCTION STATUS
        ========================================================= */

        .auction-status {
            display: inline-block;

            padding:
                6px 10px;

            border-radius:
                999px;

            font-size: 9px;

            font-weight: 900;

            text-transform: uppercase;
        }


        .status-pending {
            background:
                rgba(245,158,11,.12);

            color:
                #fbbf24;
        }


        .status-scheduled {
            background:
                rgba(56,189,248,.12);

            color:
                #7dd3fc;
        }


        .status-ended {
            background:
                rgba(148,163,184,.12);

            color:
                #cbd5e1;
        }


        .status-rejected,
        .status-cancelled {
            background:
                rgba(239,68,68,.10);

            color:
                #fca5a5;
        }


        html[data-theme="light"]
        .status-pending {
            background:
                #fff3cd;

            color:
                #8a6100;
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


            .profile-card {
                padding: 22px;
            }


            .avatar {
                width: 75px;
                height: 75px;

                font-size: 28px;
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
     MAIN
========================================================= -->

<div class="main-content">


    <!-- =====================================================
         TOPBAR
    ====================================================== -->

    <div class="topbar">


        <div>

            <h4>
                User Details
            </h4>

            <small class="text-muted">

                Review account activity and status

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


    <!-- BACK -->

    <a
        href="{{ route('admin.users.index') }}"
        class="back-link"
    >

        <i class="fa-solid fa-arrow-left"></i>

        User Management

    </a>


    <!-- SUCCESS -->

    @if(session('success'))

        <div class="alert alert-success">

            <i class="fa-solid fa-circle-check me-2"></i>

            {{ session('success') }}

        </div>

    @endif


    <!-- ERROR -->

    @if(session('error'))

        <div class="alert alert-danger">

            <i class="fa-solid fa-circle-exclamation me-2"></i>

            {{ session('error') }}

        </div>

    @endif


    <!-- =====================================================
         PROFILE
    ====================================================== -->

    <div class="profile-card">


        <div
            class="
                d-flex
                flex-column
                flex-md-row
                gap-4
                align-items-md-center
            "
        >


            <!-- AVATAR -->

            <div class="avatar">

                {{ strtoupper(
                    substr(
                        $user->name,
                        0,
                        1
                    )
                ) }}

            </div>


            <!-- USER -->

            <div class="flex-grow-1">


                <h2 class="profile-name mb-1">

                    {{ $user->name }}

                </h2>


                <p class="profile-email mb-3">

                    <i class="fa-regular fa-envelope me-2"></i>

                    {{ $user->email }}

                </p>


                <span class="role-badge">

                    <i class="fa-solid fa-id-badge me-1"></i>

                    {{ $user->role }}

                </span>


                @if($user->is_active)


                    <span
                        class="
                            badge-status
                            status-active
                            ms-2
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
                            badge-status
                            status-blocked
                            ms-2
                        "
                    >

                        <i class="fa-solid fa-ban me-1"></i>

                        Blocked

                    </span>


                @endif


            </div>


            <!-- JOINED -->

            <div class="joined-box">

                <small>

                    <i class="fa-regular fa-calendar me-1"></i>

                    Joined

                </small>


                <div class="fw-bold mt-1">

                    {{ $user
                        ->created_at
                        ->format('d M Y')
                    }}

                </div>

            </div>


        </div>


        <!-- BLOCKED INFORMATION -->

        @if(!$user->is_active)


            <div class="alert alert-danger mt-4 mb-0">


                <strong>

                    <i class="fa-solid fa-user-lock me-2"></i>

                    Account Blocked

                </strong>


                @if($user->blocked_reason)


                    <div class="mt-2">

                        <strong>Reason:</strong>

                        {{ $user->blocked_reason }}

                    </div>


                @endif


                @if($user->blocked_at)


                    <div class="small mt-2">

                        Blocked at:

                        {{ $user
                            ->blocked_at
                            ->format(
                                'd M Y, h:i A'
                            )
                        }}

                    </div>


                @endif


            </div>


        @endif


    </div>


    <!-- =====================================================
         COUNTS
    ====================================================== -->

    <div class="row g-4 mt-1">


        <!-- AUCTIONS -->

        <div class="col-md-4">

            <div class="stat-card">


                <div class="stat-icon">

                    <i class="fa-solid fa-box-open"></i>

                </div>


                <p>
                    Auctions Created
                </p>


                <h3>

                    {{ $user->auctions_count }}

                </h3>


            </div>

        </div>


        <!-- BIDS -->

        <div class="col-md-4">

            <div class="stat-card">


                <div class="stat-icon">

                    <i class="fa-solid fa-gavel"></i>

                </div>


                <p>
                    Bids Placed
                </p>


                <h3>

                    {{ $user->bids_count }}

                </h3>


            </div>

        </div>


        <!-- WON -->

        <div class="col-md-4">

            <div class="stat-card">


                <div class="stat-icon">

                    <i class="fa-solid fa-trophy"></i>

                </div>


                <p>
                    Auctions Won
                </p>


                <h3>

                    {{ $user->won_auctions_count }}

                </h3>


            </div>

        </div>


    </div>


    <!-- =====================================================
         BLOCK / UNBLOCK
    ====================================================== -->

    <div class="block-box">


        @if($user->is_active)


            <h5>

                <i
                    class="
                        fa-solid
                        fa-user-lock
                        me-2
                        text-danger
                    "
                ></i>

                Block Account

            </h5>


            <p class="text-muted">

                A blocked user will no longer be able
                to log in or access their dashboard.

            </p>


            <form
                method="POST"
                action="{{ route(
                    'admin.users.toggle-status',
                    $user
                ) }}"
            >

                @csrf
                @method('PATCH')


                <textarea
                    name="blocked_reason"
                    class="form-control mb-3"
                    rows="3"
                    placeholder="Enter reason for blocking this account..."
                    required
                >{{ old('blocked_reason') }}</textarea>


                @error('blocked_reason')

                    <div class="text-danger mb-3">

                        {{ $message }}

                    </div>

                @enderror


                <button
                    type="submit"
                    class="btn block-btn"
                    onclick="
                        return confirm(
                            'Are you sure you want to block this user?'
                        );
                    "
                >

                    <i class="fa-solid fa-user-lock me-2"></i>

                    Block Account

                </button>


            </form>


        @else


            <h5>

                <i
                    class="
                        fa-solid
                        fa-user-check
                        me-2
                        text-success
                    "
                ></i>

                Unblock Account

            </h5>


            <p class="text-muted">

                Unblocking this account will allow
                the user to log in again.

            </p>


            <form
                method="POST"
                action="{{ route(
                    'admin.users.toggle-status',
                    $user
                ) }}"
            >

                @csrf
                @method('PATCH')


                <button
                    type="submit"
                    class="btn unblock-btn"
                    onclick="
                        return confirm(
                            'Are you sure you want to unblock this user?'
                        );
                    "
                >

                    <i class="fa-solid fa-user-check me-2"></i>

                    Unblock Account

                </button>


            </form>


        @endif


    </div>


    <!-- =====================================================
         SELLER AUCTIONS
    ====================================================== -->

    @if($user->role === 'seller')


        <div class="activity-card">


            <div class="activity-header">


                <h5 class="mb-0">

                    <i
                        class="
                            fa-solid
                            fa-gavel
                            me-2
                        "
                    ></i>

                    Recent Auctions

                </h5>


            </div>


            <div class="table-responsive">


                <table class="table">


                    <thead>

                        <tr>

                            <th>
                                Auction
                            </th>

                            <th>
                                Category
                            </th>

                            <th>
                                Price
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


                                <td>

                                    <strong>

                                        {{ $auction->title }}

                                    </strong>

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
                                            auction-status
                                            status-{{ $auction->status }}
                                        "
                                    >

                                        {{ ucfirst(
                                            $auction->status
                                        ) }}

                                    </span>


                                </td>


                                <td>

                                    {{ $auction->winner
                                        ? $auction->winner->name
                                        : '—'
                                    }}

                                </td>


                            </tr>


                        @empty


                            <tr>


                                <td
                                    colspan="5"
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


    @endif


    <!-- =====================================================
         BIDDER BIDS
    ====================================================== -->

    @if($user->role === 'bidder')


        <div class="activity-card">


            <div class="activity-header">


                <h5 class="mb-0">

                    <i
                        class="
                            fa-solid
                            fa-hand-holding-dollar
                            me-2
                        "
                    ></i>

                    Recent Bids

                </h5>


            </div>


            <div class="table-responsive">


                <table class="table">


                    <thead>

                        <tr>

                            <th>
                                Auction
                            </th>

                            <th>
                                Category
                            </th>

                            <th>
                                Bid Amount
                            </th>

                            <th>
                                Auction Status
                            </th>

                            <th>
                                Date
                            </th>

                        </tr>

                    </thead>


                    <tbody>


                        @forelse(
                            $recentBids
                            as $bid
                        )


                            <tr>


                                <td>

                                    <strong>

                                        {{ $bid
                                            ->auction
                                            ->title
                                        }}

                                    </strong>

                                </td>


                                <td>

                                    {{ $bid
                                        ->auction
                                        ->category
                                        ->name
                                    }}

                                </td>


                                <td>

                                    <strong>

                                        ৳{{ number_format(
                                            $bid->amount,
                                            2
                                        ) }}

                                    </strong>

                                </td>


                                <td>


                                    <span
                                        class="
                                            auction-status
                                            status-{{ $bid->auction->status }}
                                        "
                                    >

                                        {{ ucfirst(
                                            $bid
                                                ->auction
                                                ->status
                                        ) }}

                                    </span>


                                </td>


                                <td>

                                    {{ $bid
                                        ->created_at
                                        ->format(
                                            'd M Y, h:i A'
                                        )
                                    }}

                                </td>


                            </tr>


                        @empty


                            <tr>


                                <td
                                    colspan="5"
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

                                    No bids found.

                                </td>


                            </tr>


                        @endforelse


                    </tbody>


                </table>


            </div>


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