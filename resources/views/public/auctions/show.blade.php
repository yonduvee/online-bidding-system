<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        {{ $auction->title }} | BidZone
    </title>


    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >


    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    >

    <link
        rel="stylesheet"
        href="{{ asset('css/bidzone-theme.css') }}"
    >


    <style>

    /* =========================================================
       PAGE
    ========================================================= */

    body {
        margin: 0;

        background:
            radial-gradient(
                circle at 8% 4%,
                rgba(103, 232, 249, 0.07),
                transparent 28%
            ),
            radial-gradient(
                circle at 92% 8%,
                rgba(245, 158, 11, 0.08),
                transparent 28%
            ),
            var(--bg-primary);

        color: var(--text-primary);

        font-family:
            Arial,
            sans-serif;
    }

    .page-wrapper {
        max-width: 1300px;
        margin: auto;
        padding: 45px 25px 80px;
    }


    /* =========================================================
       NAVBAR
    ========================================================= */

    .bidzone-navbar .btn-outline-light {
        color: var(--text-primary);

        border-color:
            var(--border-color);

        background:
            rgba(255,255,255,.03);
    }

    .bidzone-navbar .btn-outline-light:hover {
        background:
            var(--accent);

        color:
            #111827;

        border-color:
            var(--accent);
    }

    html[data-theme="light"]
    .bidzone-navbar
    .btn-outline-light {
        color: #111827;
        border-color: #d7dde7;
    }


    /* =========================================================
       BACK LINK
    ========================================================= */

    .page-wrapper > a.text-secondary {
        color:
            var(--text-muted)
            !important;

        transition:
            color .2s ease;
    }

    .page-wrapper > a.text-secondary:hover {
        color:
            var(--accent)
            !important;
    }


    /* =========================================================
       MAIN PRODUCT CARD
    ========================================================= */

    .product-card {
        position: relative;
        overflow: hidden;

        background:
            linear-gradient(
                145deg,
                rgba(255,255,255,.05),
                rgba(255,255,255,.012)
            ),
            var(--surface);

        border:
            1px solid
            var(--border-color);

        border-radius:
            24px;

        padding:
            32px;

        box-shadow:
            var(--card-shadow);

        backdrop-filter:
            blur(18px);

        -webkit-backdrop-filter:
            blur(18px);
    }

    .product-card::before {
        content: "";

        position: absolute;

        width: 280px;
        height: 280px;

        right: -120px;
        top: -120px;

        border-radius: 50%;

        background:
            rgba(245,158,11,.07);

        filter:
            blur(55px);

        pointer-events:
            none;
    }

    html[data-theme="light"]
    .product-card {
        background:
            var(--surface);
    }


    /* =========================================================
       IMAGE GALLERY
    ========================================================= */

    .gallery-wrapper {
        position: sticky;
        top: 20px;
    }

    .main-image-wrapper {
        position: relative;

        overflow: hidden;

        background:
            var(--surface-light);

        border:
            1px solid
            var(--border-color);

        border-radius:
            18px;

        box-shadow:
            inset 0 0 40px
            rgba(0,0,0,.08);
    }

    .main-image-wrapper::after {
        content: "";

        position: absolute;
        inset: auto 0 0 0;

        height: 25%;

        background:
            linear-gradient(
                to top,
                rgba(13,16,24,.32),
                transparent
            );

        pointer-events: none;
    }

    .main-image {
        width: 100%;
        height: 500px;

        object-fit: contain;

        background:
            var(--surface-light);

        transition:
            transform .35s ease;
    }

    .main-image-wrapper:hover
    .main-image {
        transform:
            scale(1.015);
    }

    .no-main-image {
        width: 100%;
        height: 500px;

        display: flex;
        align-items: center;
        justify-content: center;

        color:
            var(--text-muted);

        font-size:
            70px;
    }

    .thumbnail-wrapper {
        display: flex;
        gap: 10px;

        margin-top:
            14px;

        flex-wrap:
            wrap;
    }

    .thumbnail {
        width: 88px;
        height: 75px;

        object-fit: cover;

        border-radius:
            11px;

        border:
            2px solid
            var(--border-color);

        cursor:
            pointer;

        transition:
            transform .2s ease,
            border-color .2s ease,
            box-shadow .2s ease;

        background:
            var(--surface-light);
    }

    .thumbnail:hover {
        transform:
            translateY(-2px);

        border-color:
            rgba(245,158,11,.55);
    }

    .thumbnail.active-thumb {
        border-color:
            var(--accent);

        box-shadow:
            0 0 20px
            rgba(245,158,11,.20);
    }


    /* =========================================================
       HEADER
    ========================================================= */

    .category {
        color:
            var(--accent);

        font-size:
            12px;

        font-weight:
            900;

        letter-spacing:
            1.2px;

        text-transform:
            uppercase;
    }

    .product-title {
        color:
            var(--text-primary);

        font-size:
            clamp(
                32px,
                4vw,
                42px
            );

        line-height:
            1.15;

        font-weight:
            900;

        letter-spacing:
            -1px;
    }

    .seller-line {
        color:
            var(--text-muted);
    }

    .seller-line strong {
        color:
            var(--text-primary);
    }


    /* =========================================================
       AUCTION STATUS
    ========================================================= */

    .auction-status {
        display: inline-flex;

        align-items:
            center;

        gap:
            6px;

        padding:
            8px 13px;

        border-radius:
            999px;

        font-size:
            10px;

        font-weight:
            900;

        letter-spacing:
            .6px;

        text-transform:
            uppercase;
    }

    .status-active {
        background:
            rgba(34,197,94,.14);

        color:
            #86efac;

        border:
            1px solid
            rgba(34,197,94,.30);

        box-shadow:
            0 0 20px
            rgba(34,197,94,.10);
    }

    .status-scheduled {
        background:
            rgba(56,189,248,.14);

        color:
            #7dd3fc;

        border:
            1px solid
            rgba(56,189,248,.28);
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


    /* =========================================================
       PRICE
    ========================================================= */

    .price-box {
        position: relative;

        overflow: hidden;

        background:
            linear-gradient(
                135deg,
                var(--surface-light),
                var(--surface)
            );

        border:
            1px solid
            var(--border-color);

        border-radius:
            17px;

        padding:
            23px;

        margin:
            23px 0;
    }

    .price-box::before {
        content: "";

        position: absolute;

        left: 0;
        top: 0;
        bottom: 0;

        width:
            4px;

        background:
            linear-gradient(
                to bottom,
                var(--accent),
                var(--cyan)
            );
    }

    .price-label {
        color:
            var(--text-muted);

        font-size:
            12px;

        text-transform:
            uppercase;

        letter-spacing:
            .7px;
    }

    .current-price {
        margin-top:
            3px;

        color:
            var(--accent);

        font-size:
            40px;

        font-weight:
            900;

        letter-spacing:
            -1px;

        text-shadow:
            0 0 28px
            rgba(245,158,11,.10);
    }

    .price-box small {
        color:
            var(--text-muted)
            !important;
    }

    .price-box .fw-bold {
        color:
            var(--text-primary);
    }


    /* =========================================================
       INFO GRID
    ========================================================= */

    .info-grid {
        display: grid;

        grid-template-columns:
            repeat(2, 1fr);

        gap:
            12px;

        margin-top:
            20px;
    }

    .info-card {
        background:
            var(--surface-light);

        border:
            1px solid
            var(--border-color);

        border-radius:
            13px;

        padding:
            16px;

        transition:
            transform .2s ease,
            border-color .2s ease;
    }

    .info-card:hover {
        transform:
            translateY(-2px);

        border-color:
            rgba(103,232,249,.22);
    }

    .info-card i {
        color:
            var(--accent);

        margin-right:
            6px;
    }

    .info-label {
        color:
            var(--text-muted);

        font-size:
            11px;

        margin-bottom:
            5px;

        text-transform:
            uppercase;

        letter-spacing:
            .5px;
    }

    .info-value {
        color:
            var(--text-primary);

        font-weight:
            800;
    }


    /* =========================================================
       COUNTDOWN
    ========================================================= */

    .countdown {
        position: relative;
        overflow: hidden;

        background:
            linear-gradient(
                135deg,
                #111522,
                #0d1018
            );

        color:
            #eaf2ff;

        border:
            1px solid
            rgba(103,232,249,.16);

        padding:
            19px;

        border-radius:
            14px;

        font-size:
            17px;

        font-weight:
            900;

        text-align:
            center;

        margin-top:
            20px;

        letter-spacing:
            .3px;

        box-shadow:
            0 14px 35px
            rgba(0,0,0,.18);
    }

    .countdown::before {
        content: "";

        position: absolute;

        width: 110px;
        height: 110px;

        left: -45px;
        top: -55px;

        border-radius:
            50%;

        background:
            rgba(103,232,249,.08);

        filter:
            blur(20px);
    }


    /* =========================================================
       PERSONAL BID STATUS
    ========================================================= */

    .personal-status {
        border-radius:
            15px;

        padding:
            19px;

        margin-top:
            20px;

        backdrop-filter:
            blur(12px);

        -webkit-backdrop-filter:
            blur(12px);
    }

    .personal-status h5 {
        font-weight:
            900;
    }

    .status-winning-box {
        background:
            rgba(34,197,94,.10);

        border:
            1px solid
            rgba(34,197,94,.28);

        color:
            #86efac;

        box-shadow:
            0 0 26px
            rgba(34,197,94,.06);
    }

    .status-outbid-box {
        background:
            rgba(239,68,68,.10);

        border:
            1px solid
            rgba(239,68,68,.26);

        color:
            #fca5a5;
    }

    .status-won-box {
        background:
            rgba(245,158,11,.11);

        border:
            1px solid
            rgba(245,158,11,.30);

        color:
            #fcd34d;

        box-shadow:
            0 0 30px
            rgba(245,158,11,.07);
    }

    .status-lost-box {
        background:
            rgba(148,163,184,.10);

        border:
            1px solid
            rgba(148,163,184,.20);

        color:
            #cbd5e1;
    }

    html[data-theme="light"]
    .status-winning-box {
        background: #ecfdf5;
        color: #166534;
    }

    html[data-theme="light"]
    .status-outbid-box {
        background: #fef2f2;
        color: #991b1b;
    }

    html[data-theme="light"]
    .status-won-box {
        background: #fffbeb;
        color: #92400e;
    }

    html[data-theme="light"]
    .status-lost-box {
        background: #f3f4f6;
        color: #374151;
    }


    /* =========================================================
       HIGHEST BIDDER
    ========================================================= */

    .highest-bidder {
        position: relative;

        overflow: hidden;

        background:
            rgba(245,158,11,.08);

        border:
            1px solid
            rgba(245,158,11,.22);

        padding:
            18px;

        border-radius:
            14px;

        margin-top:
            17px;
    }

    .highest-bidder::after {
        content: "";

        position: absolute;

        width: 100px;
        height: 100px;

        right: -45px;
        top: -45px;

        border-radius:
            50%;

        background:
            rgba(245,158,11,.08);

        filter:
            blur(12px);
    }

    .highest-bidder i {
        color:
            var(--accent);
    }

    .highest-bidder .text-muted {
        color:
            var(--text-muted)
            !important;
    }

    .highest-bidder .fw-bold {
        color:
            var(--text-primary);
    }


    /* =========================================================
       BID CARD
    ========================================================= */

    .bid-card {
        background:
            linear-gradient(
                145deg,
                rgba(255,255,255,.04),
                rgba(255,255,255,.01)
            ),
            var(--surface);

        border-radius:
            17px;

        border:
            1px solid
            var(--border-color);

        padding:
            24px;

        margin-top:
            20px;
    }

    html[data-theme="light"]
    .bid-card {
        background:
            var(--surface);
    }

    .bid-card h5 {
        color:
            var(--text-primary);
    }

    .bid-card .text-muted {
        color:
            var(--text-muted)
            !important;
    }

    .bid-card .form-control,
    .bid-card .input-group-text {
        background:
            var(--surface-light);

        color:
            var(--text-primary);

        border-color:
            var(--border-color);

        min-height:
            50px;
    }

    .bid-card .form-control:focus {
        border-color:
            var(--accent);

        box-shadow:
            0 0 0 3px
            rgba(245,158,11,.12);
    }

    .bid-card .form-control::placeholder {
        color:
            var(--text-muted);
    }

    .bid-btn {
        min-height:
            52px;

        border:
            none;

        border-radius:
            11px;

        background:
            linear-gradient(
                135deg,
                #f59e0b,
                #fbbf24
            );

        color:
            #111827;

        font-weight:
            900;

        transition:
            transform .2s ease,
            box-shadow .2s ease;
    }

    .bid-btn:hover {
        color:
            #111827;

        transform:
            translateY(-2px);

        box-shadow:
            0 12px 30px
            rgba(245,158,11,.24);
    }


    /* =========================================================
       WINNER
    ========================================================= */

    .winner-card {
        position: relative;
        overflow: hidden;

        background:
            rgba(245,158,11,.08);

        border:
            1px solid
            rgba(245,158,11,.28);

        border-radius:
            17px;

        padding:
            26px;

        margin-top:
            20px;

        text-align:
            center;

        box-shadow:
            0 0 35px
            rgba(245,158,11,.05);
    }

    .winner-icon {
        width:
            72px;

        height:
            72px;

        margin:
            auto auto 14px;

        border-radius:
            50%;

        background:
            rgba(245,158,11,.14);

        color:
            var(--accent);

        border:
            1px solid
            rgba(245,158,11,.26);

        display:
            flex;

        align-items:
            center;

        justify-content:
            center;

        font-size:
            30px;
    }

    .winner-card h3,
    .winner-card h4 {
        color:
            var(--text-primary);
    }

    .winner-card .text-muted {
        color:
            var(--text-muted)
            !important;
    }

    .winning-price {
        color:
            var(--accent);

        font-size:
            30px;

        font-weight:
            900;
    }


    /* =========================================================
       DESCRIPTION + HISTORY
    ========================================================= */

    .description-card,
    .history-card {
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

        border-radius:
            20px;

        padding:
            28px;

        margin-top:
            25px;

        box-shadow:
            0 14px 40px
            rgba(0,0,0,.10);
    }

    html[data-theme="light"]
    .description-card,
    html[data-theme="light"]
    .history-card {
        background:
            var(--surface);
    }

    .description-card h4,
    .history-card h4 {
        color:
            var(--text-primary);
    }

    .description-card
    .text-secondary {
        color:
            var(--text-muted)
            !important;
    }

    .history-card
    .text-muted {
        color:
            var(--text-muted)
            !important;
    }


    /* =========================================================
       BID HISTORY ROW
    ========================================================= */

    .bid-row {
        display: flex;

        justify-content:
            space-between;

        align-items:
            center;

        gap:
            20px;

        padding:
            16px 0;

        border-bottom:
            1px solid
            var(--border-color);
    }

    .bid-row:last-child {
        border-bottom:
            none;
    }

    .bidder-avatar {
        width:
            43px;

        height:
            43px;

        border-radius:
            50%;

        background:
            linear-gradient(
                135deg,
                #111522,
                #1b2333
            );

        color:
            var(--accent);

        border:
            1px solid
            rgba(245,158,11,.18);

        display:
            flex;

        align-items:
            center;

        justify-content:
            center;

        font-weight:
            900;
    }

    .bid-row strong {
        color:
            var(--text-primary);
    }

    .bid-amount {
        color:
            var(--accent);

        font-weight:
            900;

        font-size:
            17px;
    }

    .highest-label {
        display:
            inline-block;

        background:
            rgba(245,158,11,.13);

        color:
            #fcd34d;

        border:
            1px solid
            rgba(245,158,11,.22);

        padding:
            4px 8px;

        border-radius:
            999px;

        font-size:
            9px;

        font-weight:
            900;

        text-transform:
            uppercase;

        margin-left:
            5px;
    }

    html[data-theme="light"]
    .highest-label {
        background:
            #fef3c7;

        color:
            #92400e;
    }


    /* =========================================================
       ALERTS
    ========================================================= */

    .alert-success {
        background:
            rgba(34,197,94,.10);

        color:
            #86efac;

        border-color:
            rgba(34,197,94,.22);
    }

    .alert-danger {
        background:
            rgba(239,68,68,.10);

        color:
            #fca5a5;

        border-color:
            rgba(239,68,68,.22);
    }

    .alert-info {
        background:
            rgba(56,189,248,.10);

        color:
            #7dd3fc;

        border-color:
            rgba(56,189,248,.22);
    }

    .alert-secondary {
        background:
            rgba(148,163,184,.10);

        color:
            #cbd5e1;

        border-color:
            rgba(148,163,184,.20);
    }

    html[data-theme="light"]
    .alert-success,
    html[data-theme="light"]
    .alert-danger,
    html[data-theme="light"]
    .alert-info,
    html[data-theme="light"]
    .alert-secondary {
        color:
            inherit;
    }


    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media(max-width: 991px) {

        .gallery-wrapper {
            position:
                static;
        }

    }

    @media(max-width: 600px) {

        .page-wrapper {
            padding:
                30px 15px 65px;
        }

        .product-card {
            padding:
                20px;
        }

        .main-image,
        .no-main-image {
            height:
                350px;
        }

        .product-title {
            font-size:
                29px;
        }

        .info-grid {
            grid-template-columns:
                1fr;
        }

        .current-price {
            font-size:
                32px;
        }

        .bid-row {
            align-items:
                flex-start;

            flex-direction:
                column;
        }

    }

</style>

</head>


<body>


<!-- =========================================
     NAVBAR
========================================== -->

<nav
    class="
        navbar
        bidzone-navbar
        px-4
        py-3
    "
>

    <a
        href="{{ route('home') }}"
        class="bidzone-brand"
    >
        Bid<span>Zone</span>
    </a>


<div class="d-flex gap-2 align-items-center">


    <!-- DARK / LIGHT THEME BUTTON -->

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


    @auth


        <a
            href="{{ route('dashboard') }}"
            class="btn btn-outline-light"
        >

            <i class="fa-solid fa-user me-2"></i>

            Dashboard

        </a>


        <form
            method="POST"
            action="{{ route('logout') }}"
        >

            @csrf


            <button
                type="submit"
                class="btn btn-outline-light"
            >

                <i class="fa-solid fa-right-from-bracket me-2"></i>

                Logout

            </button>

        </form>


    @else


        <a
            href="{{ route('login') }}"
            class="btn btn-outline-light"
        >

            <i class="fa-solid fa-right-to-bracket me-2"></i>

            Login

        </a>


    @endauth


</div>

</nav>


<div class="page-wrapper">


    <!-- BACK -->

    <a
        href="{{ route('auctions.index') }}"
        class="
            text-decoration-none
            text-secondary
        "
    >

        <i
            class="
                fa-solid
                fa-arrow-left
                me-2
            "
        ></i>

        Back to Auctions

    </a>


    <!-- SUCCESS -->

    @if(session('success'))

        <div class="alert alert-success mt-4">

            {{ session('success') }}

        </div>

    @endif


    <!-- ERRORS -->

    @if($errors->any())

        <div class="alert alert-danger mt-4">

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


    <!-- =====================================
         MAIN PRODUCT
    ====================================== -->

    <div class="product-card mt-4">


        <div class="row g-5">


            <!-- =================================
                 LEFT: IMAGE GALLERY
            ================================== -->

            <div class="col-lg-6">


                <div class="gallery-wrapper">


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


                    <div class="main-image-wrapper">


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


                            <div class="no-main-image">

                                <i
                                    class="
                                        fa-regular
                                        fa-image
                                    "
                                ></i>

                            </div>


                        @endif


                    </div>


                    @if(
                        $auction
                            ->images
                            ->count() > 1
                    )


                        <div class="thumbnail-wrapper">


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
                                        thumbnail
                                        {{ $primary
                                            &&
                                            $primary->id
                                            ===
                                            $image->id
                                                ? 'active-thumb'
                                                : ''
                                        }}
                                    "

                                    onclick="
                                        changeMainImage(
                                            this
                                        )
                                    "

                                    alt="Auction image"
                                >


                            @endforeach


                        </div>


                    @endif


                </div>


            </div>


            <!-- =================================
                 RIGHT: INFORMATION
            ================================== -->

            <div class="col-lg-6">


                <!-- CATEGORY -->

                <div class="category">

                    {{ $auction
                        ->category
                        ->name
                    }}

                </div>


                <!-- TITLE -->

                <h1 class="product-title mt-2">

                    {{ $auction->title }}

                </h1>


                <!-- SELLER -->

                <div class="seller-line mt-3">

                    <i
                        class="
                            fa-regular
                            fa-user
                            me-1
                        "
                    ></i>

                    Seller:

                    <strong>

                        {{ $auction
                            ->seller
                            ->name
                        }}

                    </strong>

                </div>


                <!-- AUCTION STATUS -->

                <div class="mt-3">


                    <span
                        class="
                            auction-status
                            status-{{ $auction->status }}
                        "
                    >


                        @if(
                            $auction->status
                            === 'active'
                        )

                            <i
                                class="
                                    fa-solid
                                    fa-circle
                                "
                                style="font-size:7px;"
                            ></i>

                            Live Auction


                        @elseif(
                            $auction->status
                            === 'scheduled'
                        )

                            <i
                                class="
                                    fa-regular
                                    fa-clock
                                "
                            ></i>

                            Upcoming


                        @else

                            <i
                                class="
                                    fa-solid
                                    fa-flag-checkered
                                "
                            ></i>

                            Ended


                        @endif


                    </span>


                </div>


                <!-- PRICE -->

                <div class="price-box">


                    <div class="price-label">

                        {{ $auction->status
                            === 'ended'
                                ? 'Final Price'
                                : 'Current Price'
                        }}

                    </div>


                    <div class="current-price">

                        ৳{{ number_format(
                            $auction->current_price,
                            2
                        ) }}

                    </div>


                    <div
                        class="
                            d-flex
                            flex-wrap
                            gap-4
                            mt-3
                        "
                    >


                        <div>

                            <small class="text-muted">

                                Starting Price

                            </small>

                            <div class="fw-bold">

                                ৳{{ number_format(
                                    $auction->starting_price,
                                    2
                                ) }}

                            </div>

                        </div>


                        <div>

                            <small class="text-muted">

                                Bid Increment

                            </small>

                            <div class="fw-bold">

                                ৳{{ number_format(
                                    $auction->bid_increment,
                                    2
                                ) }}

                            </div>

                        </div>


                    </div>


                </div>


                <!-- AUCTION INFORMATION -->

                <div class="info-grid">


                    <div class="info-card">

                        <div class="info-label">

                            <i class="fa-solid fa-gavel"></i>

                            Total Bids

                        </div>

                        <div class="info-value">

                            {{ $auction->bids_count }}

                        </div>

                    </div>


                    <div class="info-card">

                        <div class="info-label">

                            <i class="fa-solid fa-users"></i>

                            Total Bidders

                        </div>

                        <div class="info-value">

                            {{ $totalBidders }}

                        </div>

                    </div>


                    <div class="info-card">

                        <div class="info-label">

                            <i
                                class="
                                    fa-regular
                                    fa-calendar
                                "
                            ></i>

                            Starts

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


                    <div class="info-card">

                        <div class="info-label">

                            <i
                                class="
                                    fa-regular
                                    fa-calendar-check
                                "
                            ></i>

                            Ends

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


                <!-- HIGHEST BIDDER -->

                @if(
                    $auction->highestBid
                )


                    <div class="highest-bidder">


                        <div class="small text-muted">

                            <i
                                class="
                                    fa-solid
                                    fa-crown
                                    me-1
                                "
                            ></i>

                            Current Highest Bidder

                        </div>


                        <div class="fw-bold mt-1">

                            {{ $auction
                                ->highestBid
                                ->bidder
                                ->name
                            }}

                        </div>


                        <div
                            class="
                                text-warning
                                fw-bold
                                mt-1
                            "
                        >

                            ৳{{ number_format(
                                $auction
                                    ->highestBid
                                    ->amount,
                                2
                            ) }}

                        </div>


                    </div>


                @endif


                <!-- COUNTDOWN -->

                <div
                    id="countdown"

                    class="countdown"

                    data-status="{{ $auction->status }}"

                    data-start="{{ $auction
                        ->start_time
                        ->toIso8601String()
                    }}"

                    data-end="{{ $auction
                        ->end_time
                        ->toIso8601String()
                    }}"
                >

                    Loading...

                </div>


                <!-- =================================
                     BIDDER PERSONAL STATUS
                ================================== -->

                @if(
                    $bidderStatus
                    === 'winning'
                )


                    <div
                        class="
                            personal-status
                            status-winning-box
                        "
                    >


                        <h5>

                            <i
                                class="
                                    fa-solid
                                    fa-arrow-trend-up
                                    me-2
                                "
                            ></i>

                            You Are Winning!

                        </h5>


                        <div>

                            You currently have the
                            highest bid on this auction.

                        </div>


                        @if($userHighestBid)

                            <div class="fw-bold mt-2">

                                Your highest bid:

                                ৳{{ number_format(
                                    $userHighestBid,
                                    2
                                ) }}

                            </div>

                        @endif


                    </div>


                @elseif(
                    $bidderStatus
                    === 'outbid'
                )


                    <div
                        class="
                            personal-status
                            status-outbid-box
                        "
                    >


                        <h5>

                            <i
                                class="
                                    fa-solid
                                    fa-arrow-trend-down
                                    me-2
                                "
                            ></i>

                            You Have Been Outbid

                        </h5>


                        <div>

                            Another bidder currently
                            has a higher bid.

                        </div>


                        @if($userHighestBid)

                            <div class="fw-bold mt-2">

                                Your highest bid:

                                ৳{{ number_format(
                                    $userHighestBid,
                                    2
                                ) }}

                            </div>

                        @endif


                    </div>


                @elseif(
                    $bidderStatus
                    === 'won'
                )


                    <div
                        class="
                            personal-status
                            status-won-box
                        "
                    >


                        <h5>

                            <i
                                class="
                                    fa-solid
                                    fa-trophy
                                    me-2
                                "
                            ></i>

                            Congratulations! You Won

                        </h5>


                        <div>

                            You were the highest bidder
                            when this auction ended.

                        </div>


                    </div>


                @elseif(
                    $bidderStatus
                    === 'lost'
                )


                    <div
                        class="
                            personal-status
                            status-lost-box
                        "
                    >


                        <h5>

                            <i
                                class="
                                    fa-solid
                                    fa-circle-xmark
                                    me-2
                                "
                            ></i>

                            Auction Lost

                        </h5>


                        <div>

                            This auction ended with
                            another bidder having the
                            highest bid.

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


                    <div class="winner-card">


                        @if($auction->winner)


                            <div class="winner-icon">

                                <i
                                    class="
                                        fa-solid
                                        fa-trophy
                                    "
                                ></i>

                            </div>


                            <h4 class="fw-bold">

                                Auction Winner

                            </h4>


                            <h3 class="fw-bold">

                                {{ $auction
                                    ->winner
                                    ->name
                                }}

                            </h3>


                            <div class="text-muted">

                                Winning Bid

                            </div>


                            <div class="winning-price">

                                ৳{{ number_format(
                                    $auction->current_price,
                                    2
                                ) }}

                            </div>


                        @else


                            <div class="winner-icon">

                                <i
                                    class="
                                        fa-solid
                                        fa-gavel
                                    "
                                ></i>

                            </div>


                            <h4 class="fw-bold">

                                Auction Ended

                            </h4>


                            <p
                                class="
                                    text-muted
                                    mb-0
                                "
                            >

                                No bids were placed
                                for this auction.

                            </p>


                        @endif


                    </div>


                @endif


                <!-- =================================
                     BID FORM
                ================================== -->

                <div class="bid-card">


                    @if(
                        $auction->status
                        === 'active'
                    )


                        @auth


                            @if(
                                auth()->user()->role
                                === 'bidder'
                            )


                                <h5 class="fw-bold">

                                    Place Your Bid

                                </h5>


                                <p class="text-muted">

                                    Minimum acceptable bid:

                                    <strong>

                                        ৳{{ number_format(
                                            $minimumBid,
                                            2
                                        ) }}

                                    </strong>

                                </p>


                                @if(
                                    $userBidCount > 0
                                )


                                    <div
                                        class="
                                            small
                                            text-muted
                                            mb-3
                                        "
                                    >

                                        You have placed

                                        <strong>
                                            {{ $userBidCount }}
                                        </strong>

                                        {{ $userBidCount === 1
                                            ? 'bid'
                                            : 'bids'
                                        }}

                                        on this auction.

                                    </div>


                                @endif


                                <form
                                    method="POST"

                                    action="{{ route(
                                        'bidder.auctions.bid',
                                        $auction
                                    ) }}"
                                >


                                    @csrf


                                    <div
                                        class="
                                            input-group
                                            mb-3
                                        "
                                    >


                                        <span
                                            class="
                                                input-group-text
                                            "
                                        >
                                            ৳
                                        </span>


                                        <input
                                            type="number"

                                            name="amount"

                                            class="form-control"

                                            step="0.01"

                                            min="{{ $minimumBid }}"

                                            value="{{ old(
                                                'amount'
                                            ) }}"

                                            placeholder="{{ number_format(
                                                $minimumBid,
                                                2,
                                                '.',
                                                ''
                                            ) }}"

                                            required
                                        >


                                    </div>


                                    <button
                                        type="submit"

                                        class="
                                            btn
                                            bid-btn
                                            w-100
                                        "
                                    >

                                        <i
                                            class="
                                                fa-solid
                                                fa-gavel
                                                me-2
                                            "
                                        ></i>

                                        Place Bid

                                    </button>


                                </form>


                            @else


                                <div
                                    class="
                                        alert
                                        alert-info
                                        mb-0
                                    "
                                >

                                    Only bidder accounts
                                    can place bids.

                                </div>


                            @endif


                        @else


                            <p class="text-muted">

                                Login as a bidder to
                                participate in this auction.

                            </p>


                            <a
                                href="{{ route('login') }}"

                                class="
                                    btn
                                    bid-btn
                                    w-100
                                "
                            >
                                Login to Bid
                            </a>


                        @endauth


                    @elseif(
                        $auction->status
                        === 'scheduled'
                    )


                        <div
                            class="
                                alert
                                alert-info
                                mb-0
                            "
                        >

                            <i
                                class="
                                    fa-regular
                                    fa-clock
                                    me-2
                                "
                            ></i>

                            This auction has not
                            started yet.

                        </div>


                    @elseif(
                        $auction->status
                        === 'ended'
                    )


                        <div
                            class="
                                alert
                                alert-secondary
                                mb-0
                            "
                        >

                            <i
                                class="
                                    fa-solid
                                    fa-flag-checkered
                                    me-2
                                "
                            ></i>

                            Bidding is closed.

                        </div>


                    @endif


                </div>


            </div>


        </div>


    </div>


    <!-- =====================================
         DESCRIPTION
    ====================================== -->

    <div class="description-card">


        <h4 class="fw-bold mb-3">

            <i
                class="
                    fa-solid
                    fa-align-left
                    me-2
                    text-warning
                "
            ></i>

            Auction Description

        </h4>


        <p
            class="
                mb-0
                text-secondary
                lh-lg
            "
        >

            {{ $auction->description }}

        </p>


    </div>


    <!-- =====================================
         BID HISTORY
    ====================================== -->

    <div class="history-card">


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


            <h4 class="fw-bold mb-0">

                <i
                    class="
                        fa-solid
                        fa-clock-rotate-left
                        me-2
                        text-warning
                    "
                ></i>

                Recent Bids

            </h4>


            <span class="text-muted">

                Total:

                <strong>
                    {{ $auction->bids_count }}
                </strong>

            </span>


        </div>


        @if(
            $auction->bids->count()
        )


            @foreach(
                $auction->bids
                as $bid
            )


                <div class="bid-row">


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


                            @if(
                                $auction->highestBid
                                &&
                                $auction
                                    ->highestBid
                                    ->id
                                ===
                                $bid->id
                            )


                                <span class="highest-label">

                                    Highest

                                </span>


                            @endif


                            <div
                                class="
                                    small
                                    text-muted
                                "
                            >

                                {{ $bid
                                    ->created_at
                                    ->format(
                                        'd M Y, h:i:s A'
                                    )
                                }}

                            </div>


                        </div>


                    </div>


                    <div class="bid-amount">

                        ৳{{ number_format(
                            $bid->amount,
                            2
                        ) }}

                    </div>


                </div>


            @endforeach


        @else


            <div
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


                No bids have been placed yet.


                @if(
                    $auction->status
                    === 'active'
                )

                    <div class="mt-1">

                        Be the first bidder!

                    </div>

                @endif


            </div>


        @endif


    </div>


