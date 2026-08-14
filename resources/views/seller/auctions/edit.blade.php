<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Edit Auction | BidZone</title>


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
           MAIN
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

            flex-shrink: 0;

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

            color: #f87171;

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
            margin-bottom: 27px;
        }


        .page-label {
            display: inline-flex;

            align-items: center;

            gap: 7px;

            margin-bottom: 10px;

            padding:
                6px 10px;

            background:
                rgba(103,232,249,.07);

            color:
                var(--cyan);

            border:
                1px solid
                rgba(103,232,249,.14);

            border-radius:
                999px;

            font-size: 9px;

            font-weight: 900;

            letter-spacing: 1px;

            text-transform: uppercase;
        }


        .page-title {
            margin: 0;

            color:
                var(--text-primary);

            font-size: 35px;

            font-weight: 900;

            letter-spacing: -1px;
        }


        .page-subtitle {
            margin:
                8px 0 0;

            color:
                var(--text-muted);
        }


        /* =========================================================
           FORM CARD
        ========================================================= */

        .form-card {
            position: relative;

            overflow: hidden;

            padding:
                32px;

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

            border-radius: 21px;

            box-shadow:
                var(--card-shadow);
        }


        html[data-theme="light"]
        .form-card {
            background:
                var(--surface);
        }


        .form-card::after {
            content: "";

            position: absolute;

            width: 270px;
            height: 270px;

            top: -180px;
            right: -140px;

            border-radius: 50%;

            background:
                rgba(103,232,249,.05);

            filter:
                blur(45px);

            pointer-events: none;
        }


        .form-content {
            position: relative;

            z-index: 2;
        }


        /* =========================================================
           STATUS BOX
        ========================================================= */

        .status-box {
            position: relative;

            margin-bottom: 28px;

            padding:
                18px;

            border-radius: 13px;
        }


        .pending-box {
            background:
                rgba(245,158,11,.08);

            color:
                var(--text-primary);

            border:
                1px solid
                rgba(245,158,11,.20);
        }


        .pending-box i {
            color:
                var(--accent);
        }


        .rejected-box {
            background:
                rgba(239,68,68,.08);

            color:
                #fca5a5;

            border:
                1px solid
                rgba(239,68,68,.20);
        }


        html[data-theme="light"]
        .rejected-box {
            background:
                #fef2f2;

            color:
                #991b1b;

            border-color:
                #fecaca;
        }


        .status-box .text-muted {
            color:
                var(--text-muted)
                !important;
        }


        /* =========================================================
           ERROR
        ========================================================= */

        .alert-danger {
            background:
                rgba(239,68,68,.09);

            color:
                #fca5a5;

            border:
                1px solid
                rgba(239,68,68,.22);

            border-radius: 12px;
        }


        html[data-theme="light"]
        .alert-danger {
            background:
                #fef2f2;

            color:
                #991b1b;

            border-color:
                #fecaca;
        }


        /* =========================================================
           SECTION HEADER
        ========================================================= */

        .section-heading {
            display: flex;

            align-items: center;

            gap: 13px;

            margin:
                5px 0 24px;
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
                rgba(245,158,11,.10);

            color:
                var(--accent);

            border:
                1px solid
                rgba(245,158,11,.20);

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
           FORM INPUTS
        ========================================================= */

        .form-label {
            margin-bottom: 8px;

            color:
                var(--text-primary);

            font-size: 13px;

            font-weight: 800;
        }


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
        }


        textarea.form-control {
            min-height: 150px;

            padding-top: 14px;

            resize: vertical;
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


        html[data-theme="dark"]
        input[type="datetime-local"] {
            color-scheme: dark;
        }


        html[data-theme="light"]
        input[type="datetime-local"] {
            color-scheme: light;
        }


        /* =========================================================
           CURRENT IMAGES
        ========================================================= */

        .current-images {
            display: grid;

            grid-template-columns:
                repeat(5, 1fr);

            gap: 13px;

            margin-top: 12px;
        }


        .image-box {
            position: relative;

            height: 125px;

            overflow: hidden;

            background:
                var(--surface-light);

            border:
                1px solid
                var(--border-color);

            border-radius: 12px;

            box-shadow:
                0 8px 20px
                rgba(0,0,0,.05);
        }


        .image-box img {
            width: 100%;
            height: 100%;

            object-fit: cover;

            transition:
                transform .3s ease;
        }


        .image-box:hover img {
            transform:
                scale(1.05);
        }


        /* =========================================================
           IMAGE UPLOAD
        ========================================================= */

        .image-upload-box {
            padding:
                27px;

            text-align: center;

            background:
                var(--surface-light);

            border:
                2px dashed
                var(--border-color);

            border-radius: 15px;

            transition:
                .2s ease;
        }


        .image-upload-box:hover {
            border-color:
                var(--accent);
        }


        .upload-icon {
            width: 57px;
            height: 57px;

            display: flex;

            align-items: center;

            justify-content: center;

            margin:
                0 auto 13px;

            background:
                rgba(245,158,11,.10);

            color:
                var(--accent);

            border:
                1px solid
                rgba(245,158,11,.20);

            border-radius: 16px;

            font-size: 22px;
        }


        .image-upload-box h6 {
            color:
                var(--text-primary);

            font-weight: 900;
        }


        .image-upload-box p {
            color:
                var(--text-muted)
                !important;
        }


        .image-upload-box
        input[type="file"] {
            margin-top: 17px;
        }


        /* =========================================================
           NEW IMAGE PREVIEW
        ========================================================= */

        .preview-container {
            display: grid;

            grid-template-columns:
                repeat(5, 1fr);

            gap: 13px;

            margin-top: 16px;
        }


        .preview-image {
            width: 100%;
            height: 125px;

            object-fit: cover;

            background:
                var(--surface-light);

            border:
                1px solid
                var(--border-color);

            border-radius: 11px;

            box-shadow:
                0 8px 20px
                rgba(0,0,0,.05);
        }


        /* =========================================================
           BUTTONS
        ========================================================= */

        .form-footer {
            display: flex;

            justify-content: flex-end;

            flex-wrap: wrap;

            gap: 10px;

            margin-top: 35px;

            padding-top: 25px;

            border-top:
                1px solid
                var(--border-color);
        }


        .cancel-btn {
            min-height: 48px;

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


        .cancel-btn:hover {
            color:
                var(--accent);

            border-color:
                var(--accent);

            background:
                var(--surface-light);
        }


        .save-btn {
            min-height: 48px;

            display: inline-flex;

            align-items: center;

            justify-content: center;

            padding:
                10px 24px;

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

        @media(max-width: 1100px) {

            .current-images,
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


            .form-card {
                padding:
                    24px 20px;
            }


            .page-title {
                font-size: 29px;
            }


            .current-images,
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


            .current-images,
            .preview-container {
                grid-template-columns: 1fr;
            }


            .image-box,
            .preview-image {
                height: 190px;
            }


            .form-footer {
                flex-direction: column;
            }


            .cancel-btn,
            .save-btn {
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
                Edit Auction
            </h4>

            <div class="topbar-subtitle">
                Update your auction before approval
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

        My Auctions

    </a>


    <!-- =====================================================
         PAGE HEADING
    ====================================================== -->

    <div class="page-heading">


        <div class="page-label">

            <i class="fa-solid fa-pen"></i>

            Auction Editor

        </div>


        <h1 class="page-title">

            Edit Auction

        </h1>


        <p class="page-subtitle">

            Update your auction information,
            schedule or product images before approval.

        </p>


    </div>


    <!-- =====================================================
         FORM CARD
    ====================================================== -->

    <div class="form-card">


        <div class="form-content">


            <!-- =================================================
                 STATUS
            ================================================== -->

            @if($auction->status === 'rejected')


                <div class="status-box rejected-box">


                    <div class="fw-bold mb-2">

                        <i class="fa-solid fa-circle-xmark me-2"></i>

                        Auction Rejected

                    </div>


                    <div>

                        <strong>
                            Admin Reason:
                        </strong>

                        {{ $auction->rejection_reason
                            ?? 'No reason was provided.'
                        }}

                    </div>


                    <div class="small text-muted mt-2">

                        Make the required changes,
                        save the auction and then
                        resubmit it for approval.

                    </div>


                </div>


            @else


                <div class="status-box pending-box">


                    <div class="fw-bold">

                        <i class="fa-regular fa-clock me-2"></i>

                        Pending Admin Approval

                    </div>


                    <div class="small text-muted mt-1">

                        You may edit this auction
                        while it is still pending.

                    </div>


                </div>


            @endif


            <!-- =================================================
                 VALIDATION
            ================================================== -->

            @if($errors->any())


                <div class="alert alert-danger">


                    <div class="fw-bold mb-2">

                        <i class="fa-solid fa-triangle-exclamation me-2"></i>

                        Please fix the following errors:

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


            <!-- =================================================
                 FORM
            ================================================== -->

            <form
                method="POST"

                action="{{ route(
                    'seller.auctions.update',
                    $auction
                ) }}"

                enctype="multipart/form-data"
            >

                @csrf
                @method('PUT')


                <!-- =================================================
                     PRODUCT INFORMATION
                ================================================== -->

                <div class="section-heading">


                    <div class="section-icon">

                        <i class="fa-solid fa-box-open"></i>

                    </div>


                    <div>

                        <h5>
                            Product Information
                        </h5>

                        <p>
                            Update the auction title,
                            category and item description.
                        </p>

                    </div>


                </div>


                <div class="row g-4">


                    <!-- TITLE -->

                    <div class="col-md-8">


                        <label class="form-label">

                            Auction Title

                        </label>


                        <input
                            type="text"

                            name="title"

                            class="form-control"

                            value="{{ old(
                                'title',
                                $auction->title
                            ) }}"

                            required
                        >


                    </div>


                    <!-- CATEGORY -->

                    <div class="col-md-4">


                        <label class="form-label">

                            Category

                        </label>


                        <select
                            name="category_id"
                            class="form-select"
                            required
                        >


                            @foreach(
                                $categories
                                as $category
                            )


                                <option
                                    value="{{ $category->id }}"

                                    @selected(
                                        old(
                                            'category_id',
                                            $auction->category_id
                                        )
                                        ==
                                        $category->id
                                    )
                                >

                                    {{ $category->name }}

                                    @if(!$category->is_active)

                                        (Inactive)

                                    @endif

                                </option>


                            @endforeach


                        </select>


                    </div>


                    <!-- DESCRIPTION -->

                    <div class="col-12">


                        <label class="form-label">

                            Description

                        </label>


                        <textarea
                            name="description"
                            class="form-control"
                            required
                        >{{ old(
                            'description',
                            $auction->description
                        ) }}</textarea>


                    </div>


                </div>


                <hr class="divider">


                <!-- =================================================
                     PRICING & SCHEDULE
                ================================================== -->

                <div class="section-heading">


                    <div class="section-icon">

                        <i class="fa-solid fa-tags"></i>

                    </div>


                    <div>

                        <h5>
                            Pricing & Schedule
                        </h5>

                        <p>
                            Adjust the auction values
                            and bidding timeframe.
                        </p>

                    </div>


                </div>


                <div class="row g-4">


                    <!-- STARTING PRICE -->

                    <div class="col-md-6">


                        <label class="form-label">

                            Starting Price

                        </label>


                        <div class="input-group">


                            <span class="input-group-text">

                                ৳

                            </span>


                            <input
                                type="number"

                                name="starting_price"

                                class="form-control"

                                min="1"

                                step="0.01"

                                value="{{ old(
                                    'starting_price',
                                    $auction->starting_price
                                ) }}"

                                required
                            >


                        </div>


                    </div>


                    <!-- BID INCREMENT -->

                    <div class="col-md-6">


                        <label class="form-label">

                            Bid Increment

                        </label>


                        <div class="input-group">


                            <span class="input-group-text">

                                ৳

                            </span>


                            <input
                                type="number"

                                name="bid_increment"

                                class="form-control"

                                min="1"

                                step="0.01"

                                value="{{ old(
                                    'bid_increment',
                                    $auction->bid_increment
                                ) }}"

                                required
                            >


                        </div>


                    </div>


                    <!-- START TIME -->

                    <div class="col-md-6">


                        <label class="form-label">

                            Start Date & Time

                        </label>


                        <input
                            type="datetime-local"

                            name="start_time"

                            class="form-control"

                            value="{{ old(
                                'start_time',
                                $auction
                                    ->start_time
                                    ->format(
                                        'Y-m-d\TH:i'
                                    )
                            ) }}"

                            required
                        >


                    </div>


                    <!-- END TIME -->

                    <div class="col-md-6">


                        <label class="form-label">

                            End Date & Time

                        </label>


                        <input
                            type="datetime-local"

                            name="end_time"

                            class="form-control"

                            value="{{ old(
                                'end_time',
                                $auction
                                    ->end_time
                                    ->format(
                                        'Y-m-d\TH:i'
                                    )
                            ) }}"

                            required
                        >


                    </div>


                </div>


                <hr class="divider">


                <!-- =================================================
                     CURRENT IMAGES
                ================================================== -->

                <div class="section-heading">


                    <div class="section-icon">

                        <i class="fa-regular fa-images"></i>

                    </div>


                    <div>

                        <h5>
                            Current Images
                        </h5>

                        <p>
                            Images currently attached
                            to this auction.
                        </p>

                    </div>


                </div>


                @if($auction->images->count())


                    <div class="current-images">


                        @foreach(
                            $auction->images
                            as $image
                        )


                            <div class="image-box">


                                <img
                                    src="{{ asset(
                                        'storage/'
                                        .
                                        $image->image_path
                                    ) }}"

                                    alt="Auction image"
                                >


                            </div>


                        @endforeach


                    </div>


                @else


                    <p class="text-theme-muted">

                        No images currently available.

                    </p>


                @endif


                <hr class="divider">


                <!-- =================================================
                     REPLACE IMAGES
                ================================================== -->

                <div class="section-heading">


                    <div class="section-icon">

                        <i class="fa-solid fa-cloud-arrow-up"></i>

                    </div>


                    <div>

                        <h5>
                            Replace Images
                        </h5>

                        <p>
                            Optional — upload new images
                            only if you want to replace
                            the existing set.
                        </p>

                    </div>


                </div>


                <div class="image-upload-box">


                    <div class="upload-icon">

                        <i class="fa-solid fa-cloud-arrow-up"></i>

                    </div>


                    <h6>

                        Upload new auction images

                    </h6>


                    <p class="small mb-1">

                        If you select new images,
                        all existing images will be replaced.

                    </p>


                    <p class="small mb-0">

                        Maximum 5 images.

                    </p>


                    <input
                        type="file"

                        name="images[]"

                        id="images"

                        class="form-control"

                        accept=".jpg,.jpeg,.png,.webp"

                        multiple
                    >


                </div>


                <!-- NEW PREVIEW -->

                <div
                    id="previewContainer"
                    class="preview-container"
                ></div>


                <!-- =================================================
                     BUTTONS
                ================================================== -->

                <div class="form-footer">


                    <a
                        href="{{ route(
                            'seller.auctions.index'
                        ) }}"

                        class="
                            btn
                            cancel-btn
                        "
                    >

                        <i class="fa-solid fa-xmark me-2"></i>

                        Cancel

                    </a>


                    <button
                        type="submit"

                        class="
                            btn
                            save-btn
                        "
                    >

                        <i class="fa-solid fa-floppy-disk me-2"></i>

                        Save Changes

                    </button>


                </div>


            </form>


        </div>


    </div>


</div>


<!-- =========================================================
     BIDZONE THEME
========================================================= -->

<script
    src="{{ asset('js/bidzone-theme.js') }}"
></script>


<!-- =========================================================
     IMAGE PREVIEW
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


    imageInput.addEventListener(
        'change',
        function () {


            previewContainer.innerHTML =
                '';


            const files =
                Array.from(
                    this.files
                );


            if (files.length > 5) {


                alert(
                    'You can upload a maximum of 5 images.'
                );


                this.value = '';


                return;


            }


            files.forEach(
                function (file) {


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


                            const image =
                                document.createElement(
                                    'img'
                                );


                            image.src =
                                event.target.result;


                            image.className =
                                'preview-image';


                            previewContainer
                                .appendChild(
                                    image
                                );


                        };


                    reader.readAsDataURL(
                        file
                    );


                }
            );


        }
    );

</script>


</body>

</html>