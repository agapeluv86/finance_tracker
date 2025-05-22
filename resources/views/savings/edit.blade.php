@extends('layouts.finance')

@section('pagecontent')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-6 col-sm-12">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white text-center">
                    <h3>Update Savings Goal</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('savings.update', $savingsGoal->savings_goal_id) }}" method="POST">
    @csrf
    @method('PATCH') 
    
    <div class="form-group mb-3">
        <label for="description">Description</label>
        <input type="text" name="description" id="description" class="form-control" 
               value="{{ old('description', $savingsGoal->description) }}">
    </div>

    <div class="form-group mb-3">
        <label for="amount">Amount</label>
        <input type="number" name="amount" step="0.01" id="amount" class="form-control" 
               value="{{ old('amount', $savingsGoal->amount) }}">
    </div>

    <div class="form-group mb-3">
        <label for="start_date">Start Date</label>
        <input type="date" name="start_date" id="start_date" class="form-control" 
               value="{{ old('start_date', $savingsGoal->start_date) }}">
    </div>

    <div class="form-group mb-3">
        <label for="end_date">End Date</label>
        <input type="date" name="end_date" id="end_date" class="form-control" 
               value="{{ old('end_date', $savingsGoal->end_date) }}">
    </div>

    <div class="d-grid">
        <button type="submit" class="btn btn-primary">Update Savings</button>
    </div>
</form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
