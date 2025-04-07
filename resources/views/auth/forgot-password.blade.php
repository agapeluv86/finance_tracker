@extends('layouts.finance')

@section("pagecontent")
    <div class="container">
        <div class="row justify-content-center" style="min-height: 70vh; padding-top: 50px;">
            <div class="col-md-6">
                <div class="card shadow-lg border-0">
                    <div class="card-body">
                        <h4 class="text-center mb-3 text-primary fw-bold">Forgot Password?</h4>
                        <p class="text-muted text-center">
                            Enter your email below to receive a password reset link.
                        </p>

                        <!-- Session Status -->
                        @if (session('status'))
                            <div class="alert alert-success text-center">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <!-- Email Address -->
                            <div class="mb-3">
                                <label for="email" class="form-label fw-semibold">Email Address</label>
                                <input type="email" name="email" id="email" class="form-control border-primary" value="{{ old('email') }}" required autofocus>
                                @error('email')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg">Send Password Reset Link</button>
                            </div>
                        </form>

                        <div class="text-center mt-3">
                            <a href="{{ route('login') }}" class="text-decoration-none text-primary fw-bold">Back to Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
