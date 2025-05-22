<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Admin Dashboard | Finance Tracker</title>
     <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/logo.jfif') }}">
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

                
                @yield('content')
            </div>
        </div>
    </div>
     @include('partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
