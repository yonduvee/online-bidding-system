<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Dashboard | BidZone</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

</head>

<body class="bg-light">

<nav class="navbar navbar-dark bg-dark px-4">

    <a
        class="navbar-brand fw-bold"
        href="{{ route('home') }}"
    >
        BidZone
    </a>

    <form
        method="POST"
        action="{{ route('logout') }}"
    >

        @csrf

        <button
            class="btn btn-warning"
            type="submit"
        >
            Logout
        </button>

    </form>

</nav>

<div class="container py-5">

    @if (session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif

    <div class="card border-0 shadow-sm">

        <div class="card-body p-5">

            <h2>
                Welcome, {{ auth()->user()->name }}
            </h2>

            <p class="text-muted mb-1">
                You are successfully logged in.
            </p>

            <p>
                Account Type:
                <strong class="text-uppercase">
                    {{ auth()->user()->role }}
                </strong>
            </p>

        </div>

    </div>

</div>

</body>
</html>