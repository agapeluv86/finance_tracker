@extends('layouts.finance') 

@section('pagecontent')
<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="col-md-5">
        <div class="card shadow-lg border-0 rounded-lg p-4">
            <h3 class="text-center mb-4 text-primary fw-bold">LOGIN!</h3>
            
            {{-- Display Error or Success Messages --}}
            @if(session('error'))
                <div class="alert alert-danger text-center">{{ session('error') }}</div>
            @endif
            @if(session('success'))
                <div class="alert alert-success text-center">{{ session('success') }}</div>
            @endif

            {{-- Login Form --}}
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label fw-bold">Email Address</label>
                    <input type="email" class="form-control border-primary" placeholder="Enter Email Address" name="email" id="email" required>
                </div>
                
                <div class="mb-3">
                    <label for="password" class="form-label fw-bold">Password</label>
                    <input type="password" class="form-control border-primary" placeholder="Enter Password" id="password" name="password" required>
                </div>
                
                <div class="form-check mb-3">
                    <input type="checkbox" class="form-check-input" name="remember" id="remember">
                    <label class="form-check-label" for="remember">Remember me</label>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg">Login</button>
                </div>
            </form>
            
            {{-- Links --}}
            <div class="text-center mt-3">
                <a href="{{ route('password.request') }}" class="text-muted">Forgot Password?</a>
            </div>

            <div class="text-center mt-2">
                <p>Don't have an account? <a href="{{ route('register') }}" class="text-primary fw-bold">Sign Up</a></p>
            </div>
        </div>
    </div>
</div>
@endsection
