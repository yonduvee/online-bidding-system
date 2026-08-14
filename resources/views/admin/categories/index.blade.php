<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Categories | BidZone Admin</title>


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

            -webkit-backdrop-filter:
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

            color: #ffffff;

            border-color:
                #ef4444;

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


        .page-header {
            display: flex;

            justify-content: space-between;

            align-items: center;

            gap: 20px;

            margin-bottom: 28px;
        }


        .page-header h1 {
            margin: 0;

            color:
                var(--text-primary);

            font-size: 34px;

            font-weight: 900;

            letter-spacing: -1px;
        }


        .page-header p {
            margin:
                7px 0 0;

            color:
                var(--text-muted);
        }


        /* =========================================================
           ADD BUTTON
        ========================================================= */

        .add-btn {
            min-height: 46px;

            display: inline-flex;

            align-items: center;

            justify-content: center;

            padding:
                11px 19px;

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
                transform .2s ease,
                box-shadow .2s ease;
        }


        .add-btn:hover {
            color:
                #111827;

            transform:
                translateY(-2px);

            box-shadow:
                0 10px 28px
                rgba(245, 158, 11, .20);
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

            border-radius: 12px;
        }


        .alert-danger {
            background:
                rgba(239, 68, 68, .10);

            color:
                #fca5a5;

            border:
                1px solid
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
           TABLE CARD
        ========================================================= */

        .table-card {
            overflow: hidden;

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


        .table-card-header h5 i {
            color:
                var(--accent);
        }


        .category-count {
            padding:
                6px 11px;

            background:
                var(--surface-light);

            color:
                var(--text-muted);

            border:
                1px solid
                var(--border-color);

            border-radius:
                999px;

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


        .table strong {
            color:
                var(--text-primary);
        }


        /* =========================================================
           CATEGORY ICON
        ========================================================= */

        .category-icon {
            width: 44px;
            height: 44px;

            flex-shrink: 0;

            display: flex;

            align-items: center;

            justify-content: center;

            border-radius: 12px;

            background:
                rgba(245, 158, 11, .10);

            color:
                var(--accent);

            border:
                1px solid
                rgba(245, 158, 11, .20);

            box-shadow:
                0 8px 22px
                rgba(245, 158, 11, .05);
        }


        /* =========================================================
           SLUG
        ========================================================= */

        .slug-code {
            display: inline-block;

            padding:
                6px 9px;

            border:
                1px solid
                var(--border-color);

            border-radius: 8px;

            background:
                var(--surface-light);

            color:
                var(--cyan);

            font-size: 12px;
        }


        html[data-theme="light"]
        .slug-code {
            color:
                #0e7490;
        }


        /* =========================================================
           STATUS
        ========================================================= */

        .status-badge {
            display: inline-flex;

            align-items: center;

            gap: 5px;

            padding:
                6px 10px;

            border-radius:
                999px;

            font-size: 9px;

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


        .status-inactive {
            background:
                rgba(239, 68, 68, .11);

            color:
                #fca5a5;

            border:
                1px solid
                rgba(239, 68, 68, .22);
        }


        html[data-theme="light"]
        .status-active {
            background:
                #dcfce7;

            color:
                #166534;
        }


        html[data-theme="light"]
        .status-inactive {
            background:
                #fee2e2;

            color:
                #991b1b;
        }


        /* =========================================================
           ACTIONS
        ========================================================= */

        .action-group {
            display: flex;

            flex-wrap: wrap;

            gap: 7px;
        }


        .action-btn {
            width: 35px;
            height: 35px;

            display: inline-flex;

            align-items: center;

            justify-content: center;

            padding: 0;

            border-radius: 9px;

            transition:
                .2s ease;
        }


        .edit-btn {
            background:
                var(--surface-light);

            color:
                var(--text-primary);

            border:
                1px solid
                var(--border-color);
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


        .deactivate-btn {
            background:
                rgba(245, 158, 11, .08);

            color:
                #fbbf24;

            border:
                1px solid
                rgba(245, 158, 11, .20);
        }


        .deactivate-btn:hover {
            background:
                var(--accent);

            color:
                #111827;

            border-color:
                var(--accent);

            transform:
                translateY(-2px);
        }


        .activate-btn {
            background:
                rgba(34, 197, 94, .08);

            color:
                #86efac;

            border:
                1px solid
                rgba(34, 197, 94, .20);
        }


        .activate-btn:hover {
            background:
                #22c55e;

            color: #ffffff;

            border-color:
                #22c55e;

            transform:
                translateY(-2px);
        }


        .delete-btn {
            background:
                rgba(239, 68, 68, .08);

            color:
                #f87171;

            border:
                1px solid
                rgba(239, 68, 68, .20);
        }


        .delete-btn:hover {
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
           EMPTY
        ========================================================= */

        .empty-box {
            padding:
                75px 20px;

            text-align: center;
        }


        .empty-icon {
            width: 80px;
            height: 80px;

            display: flex;

            align-items: center;

            justify-content: center;

            margin:
                0 auto 18px;

            border-radius: 20px;

            background:
                rgba(245, 158, 11, .10);

            color:
                var(--accent);

            border:
                1px solid
                rgba(245, 158, 11, .20);

            font-size: 32px;
        }


        .empty-box h4 {
            color:
                var(--text-primary);
        }


        .empty-box .text-muted {
            color:
                var(--text-muted)
                !important;
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


            .page-header {
                flex-direction: column;

                align-items: flex-start;
            }


            .add-btn {
                width: 100%;
            }


            .table-card-header {
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


        <a
            href="{{ route('admin.categories.index') }}"
            class="active"
        >

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

            <h4>
                Category Management
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
         PAGE HEADER
    ====================================================== -->

    <div class="page-header">


        <div>

            <h1>
                Categories
            </h1>

            <p>
                Manage auction product categories.
            </p>

        </div>


        <a
            href="{{ route('admin.categories.create') }}"
            class="btn add-btn"
        >

            <i class="fa-solid fa-plus me-2"></i>

            Add Category

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


    <!-- =====================================================
         TABLE CARD
    ====================================================== -->

    <div class="table-card">


        @if($categories->count())


            <div class="table-card-header">


                <h5>

                    <i class="fa-solid fa-layer-group me-2"></i>

                    Auction Categories

                </h5>


                <div class="category-count">

                    {{ $categories->count() }}

                    {{ $categories->count() === 1
                        ? 'Category'
                        : 'Categories'
                    }}

                </div>


            </div>


            <div class="table-responsive">


                <table class="table align-middle">


                    <thead>

                        <tr>

                            <th>
                                Category
                            </th>

                            <th>
                                Slug
                            </th>

                            <th>
                                Auctions
                            </th>

                            <th>
                                Status
                            </th>

                            <th>
                                Created
                            </th>

                            <th>
                                Actions
                            </th>

                        </tr>

                    </thead>


                    <tbody>


                        @foreach(
                            $categories
                            as $category
                        )


                            <tr>


                                <!-- CATEGORY -->

                                <td>


                                    <div
                                        class="
                                            d-flex
                                            align-items-center
                                            gap-3
                                        "
                                    >


                                        <div class="category-icon">

                                            <i
                                                class="
                                                    fa-solid
                                                    fa-layer-group
                                                "
                                            ></i>

                                        </div>


                                        <div>


                                            <strong>

                                                {{ $category->name }}

                                            </strong>


                                            @if($category->description)


                                                <div
                                                    class="
                                                        small
                                                        text-muted
                                                        mt-1
                                                    "
                                                >

                                                    {{ \Illuminate\Support\Str::limit(
                                                        $category->description,
                                                        50
                                                    ) }}

                                                </div>


                                            @endif


                                        </div>


                                    </div>


                                </td>


                                <!-- SLUG -->

                                <td>

                                    <code class="slug-code">

                                        {{ $category->slug }}

                                    </code>

                                </td>


                                <!-- AUCTION COUNT -->

                                <td>

                                    <strong>

                                        {{ $category->auctions_count }}

                                    </strong>

                                </td>


                                <!-- STATUS -->

                                <td>


                                    @if($category->is_active)


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
                                                "
                                                style="font-size:6px;"
                                            ></i>

                                            Active

                                        </span>


                                    @else


                                        <span
                                            class="
                                                status-badge
                                                status-inactive
                                            "
                                        >

                                            <i class="fa-solid fa-ban"></i>

                                            Inactive

                                        </span>


                                    @endif


                                </td>


                                <!-- CREATED -->

                                <td>

                                    {{ $category
                                        ->created_at
                                        ->format('d M Y')
                                    }}

                                </td>


                                <!-- ACTIONS -->

                                <td>


                                    <div class="action-group">


                                        <!-- EDIT -->

                                        <a
                                            href="{{ route(
                                                'admin.categories.edit',
                                                $category
                                            ) }}"
                                            class="
                                                btn
                                                btn-sm
                                                action-btn
                                                edit-btn
                                            "
                                            title="Edit category"
                                        >

                                            <i class="fa-solid fa-pen"></i>

                                        </a>


                                        <!-- STATUS -->

                                        <form
                                            method="POST"
                                            action="{{ route(
                                                'admin.categories.toggle-status',
                                                $category
                                            ) }}"
                                            class="m-0"
                                        >

                                            @csrf
                                            @method('PATCH')


                                            <button
                                                type="submit"
                                                class="
                                                    btn
                                                    btn-sm
                                                    action-btn

                                                    {{ $category->is_active
                                                        ? 'deactivate-btn'
                                                        : 'activate-btn'
                                                    }}
                                                "

                                                title="{{ $category->is_active
                                                    ? 'Deactivate category'
                                                    : 'Activate category'
                                                }}"
                                            >


                                                @if($category->is_active)


                                                    <i
                                                        class="
                                                            fa-solid
                                                            fa-eye-slash
                                                        "
                                                    ></i>


                                                @else


                                                    <i
                                                        class="
                                                            fa-solid
                                                            fa-eye
                                                        "
                                                    ></i>


                                                @endif


                                            </button>


                                        </form>


                                        <!-- DELETE -->

                                        <form
                                            method="POST"
                                            action="{{ route(
                                                'admin.categories.destroy',
                                                $category
                                            ) }}"
                                            class="m-0"

                                            onsubmit="
                                                return confirm(
                                                    'Are you sure you want to delete this category?'
                                                );
                                            "
                                        >

                                            @csrf
                                            @method('DELETE')


                                            <button
                                                type="submit"
                                                class="
                                                    btn
                                                    btn-sm
                                                    action-btn
                                                    delete-btn
                                                "
                                                title="Delete category"
                                            >

                                                <i
                                                    class="
                                                        fa-solid
                                                        fa-trash
                                                    "
                                                ></i>

                                            </button>


                                        </form>


                                    </div>


                                </td>


                            </tr>


                        @endforeach


                    </tbody>


                </table>


            </div>


        @else


            <!-- =================================================
                 EMPTY
            ================================================== -->

            <div class="empty-box">


                <div class="empty-icon">

                    <i class="fa-solid fa-layer-group"></i>

                </div>


                <h4 class="fw-bold">

                    No Categories

                </h4>


                <p class="text-muted">

                    Create your first auction category.

                </p>


                <a
                    href="{{ route('admin.categories.create') }}"
                    class="btn add-btn mt-2"
                >

                    <i class="fa-solid fa-plus me-2"></i>

                    Add Category

                </a>


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