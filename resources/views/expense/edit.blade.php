@extends('layouts.finance')

@section('pagecontent')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8 col-sm-12">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white text-center">
                    <h3>Update Expense</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('expense.update', $expense->expense_id) }}" method="POST">
                     @csrf
                     @method('PUT')
                        <div class="form-group mb-3">
                            <label for="description">Description</label>
                            <input type="text" name="description" id="description" class="form-control" 
                                   value="{{ old('description', $expense->description) }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="amount">Amount</label>
                            <input type="number" name="amount" step="0.01" id="amount" class="form-control" 
                                   value="{{ old('amount', $expense->amount) }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="date">Date</label>
                            <input type="date" name="date" id="date" class="form-control" 
                                   value="{{ old('date', $expense->date) }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="category_id">Category</label>
                            <select name="category_id" id="category_id" class="form-select">
                                <option disabled>Select a category</option>
                                @foreach($expense_categories as $category)
                                    <option value="{{ $category->category_id }}" 
                                        {{ $category->category_id == $expense->category_id ? 'selected' : '' }}>
                                        {{ $category->category_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Update Expense</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
