<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        {{ $auction->title }} | BidZone Admin
    </title>


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
           BACK
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


        html[data-theme="light"]
        .alert-success,
        html[data-theme="light"]
        .alert-danger {
            color:
                inherit;
        }


        /* =========================================================
           MAIN AUCTION CARD
        ========================================================= */

        .main-card,
        .section-card {
            position: relative;

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

            border-radius: 20px;

            box-shadow:
                var(--card-shadow);
        }


        html[data-theme="light"]
        .main-card,
        html[data-theme="light"]
        .section-card {
            background:
                var(--surface);
        }


        .main-card {
            padding: 30px;
        }


        .section-card {
            padding: 25px;

            margin-top: 25px;
        }


        .main-card::after {
            content: "";

            position: absolute;

            width: 270px;
            height: 270px;

            top: -160px;
            right: -120px;

            border-radius: 50%;

            background:
                rgba(103,232,249,.055);

            filter:
                blur(50px);

            pointer-events: none;
        }


        /* =========================================================
           TITLE
        ========================================================= */

        .category-label {
            display: inline-flex;

            align-items: center;

            gap: 7px;

            color:
                var(--accent);

            font-size: 11px;

            font-weight: 900;

            letter-spacing: 1px;

            text-transform: uppercase;
        }


        .page-title {
            margin: 0;

            color:
                var(--text-primary);

            font-size: 36px;

            font-weight: 900;

            letter-spacing: -1px;

            line-height: 1.2;
        }


        /* =========================================================
           STATUS
        ========================================================= */

        .status-badge {
            display: inline-flex;

            align-items: center;

            padding:
                7px 12px;

            border-radius:
                999px;

            font-size: 9px;

            font-weight: 900;

            letter-spacing: .6px;

            text-transform: uppercase;
        }


        .status-pending {
            background:
                rgba(245,158,11,.12);

            color:
                #fbbf24;

            border:
                1px solid
                rgba(245,158,11,.22);
        }


        .status-scheduled {
            background:
                rgba(56,189,248,.12);

            color:
                #7dd3fc;

            border:
                1px solid
                rgba(56,189,248,.22);
        }


        .status-active {
            background:
                rgba(34,197,94,.12);

            color:
                #86efac;

            border:
                1px solid
                rgba(34,197,94,.22);
        }


        .status-ended {
            background:
                rgba(148,163,184,.12);

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


        .status-cancelled {
            background:
                rgba(148,163,184,.10);

            color:
                #cbd5e1;

            border:
                1px solid
                rgba(148,163,184,.18);
        }


        html[data-theme="light"]
        .status-pending {
            background: #fef3c7;
            color: #92400e;
        }


        html[data-theme="light"]
        .status-scheduled {
            background: #dbeafe;
            color: #1e40af;
        }


        html[data-theme="light"]
        .status-active {
            background: #dcfce7;
            color: #166534;
        }


        html[data-theme="light"]
        .status-ended,
        html[data-theme="light"]
        .status-cancelled {
            background: #e5e7eb;
            color: #374151;
        }


        html[data-theme="light"]
        .status-rejected {
            background: #fee2e2;
            color: #991b1b;
        }


        /* =========================================================
           IMAGE GALLERY
        ========================================================= */

        .image-stage {
            position: relative;

            padding: 10px;

            background:
                var(--surface-light);

            border:
                1px solid
                var(--border-color);

            border-radius: 18px;
        }


        .main-image {
            width: 100%;
            height: 440px;

            display: block;

            object-fit: contain;

            background:
                var(--surface-light);

            border-radius: 13px;
        }


        .no-image {
            width: 100%;
            height: 440px;

            display: flex;

            justify-content: center;

            align-items: center;

            background:
                var(--surface-light);

            color:
                var(--text-muted);

            border-radius: 13px;

            font-size: 65px;
        }


        .thumbnails {
            display: flex;

            flex-wrap: wrap;

            gap: 10px;

            margin-top: 13px;
        }


        .thumb {
            width: 82px;
            height: 70px;

            padding: 3px;

            object-fit: cover;

            cursor: pointer;

            background:
                var(--surface-light);

            border:
                2px solid
                var(--border-color);

            border-radius: 10px;

            transition:
                .2s ease;
        }


        .thumb:hover,
        .thumb.active {
            border-color:
                var(--accent);

            transform:
                translateY(-2px);

            box-shadow:
                0 7px 20px
                rgba(245,158,11,.14);
        }


        /* =========================================================
           PRICE PANEL
        ========================================================= */

        .price-panel {
            position: relative;

            overflow: hidden;

            margin-top: 21px;

            padding: 22px;

            color: #ffffff;

            background:
                linear-gradient(
                    135deg,
                    #111827,
                    #151d2d
                );

            border:
                1px solid
                rgba(255,255,255,.07);

            border-radius: 16px;

            box-shadow:
                0 15px 35px
                rgba(0,0,0,.14);
        }


        .price-panel::after {
            content: "";

            position: absolute;

            width: 160px;
            height: 160px;

            right: -80px;
            top: -95px;

            border-radius: 50%;

            background:
                rgba(245,158,11,.12);

            filter:
                blur(15px);
        }


        .price-label {
            position: relative;

            z-index: 2;

            color:
                #9ca3af;

            font-size: 12px;

            font-weight: 700;
        }


        .main-price {
            position: relative;

            z-index: 2;

            margin-top: 4px;

            color:
                var(--accent);

            font-size: 35px;

            font-weight: 900;
        }


        .price-sub {
            position: relative;

            z-index: 2;
        }


        .price-sub small {
            color:
                #8f9bb3;
        }


        /* =========================================================
           INFO GRID
        ========================================================= */

        .info-grid {
            display: grid;

            grid-template-columns:
                repeat(2, 1fr);

            gap: 12px;

            margin-top: 22px;
        }


        .info-box {
            padding: 16px;

            background:
                var(--surface-light);

            border:
                1px solid
                var(--border-color);

            border-radius: 12px;

            transition:
                .2s ease;
        }


        .info-box:hover {
            border-color:
                rgba(245,158,11,.25);
        }


        .info-label {
            margin-bottom: 5px;

            color:
                var(--text-muted);

            font-size: 11px;

            font-weight: 700;
        }


        .info-label i {
            margin-right: 5px;

            color:
                var(--accent);
        }


        .info-value {
            color:
                var(--text-primary);

            font-weight: 800;
        }


        /* =========================================================
           SELLER / HIGHEST BID
        ========================================================= */

        .seller-box {
            margin-top: 20px;

            padding: 18px;

            background:
                var(--surface-light);

            border:
                1px solid
                var(--border-color);

            border-radius: 14px;
        }


        .seller-box .text-muted {
            color:
                var(--text-muted)
                !important;
        }


        .seller-box .fw-bold {
            color:
                var(--text-primary);
        }


        .seller-avatar,
        .bidder-avatar {
            display: flex;

            justify-content: center;

            align-items: center;

            flex-shrink: 0;

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


        .seller-avatar {
            width: 52px;
            height: 52px;

            border-radius: 14px;

            font-size: 20px;
        }


        .bidder-avatar {
            width: 41px;
            height: 41px;

            border-radius: 11px;
        }


        .bid-price {
            color:
                var(--accent);

            font-weight: 900;
        }


        /* =========================================================
           REJECTION
        ========================================================= */

        .rejection-box {
            margin-top: 20px;

            padding: 20px;

            background:
                rgba(239,68,68,.08);

            color:
                #fca5a5;

            border:
                1px solid
                rgba(239,68,68,.20);

            border-radius: 14px;
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
           WINNER
        ========================================================= */

        .winner-card {
            margin-top: 20px;

            padding: 23px;

            text-align: center;

            background:
                linear-gradient(
                    145deg,
                    rgba(245,158,11,.09),
                    rgba(245,158,11,.025)
                );

            border:
                1px solid
                rgba(245,158,11,.24);

            border-radius: 16px;
        }


        .winner-icon {
            width: 66px;
            height: 66px;

            display: flex;

            justify-content: center;

            align-items: center;

            margin:
                0 auto 13px;

            background:
                rgba(245,158,11,.12);

            color:
                var(--accent);

            border:
                1px solid
                rgba(245,158,11,.22);

            border-radius: 18px;

            font-size: 27px;
        }


        .winner-card h4,
        .winner-card h5 {
            color:
                var(--text-primary);
        }


        .winner-card .text-muted {
            color:
                var(--text-muted)
                !important;
        }


        /* =========================================================
           APPROVAL
        ========================================================= */

        .approval-card {
            margin-top: 22px;

            padding: 22px;

            background:
                linear-gradient(
                    145deg,
                    rgba(245,158,11,.08),
                    rgba(255,255,255,.015)
                );

            border:
                1px solid
                rgba(245,158,11,.22);

            border-radius: 16px;
        }


        .approval-card h5 {
            color:
                var(--text-primary);

            font-weight: 900;
        }


        .approval-card h5 i {
            color:
                var(--accent);
        }


        .approval-card .text-muted {
            color:
                var(--text-muted)
                !important;
        }


        .approve-btn {
            min-height: 44px;

            border: none;

            border-radius: 10px;

            background:
                linear-gradient(
                    135deg,
                    #22c55e,
                    #16a34a
                );

            color: #ffffff;

            font-weight: 800;

            transition:
                .2s ease;
        }


        .approve-btn:hover {
            color: #ffffff;

            transform:
                translateY(-2px);

            box-shadow:
                0 10px 25px
                rgba(34,197,94,.18);
        }


        .reject-btn {
            min-height: 44px;

            border-radius: 10px;

            font-weight: 800;

            transition:
                .2s ease;
        }


        .reject-btn:hover {
            transform:
                translateY(-2px);
        }


        /* =========================================================
           PUBLIC VIEW BUTTON
        ========================================================= */

        .public-btn {
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

            border-radius: 11px;

            font-weight: 800;
        }


        .public-btn:hover {
            background:
                var(--accent);

            color:
                #111827;

            border-color:
                var(--accent);
        }


        /* =========================================================
           DESCRIPTION
        ========================================================= */

        .section-title {
            color:
                var(--text-primary);

            font-weight: 900;
        }


        .section-title i {
            color:
                var(--accent);
        }


        .description-text {
            color:
                var(--text-muted);

            line-height: 1.8;

            white-space: pre-line;
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
            padding: 15px;

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
            padding: 15px;

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


        .highest-badge {
            display: inline-flex;

            align-items: center;

            padding:
                6px 9px;

            background:
                rgba(34,197,94,.10);

            color:
                #86efac;

            border:
                1px solid
                rgba(34,197,94,.20);

            border-radius:
                999px;

            font-size: 9px;

            font-weight: 900;

            text-transform: uppercase;
        }


        html[data-theme="light"]
        .highest-badge {
            background:
                #dcfce7;

            color:
                #166534;
        }


        /* =========================================================
           MODAL
        ========================================================= */

        .modal-content {
            overflow: hidden;

            background:
                var(--surface);

            color:
                var(--text-primary);

            border:
                1px solid
                var(--border-color)
                !important;

            box-shadow:
                0 30px 80px
                rgba(0,0,0,.30);
        }


        .modal-header,
        .modal-footer {
            border-color:
                var(--border-color);
        }


        .modal-title {
            color:
                var(--text-primary);
        }


        .modal-body .text-muted {
            color:
                var(--text-muted)
                !important;
        }


        .modal .form-control {
            background:
                var(--surface-light);

            color:
                var(--text-primary);

            border:
                1px solid
                var(--border-color);

            border-radius: 10px;
        }


        .modal .form-control::placeholder {
            color:
                var(--text-muted);
        }


        .modal .form-control:focus {
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


        html[data-theme="dark"]
        .btn-close {
            filter:
                invert(1)
                grayscale(100%)
                brightness(200%);
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


        @media(max-width: 768px) {

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


            .main-card {
                padding: 20px;
            }


            .section-card {
                padding: 20px;
            }


            .main-image,
            .no-image {
                height: 320px;
            }


            .info-grid {
                grid-template-columns:
                    1fr;
            }


            .page-title {
                font-size: 28px;
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


            .main-image,
            .no-image {
                height: 250px;
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


        <a
            href="{{ route('admin.auctions.index') }}"
            class="active"
        >

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
                Auction Review
            </h4>

            <small class="text-muted">

                Review auction details and activity

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
        href="{{ route('admin.auctions.index') }}"
        class="back-link"
    >

        <i class="fa-solid fa-arrow-left"></i>

        Back to Auction Management

    </a>


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


            @foreach($errors->all() as $error)

                <div>
                    {{ $error }}
                </div>

            @endforeach

        </div>

    @endif


    <!-- =====================================================
         MAIN AUCTION
    ====================================================== -->

    <div class="main-card">


        <div class="row g-5">


            <!-- =================================================
                 LEFT IMAGE GALLERY
            ================================================== -->

            <div class="col-lg-6">


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


                <div class="image-stage">


                    @if($primary)


                        <img
                            id="mainImage"

                            src="{{ asset(
                                'storage/'
                                .
                                $primary->image_path
                            ) }}"

                            class="main-image"

                            alt="{{ $auction->title }}"
                        >


                    @else


                        <div class="no-image">

                            <i class="fa-regular fa-image"></i>

                        </div>


                    @endif


                </div>


                @if($auction->images->count() > 1)


                    <div class="thumbnails">


                        @foreach(
                            $auction->images
                            as $image
                        )


                            <img
                                src="{{ asset(
                                    'storage/'
                                    .
                                    $image->image_path
                                ) }}"

                                class="
                                    thumb

                                    {{
                                        $primary
                                        &&
                                        $primary->id
                                        === $image->id
                                            ? 'active'
                                            : ''
                                    }}
                                "

                                onclick="changeImage(this)"

                                alt="Auction image"
                            >


                        @endforeach


                    </div>


                @endif


            </div>


            <!-- =================================================
                 RIGHT DETAILS
            ================================================== -->

            <div class="col-lg-6">


                <!-- CATEGORY -->

                <div class="category-label">

                    <i class="fa-solid fa-layer-group"></i>

                    {{ $auction->category->name }}

                </div>


                <!-- TITLE -->

                <h1 class="page-title mt-2">

                    {{ $auction->title }}

                </h1>


                <!-- STATUS -->

                <div class="mt-3">


                    <span
                        class="
                            status-badge
                            status-{{ $auction->status }}
                        "
                    >

                        {{ $auction->status }}

                    </span>


                </div>


                <!-- =================================================
                     PRICE
                ================================================== -->

                <div class="price-panel">


                    <div class="price-label">

                        {{
                            $auction->status === 'ended'
                                ? 'Final Price'
                                : 'Current Price'
                        }}

                    </div>


                    <div class="main-price">

                        ৳{{ number_format(
                            $auction->current_price,
                            2
                        ) }}

                    </div>


                    <div
                        class="
                            d-flex
                            gap-4
                            mt-3
                            flex-wrap
                            price-sub
                        "
                    >


                        <div>

                            <small>
                                Starting Price
                            </small>

                            <div class="fw-bold mt-1">

                                ৳{{ number_format(
                                    $auction->starting_price,
                                    2
                                ) }}

                            </div>

                        </div>


                        <div>

                            <small>
                                Bid Increment
                            </small>

                            <div class="fw-bold mt-1">

                                ৳{{ number_format(
                                    $auction->bid_increment,
                                    2
                                ) }}

                            </div>

                        </div>


                    </div>


                </div>


                <!-- =================================================
                     INFORMATION
                ================================================== -->

                <div class="info-grid">


                    <div class="info-box">


                        <div class="info-label">

                            <i class="fa-solid fa-gavel"></i>

                            Total Bids

                        </div>


                        <div class="info-value">

                            {{ $auction->bids_count }}

                        </div>


                    </div>


                    <div class="info-box">


                        <div class="info-label">

                            <i class="fa-solid fa-users"></i>

                            Total Bidders

                        </div>


                        <div class="info-value">

                            {{ $totalBidders }}

                        </div>


                    </div>


                    <div class="info-box">


                        <div class="info-label">

                            <i class="fa-regular fa-calendar"></i>

                            Start Time

                        </div>


                        <div class="info-value">

                            {{ $auction
                                ->start_time
                                ->format(
                                    'd M Y, h:i A'
                                )
                            }}

                        </div>


                    </div>


                    <div class="info-box">


                        <div class="info-label">

                            <i class="fa-regular fa-calendar-check"></i>

                            End Time

                        </div>


                        <div class="info-value">

                            {{ $auction
                                ->end_time
                                ->format(
                                    'd M Y, h:i A'
                                )
                            }}

                        </div>


                    </div>


                </div>


                <!-- =================================================
                     SELLER
                ================================================== -->

                <div class="seller-box">


                    <div
                        class="
                            d-flex
                            align-items-center
                            gap-3
                        "
                    >


                        <div class="seller-avatar">

                            {{ strtoupper(
                                substr(
                                    $auction->seller->name,
                                    0,
                                    1
                                )
                            ) }}

                        </div>


                        <div>


                            <div class="small text-muted">

                                Seller

                            </div>


                            <div class="fw-bold">

                                {{ $auction->seller->name }}

                            </div>


                            <div class="small text-muted">

                                {{ $auction->seller->email }}

                            </div>


                        </div>


                    </div>


                </div>


                <!-- =================================================
                     HIGHEST BIDDER
                ================================================== -->

                @if($auction->highestBid)


                    <div class="seller-box">


                        <div class="small text-muted">

                            <i
                                class="
                                    fa-solid
                                    fa-crown
                                    text-warning
                                    me-1
                                "
                            ></i>

                            Current Highest Bidder

                        </div>


                        <div class="fw-bold mt-2">

                            {{ $auction
                                ->highestBid
                                ->bidder
                                ->name
                            }}

                        </div>


                        <div class="bid-price mt-1">

                            ৳{{ number_format(
                                $auction
                                    ->highestBid
                                    ->amount,
                                2
                            ) }}

                        </div>


                    </div>


                @endif


                <!-- =================================================
                     REJECTION REASON
                ================================================== -->

                @if(
                    $auction->status === 'rejected'
                    &&
                    $auction->rejection_reason
                )


                    <div class="rejection-box">


                        <h6 class="fw-bold">

                            <i class="fa-solid fa-circle-xmark me-2"></i>

                            Rejection Reason

                        </h6>


                        <div>

                            {{ $auction->rejection_reason }}

                        </div>


                    </div>


                @endif


                <!-- =================================================
                     WINNER
                ================================================== -->

                @if($auction->status === 'ended')


                    <div class="winner-card">


                        @if($auction->winner)


                            <div class="winner-icon">

                                <i class="fa-solid fa-trophy"></i>

                            </div>


                            <div class="small text-muted">

                                Auction Winner

                            </div>


                            <h4 class="fw-bold mt-1">

                                {{ $auction->winner->name }}

                            </h4>


                            <div class="bid-price">

                                ৳{{ number_format(
                                    $auction->current_price,
                                    2
                                ) }}

                            </div>


                        @else


                            <div class="winner-icon">

                                <i class="fa-solid fa-gavel"></i>

                            </div>


                            <h5 class="fw-bold">

                                No Winner

                            </h5>


                            <div class="text-muted">

                                No valid bids were placed.

                            </div>


                        @endif


                    </div>


                @endif


                <!-- =================================================
                     APPROVE / REJECT
                ================================================== -->

                @if($auction->status === 'pending')


                    <div class="approval-card">


                        <h5>

                            <i class="fa-solid fa-clipboard-check me-2"></i>

                            Auction Approval

                        </h5>


                        <p class="text-muted">

                            Review the auction information
                            before approving or rejecting it.

                        </p>


                        <div class="d-flex gap-2 flex-wrap">


                            <!-- APPROVE -->

                            <form
                                method="POST"

                                action="{{ route(
                                    'admin.auctions.approve',
                                    $auction
                                ) }}"

                                onsubmit="
                                    return confirm(
                                        'Approve this auction?'
                                    );
                                "
                            >

                                @csrf
                                @method('PATCH')


                                <button
                                    type="submit"

                                    class="
                                        btn
                                        approve-btn
                                        px-4
                                    "
                                >

                                    <i class="fa-solid fa-check me-2"></i>

                                    Approve Auction

                                </button>


                            </form>


                            <!-- REJECT -->

                            <button
                                type="button"

                                class="
                                    btn
                                    btn-danger
                                    reject-btn
                                    px-4
                                "

                                data-bs-toggle="modal"

                                data-bs-target="#rejectModal"
                            >

                                <i class="fa-solid fa-xmark me-2"></i>

                                Reject Auction

                            </button>


                        </div>


                    </div>


                @endif


                <!-- =================================================
                     PUBLIC PAGE
                ================================================== -->

                @if(
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

                        target="_blank"

                        class="
                            btn
                            public-btn
                            w-100
                            mt-3
                        "
                    >

                        <i
                            class="
                                fa-solid
                                fa-arrow-up-right-from-square
                                me-2
                            "
                        ></i>

                        Open Public Auction Page

                    </a>


                @endif


            </div>


        </div>


    </div>


    <!-- =====================================================
         DESCRIPTION
    ====================================================== -->

    <div class="section-card">


        <h4 class="section-title mb-3">

            <i class="fa-solid fa-align-left me-2"></i>

            Description

        </h4>


        <div class="description-text">

            {{ $auction->description }}

        </div>


    </div>


    <!-- =====================================================
         BID HISTORY
    ====================================================== -->

    <div class="section-card">


        <div
            class="
                d-flex
                justify-content-between
                align-items-center
                flex-wrap
                gap-2
                mb-3
            "
        >


            <h4 class="section-title mb-0">

                <i class="fa-solid fa-gavel me-2"></i>

                Bid History

            </h4>


            <div class="text-theme-muted">

                {{ $auction->bids_count }}

                {{
                    $auction->bids_count === 1
                        ? 'Bid'
                        : 'Bids'
                }}

            </div>


        </div>


        <div class="table-responsive">


            <table class="table align-middle">


                <thead>


                    <tr>

                        <th>Bidder</th>

                        <th>Bid Amount</th>

                        <th>Position</th>

                        <th>Date</th>

                        <th>Time</th>

                    </tr>


                </thead>


                <tbody>


                    @forelse(
                        $auction->bids
                        as $bid
                    )


                        @php

                            $isHighest =
                                $auction->highestBid
                                &&
                                (int)
                                $auction->highestBid->id
                                ===
                                (int)
                                $bid->id;

                        @endphp


                        <tr>


                            <!-- BIDDER -->

                            <td>


                                <div
                                    class="
                                        d-flex
                                        align-items-center
                                        gap-3
                                    "
                                >


                                    <div class="bidder-avatar">

                                        {{ strtoupper(
                                            substr(
                                                $bid->bidder->name,
                                                0,
                                                1
                                            )
                                        ) }}

                                    </div>


                                    <div>


                                        <strong>

                                            {{ $bid->bidder->name }}

                                        </strong>


                                        <div class="small text-muted">

                                            {{ $bid->bidder->email }}

                                        </div>


                                    </div>


                                </div>


                            </td>


                            <!-- BID AMOUNT -->

                            <td>


                                <span class="bid-price">

                                    ৳{{ number_format(
                                        $bid->amount,
                                        2
                                    ) }}

                                </span>


                            </td>


                            <!-- POSITION -->

                            <td>


                                @if(
                                    $auction->status === 'ended'
                                    &&
                                    $auction->winner_id
                                    === $bid->user_id
                                    &&
                                    $isHighest
                                )


                                    <span class="highest-badge">

                                        <i class="fa-solid fa-trophy me-1"></i>

                                        Winning Bid

                                    </span>


                                @elseif($isHighest)


                                    <span class="highest-badge">

                                        <i class="fa-solid fa-crown me-1"></i>

                                        Highest

                                    </span>


                                @else


                                    <span class="text-muted small">

                                        Outbid

                                    </span>


                                @endif


                            </td>


                            <!-- DATE -->

                            <td>

                                {{ $bid
                                    ->created_at
                                    ->format('d M Y')
                                }}

                            </td>


                            <!-- TIME -->

                            <td>

                                {{ $bid
                                    ->created_at
                                    ->format('h:i:s A')
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
                                        fa-solid
                                        fa-gavel
                                        d-block
                                        mb-3
                                    "

                                    style="font-size:35px;"
                                ></i>

                                No bids have been placed
                                on this auction.

                            </td>


                        </tr>


                    @endforelse


                </tbody>


            </table>


        </div>


    </div>


</div>


<!-- =========================================================
     REJECT MODAL
========================================================= -->

@if($auction->status === 'pending')


<div
    class="modal fade"
    id="rejectModal"
    tabindex="-1"
    aria-hidden="true"
>


    <div class="modal-dialog modal-dialog-centered">


        <div class="modal-content rounded-4">


            <form
                method="POST"

                action="{{ route(
                    'admin.auctions.reject',
                    $auction
                ) }}"
            >

                @csrf
                @method('PATCH')


                <!-- MODAL HEADER -->

                <div class="modal-header">


                    <h5 class="modal-title fw-bold">

                        <i
                            class="
                                fa-solid
                                fa-circle-xmark
                                text-danger
                                me-2
                            "
                        ></i>

                        Reject Auction

                    </h5>


                    <button
                        type="button"

                        class="btn-close"

                        data-bs-dismiss="modal"

                        aria-label="Close"
                    ></button>


                </div>


                <!-- MODAL BODY -->

                <div class="modal-body">


                    <p class="text-muted">

                        Please provide a clear reason
                        for rejecting this auction.

                    </p>


                    <label class="form-label fw-bold">

                        Rejection Reason

                    </label>


                    <textarea
                        name="rejection_reason"

                        class="form-control"

                        rows="5"

                        minlength="10"

                        maxlength="1000"

                        required

                        placeholder="Example: The auction information is incomplete or the uploaded images are unclear."
                    >{{ old('rejection_reason') }}</textarea>


                    <div class="small text-muted mt-2">

                        Minimum 10 characters.

                    </div>


                </div>


                <!-- MODAL FOOTER -->

                <div class="modal-footer">


                    <button
                        type="button"

                        class="
                            btn
                            btn-outline-secondary
                        "

                        data-bs-dismiss="modal"
                    >

                        Cancel

                    </button>


                    <button
                        type="submit"

                        class="
                            btn
                            btn-danger
                            fw-bold
                        "
                    >

                        <i class="fa-solid fa-xmark me-2"></i>

                        Reject Auction

                    </button>


                </div>


            </form>


        </div>


    </div>


</div>


@endif


<!-- =========================================================
     BOOTSTRAP JS
========================================================= -->

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
></script>


<!-- =========================================================
     BIDZONE THEME
========================================================= -->

<script
    src="{{ asset('js/bidzone-theme.js') }}"
></script>


<!-- =========================================================
     IMAGE GALLERY
========================================================= -->

<script>

    function changeImage(image) {

        const mainImage =
            document.getElementById(
                'mainImage'
            );

        if (!mainImage) {
            return;
        }


        mainImage.src =
            image.src;


        document
            .querySelectorAll('.thumb')
            .forEach(function (thumb) {

                thumb
                    .classList
                    .remove('active');

            });


        image
            .classList
            .add('active');

    }

</script>


</body>

</html>