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

        table td {
            font-size: 17px;
            color: #0a0a0a;
        }

        table td strong, table td .fw-bold {
            color: #000;
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
                
                <!-- Updated Logout Link Triggering Bootstrap Modal -->
                <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
                    <i class="bi bi-box-arrow-right me-1"></i>Log Out
                </a>
            </div>
        </div>
    </nav>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <main class="py-4">
        <div class="container">
            @yield('content')
        </div>
    </main>

    <footer class="text-center py-4">
        <p class="mb-0">&copy; {{ date('Y') }} Rizal Co.</p>
    </footer>

    <!-- Logout Modal (Bootstrap 5) -->
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutModalLabel">gtfo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Yo you're leaving twin?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Nah bruh</button>
                    <form action="{{ url('sesi/logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">nga yes I do</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>