</div>


<!-- =========================================
     JAVASCRIPT
========================================== -->

<script>


/*
|--------------------------------------------------------------------------
| IMAGE GALLERY
|--------------------------------------------------------------------------
*/

function changeMainImage(
    thumbnail
) {

    const mainImage =
        document.getElementById(
            'mainImage'
        );


    if (!mainImage) {
        return;
    }


    mainImage.src =
        thumbnail.src;


    document
        .querySelectorAll(
            '.thumbnail'
        )
        .forEach(
            function (image) {

                image.classList.remove(
                    'active-thumb'
                );
            }
        );


    thumbnail
        .classList
        .add(
            'active-thumb'
        );

}


/*
|--------------------------------------------------------------------------
| COUNTDOWN
|--------------------------------------------------------------------------
*/

const countdown =
    document.getElementById(
        'countdown'
    );


const auctionStatus =
    countdown.dataset.status;


const startTime =
    new Date(
        countdown.dataset.start
    ).getTime();


const endTime =
    new Date(
        countdown.dataset.end
    ).getTime();


let reloadScheduled =
    false;


function formatTime(
    distance
) {

    const days =
        Math.floor(
            distance /
            (
                1000
                *
                60
                *
                60
                *
                24
            )
        );


    const hours =
        Math.floor(
            (
                distance
                %
                (
                    1000
                    *
                    60
                    *
                    60
                    *
                    24
                )
            )
            /
            (
                1000
                *
                60
                *
                60
            )
        );


    const minutes =
        Math.floor(
            (
                distance
                %
                (
                    1000
                    *
                    60
                    *
                    60
                )
            )
            /
            (
                1000
                *
                60
            )
        );


    const seconds =
        Math.floor(
            (
                distance
                %
                (
                    1000
                    *
                    60
                )
            )
            /
            1000
        );


    return (
        days
        +
        'd '
        +
        hours
        +
        'h '
        +
        minutes
        +
        'm '
        +
        seconds
        +
        's'
    );

}


