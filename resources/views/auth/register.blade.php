<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Register | BidZone</title>


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
                    circle at 10% 8%,
                    rgba(103, 232, 249, .09),
                    transparent 30%
                ),
                radial-gradient(
                    circle at 90% 10%,
                    rgba(245, 158, 11, .10),
                    transparent 28%
                ),
                var(--bg-primary);

            color: var(--text-primary);

            display: flex;
            flex-direction: column;
        }


        /* =====================================================
           NAVBAR
        ===================================================== */

        .register-navbar {
            padding: 18px 30px;

            display: flex;
            justify-content: space-between;
            align-items: center;

            border-bottom:
                1px solid
                var(--border-color);

            background:
                rgba(13, 16, 24, .78);

            backdrop-filter: blur(18px);
        }

        html[data-theme="light"]
        .register-navbar {
            background:
                rgba(255, 255, 255, .82);
        }

        .navbar-right {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .login-link {
            color:
                var(--text-primary);

            border:
                1px solid
                var(--border-color);

            border-radius: 10px;

            padding: 9px 16px;

            text-decoration: none;

            font-weight: 700;

            transition: .2s ease;
        }

        .login-link:hover {
            color: #111827;

            background:
                var(--accent);

            border-color:
                var(--accent);
        }


        /* =====================================================
           PAGE
        ===================================================== */

        .register-wrapper {
            flex: 1;

            display: flex;
            align-items: center;
            justify-content: center;

            padding:
                55px 20px;
        }

        .register-grid {
            width: 100%;
            max-width: 1100px;

            display: grid;

            grid-template-columns:
                .9fr 1.1fr;

            border:
                1px solid
                var(--border-color);

            border-radius:
                26px;

            overflow: hidden;

            background:
                var(--surface);

            box-shadow:
                var(--card-shadow);
        }


        /* =====================================================
           LEFT
        ===================================================== */

        .register-visual {
            position: relative;

            min-height: 680px;

            padding: 55px;

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

            color: white;
        }

        .register-visual::before {
            content: "";

            position: absolute;

            width: 360px;
            height: 360px;

            top: -160px;
            right: -150px;

            border-radius: 50%;

            background:
                rgba(103, 232, 249, .13);

            filter: blur(60px);
        }

        .register-visual::after {
            content: "";

            position: absolute;

            width: 330px;
            height: 330px;

            bottom: -160px;
            left: -130px;

            border-radius: 50%;

            background:
                rgba(245, 158, 11, .13);

            filter: blur(60px);
        }

        .visual-content,
        .visual-points {
            position: relative;
            z-index: 2;
        }

        .visual-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;

            padding:
                7px 12px;

            border-radius:
                999px;

            border:
                1px solid
                rgba(245, 158, 11, .24);

            background:
                rgba(245, 158, 11, .08);

            color:
                #fcd34d;

            font-size: 11px;

            font-weight: 800;

            letter-spacing: .7px;

            text-transform: uppercase;
        }

        .register-visual h1 {
            margin-top: 25px;

            font-size: 46px;

            line-height: 1.08;

            font-weight: 900;

            letter-spacing: -1.5px;
        }

        .register-visual h1 span {
            color:
                var(--accent);
        }

        .register-visual p {
            margin-top: 18px;

            max-width: 430px;

            color: #9ca9bd;

            line-height: 1.75;
        }

        .visual-points {
            display: grid;
            gap: 12px;
        }

        .visual-point {
            display: flex;
            align-items: center;
            gap: 12px;

            color: #dbe4f0;

            font-size: 14px;
        }

        .visual-point i {
            width: 35px;
            height: 35px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 10px;

            background:
                rgba(103, 232, 249, .08);

            color:
                var(--cyan);
        }


        /* =====================================================
           FORM PANEL
        ===================================================== */

        .register-panel {
            padding:
                48px;

            background:
                linear-gradient(
                    145deg,
                    rgba(255,255,255,.035),
                    rgba(255,255,255,.008)
                ),
                var(--surface);
        }

        html[data-theme="light"]
        .register-panel {
            background:
                var(--surface);
        }

        .register-panel h2 {
            color:
                var(--text-primary);

            font-weight: 900;

            letter-spacing: -.6px;
        }

        .register-subtitle {
            color:
                var(--text-muted);

            margin-top: 8px;

            margin-bottom: 28px;
        }


        /* =====================================================
           INPUTS
        ===================================================== */

        .form-label {
            color:
                var(--text-primary);

            font-weight: 700;
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

        .register-input,
        .register-select {
            width: 100%;

            min-height: 52px;

            border:
                1px solid
                var(--border-color);

            border-radius: 12px;

            background:
                var(--surface-light);

            color:
                var(--text-primary);

            outline: none;

            transition:
                .2s ease;
        }

        .register-input {
            padding:
                12px 15px 12px 46px;
        }

        .register-select {
            padding:
                12px 15px;
        }

        .register-input::placeholder {
            color:
                var(--text-muted);
        }

        .register-input:focus,
        .register-select:focus {
            border-color:
                var(--accent);

            box-shadow:
                0 0 0 3px
                rgba(245, 158, 11, .11);
        }

        .register-select option {
            background:
                var(--surface);

            color:
                var(--text-primary);
        }

        .form-help {
            color:
                var(--text-muted);

            font-size:
                12px;

            margin-top:
                7px;
        }


        /* =====================================================
           ROLE CARDS
        ===================================================== */

        .role-grid {
            display: grid;

            grid-template-columns:
                repeat(2, 1fr);

            gap: 12px;

            margin-top: 8px;
        }

        .role-option input {
            display: none;
        }

        .role-option label {
            width: 100%;

            cursor: pointer;

            padding: 16px;

            border:
                1px solid
                var(--border-color);

            border-radius: 13px;

            background:
                var(--surface-light);

            transition:
                .2s ease;
        }

        .role-option label:hover {
            border-color:
                rgba(245, 158, 11, .45);
        }

        .role-option input:checked + label {
            border-color:
                var(--accent);

            background:
                rgba(245, 158, 11, .08);

            box-shadow:
                0 0 0 2px
                rgba(245, 158, 11, .06);
        }

        .role-title {
            display: flex;
            align-items: center;
            gap: 9px;

            color:
                var(--text-primary);

            font-weight: 900;
        }

        .role-title i {
            color:
                var(--accent);
        }

        .role-description {
            color:
                var(--text-muted);

            font-size:
                12px;

            margin-top: 6px;
        }


        /* =====================================================
           BUTTON
        ===================================================== */

        .register-btn {
            width: 100%;

            min-height: 52px;

            border: none;

            border-radius: 12px;

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

        .register-btn:hover {
            transform:
                translateY(-2px);

            box-shadow:
                0 12px 35px
                rgba(245, 158, 11, .22);
        }


        /* =====================================================
           ERROR
        ===================================================== */

        .alert-danger {
            background:
                rgba(239, 68, 68, .10);

            color:
                #fca5a5;

            border-color:
                rgba(239, 68, 68, .22);
        }

        html[data-theme="light"]
        .alert-danger {
            color: inherit;
        }


        /* =====================================================
           BOTTOM
        ===================================================== */

        .signin-text {
            margin-top: 23px;

            text-align: center;

            color:
                var(--text-muted);
        }

        .signin-text a {
            color:
                var(--accent);

            font-weight: 800;

            text-decoration: none;
        }

        .signin-text a:hover {
            text-decoration: underline;
        }


        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media(max-width: 900px) {

            .register-grid {
                grid-template-columns: 1fr;

                max-width: 620px;
            }

            .register-visual {
                min-height: auto;

                padding: 40px;

                gap: 40px;
            }

        }

        @media(max-width: 600px) {

            .register-navbar {
                padding: 15px;
            }

            .register-panel {
                padding:
                    35px 22px;
            }

            .register-visual {
                padding:
                    35px 25px;
            }

            .register-visual h1 {
                font-size: 38px;
            }

            .role-grid {
                grid-template-columns: 1fr;
            }

            .login-link {
                display: none;
            }

        }

    </style>

</head>


<body>


<!-- =========================================================
     NAVBAR
========================================================= -->

<nav class="register-navbar">

    <a
        href="{{ route('home') }}"
        class="bidzone-brand"
    >
        Bid<span>Zone</span>
    </a>


    <div class="navbar-right">


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
            href="{{ route('login') }}"
            class="login-link"
        >
            Sign In
        </a>


    </div>

</nav>


<!-- =========================================================
     CONTENT
========================================================= -->

<div class="register-wrapper">


    <div class="register-grid">


        <!-- LEFT -->

        <div class="register-visual">


            <div class="visual-content">


                <div class="visual-badge">

                    <i class="fa-solid fa-user-plus"></i>

                    Join BidZone

                </div>


                <h1>

                    Your next win
                    <br>

                    starts
                    <span>here.</span>

                </h1>


                <p>

                    Create your BidZone account and join a
                    secure auction platform designed for
                    bidders and sellers.

                </p>


            </div>


            <div class="visual-points">


                <div class="visual-point">

                    <i class="fa-solid fa-gavel"></i>

                    <span>
                        Bid on live auctions
                    </span>

                </div>


                <div class="visual-point">

                    <i class="fa-solid fa-box-open"></i>

                    <span>
                        Create and manage auction listings
                    </span>

                </div>


                <div class="visual-point">

                    <i class="fa-solid fa-shield-halved"></i>

                    <span>
                        Secure role-based account access
                    </span>

                </div>


            </div>


        </div>


        <!-- RIGHT -->

        <div class="register-panel">


            <h2>
                Create Account
            </h2>


            <div class="register-subtitle">

                Fill in your details to get started.

            </div>


            @if($errors->any())

                <div class="alert alert-danger">

                    @foreach($errors->all() as $error)

                        <div>
                            {{ $error }}
                        </div>

                    @endforeach

                </div>

            @endif


            <form
                method="POST"
                action="{{ route('register.store') }}"
            >

                @csrf


                <!-- NAME -->

                <div class="mb-3">


                    <label class="form-label">
                        Full Name
                    </label>


                    <div class="input-shell">

                        <i class="fa-regular fa-user"></i>


                        <input
                            type="text"
                            name="name"
                            class="register-input"
                            value="{{ old('name') }}"
                            placeholder="Enter your full name"
                            required
                            autofocus
                        >

                    </div>


                </div>


                <!-- EMAIL -->

                <div class="mb-3">


                    <label class="form-label">
                        Email Address
                    </label>


                    <div class="input-shell">

                        <i class="fa-regular fa-envelope"></i>


                        <input
                            type="email"
                            name="email"
                            class="register-input"
                            value="{{ old('email') }}"
                            placeholder="you@example.com"
                            required
                        >

                    </div>


                </div>


                <!-- ROLE -->

                <div class="mb-3">


                    <label class="form-label">
                        Choose Account Type
                    </label>


                    <div class="role-grid">


                        <div class="role-option">

                            <input
                                type="radio"
                                name="role"
                                value="bidder"
                                id="role_bidder"
                                {{ old('role', 'bidder') === 'bidder' ? 'checked' : '' }}
                            >

                            <label for="role_bidder">

                                <div class="role-title">

                                    <i class="fa-solid fa-gavel"></i>

                                    Bidder

                                </div>

                                <div class="role-description">

                                    Browse auctions and place bids.

                                </div>

                            </label>

                        </div>


                        <div class="role-option">

                            <input
                                type="radio"
                                name="role"
                                value="seller"
                                id="role_seller"
                                {{ old('role') === 'seller' ? 'checked' : '' }}
                            >

                            <label for="role_seller">

                                <div class="role-title">

                                    <i class="fa-solid fa-store"></i>

                                    Seller

                                </div>

                                <div class="role-description">

                                    Create and manage auction listings.

                                </div>

                            </label>

                        </div>


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
                            class="register-input"
                            placeholder="Create a secure password"
                            required
                        >

                    </div>


                    <div class="form-help">

                        Use at least 8 characters with letters and numbers.

                    </div>


                </div>


                <!-- CONFIRM PASSWORD -->

                <div class="mb-4">


                    <label class="form-label">
                        Confirm Password
                    </label>


                    <div class="input-shell">

                        <i class="fa-solid fa-shield-halved"></i>


                        <input
                            type="password"
                            name="password_confirmation"
                            class="register-input"
                            placeholder="Repeat your password"
                            required
                        >

                    </div>


                </div>


                <!-- BUTTON -->

                <button
                    type="submit"
                    class="register-btn"
                >

                    <i class="fa-solid fa-user-plus me-2"></i>

                    Create Account

                </button>


            </form>


            <div class="signin-text">

                Already have an account?

                <a href="{{ route('login') }}">
                    Sign in
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