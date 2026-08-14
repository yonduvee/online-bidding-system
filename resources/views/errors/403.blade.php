<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>403 | Access Denied - BidZone</title>


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


        body {
            margin: 0;

            min-height: 100vh;

            display: flex;

            align-items: center;

            justify-content: center;

            padding: 30px;

            overflow-x: hidden;

            background:
                radial-gradient(
                    circle at 15% 15%,
                    rgba(103,232,249,.08),
                    transparent 28%
                ),
                radial-gradient(
                    circle at 85% 20%,
                    rgba(245,158,11,.10),
                    transparent 30%
                ),
                radial-gradient(
                    circle at 50% 100%,
                    rgba(239,68,68,.06),
                    transparent 32%
                ),
                var(--bg-primary);

            color:
                var(--text-primary);

            font-family:
                Arial,
                sans-serif;
        }


        /* =============================================
           DECORATION
        ============================================= */

        .ambient-one,
        .ambient-two {
            position: fixed;

            border-radius: 50%;

            filter: blur(70px);

            pointer-events: none;

            z-index: 0;
        }


        .ambient-one {
            width: 300px;
            height: 300px;

            top: -140px;
            left: -120px;

            background:
                rgba(103,232,249,.08);
        }


        .ambient-two {
            width: 330px;
            height: 330px;

            right: -150px;
            bottom: -160px;

            background:
                rgba(245,158,11,.09);
        }


        /* =============================================
           WRAPPER
        ============================================= */

        .error-wrapper {
            position: relative;

            z-index: 2;

            width: 100%;

            max-width: 900px;
        }


        /* =============================================
           TOP CONTROL
        ============================================= */

        .error-topbar {
            display: flex;

            justify-content: space-between;

            align-items: center;

            gap: 15px;

            margin-bottom: 16px;
        }


        .brand {
            color:
                var(--text-primary);

            text-decoration: none;

            font-size: 28px;

            font-weight: 900;

            letter-spacing: -.7px;
        }


        .brand span {
            color:
                var(--accent);
        }


        /* =============================================
           ERROR CARD
        ============================================= */

        .error-card {
            position: relative;

            overflow: hidden;

            padding:
                58px 38px;

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

            border-radius: 26px;

            box-shadow:
                0 30px 80px
                rgba(0,0,0,.15);

            backdrop-filter:
                blur(18px);
        }


        html[data-theme="light"]
        .error-card {
            background:
                var(--surface);
        }


        .error-card::before {
            content: "";

            position: absolute;

            width: 260px;
            height: 260px;

            top: -170px;
            right: -120px;

            border-radius: 50%;

            background:
                rgba(239,68,68,.08);

            filter:
                blur(35px);
        }


        .error-card::after {
            content: "";

            position: absolute;

            width: 240px;
            height: 240px;

            left: -140px;
            bottom: -160px;

            border-radius: 50%;

            background:
                rgba(245,158,11,.07);

            filter:
                blur(35px);
        }


        .error-content {
            position: relative;

            z-index: 2;
        }


        /* =============================================
           STATUS LABEL
        ============================================= */

        .error-label {
            display: inline-flex;

            align-items: center;

            gap: 7px;

            margin-bottom: 22px;

            padding:
                7px 12px;

            color:
                #fca5a5;

            background:
                rgba(239,68,68,.08);

            border:
                1px solid
                rgba(239,68,68,.18);

            border-radius:
                999px;

            font-size: 10px;

            font-weight: 900;

            letter-spacing: 1.2px;

            text-transform: uppercase;
        }


        /* =============================================
           ICON
        ============================================= */

        .icon-box {
            position: relative;

            width: 96px;
            height: 96px;

            display: flex;

            align-items: center;

            justify-content: center;

            margin:
                0 auto 25px;

            color:
                #f87171;

            background:
                linear-gradient(
                    145deg,
                    rgba(239,68,68,.14),
                    rgba(239,68,68,.05)
                );

            border:
                1px solid
                rgba(239,68,68,.22);

            border-radius: 24px;

            font-size: 39px;

            box-shadow:
                0 18px 38px
                rgba(239,68,68,.08);
        }


        .icon-box::after {
            content: "";

            position: absolute;

            inset: 10px;

            border:
                1px dashed
                rgba(239,68,68,.18);

            border-radius: 17px;
        }


        /* =============================================
           ERROR NUMBER
        ============================================= */

        .error-code {
            margin: 0;

            font-size: clamp(
                75px,
                11vw,
                115px
            );

            line-height: .9;

            font-weight: 900;

            letter-spacing: -5px;

            background:
                linear-gradient(
                    135deg,
                    var(--text-primary),
                    var(--text-muted)
                );

            -webkit-background-clip: text;

            -webkit-text-fill-color: transparent;

            background-clip: text;
        }


        .error-title {
            margin-top: 19px;

            color:
                var(--text-primary);

            font-size: 31px;

            font-weight: 900;

            letter-spacing: -.5px;
        }


        .error-message {
            max-width: 590px;

            margin:
                15px auto 30px;

            color:
                var(--text-muted);

            line-height: 1.75;

            font-size: 14px;
        }


        /* =============================================
           SECURITY NOTE
        ============================================= */

        .security-note {
            max-width: 560px;

            display: flex;

            align-items: flex-start;

            gap: 11px;

            margin:
                0 auto 30px;

            padding:
                13px 16px;

            text-align: left;

            background:
                rgba(103,232,249,.045);

            color:
                var(--text-muted);

            border:
                1px solid
                rgba(103,232,249,.11);

            border-radius: 12px;

            font-size: 11px;

            line-height: 1.55;
        }


        .security-note i {
            margin-top: 2px;

            color:
                var(--cyan);
        }


        /* =============================================
           BUTTONS
        ============================================= */

        .action-area {
            display: flex;

            justify-content: center;

            flex-wrap: wrap;

            gap: 10px;
        }


        .home-btn {
            min-height: 48px;

            display: inline-flex;

            align-items: center;

            justify-content: center;

            padding:
                10px 22px;

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


        .home-btn:hover {
            color:
                #111827;

            transform:
                translateY(-2px);

            box-shadow:
                0 10px 28px
                rgba(245,158,11,.20);
        }


        .back-btn {
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

            border-radius: 11px;

            font-weight: 800;

            transition:
                .2s ease;
        }


        .back-btn:hover {
            color:
                var(--accent);

            background:
                var(--surface-light);

            border-color:
                var(--accent);

            transform:
                translateY(-2px);
        }


        /* =============================================
           FOOTER
        ============================================= */

        .error-footer {
            margin-top: 18px;

            text-align: center;

            color:
                var(--text-muted);

            font-size: 10px;

            letter-spacing: .3px;
        }


        .error-footer i {
            color:
                var(--accent);
        }


        /* =============================================
           RESPONSIVE
        ============================================= */

        @media(max-width: 600px) {

            body {
                padding: 18px;
            }


            .error-card {
                padding:
                    42px 20px;
            }


            .error-title {
                font-size: 25px;
            }


            .icon-box {
                width: 82px;
                height: 82px;

                font-size: 33px;

                border-radius: 20px;
            }


            .action-area {
                flex-direction: column;
            }


            .home-btn,
            .back-btn {
                width: 100%;
            }

        }

    </style>

</head>


<body>


<div class="ambient-one"></div>

<div class="ambient-two"></div>


<div class="error-wrapper">


    <!-- =============================================
         TOP
    ============================================== -->

    <div class="error-topbar">


        <a
            href="{{ route('home') }}"
            class="brand"
        >

            Bid<span>Zone</span>

        </a>


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


    </div>


    <!-- =============================================
         ERROR CARD
    ============================================== -->

    <div class="error-card">


        <div class="error-content">


            <div class="error-label">

                <i class="fa-solid fa-lock"></i>

                Restricted Access

            </div>


            <div class="icon-box">

                <i class="fa-solid fa-shield-halved"></i>

            </div>


            <div class="error-code">

                403

            </div>


            <h1 class="error-title">

                Access Denied

            </h1>


            <p class="error-message">

                {{ $exception->getMessage()
                    ?: 'You do not have permission to access this page.'
                }}

            </p>


            <div class="security-note">

                <i class="fa-solid fa-circle-info"></i>

                <div>

                    This page is protected by BidZone's
                    access control system. Return to an
                    area available for your account.

                </div>

            </div>


            <!-- =========================================
                 ACTIONS
            ========================================== -->

            <div class="action-area">


                @auth


                    <a
                        href="{{ route('dashboard') }}"
                        class="btn home-btn"
                    >

                        <i class="fa-solid fa-house me-2"></i>

                        Go to Dashboard

                    </a>


                @else


                    <a
                        href="{{ route('home') }}"
                        class="btn home-btn"
                    >

                        <i class="fa-solid fa-house me-2"></i>

                        Go to Home

                    </a>


                @endauth


                <button
                    type="button"
                    class="btn back-btn"
                    onclick="history.back()"
                >

                    <i class="fa-solid fa-arrow-left me-2"></i>

                    Go Back

                </button>


            </div>


        </div>


    </div>


    <div class="error-footer">

        <i class="fa-solid fa-shield-halved me-1"></i>

        BidZone Secure Access

    </div>


</div>


<!-- =============================================
     BIDZONE DARK / LIGHT THEME
============================================== -->

<script
    src="{{ asset('js/bidzone-theme.js') }}"
></script>


</body>

</html>