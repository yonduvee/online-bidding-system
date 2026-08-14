<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Login | BidZone</title>


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

        body {
            min-height: 100vh;

            background:
                radial-gradient(
                    circle at 15% 10%,
                    rgba(103, 232, 249, .09),
                    transparent 30%
                ),
                radial-gradient(
                    circle at 85% 15%,
                    rgba(245, 158, 11, .10),
                    transparent 28%
                ),
                var(--bg-primary);

            color:
                var(--text-primary);

            display: flex;
            flex-direction: column;
        }


        /* =====================================================
           NAVBAR
        ===================================================== */

        .login-navbar {
            padding: 18px 30px;

            display: flex;
            justify-content: space-between;
            align-items: center;

            border-bottom:
                1px solid
                var(--border-color);

            background:
                rgba(13, 16, 24, .78);

            backdrop-filter:
                blur(18px);
        }

        html[data-theme="light"]
        .login-navbar {
            background:
                rgba(255, 255, 255, .82);
        }

        .login-navbar-right {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .register-link {
            color:
                var(--text-primary);

            border:
                1px solid
                var(--border-color);

            border-radius:
                10px;

            padding:
                9px 16px;

            text-decoration:
                none;

            font-weight:
                700;

            transition:
                .2s ease;
        }

        .register-link:hover {
            color:
                #111827;

            background:
                var(--accent);

            border-color:
                var(--accent);
        }


        /* =====================================================
           PAGE
        ===================================================== */

        .login-wrapper {
            flex: 1;

            width: 100%;

            display: flex;
            align-items: center;
            justify-content: center;

            padding:
                55px 20px;
        }

        .login-grid {
            width: 100%;
            max-width: 1050px;

            display: grid;

            grid-template-columns:
                1fr 1fr;

            overflow: hidden;

            border:
                1px solid
                var(--border-color);

            border-radius:
                26px;

            box-shadow:
                var(--card-shadow);

            background:
                var(--surface);
        }


        /* =====================================================
           LEFT CINEMATIC SIDE
        ===================================================== */

        .login-visual {
            position: relative;

            min-height:
                610px;

            padding:
                55px;

            overflow: hidden;

            display: flex;
            flex-direction: column;
            justify-content: space-between;

            background:
                linear-gradient(
                    145deg,
                    #0d1018,
                    #111827 55%,
                    #151a28
                );

            color:
                white;
        }

        .login-visual::before {
            content: "";

            position: absolute;

            width: 340px;
            height: 340px;

            top: -130px;
            right: -120px;

            border-radius: 50%;

            background:
                rgba(103, 232, 249, .12);

            filter:
                blur(55px);
        }

        .login-visual::after {
            content: "";

            position: absolute;

            width: 320px;
            height: 320px;

            bottom: -140px;
            left: -130px;

            border-radius: 50%;

            background:
                rgba(245, 158, 11, .13);

            filter:
                blur(55px);
        }

        .visual-content {
            position: relative;
            z-index: 2;
        }

        .visual-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;

            padding:
                7px 12px;

            border:
                1px solid
                rgba(103, 232, 249, .20);

            background:
                rgba(103, 232, 249, .07);

            border-radius:
                999px;

            color:
                #a5f3fc;

            font-size:
                11px;

            font-weight:
                800;

            letter-spacing:
                .7px;

            text-transform:
                uppercase;
        }

        .login-visual h1 {
            margin-top:
                25px;

            font-size:
                48px;

            line-height:
                1.08;

            font-weight:
                900;

            letter-spacing:
                -1.5px;
        }

        .login-visual h1 span {
            color:
                var(--accent);
        }

        .login-visual p {
            margin-top:
                18px;

            max-width:
                430px;

            color:
                #9ca9bd;

            line-height:
                1.75;
        }

        .visual-points {
            position: relative;
            z-index: 2;

            display: grid;
            gap: 12px;
        }

        .visual-point {
            display: flex;
            align-items: center;
            gap: 12px;

            color:
                #dbe4f0;

            font-size:
                14px;
        }

        .visual-point i {
            width: 34px;
            height: 34px;

            border-radius:
                10px;

            display: flex;
            align-items: center;
            justify-content: center;

            background:
                rgba(245, 158, 11, .10);

            color:
                var(--accent);
        }


        /* =====================================================
           LOGIN FORM SIDE
        ===================================================== */

        .login-panel {
            padding:
                55px 48px;

            background:
                linear-gradient(
                    145deg,
                    rgba(255,255,255,.035),
                    rgba(255,255,255,.008)
                ),
                var(--surface);
        }

        html[data-theme="light"]
        .login-panel {
            background:
                var(--surface);
        }

        .login-panel h2 {
            color:
                var(--text-primary);

            font-weight:
                900;

            letter-spacing:
                -.6px;
        }

        .login-panel-subtitle {
            color:
                var(--text-muted);

            margin-top:
                8px;

            margin-bottom:
                30px;
        }


        /* =====================================================
           FORM
        ===================================================== */

        .form-label {
            color:
                var(--text-primary);

            font-weight:
                700;
        }

        .input-shell {
            position: relative;
        }

        .input-shell i {
            position: absolute;

            left: 16px;
            top: 50%;

            transform:
                translateY(-50%);

            color:
                var(--text-muted);

            z-index: 2;
        }

        .login-input {
            width: 100%;

            min-height:
                52px;

            padding:
                12px 15px 12px 46px;

            border-radius:
                12px;

            border:
                1px solid
                var(--border-color);

            background:
                var(--surface-light);

            color:
                var(--text-primary);

            outline:
                none;

            transition:
                .2s ease;
        }

        .login-input::placeholder {
            color:
                var(--text-muted);
        }

        .login-input:focus {
            border-color:
                var(--accent);

            box-shadow:
                0 0 0 3px
                rgba(245, 158, 11, .11);
        }

        .form-check-input {
            background-color:
                var(--surface-light);

            border-color:
                var(--border-color);
        }

        .form-check-input:checked {
            background-color:
                var(--accent);

            border-color:
                var(--accent);
        }

        .form-check-label {
            color:
                var(--text-muted);
        }


        /* =====================================================
           LOGIN BUTTON
        ===================================================== */

        .login-btn {
            min-height:
                52px;

            width:
                100%;

            border:
                none;

            border-radius:
                12px;

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

        .login-btn:hover {
            transform:
                translateY(-2px);

            box-shadow:
                0 12px 35px
                rgba(245, 158, 11, .22);
        }


        /* =====================================================
           ALERT
        ===================================================== */

        .alert-success {
            background:
                rgba(34, 197, 94, .10);

            color:
                #86efac;

            border-color:
                rgba(34, 197, 94, .22);
        }

        .alert-danger {
            background:
                rgba(239, 68, 68, .10);

            color:
                #fca5a5;

            border-color:
                rgba(239, 68, 68, .22);
        }

        html[data-theme="light"]
        .alert-success,
        html[data-theme="light"]
        .alert-danger {
            color:
                inherit;
        }


        /* =====================================================
           BOTTOM LINK
        ===================================================== */

        .signup-text {
            color:
                var(--text-muted);

            text-align:
                center;

            margin-top:
                24px;
        }

        .signup-text a {
            color:
                var(--accent);

            font-weight:
                800;

            text-decoration:
                none;
        }

        .signup-text a:hover {
            text-decoration:
                underline;
        }


        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media(max-width: 900px) {

            .login-grid {
                grid-template-columns:
                    1fr;

                max-width:
                    600px;
            }

            .login-visual {
                min-height:
                    auto;

                padding:
                    40px;

                gap:
                    40px;
            }

        }

        @media(max-width: 600px) {

            .login-navbar {
                padding:
                    15px;
            }

            .login-panel {
                padding:
                    38px 22px;
            }

            .login-visual {
                padding:
                    35px 25px;
            }

            .login-visual h1 {
                font-size:
                    38px;
            }

            .register-link {
                display:
                    none;
            }

        }

    </style>

</head>


<body>


<!-- =========================================================
     NAVBAR
========================================================= -->

<nav class="login-navbar">

    <a
        href="{{ route('home') }}"
        class="bidzone-brand"
    >
        Bid<span>Zone</span>
    </a>


    <div class="login-navbar-right">


        <button
            type="button"
            class="theme-toggle"
            onclick="toggleBidZoneTheme()"
            title="Switch theme"
        >

            <i
                class="
                    fa-solid
                    fa-sun
                    bidzone-theme-icon
                "
            ></i>

        </button>


        <a
            href="{{ route('register') }}"
            class="register-link"
        >
            Create Account
        </a>


    </div>

</nav>


<!-- =========================================================
     CONTENT
========================================================= -->

<div class="login-wrapper">


    <div class="login-grid">


        <!-- =================================================
             LEFT
        ================================================== -->

        <div class="login-visual">


            <div class="visual-content">


                <div class="visual-badge">

                    <i class="fa-solid fa-bolt"></i>

                    Live Auction Platform

                </div>


                <h1>

                    Bid smarter.
                    <br>

                    <span>
                        Win faster.
                    </span>

                </h1>


                <p>

                    Access your BidZone account to explore
                    live auctions, manage listings and track
                    every bid from one secure platform.

                </p>


            </div>


            <div class="visual-points">


                <div class="visual-point">

                    <i class="fa-solid fa-gavel"></i>

                    <span>
                        Real-time competitive bidding
                    </span>

                </div>


                <div class="visual-point">

                    <i class="fa-solid fa-shield-halved"></i>

                    <span>
                        Role-based secure account access
                    </span>

                </div>


                <div class="visual-point">

                    <i class="fa-solid fa-chart-line"></i>

                    <span>
                        Track auctions, bids and wins
                    </span>

                </div>


            </div>


        </div>


        <!-- =================================================
             RIGHT
        ================================================== -->

        <div class="login-panel">


            <h2>
                Welcome Back
            </h2>


            <div class="login-panel-subtitle">

                Sign in to continue to your BidZone dashboard.

            </div>


            <!-- SUCCESS -->

            @if(session('success'))

                <div class="alert alert-success">

                    {{ session('success') }}

                </div>

            @endif


            <!-- ERRORS -->

            @if($errors->any())

                <div class="alert alert-danger">

                    @foreach($errors->all() as $error)

                        <div>
                            {{ $error }}
                        </div>

                    @endforeach

                </div>

            @endif


            <!-- LOGIN FORM -->

            <form
                method="POST"
                action="{{ route('login.store') }}"
            >

                @csrf


                <!-- EMAIL -->

                <div class="mb-4">


                    <label class="form-label">

                        Email Address

                    </label>


                    <div class="input-shell">

                        <i class="fa-regular fa-envelope"></i>


                        <input
                            type="email"
                            name="email"
                            class="login-input"
                            value="{{ old('email') }}"
                            placeholder="you@example.com"
                            autocomplete="email"
                            required
                            autofocus
                        >

                    </div>


                </div>


                <!-- PASSWORD -->

                <div class="mb-3">


                    <label class="form-label">

                        Password

                    </label>


                    <div class="input-shell">

                        <i class="fa-solid fa-lock"></i>


                        <input
                            type="password"
                            name="password"
                            class="login-input"
                            placeholder="Enter your password"
                            autocomplete="current-password"
                            required
                        >

                    </div>


                </div>


                <!-- REMEMBER -->

                <div class="form-check mb-4">

                    <input
                        class="form-check-input"
                        type="checkbox"
                        name="remember"
                        value="1"
                        id="remember"
                        {{ old('remember') ? 'checked' : '' }}
                    >

                    <label
                        class="form-check-label"
                        for="remember"
                    >
                        Remember me
                    </label>

                </div>


                <!-- BUTTON -->

                <button
                    type="submit"
                    class="login-btn"
                >

                    <i
                        class="
                            fa-solid
                            fa-arrow-right-to-bracket
                            me-2
                        "
                    ></i>

                    Sign In

                </button>


            </form>


            <div class="signup-text">

                Don't have an account?

                <a href="{{ route('register') }}">
                    Create one
                </a>

            </div>


        </div>


    </div>


</div>


<script
    src="{{ asset('js/bidzone-theme.js') }}"
></script>


</body>

</html>