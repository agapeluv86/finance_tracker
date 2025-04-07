@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        
        {{-- @include('partials.admin_menu')  --}}

        <div class="col-md-12 p-3">
            <div class="card shadow-sm">
                <div class="card-header bg-light d-flex align-items-center">
                    <i class="fas fa-coins fa-3x me-3" style="color: blue;"></i>
                    <h5 class="my-3">Savings Goal Details</h5>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered">
                            <thead class="table-primary">
                                <tr>
                                    <th>#</th>
                                    <th>Description</th>
                                    <th>Goal Amount (₦)</th>
                                    <th>User</th>
                                    <th>Total Income (₦)</th>
                                    <th>Total Expenses (₦)</th>
                                    <th>Calculated Savings (₦)</th>
                                    <th>Remaining Balance (₦)</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($savingsGoals as $index => $savings)
                                <tr class="{{ $savings->highlight_class }}">
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $savings->description }}</td>
                                    <td>&#8358;{{ number_format($savings->amount, 2) }}</td>
                                    <td>{{ $savings->user->email ?? 'N/A' }}</td>
                                    <td>&#8358;{{ number_format($savings->total_income, 2) }}</td>
                                    <td>&#8358;{{ number_format($savings->total_expenses, 2) }}</td>
                                    <td>&#8358;{{ number_format($savings->calculated_savings, 2) }}</td>
                                    <td>&#8358;{{ number_format($savings->remaining_amount, 2) }}</td>
                                    <td>{{ $savings->start_date }}</td>
                                    <td>{{ $savings->end_date }}</td>
                                    <td><span class="badge">{{ $savings->status }}</span></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    
                    <div class="mt-3">
                        <h5>Total Savings: <strong>&#8358;{{ number_format($savingsGoals->sum('calculated_savings'), 2) }}</strong></h5>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
