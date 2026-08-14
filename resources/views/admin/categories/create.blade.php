<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Add Category | BidZone Admin</title>


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

            color:
                #ffffff;

            border-color:
                #ef4444;

            transform:
                translateY(-2px);
        }


        /* =========================================================
           PAGE
        ========================================================= */

        .content-wrapper {
            max-width: 900px;

            margin:
                0 auto;
        }


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
           FORM CARD
        ========================================================= */

        .form-card {
            position: relative;

            overflow: hidden;

            padding:
                35px;

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
        .form-card {
            background:
                var(--surface);
        }


        .form-card::before {
            content: "";

            position: absolute;

            width: 250px;
            height: 250px;

            top: -150px;
            right: -100px;

            border-radius: 50%;

            background:
                rgba(103, 232, 249, .07);

            filter:
                blur(45px);

            pointer-events: none;
        }


        .form-card-header {
            position: relative;

            z-index: 2;

            margin-bottom:
                30px;
        }


        .header-icon {
            width: 52px;
            height: 52px;

            display: flex;

            align-items: center;

            justify-content: center;

            margin-bottom: 18px;

            border-radius: 14px;

            background:
                rgba(245, 158, 11, .10);

            color:
                var(--accent);

            border:
                1px solid
                rgba(245, 158, 11, .20);

            font-size: 21px;
        }


        .form-card h2 {
            margin: 0;

            color:
                var(--text-primary);

            font-size: 31px;

            font-weight: 900;

            letter-spacing: -.8px;
        }


        .form-description {
            max-width: 600px;

            margin:
                8px 0 0;

            color:
                var(--text-muted);

            line-height: 1.6;
        }


        /* =========================================================
           FORM
        ========================================================= */

        .form-label {
            color:
                var(--text-primary);

            font-weight: 800;
        }


        .required-star {
            color:
                #f87171;
        }


        .form-control {
            min-height: 51px;

            background:
                var(--surface-light);

            color:
                var(--text-primary);

            border:
                1px solid
                var(--border-color);

            border-radius: 11px;

            transition:
                .2s ease;
        }


        textarea.form-control {
            min-height: 145px;

            resize: vertical;
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


        .field-help {
            margin-top: 7px;

            color:
                var(--text-muted);

            font-size: 12px;
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
           ACTION BUTTONS
        ========================================================= */

        .form-actions {
            display: flex;

            justify-content: flex-end;

            gap: 10px;

            margin-top: 30px;

            padding-top: 25px;

            border-top:
                1px solid
                var(--border-color);
        }


        .cancel-btn {
            min-height: 46px;

            display: inline-flex;

            align-items: center;

            justify-content: center;

            padding:
                10px 20px;

            background:
                var(--surface-light);

            color:
                var(--text-primary);

            border:
                1px solid
                var(--border-color);

            border-radius: 10px;

            font-weight: 800;
        }


        .cancel-btn:hover {
            color:
                var(--accent);

            background:
                var(--surface-light);

            border-color:
                var(--accent);
        }


        .save-btn {
            min-height: 46px;

            display: inline-flex;

            align-items: center;

            justify-content: center;

            padding:
                10px 22px;

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
                transform .2s ease,
                box-shadow .2s ease;
        }


        .save-btn:hover {
            color:
                #111827;

            transform:
                translateY(-2px);

            box-shadow:
                0 10px 28px
                rgba(245,158,11,.20);
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


            .form-card {
                padding: 25px 20px;
            }


            .form-actions {
                flex-direction: column-reverse;
            }


            .form-actions .btn {
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
                Add Category
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


    <div class="content-wrapper">


        <!-- BACK -->

        <a
            href="{{ route('admin.categories.index') }}"
            class="back-link"
        >

            <i class="fa-solid fa-arrow-left"></i>

            Back to Categories

        </a>


        <!-- =================================================
             FORM CARD
        ================================================== -->

        <div class="form-card">


            <div class="form-card-header">


                <div class="header-icon">

                    <i class="fa-solid fa-layer-group"></i>

                </div>


                <h2>
                    Add New Category
                </h2>


                <p class="form-description">

                    Create a category that sellers can use
                    when submitting auctions.

                </p>


            </div>


            <!-- =============================================
                 VALIDATION ERRORS
            ============================================== -->

            @if($errors->any())


                <div class="alert alert-danger">


                    <div class="fw-bold mb-2">

                        <i
                            class="
                                fa-solid
                                fa-circle-exclamation
                                me-2
                            "
                        ></i>

                        Please fix the following:

                    </div>


                    <ul class="mb-0">


                        @foreach(
                            $errors->all()
                            as $error
                        )


                            <li>

                                {{ $error }}

                            </li>


                        @endforeach


                    </ul>


                </div>


            @endif


            <!-- =============================================
                 FORM
            ============================================== -->

            <form
                method="POST"
                action="{{ route('admin.categories.store') }}"
            >

                @csrf


                <!-- CATEGORY NAME -->

                <div class="mb-4">


                    <label class="form-label">

                        Category Name

                        <span class="required-star">
                            *
                        </span>

                    </label>


                    <input
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        class="form-control"
                        placeholder="Example: Electronics"
                        required
                    >


                    <div class="field-help">

                        Enter a clear category name
                        for auction listings.

                    </div>


                </div>


                <!-- DESCRIPTION -->

                <div class="mb-4">


                    <label class="form-label">

                        Description

                    </label>


                    <textarea
                        name="description"
                        class="form-control"
                        placeholder="Write a short description..."
                    >{{ old('description') }}</textarea>


                    <div class="field-help">

                        Optional short description
                        explaining this category.

                    </div>


                </div>


                <!-- ACTIONS -->

                <div class="form-actions">


                    <a
                        href="{{ route('admin.categories.index') }}"
                        class="
                            btn
                            cancel-btn
                        "
                    >

                        <i
                            class="
                                fa-solid
                                fa-xmark
                                me-2
                            "
                        ></i>

                        Cancel

                    </a>


                    <button
                        type="submit"
                        class="
                            btn
                            save-btn
                        "
                    >

                        <i
                            class="
                                fa-solid
                                fa-plus
                                me-2
                            "
                        ></i>

                        Create Category

                    </button>


                </div>


            </form>


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