@extends('layouts.finance')

@section("pagecontent")
    <div class="container">
        <div class="row justify-content-center" style="min-height: 50vh; padding-top: 50px;">
            <div class="col-md-6">
                <div class="card shadow-lg border-0">
                    <div class="card-body">
                        <h4 class="text-center mb-3 text-primary fw-bold">Reset Password</h4>
                        <p class="text-muted text-center">
                            Enter your email and new password below.
                        </p>

                        
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.store') }}">
                            @csrf

                            
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">

                            
                            <div class="mb-3">
                                <label for="email" class="form-label fw-semibold">Email Address</label>
                                <input type="email" name="email" id="email"
                                       class="form-control border-success"
                                       value="{{ old('email', $request->email) }}"
                                       required autofocus>
                            </div>

                            
                            <div class="mb-3">
                                <label for="password" class="form-label fw-semibold">New Password</label>
                                <input type="password" name="password" id="password"
                                       class="form-control border-success"
                                       required autocomplete="new-password">
                            </div>

                            
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label fw-semibold">Confirm New Password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                       class="form-control border-success"
                                       required autocomplete="new-password">
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg">Reset Password</button>
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
