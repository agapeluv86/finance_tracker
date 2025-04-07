@extends('layouts.finance')

@section("pagecontent")

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded-lg mt-5 mb-5"> 
                <div class="card-header bg-primary text-white text-center">
                    <h3>Sign Up</h3>
                </div>
                <div class="card-body">
                   @if(session('errormsg'))
                        <div class="alert alert-danger">{{ session('errormsg') }}</div>
                    @endif

                     <form method="POST" action="{{ route('register') }}">
                      @csrf
                     <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="firstname" class="form-label">First Name</label>
                                <input type="text" name="firstname" class="form-control @error('firstname') is-invalid @enderror" id="firstname" value="{{ old('firstname') }}">
                                @error('firstname') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="lastname" class="form-label">Last Name</label>
                                <input type="text" name="lastname" class="form-control @error('lastname') is-invalid @enderror" id="lastname" value="{{ old('lastname') }}">
                                @error('lastname') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" value="{{ old('phone') }}">
                                @error('phone') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email') }}">
                                @error('email') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password">
                                @error('password') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation">
                                @error('password_confirmation') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg">Register</button>
                        </div>
                    </form>
                </div>

                <div class="card-footer text-center">
                    <p>Already have an account? <a href="{{ route('login') }}" class="text-primary">Login</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
