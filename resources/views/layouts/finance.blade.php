<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="description" content="Personal Finance Tracker">
    <meta name="keywords" content="HTML, CSS, JavaScript, PHP, Laravel, Finance">
    <meta name="author" content="Owagbemi Olushola, Agapeluv">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
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
    </style>
</head>
<body class="d-flex flex-column min-vh-100">

    
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('images/logo.jfif') }}" alt="logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/"><i class="bi bi-house-door"></i> Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="/about"><i class="bi bi-info-circle"></i> About</a></li>
                    <li class="nav-item"><a class="nav-link" href="/contact"><i class="bi bi-envelope"></i> Contact</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-layout-text-sidebar"></i> Pages
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="pagesDropdown">
                            <li><a class="dropdown-item" href="/planning"><i class="bi bi-calendar-check"></i> Planning</a></li>
                            <li><a class="dropdown-item" href="/security"><i class="bi bi-shield-lock"></i> Security</a></li>
                            <li><a class="dropdown-item" href="/income-tracking"><i class="bi bi-bar-chart-line"></i> Income Tracking</a></li>
                            <li><a class="dropdown-item" href="/expense-tracking"><i class="bi bi-cash-stack"></i> Expense</a></li>
                        </ul>
                    </li>
                    @guest
                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}"><i class="bi bi-person-plus"></i> Signup</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}"><i class="bi bi-box-arrow-in-right"></i> Login</a></li>
                    @endguest
                    @auth
                    <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}"><i class="bi bi-person-circle"></i> Dashboard</a></li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="nav-link btn-logout"><i class="bi bi-box-arrow-right"></i> Logout</button>
                        </form>
                    </li>
                    <li class="nav-item"><a class="nav-link"><i class="bi bi-person-check"></i> Welcome, {{ Auth::user()->firstname }}</a></li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <main class="container mt-5 pt-5 flex-grow-1">
        @yield("pagecontent")
    </main>

    @include('partials.footer')

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.getElementById("year").textContent = new Date().getFullYear();
    </script>

    
    @if (!request()->cookie('cookie_consent'))
    <div id="cookieBanner" class="position-fixed bottom-0 start-0 w-100 bg-dark text-white p-3 z-index-9999" style="z-index: 1050;">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
            <div class="mb-2 mb-md-0">
                We use cookies to improve functionality and performance. By continuing, you agree to our use of cookies.
                <a href="{{ route('privacy.policy') }}" class="text-info text-decoration-underline ms-1">Learn more in our Privacy Policy</a>.
            </div>
            <button id="acceptCookies" class="btn btn-success btn-sm ms-md-3">Accept</button>
        </div>
    </div>
    @endif

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const banner = document.getElementById("cookieBanner");
            const acceptBtn = document.getElementById("acceptCookies");

            if (banner && acceptBtn) {
                acceptBtn.addEventListener("click", function () {
                    fetch("{{ route('cookie.accept') }}", {
                        method: "POST",
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}",
                            "Content-Type": "application/json",
                        },
                    }).then(() => {
                        setCookie("cookie_consent", "accepted", 365);
                        banner.style.display = "none";
                    });
                });
            }
        });

        function setCookie(name, value, days) {
            let expires = "";
            if (days) {
                const date = new Date();
                date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                expires = "; expires=" + date.toUTCString();
            }
            document.cookie = name + "=" + (value || "") + expires + "; path=/";
        }

        function getCookie(name) {
            const nameEQ = name + "=";
            const ca = document.cookie.split(';');
            for (let i = 0; i < ca.length; i++) {
                let c = ca[i];
                while (c.charAt(0) === ' ') c = c.substring(1);
                if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length);
            }
            return null;
        }
    </script>
</body>
</html>
