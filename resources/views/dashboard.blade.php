@extends("layouts.finance")

@section('pagecontent')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            @include('user_sidebar')
        </div>
        
        <div class="col-md-9 p-3">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    @php
                        $hour = now()->hour;
                        $greeting = $hour < 12 ? "Good morning" : ($hour < 18 ? "Good afternoon" : "Good evening");
                    @endphp

                    @if(Auth::check()) 
                        <h5 class="my-3">{{ $greeting }}, {{ Auth::user()->firstname }}!</h5>
                        <p>You are logged in</p>
                    @else
                        <h5 class="my-3 text-danger">Not Logged In</h5>
                        <p class="text-danger">You need to log in first.</p>
                    @endif
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <a href="{{ route('income.index') }}" class="text-decoration-none">
                                <div class="bg-white p-4 shadow-lg rounded-xl text-center">
                                    <h3 class="text-lg font-bold text-gray-700">Total Income</h3>
                                    <p class="text-3xl font-semibold text-green-600 mt-2">
                                        ₦{{ number_format($totalIncome ?? 0, 2) }}
                                    </p>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-4">
                            <a href="{{ route('expense.index') }}" class="text-decoration-none">
                                <div class="bg-white p-4 shadow-lg rounded-xl text-center">
                                    <h3 class="text-lg font-bold text-gray-700">Total Expenses</h3>
                                    <p class="text-3xl font-semibold text-red-600 mt-2">
                                        ₦{{ number_format($totalExpenses ?? 0, 2) }}
                                    </p>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-4">
                            <a href="{{ route('savings.index') }}" class="text-decoration-none">
                                <div class="bg-white p-4 shadow-lg rounded-xl text-center">
                                    <h3 class="text-lg font-bold text-gray-700">Savings Goal</h3>
                                    <p class="text-3xl font-semibold text-blue-600 mt-2">
                                        ₦{{ number_format($totalSavings ?? 0, 2) }}
                                    </p>
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
