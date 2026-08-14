<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Create Auction | BidZone</title>


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
                    rgba(103, 232, 249, .07),
                    transparent 28%
                ),
                radial-gradient(
                    circle at 90% 10%,
                    rgba(245, 158, 11, .08),
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
                    rgba(13, 16, 24, .98),
                    rgba(17, 21, 34, .98)
                );

            border-right:
                1px solid
                rgba(255, 255, 255, .07);

            box-shadow:
                15px 0 50px
                rgba(0, 0, 0, .15);
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
                rgba(103, 232, 249, .08);

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
                rgba(255, 255, 255, .045);

            border-color:
                rgba(255, 255, 255, .07);

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

            margin-bottom: 28px;

            padding:
                20px 23px;

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

            flex-shrink: 0;

            border-radius: 13px;

            background:
                rgba(245, 158, 11, .10);

            color:
                var(--accent);

            border:
                1px solid
                rgba(245, 158, 11, .20);

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
                rgba(239, 68, 68, .22);

            border-radius: 10px;

            background:
                rgba(239, 68, 68, .10);

            color: #f87171;

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
           BACK LINK
        ========================================================= */

        .back-link {
            display: inline-flex;

            align-items: center;

            gap: 8px;

            margin-bottom: 19px;

            color:
                var(--text-muted);

            text-decoration: none;

            font-weight: 700;

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

        .page-heading {
            margin-bottom: 28px;
        }


        .page-label {
            display: inline-flex;

            align-items: center;

            gap: 7px;

            margin-bottom: 10px;

            padding:
                6px 10px;

            background:
                rgba(103, 232, 249, .07);

            color:
                var(--cyan);

            border:
                1px solid
                rgba(103, 232, 249, .14);

            border-radius:
                999px;

            font-size: 9px;

            font-weight: 900;

            letter-spacing: 1px;

            text-transform: uppercase;
        }


        .page-heading h1 {
            margin: 0;

            color:
                var(--text-primary);

            font-size: 35px;

            font-weight: 900;

            letter-spacing: -1px;
        }


        .page-heading p {
            max-width: 700px;

            margin:
                8px 0 0;

            color:
                var(--text-muted);

            line-height: 1.6;
        }


        /* =========================================================
           ERROR BOX
        ========================================================= */

        .error-box {
            margin-bottom: 22px;

            padding: 18px 20px;

            background:
                rgba(239, 68, 68, .09);

            color: #fca5a5;

            border:
                1px solid
                rgba(239, 68, 68, .22);

            border-radius: 13px;
        }


        .error-box strong {
            color:
                inherit;
        }


        html[data-theme="light"]
        .error-box {
            background:
                #fef2f2;

            color:
                #991b1b;

            border-color:
                #fecaca;
        }


        /* =========================================================
           MAIN FORM CARD
        ========================================================= */

        .auction-card {
            position: relative;

            overflow: hidden;

            padding:
                32px;

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

            border-radius: 21px;

            box-shadow:
                var(--card-shadow);
        }


        html[data-theme="light"]
        .auction-card {
            background:
                var(--surface);
        }


        .auction-card::after {
            content: "";

            position: absolute;

            width: 270px;
            height: 270px;

            top: -180px;
            right: -140px;

            border-radius: 50%;

            background:
                rgba(103, 232, 249, .05);

            filter:
                blur(45px);

            pointer-events: none;
        }


        /* =========================================================
           FORM SECTION
        ========================================================= */

        .form-section {
            position: relative;

            z-index: 2;
        }


        .section-heading {
            display: flex;

            align-items: center;

            gap: 13px;

            margin-bottom: 25px;
        }


        .section-icon {
            width: 45px;
            height: 45px;

            display: flex;

            align-items: center;

            justify-content: center;

            flex-shrink: 0;

            border-radius: 12px;

            background:
                rgba(245, 158, 11, .10);

            color:
                var(--accent);

            border:
                1px solid
                rgba(245, 158, 11, .20);

            font-size: 18px;
        }


        .section-heading h5 {
            margin: 0;

            color:
                var(--text-primary);

            font-weight: 900;
        }


        .section-heading p {
            margin:
                3px 0 0;

            color:
                var(--text-muted);

            font-size: 11px;
        }


        /* =========================================================
           DIVIDER
        ========================================================= */

        .divider {
            margin:
                34px 0;

            border: 0;

            border-top:
                1px solid
                var(--border-color);

            opacity: 1;
        }


        /* =========================================================
           LABEL
        ========================================================= */

        .form-label {
            margin-bottom: 8px;

            color:
                var(--text-primary);

            font-size: 13px;

            font-weight: 800;
        }


        .required {
            color: #f87171;
        }


        /* =========================================================
           INPUTS
        ========================================================= */

        .form-control,
        .form-select {
            min-height: 52px;

            padding-left: 15px;

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

            padding-top: 14px;

            resize: vertical;
        }


        .form-control::placeholder {
            color:
                var(--text-muted);

            opacity: .75;
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


        .input-group-text {
            min-width: 50px;

            display: flex;

            align-items: center;

            justify-content: center;

            background:
                var(--surface-light);

            color:
                var(--accent);

            border:
                1px solid
                var(--border-color);

            font-size: 16px;

            font-weight: 900;
        }


        .input-group
        .input-group-text {
            border-radius:
                11px 0 0 11px;
        }


        .input-group
        .form-control {
            border-left: 0;

            border-radius:
                0 11px 11px 0;
        }


        .input-group:focus-within
        .input-group-text {
            border-color:
                var(--accent);
        }


        .helper-text {
            margin-top: 7px;

            color:
                var(--text-muted);

            font-size: 11px;

            line-height: 1.5;
        }


        /* =========================================================
           DATETIME INPUT
        ========================================================= */

        html[data-theme="dark"]
        input[type="datetime-local"] {
            color-scheme: dark;
        }


        html[data-theme="light"]
        input[type="datetime-local"] {
            color-scheme: light;
        }


        /* =========================================================
           SCHEDULE INFO
        ========================================================= */

        .schedule-note {
            display: flex;

            align-items: flex-start;

            gap: 11px;

            margin-top: 18px;

            padding:
                14px 16px;

            background:
                rgba(103, 232, 249, .055);

            color:
                var(--text-muted);

            border:
                1px solid
                rgba(103, 232, 249, .12);

            border-radius: 11px;

            font-size: 12px;

            line-height: 1.55;
        }


        .schedule-note i {
            margin-top: 2px;

            color:
                var(--cyan);
        }


        /* =========================================================
           IMAGE UPLOAD
        ========================================================= */

        #images {
            display: none;
        }


        .upload-area {
            position: relative;

            min-height: 205px;

            display: flex;

            align-items: center;

            justify-content: center;

            padding:
                30px;

            overflow: hidden;

            text-align: center;

            cursor: pointer;

            background:
                var(--surface-light);

            border:
                2px dashed
                var(--border-color);

            border-radius: 16px;

            transition:
                .25s ease;
        }


        .upload-area::after {
            content: "";

            position: absolute;

            width: 180px;
            height: 180px;

            top: -100px;
            right: -80px;

            border-radius: 50%;

            background:
                rgba(245, 158, 11, .05);

            filter:
                blur(25px);

            pointer-events: none;
        }


        .upload-area:hover,
        .upload-area.dragover {
            border-color:
                var(--accent);

            background:
                rgba(245, 158, 11, .045);

            transform:
                translateY(-2px);
        }


        .upload-content {
            position: relative;

            z-index: 2;
        }


        .upload-icon {
            width: 62px;
            height: 62px;

            display: flex;

            align-items: center;

            justify-content: center;

            margin:
                0 auto 15px;

            border-radius: 17px;

            background:
                rgba(245, 158, 11, .10);

            color:
                var(--accent);

            border:
                1px solid
                rgba(245, 158, 11, .20);

            font-size: 23px;

            transition:
                .25s ease;
        }


        .upload-area:hover
        .upload-icon {
            transform:
                translateY(-3px);
        }


        .upload-area h6 {
            margin-bottom: 6px;

            color:
                var(--text-primary);

            font-weight: 900;
        }


        .upload-area p {
            margin: 0;

            color:
                var(--text-muted);

            font-size: 12px;
        }


        .upload-rules {
            display: flex;

            justify-content: center;

            flex-wrap: wrap;

            gap: 7px;

            margin-top: 13px;
        }


        .upload-rule {
            padding:
                5px 8px;

            background:
                var(--surface);

            color:
                var(--text-muted);

            border:
                1px solid
                var(--border-color);

            border-radius:
                999px;

            font-size: 9px;

            font-weight: 700;
        }


        /* =========================================================
           PREVIEWS
        ========================================================= */

        .preview-container {
            display: grid;

            grid-template-columns:
                repeat(5, 1fr);

            gap: 14px;

            margin-top: 20px;
        }


        .preview-box {
            position: relative;

            height: 140px;

            overflow: hidden;

            background:
                var(--surface-light);

            border:
                1px solid
                var(--border-color);

            border-radius: 12px;

            box-shadow:
                0 8px 22px
                rgba(0, 0, 0, .06);
        }


        .preview-box img {
            width: 100%;
            height: 100%;

            object-fit: cover;
        }


        .primary-label {
            position: absolute;

            top: 8px;
            left: 8px;

            padding:
                5px 8px;

            background:
                linear-gradient(
                    135deg,
                    #f59e0b,
                    #fbbf24
                );

            color: #111827;

            border-radius: 6px;

            box-shadow:
                0 4px 12px
                rgba(0, 0, 0, .16);

            font-size: 9px;

            font-weight: 900;

            letter-spacing: .5px;
        }


        /* =========================================================
           FORM FOOTER
        ========================================================= */

        .form-footer {
            display: flex;

            justify-content: flex-end;

            gap: 11px;

            margin-top: 35px;

            padding-top: 25px;

            border-top:
                1px solid
                var(--border-color);
        }


        .btn-cancel {
            min-height: 47px;

            display: inline-flex;

            align-items: center;

            justify-content: center;

            padding:
                10px 22px;

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


        .btn-cancel:hover {
            color:
                var(--accent);

            background:
                var(--surface-light);

            border-color:
                var(--accent);
        }


        .btn-submit {
            min-height: 47px;

            display: inline-flex;

            align-items: center;

            justify-content: center;

            padding:
                10px 25px;

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


        .btn-submit:hover {
            color: #111827;

            transform:
                translateY(-2px);

            box-shadow:
                0 10px 28px
                rgba(245, 158, 11, .20);
        }


        /* =========================================================
           RESPONSIVE
        ========================================================= */

        @media(max-width: 1100px) {

            .preview-container {
                grid-template-columns:
                    repeat(3, 1fr);
            }

        }


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


            .auction-card {
                padding:
                    24px 20px;
            }


            .page-heading h1 {
                font-size: 29px;
            }


            .preview-container {
                grid-template-columns:
                    repeat(2, 1fr);
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


            .preview-container {
                grid-template-columns: 1fr;
            }


            .preview-box {
                height: 190px;
            }


            .form-footer {
                flex-direction: column;
            }


            .btn-submit,
            .btn-cancel {
                width: 100%;
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


        <a
            href="{{ route('seller.auctions.create') }}"
            class="active"
        >

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
                Create Auction
            </h4>

            <div class="topbar-subtitle">
                Build and submit a new auction listing
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


            <!-- SELLER -->

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
        href="{{ route('seller.auctions.index') }}"
        class="back-link"
    >

        <i class="fa-solid fa-arrow-left"></i>

        Back to My Auctions

    </a>


    <!-- =====================================================
         PAGE HEADING
    ====================================================== -->

    <div class="page-heading">


        <div class="page-label">

            <i class="fa-solid fa-wand-magic-sparkles"></i>

            New Listing

        </div>


        <h1>
            Create New Auction
        </h1>


        <p>

            Add your product details, define the bidding price,
            choose the auction schedule and upload clear product
            images before submitting for approval.

        </p>


    </div>


    <!-- =====================================================
         VALIDATION ERRORS
    ====================================================== -->

    @if($errors->any())


        <div class="error-box">


            <strong>

                <i class="fa-solid fa-triangle-exclamation me-2"></i>

                Please fix the following errors:

            </strong>


            <ul class="mb-0 mt-2">


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


    <!-- =====================================================
         FORM
    ====================================================== -->

    <form
        method="POST"
        action="{{ route('seller.auctions.store') }}"
        enctype="multipart/form-data"
    >

        @csrf


        <div class="auction-card">


            <!-- =================================================
                 PRODUCT INFORMATION
            ================================================== -->

            <div class="form-section">


                <div class="section-heading">


                    <div class="section-icon">

                        <i class="fa-solid fa-box-open"></i>

                    </div>


                    <div>

                        <h5>
                            Product Information
                        </h5>

                        <p>
                            Tell bidders what you are selling.
                        </p>

                    </div>


                </div>


                <div class="row g-4">


                    <!-- TITLE -->

                    <div class="col-md-8">


                        <label class="form-label">

                            Product Title

                            <span class="required">
                                *
                            </span>

                        </label>


                        <input
                            type="text"
                            name="title"
                            class="form-control"
                            value="{{ old('title') }}"
                            placeholder="Example: Apple MacBook Pro 14-inch"
                            required
                        >


                    </div>


                    <!-- CATEGORY -->

                    <div class="col-md-4">


                        <label class="form-label">

                            Category

                            <span class="required">
                                *
                            </span>

                        </label>


                        <select
                            name="category_id"
                            class="form-select"
                            required
                        >


                            <option value="">

                                Select Category

                            </option>


                            @foreach(
                                $categories
                                as $category
                            )


                                <option
                                    value="{{ $category->id }}"

                                    {{
                                        old('category_id')
                                        == $category->id
                                            ? 'selected'
                                            : ''
                                    }}
                                >

                                    {{ $category->name }}

                                </option>


                            @endforeach


                        </select>


                    </div>


                    <!-- DESCRIPTION -->

                    <div class="col-12">


                        <label class="form-label">

                            Product Description

                            <span class="required">
                                *
                            </span>

                        </label>


                        <textarea
                            name="description"
                            class="form-control"
                            placeholder="Describe the condition, specifications and important information about the product..."
                            required
                        >{{ old('description') }}</textarea>


                        <div class="helper-text">

                            Provide enough information to help
                            bidders understand the item.

                        </div>


                    </div>


                </div>


            </div>


            <hr class="divider">


            <!-- =================================================
                 PRICING
            ================================================== -->

            <div class="form-section">


                <div class="section-heading">


                    <div class="section-icon">

                        <i class="fa-solid fa-tags"></i>

                    </div>


                    <div>

                        <h5>
                            Auction Pricing
                        </h5>

                        <p>
                            Set the starting value and minimum increase.
                        </p>

                    </div>


                </div>


                <div class="row g-4">


                    <!-- STARTING PRICE -->

                    <div class="col-md-6">


                        <label class="form-label">

                            Starting Price

                            <span class="required">
                                *
                            </span>

                        </label>


                        <div class="input-group">


                            <span class="input-group-text">

                                ৳

                            </span>


                            <input
                                type="number"
                                step="0.01"
                                min="1"
                                name="starting_price"
                                value="{{ old('starting_price') }}"
                                class="form-control"
                                placeholder="1000"
                                required
                            >


                        </div>


                        <div class="helper-text">

                            Initial amount from which bidding
                            will begin.

                        </div>


                    </div>


                    <!-- BID INCREMENT -->

                    <div class="col-md-6">


                        <label class="form-label">

                            Minimum Bid Increment

                            <span class="required">
                                *
                            </span>

                        </label>


                        <div class="input-group">


                            <span class="input-group-text">

                                ৳

                            </span>


                            <input
                                type="number"
                                step="0.01"
                                min="1"
                                name="bid_increment"
                                value="{{ old('bid_increment') }}"
                                class="form-control"
                                placeholder="100"
                                required
                            >


                        </div>


                        <div class="helper-text">

                            Minimum amount a bidder must increase
                            the current price.

                        </div>


                    </div>


                </div>


            </div>


            <hr class="divider">


            <!-- =================================================
                 SCHEDULE
            ================================================== -->

            <div class="form-section">


                <div class="section-heading">


                    <div class="section-icon">

                        <i class="fa-regular fa-clock"></i>

                    </div>


                    <div>

                        <h5>
                            Auction Schedule
                        </h5>

                        <p>
                            Choose when bidding starts and finishes.
                        </p>

                    </div>


                </div>


                <div class="row g-4">


                    <!-- START -->

                    <div class="col-md-6">


                        <label class="form-label">

                            Start Date & Time

                            <span class="required">
                                *
                            </span>

                        </label>


                        <input
                            type="datetime-local"
                            name="start_time"
                            class="form-control"
                            value="{{ old('start_time') }}"
                            required
                        >


                    </div>


                    <!-- END -->

                    <div class="col-md-6">


                        <label class="form-label">

                            End Date & Time

                            <span class="required">
                                *
                            </span>

                        </label>


                        <input
                            type="datetime-local"
                            name="end_time"
                            class="form-control"
                            value="{{ old('end_time') }}"
                            required
                        >


                    </div>


                </div>


                <div class="schedule-note">


                    <i class="fa-solid fa-circle-info"></i>


                    <div>

                        Check the start and end time carefully
                        before submitting your auction.

                    </div>


                </div>


            </div>


            <hr class="divider">


            <!-- =================================================
                 IMAGES
            ================================================== -->

            <div class="form-section">


                <div class="section-heading">


                    <div class="section-icon">

                        <i class="fa-regular fa-images"></i>

                    </div>


                    <div>

                        <h5>
                            Product Images
                        </h5>

                        <p>
                            Upload clear photos of the auction item.
                        </p>

                    </div>


                </div>


                <!-- UPLOAD AREA -->

                <label
                    class="upload-area"
                    id="uploadArea"
                    for="images"
                >


                    <div class="upload-content">


                        <div class="upload-icon">

                            <i class="fa-solid fa-cloud-arrow-up"></i>

                        </div>


                        <h6>

                            Drag & Drop images here

                        </h6>


                        <p>

                            or click to browse your computer

                        </p>


                        <div class="upload-rules">


                            <span class="upload-rule">
                                JPG / JPEG
                            </span>


                            <span class="upload-rule">
                                PNG
                            </span>


                            <span class="upload-rule">
                                WEBP
                            </span>


                            <span class="upload-rule">
                                Maximum 5 images
                            </span>


                            <span class="upload-rule">
                                5MB each
                            </span>


                        </div>


                    </div>


                </label>


                <!-- INPUT -->

                <input
                    type="file"
                    name="images[]"
                    id="images"
                    accept=".jpg,.jpeg,.png,.webp"
                    multiple
                    required
                >


                <!-- PREVIEW -->

                <div
                    id="previewContainer"
                    class="preview-container"
                ></div>


            </div>


            <!-- =================================================
                 FOOTER
            ================================================== -->

            <div class="form-footer">


                <a
                    href="{{ route('seller.auctions.index') }}"
                    class="
                        btn
                        btn-cancel
                    "
                >

                    <i class="fa-solid fa-xmark me-2"></i>

                    Cancel

                </a>


                <button
                    type="submit"
                    class="btn-submit"
                >

                    <i class="fa-solid fa-paper-plane me-2"></i>

                    Submit Auction

                </button>


            </div>


        </div>


    </form>


</div>


<!-- =========================================================
     BIDZONE THEME JS
========================================================= -->

<script
    src="{{ asset('js/bidzone-theme.js') }}"
></script>


<!-- =========================================================
     IMAGE UPLOAD / PREVIEW
========================================================= -->

<script>

    const imageInput =
        document.getElementById(
            'images'
        );

    const previewContainer =
        document.getElementById(
            'previewContainer'
        );

    const uploadArea =
        document.getElementById(
            'uploadArea'
        );


    /*
    |--------------------------------------------------------------------------
    | Image Preview
    |--------------------------------------------------------------------------
    */

    imageInput.addEventListener(
        'change',
        function () {

            previewImages(
                this.files
            );

        }
    );


    function previewImages(files) {

        previewContainer.innerHTML = '';


        if (files.length > 5) {

            alert(
                'You can upload maximum 5 images.'
            );

            imageInput.value = '';

            return;

        }


        Array
            .from(files)
            .forEach(
                (file, index) => {


                    if (
                        !file.type.startsWith(
                            'image/'
                        )
                    ) {
                        return;
                    }


                    const reader =
                        new FileReader();


                    reader.onload =
                        function (event) {


                            const box =
                                document.createElement(
                                    'div'
                                );


                            box.classList.add(
                                'preview-box'
                            );


                            const image =
                                document.createElement(
                                    'img'
                                );


                            image.src =
                                event.target.result;


                            box.appendChild(
                                image
                            );


                            if (index === 0) {


                                const primaryLabel =
                                    document.createElement(
                                        'span'
                                    );


                                primaryLabel
                                    .classList
                                    .add(
                                        'primary-label'
                                    );


                                primaryLabel.innerText =
                                    'MAIN IMAGE';


                                box.appendChild(
                                    primaryLabel
                                );


                            }


                            previewContainer
                                .appendChild(
                                    box
                                );


                        };


                    reader.readAsDataURL(
                        file
                    );


                }
            );

    }


    /*
    |--------------------------------------------------------------------------
    | Drag Effects
    |--------------------------------------------------------------------------
    */

    [
        'dragenter',
        'dragover'
    ].forEach(
        eventName => {


            uploadArea.addEventListener(
                eventName,
                function (event) {


                    event.preventDefault();


                    uploadArea
                        .classList
                        .add(
                            'dragover'
                        );


                }
            );


        }
    );


    [
        'dragleave',
        'drop'
    ].forEach(
        eventName => {


            uploadArea.addEventListener(
                eventName,
                function (event) {


                    event.preventDefault();


                    uploadArea
                        .classList
                        .remove(
                            'dragover'
                        );


                }
            );


        }
    );


    /*
    |--------------------------------------------------------------------------
    | Drag & Drop Files
    |--------------------------------------------------------------------------
    */

    uploadArea.addEventListener(
        'drop',
        function (event) {


            const files =
                event.dataTransfer.files;


            if (files.length > 5) {


                alert(
                    'You can upload maximum 5 images.'
                );


                return;


            }


            const dataTransfer =
                new DataTransfer();


            Array
                .from(files)
                .forEach(
                    file => {


                        if (
                            file.type.startsWith(
                                'image/'
                            )
                        ) {


                            dataTransfer
                                .items
                                .add(
                                    file
                                );


                        }


                    }
                );


            imageInput.files =
                dataTransfer.files;


            previewImages(
                imageInput.files
            );


        }
    );

</script>


</body>

</html>