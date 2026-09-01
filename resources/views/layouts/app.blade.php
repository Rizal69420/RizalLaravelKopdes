<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Laravel App')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        .nav-link.active-nav {
            color: #ffffff !important;
            text-decoration: underline;
            text-underline-offset: 5px;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-primary navbar-dark">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/">
                <i class="bi bi-mortarboard-fill me-1"></i>Daftar Kopdes & Manager
            </a>

            <div class="navbar-nav">
                <a class="nav-link {{ request()->routeIs('manager.*') ? 'active-nav' : '' }}" href="{{ route('manager.index') }}">
                    <i class="bi bi-people-fill me-1"></i>Manager
                </a>
                <a class="nav-link {{ request()->routeIs('kopdes.*') ? 'active-nav' : '' }}" href="{{ route('kopdes.index') }}">
                    <i class="bi bi-book-fill me-1"></i>Kopdes
                </a>
            </div>
        </div>
    </nav>

    <main class="py-4">
        <div class="container">
            @yield('content')
        </div>
    </main>

    <footer class="text-center py-4">
        <p class="mb-0">&copy; {{ date('Y') }} Laravel App</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
