@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <x-admin-sidebar /> 

        <div class="col-md-9 p-3">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white text-center">
    @if(Auth::check() && (Auth::user()->role === 'admin' || Auth::user()->role === 'super_admin'))
        <h5 class="my-3">Welcome, {{ Auth::user()->firstname }}</h5>
        <p>You are logged in as an Admin</p>
    @else
        <h5 class="my-3 text-danger">Access Denied</h5>
        <p class="text-danger">You do not have permission to view this page.</p>
    @endif
</div>


                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <a href="{{ route('admin.expense') }}" class="text-decoration-none">
                                <div class="card mb-5 shadow-sm">
                                    <div class="card-body text-center">
                                        <i class="fas fa-piggy-bank fa-5x text-warning"></i>
                                        <h6 class="mt-3">Expenses Category</h6>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-4">
                            <a href="{{ route('admin.income') }}" class="text-decoration-none">
                                <div class="card mb-5 shadow-sm">
                                    <div class="card-body text-center">
                                        <i class="fas fa-money-bill-wave fa-5x text-success"></i>
                                        <h6 class="mt-3">Income Category</h6>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-4">
                            <a href="{{ route('admin.savings') }}" class="text-decoration-none">
                                <div class="card mb-5 shadow-sm">
                                    <div class="card-body text-center">
                                        <i class="fas fa-coins fa-5x text-primary"></i>
                                        <h6 class="mt-3">Savings Goals</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
