<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>My Auctions | BidZone</title>


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

            color: #ffffff;

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

            align-items: center;

            flex-wrap: wrap;

            gap: 18px;

            margin-bottom: 27px;
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

            color:
                #111827;

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


        /* =========================================================
           ALERTS
        ========================================================= */

        .alert-success {
            background:
                rgba(34,197,94,.10);

            color:
                #86efac;

            border:
                1px solid
                rgba(34,197,94,.22);

            border-radius:
                12px;
        }


        .alert-danger {
            background:
                rgba(239,68,68,.10);

            color:
                #fca5a5;

            border:
                1px solid
                rgba(239,68,68,.22);

            border-radius:
                12px;
        }


        .alert-secondary {
            background:
                rgba(148,163,184,.09);

            color:
                var(--text-muted);

            border:
                1px solid
                var(--border-color);

            border-radius:
                11px;
        }


        html[data-theme="light"]
        .alert-success,
        html[data-theme="light"]
        .alert-danger {
            color:
                inherit;
        }


        /* =========================================================
           AUCTION CARD
        ========================================================= */

        .auction-card {
            position: relative;

            overflow: hidden;

            height: 100%;

            display: flex;

            flex-direction: column;

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

            height: 80px;

            background:
                linear-gradient(
                    transparent,
                    rgba(13,16,24,.28)
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

            font-size: 43px;
        }


        /* =========================================================
           STATUS
        ========================================================= */

        .status-badge {
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

            backdrop-filter:
                blur(10px);

            font-size: 9px;

            font-weight: 900;

            letter-spacing: .5px;

            text-transform: uppercase;

            box-shadow:
                0 5px 15px
                rgba(0,0,0,.12);
        }


        .status-pending {
            background:
                rgba(245,158,11,.88);

            color:
                #111827;
        }


        .status-scheduled {
            background:
                rgba(56,189,248,.88);

            color:
                #082f49;
        }


        .status-active {
            background:
                rgba(34,197,94,.90);

            color:
                #052e16;
        }


        .status-ended {
            background:
                rgba(100,116,139,.92);

            color:
                #ffffff;
        }


        .status-rejected {
            background:
                rgba(239,68,68,.92);

            color:
                #ffffff;
        }


        .status-cancelled {
            background:
                rgba(100,116,139,.92);

            color:
                #ffffff;
        }


        /* =========================================================
           CARD BODY
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
            margin-top: 7px;

            color:
                var(--text-primary);

            font-size: 20px;

            font-weight: 900;

            line-height: 1.35;
        }


        .auction-description {
            min-height: 42px;

            margin-top: 8px;

            color:
                var(--text-muted)
                !important;

            line-height: 1.55;
        }


        /* =========================================================
           PRICE
        ========================================================= */

        .price-label {
            color:
                var(--text-muted);

            font-size: 11px;

            font-weight: 700;
        }


        .price {
            margin-top: 2px;

            color:
                var(--accent);

            font-size: 25px;

            font-weight: 900;
        }


        /* =========================================================
           INFO
        ========================================================= */

        .auction-info {
            margin-top: 17px;

            padding:
                3px 14px;

            background:
                var(--surface-light);

            border:
                1px solid
                var(--border-color);

            border-radius:
                12px;
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


        /* =========================================================
           PENDING
        ========================================================= */

        .pending-box {
            margin-top: 16px;

            padding: 14px;

            background:
                rgba(245,158,11,.08);

            color:
                var(--text-primary);

            border:
                1px solid
                rgba(245,158,11,.20);

            border-radius: 12px;
        }


        .pending-box i {
            color:
                var(--accent);
        }


        .pending-box .text-muted {
            color:
                var(--text-muted)
                !important;
        }


        /* =========================================================
           REJECTION
        ========================================================= */

        .rejection-box {
            margin-top: 16px;

            padding: 15px;

            background:
                rgba(239,68,68,.08);

            color:
                #fca5a5;

            border:
                1px solid
                rgba(239,68,68,.20);

            border-radius: 12px;

            line-height: 1.5;
        }


        html[data-theme="light"]
        .rejection-box {
            background:
                #fef2f2;

            color:
                #991b1b;

            border-color:
                #fecaca;
        }


        /* =========================================================
           ACTION AREA
        ========================================================= */

        .action-area {
            margin-top: auto;

            padding-top: 18px;

            border-top:
                1px solid
                var(--border-color);
        }


        .edit-btn {
            min-height: 42px;

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

            font-weight: 800;

            transition:
                .2s ease;
        }


        .edit-btn:hover {
            background:
                var(--accent);

            color:
                #111827;

            border-color:
                var(--accent);

            transform:
                translateY(-2px);
        }


        .delete-btn {
            min-height: 42px;

            border:
                1px solid
                rgba(239,68,68,.28);

            border-radius: 10px;

            background:
                rgba(239,68,68,.07);

            color:
                #f87171;

            font-weight: 800;

            transition:
                .2s ease;
        }


        .delete-btn:hover {
            background:
                #ef4444;

            color:
                #ffffff;

            border-color:
                #ef4444;
        }


        .resubmit-btn {
            min-height: 43px;

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


        .resubmit-btn:hover {
            color:
                #111827;

            transform:
                translateY(-2px);

            box-shadow:
                0 8px 22px
                rgba(245,158,11,.18);
        }


        .view-btn {
            min-height: 43px;

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
           EMPTY
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

            border-radius: 20px;

            background:
                rgba(245,158,11,.10);

            color:
                var(--accent);

            border:
                1px solid
                rgba(245,158,11,.20);

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


            .page-header {
                flex-direction: column;

                align-items: flex-start;
            }


            .create-btn {
                width: 100%;
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
                align-items: flex-start;

                flex-direction: column;

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


        <a
            href="{{ route('seller.auctions.index') }}"
            class="active"
        >

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
                My Auctions
            </h4>

            <div class="topbar-subtitle">
                Manage and monitor your auction listings
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


        <div>

            <h1 class="page-title">

                My Auctions

            </h1>


            <p class="page-subtitle">

                Manage your submitted auctions,
                review their status and take action
                when required.

            </p>

        </div>


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


    </div>


    <!-- =====================================================
         MESSAGES
    ====================================================== -->

    @if(session('success'))


        <div class="alert alert-success">

            <i class="fa-solid fa-circle-check me-2"></i>

            {{ session('success') }}

        </div>


    @endif


    @if(session('error'))


        <div class="alert alert-danger">

            <i class="fa-solid fa-circle-exclamation me-2"></i>

            {{ session('error') }}

        </div>


    @endif


    @if($errors->any())


        <div class="alert alert-danger">


            <div class="fw-bold mb-2">

                <i class="fa-solid fa-triangle-exclamation me-2"></i>

                Please fix the following:

            </div>


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


    <!-- =====================================================
         AUCTIONS
    ====================================================== -->

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


                            <!-- DESCRIPTION -->

                            <p
                                class="
                                    auction-description
                                    small
                                    mb-0
                                "
                            >

                                {{ \Illuminate\Support\Str::limit(
                                    $auction->description,
                                    90
                                ) }}

                            </p>


                            <!-- CURRENT PRICE -->

                            <div class="mt-3">


                                <div class="price-label">

                                    {{
                                        $auction->status === 'ended'
                                            ? 'Final Price'
                                            : 'Current Price'
                                    }}

                                </div>


                                <div class="price">

                                    ৳{{ number_format(
                                        $auction->current_price,
                                        2
                                    ) }}

                                </div>


                            </div>


                            <!-- =================================
                                 INFORMATION
                            ================================== -->

                            <div class="auction-info">


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
                                        Bid Increment
                                    </span>

                                    <strong>

                                        ৳{{ number_format(
                                            $auction->bid_increment,
                                            2
                                        ) }}

                                    </strong>

                                </div>


                                <div class="info-row">

                                    <span>
                                        Total Bids
                                    </span>

                                    <strong>

                                        {{ $auction->bids_count }}

                                    </strong>

                                </div>


                                <div class="info-row">

                                    <span>
                                        Start
                                    </span>

                                    <strong>

                                        {{ $auction
                                            ->start_time
                                            ->format(
                                                'd M Y, h:i A'
                                            )
                                        }}

                                    </strong>

                                </div>


                                <div class="info-row">

                                    <span>
                                        End
                                    </span>

                                    <strong>

                                        {{ $auction
                                            ->end_time
                                            ->format(
                                                'd M Y, h:i A'
                                            )
                                        }}

                                    </strong>

                                </div>


                            </div>


                            <!-- =================================
                                 PENDING
                            ================================== -->

                            @if(
                                $auction->status
                                === 'pending'
                            )


                                <div class="pending-box">


                                    <div class="fw-bold">

                                        <i class="fa-regular fa-clock me-2"></i>

                                        Waiting for Admin Approval

                                    </div>


                                </div>


                            @endif


                            <!-- =================================
                                 REJECTED
                            ================================== -->

                            @if(
                                $auction->status
                                === 'rejected'
                            )


                                <div class="rejection-box">


                                    <div class="fw-bold mb-2">

                                        <i class="fa-solid fa-circle-xmark me-2"></i>

                                        Rejected by Admin

                                    </div>


                                    <div class="small">

                                        <strong>
                                            Reason:
                                        </strong>

                                        {{ $auction->rejection_reason
                                            ??
                                            'No reason was provided.'
                                        }}

                                    </div>


                                </div>


                            @endif


                            <!-- =================================
                                 WINNER
                            ================================== -->

                            @if(
                                $auction->status
                                === 'ended'
                            )


                                @if($auction->winner)


                                    <div class="pending-box">


                                        <small class="text-muted">

                                            Winner

                                        </small>


                                        <div class="fw-bold mt-1">

                                            <i
                                                class="
                                                    fa-solid
                                                    fa-trophy
                                                    me-2
                                                "
                                            ></i>

                                            {{ $auction
                                                ->winner
                                                ->name
                                            }}

                                        </div>


                                    </div>


                                @else


                                    <div
                                        class="
                                            alert
                                            alert-secondary
                                            mt-3
                                            mb-0
                                        "
                                    >

                                        <i class="fa-solid fa-circle-info me-2"></i>

                                        Auction ended without a winner.

                                    </div>


                                @endif


                            @endif


                            <!-- =================================
                                 ACTIONS
                            ================================== -->

                            <div class="action-area">


                                @if(
                                    in_array(
                                        $auction->status,
                                        [
                                            'pending',
                                            'rejected'
                                        ]
                                    )
                                )


                                    <div
                                        class="
                                            d-flex
                                            gap-2
                                            flex-wrap
                                        "
                                    >


                                        <!-- EDIT -->

                                        <a
                                            href="{{ route(
                                                'seller.auctions.edit',
                                                $auction
                                            ) }}"

                                            class="
                                                btn
                                                edit-btn
                                                flex-fill
                                            "
                                        >

                                            <i class="fa-solid fa-pen me-2"></i>

                                            Edit

                                        </a>


                                        <!-- DELETE -->

                                        <form
                                            method="POST"

                                            action="{{ route(
                                                'seller.auctions.destroy',
                                                $auction
                                            ) }}"

                                            class="flex-fill"

                                            onsubmit="
                                                return confirm(
                                                    'Are you sure you want to delete this auction?'
                                                );
                                            "
                                        >

                                            @csrf
                                            @method('DELETE')


                                            <button
                                                type="submit"

                                                class="
                                                    btn
                                                    delete-btn
                                                    w-100
                                                "
                                            >

                                                <i class="fa-solid fa-trash me-2"></i>

                                                Delete

                                            </button>


                                        </form>


                                    </div>


                                    <!-- RESUBMIT -->

                                    @if(
                                        $auction->status
                                        === 'rejected'
                                    )


                                        <form
                                            method="POST"

                                            action="{{ route(
                                                'seller.auctions.resubmit',
                                                $auction
                                            ) }}"

                                            class="mt-2"
                                        >

                                            @csrf
                                            @method('PATCH')


                                            <button
                                                type="submit"

                                                class="
                                                    btn
                                                    resubmit-btn
                                                    w-100
                                                "

                                                onclick="
                                                    return confirm(
                                                        'Resubmit this auction for admin approval?'
                                                    );
                                                "
                                            >

                                                <i class="fa-solid fa-paper-plane me-2"></i>

                                                Resubmit for Approval

                                            </button>


                                        </form>


                                    @endif


                                @elseif(
                                    in_array(
                                        $auction->status,
                                        [
                                            'scheduled',
                                            'active',
                                            'ended'
                                        ]
                                    )
                                )


                                    <a
                                        href="{{ route(
                                            'auctions.show',
                                            $auction->slug
                                        ) }}"

                                        class="
                                            btn
                                            view-btn
                                            w-100
                                        "
                                    >

                                        <i class="fa-solid fa-eye me-2"></i>

                                        View Auction

                                    </a>


                                @endif


                            </div>


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

                No Auctions Yet

            </h4>


            <p>

                Create your first auction
                to start selling on BidZone.

            </p>


            <a
                href="{{ route(
                    'seller.auctions.create'
                ) }}"

                class="
                    btn
                    create-btn
                    mt-2
                "
            >

                <i class="fa-solid fa-plus me-2"></i>

                Create Auction

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