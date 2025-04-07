@extends('layouts.finance')

@section('pagecontent')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12 p-3">
            <div class="card shadow-sm">
                <div class="card-body">

                    @if (session('good_msg'))
                        <div class="alert alert-success">
                            {{ session('good_msg') }}
                        </div>
                    @endif

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="my-3">
                            <i class="fas fa-coins fa-2x text-primary"></i> My Savings Goals
                        </h5>
                        <a href="{{ route('savings.create') }}" class="btn btn-success">
                            <i class="fa-solid fa-plus"></i> Add Savings Goal
                        </a>
                    </div>

                    <table class="table table-hover table-bordered">
                        <thead class="bg-light">
                            <tr>
                                <th>S/N</th>
                                <th>Description</th>
                                <th>Goal Amount (₦)</th>
                                <th>Total Income (₦)</th>
                                <th>Total Expenses (₦)</th>
                                <th>Calculated Savings (₦)</th>
                                <th>Remaining Balance (₦)</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($goals as $index => $goal)
                            <tr class="{{ $goal->highlight_class }}">
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $goal->description }}</td>
                                <td>&#8358;{{ number_format($goal->amount, 2) }}</td>
                                <td>&#8358;{{ number_format($goal->total_income??0, 2) }}</td>
                                <td>&#8358;{{ number_format($goal->total_expenses, 2) }}</td>
                                <td>&#8358;{{ number_format($goal->calculated_savings, 2) }}</td>
                                <td>&#8358;{{ number_format($goal->remaining_amount, 2) }}</td>
                                <td>{{ \Carbon\Carbon::parse($goal->start_date)->format('d M Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($goal->end_date)->format('d M Y') }}</td>
                                <td>
                                    <span class="badge 
                                        @if($goal->status == 'Completed') bg-success 
                                        @elseif($goal->status == 'In Progress') bg-warning text-dark
                                        @else bg-danger text-white
                                        @endif">
                                        {{ $goal->status }}
                                    </span>
                                </td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('savings.edit', ['savings_goal_id' => $goal->savings_goal_id]) }}" class="btn btn-warning btn-sm">
                                            <i class="fa fa-edit"></i> Edit
                                        </a>
                                        <form action="{{ route('savings.delete', $goal->savings_goal_id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this savings goal?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm">
                                                <i class="fa-solid fa-trash-can"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="d-flex justify-content-end mt-3">
                        <h5><strong>Total Savings: </strong> &#8358;{{ number_format($total_savings, 2) }}</h5>
                    </div>

                </div> 
            </div> 
        </div> 
    </div> 
</div> 
@endsection
