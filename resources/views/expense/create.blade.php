@extends('layouts.finance')

@section('pagecontent')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-6 col-sm-12"> 

            @if(session('good_msg'))
                <div class="alert alert-success">{{ session('good_msg') }}</div>
            @endif

            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white text-center">
                    <h3>Add Expense</h3>
                </div>

                <div class="card-body">
                    <form action="{{ route('expense.store') }}" method="POST">
                        @csrf

                        
                        <div class="form-group mb-3">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" name="description" id="description" class="form-control" value="{{ old('description') }}" required>
                            @error('description') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        
                        <div class="form-group mb-3">
                            <label for="amount" class="form-label">Amount</label>
                            <input type="number" name="amount" id="amount" class="form-control" step="0.01" value="{{ old('amount') }}" required>
                            @error('amount') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        
                        <div class="form-group mb-3">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" name="date" id="date" class="form-control" value="{{ old('date') }}" required>
                            @error('date') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        
                        <div class="form-group mb-3">
                            <label for="category_id" class="form-label">Category</label>
                            <select name="category_id" id="category_id" class="form-select" required>
                                <option selected disabled>Select Category</option>
                                @foreach($expenseCategories as $category)
                                    <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                            @error('category_id') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Add Expense</button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
