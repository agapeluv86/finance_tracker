<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="description" content="Personal Finance Tracker">
    <meta name="keywords" content="HTML, CSS, JavaScript, PHP, Laravel, Finance">
    <meta name="author" content="Owagbemi Olushola, Agapeluv">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Finance Tracker</title>
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/logo.jfif') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css"> 
    <link rel="stylesheet" href="{{ asset('assets/animate/animate.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/all.css') }}">

    <style>
        
        .navbar {
            background: linear-gradient(to right, #007bff, #6610f2);
            position: absolute;
            width: 100%;
            top: 0;
            z-index: 1000;
        }
        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
            color: #fff !important;
        }
        .navbar-nav .nav-link {
            color: white !important;
            font-weight: 500;
            transition: 0.3s;
        }
        .navbar-nav .nav-link:hover {
            color: #ffd700 !important;
        }
        .nav-item .btn-logout {
            background: none;
            border: none;
            color: white;
            font-weight: 500;
            transition: 0.3s;
        }
        .nav-item .btn-logout:hover {
            color: #ffd700;
        }
     
        .navbar-brand img {
            width: 32px;
            height: auto; 
        }
    
        .footer {
            background: #f8f9fa;
            padding: 15px 0;
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>
<body>

    {{-- @include('partials.topbar') --}}

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="/"><img src="images/logo.jfif" alt="logo"></i></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/"><i class="bi bi-house-door"></i> Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about"><i class="bi bi-info-circle"></i> About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contact"><i class="bi bi-envelope"></i> Contact</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-layout-text-sidebar"></i> Pages
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/planning"><i class="bi bi-calendar-check"></i> Planning</a></li>
                            <li><a class="dropdown-item" href="/security"><i class="bi bi-shield-lock"></i> Security</a></li>
                            <li><a class="dropdown-item" href="/income-tracking"><i class="bi bi-bar-chart-line"></i> Income Tracking</a></li>
                            <li><a class="dropdown-item" href="/expense-tracking"><i class="bi bi-cash-stack"></i> Expense</a></li>
                        </ul>
                    </li>
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}"><i class="bi bi-person-plus"></i> Signup</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}"><i class="bi bi-box-arrow-in-right"></i> Login</a>
                    </li>
                    @endguest
                    @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}"><i class="bi bi-person-circle"></i> Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="nav-link btn-logout"><i class="bi bi-box-arrow-right"></i> Logout</button>
                        </form>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"><i class="bi bi-person-check"></i> Welcome, {{ Auth::user()->firstname }}</a>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5 pt-5">
        @yield("pagecontent")
    </div>

    
    @include('partials.footer')

    
    <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
    <script>
        document.getElementById("year").textContent = new Date().getFullYear();
    </script>
</body>
</html>
