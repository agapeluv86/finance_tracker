<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Finance Tracker</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            
            <div class="col-md-3 bg-light p-3 min-vh-100">
                @include('admin.sidebar') 
            </div>

            
            <div class="col-md-9 p-4">
                <nav class="navbar navbar-light bg-light shadow-sm mb-3 p-3">
                    <div class="container-fluid d-flex justify-content-between align-items-center">
                        <a class="navbar-brand fw-bold" href="{{ route('admin.dashboard') }}">Admin Panel</a>

                        <ul class="navbar-nav ms-auto d-flex flex-row align-items-center">
    @auth
        @if(Auth::user()->role === 'admin' || Auth::user()->role === 'super_admin')
            <li class="nav-item me-3">
                <span class="fw-bold text-primary">
                    <i class="fas fa-user-circle me-1"></i> 
                    {{ Auth::user()->firstname }} ({{ ucfirst(Auth::user()->role) }})
                </span>
            </li>
            <li class="nav-item">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm">
                        <i class="fas fa-sign-out-alt me-1"></i> Logout
                    </button>
                </form>
            </li>
        @endif
    @endauth
</ul>

                    </div>
                </nav>

                <!-- Page Content -->
                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