function scheduleReload() {

    if (reloadScheduled) {
        return;
    }


    reloadScheduled =
        true;


    setTimeout(
        function () {

            window.location.reload();

        },
        1500
    );

}


function updateCountdown() {


    const now =
        new Date()
            .getTime();


    /*
    |--------------------------------------------------------------------------
    | NOT STARTED
    |--------------------------------------------------------------------------
    */

    if (
        now < startTime
    ) {


        countdown.innerHTML =
            '<i class="fa-regular fa-clock me-2"></i>'
            +
            'Auction starts in: '
            +
            formatTime(
                startTime - now
            );


        return;
    }


    /*
    |--------------------------------------------------------------------------
    | START TIME REACHED
    |--------------------------------------------------------------------------
    */

    if (
        now >= startTime
        &&
        now < endTime
    ) {


        countdown.innerHTML =
            '<i class="fa-solid fa-hourglass-half me-2"></i>'
            +
            'Auction ends in: '
            +
            formatTime(
                endTime - now
            );


        /*
         * Page was originally loaded
         * while auction was scheduled.
         *
         * Refresh so backend changes
         * scheduled -> active and the
         * bid form appears.
         */
        if (
            auctionStatus
            === 'scheduled'
        ) {

            scheduleReload();

        }


        return;
    }


    /*
    |--------------------------------------------------------------------------
    | AUCTION ENDED
    |--------------------------------------------------------------------------
    */

    countdown.innerHTML =
        '<i class="fa-solid fa-flag-checkered me-2"></i>'
        +
        'Auction Ended';


    /*
     * Refresh to process winner
     * and show final result.
     */
    if (
        auctionStatus
        !== 'ended'
    ) {

        scheduleReload();

    }

}


updateCountdown();


setInterval(
    updateCountdown,
    1000
);


</script>


<!-- =========================================
     BIDZONE DARK / LIGHT THEME
========================================== -->

<script
    src="{{ asset('js/bidzone-theme.js') }}"
></script>


</body>
</html>