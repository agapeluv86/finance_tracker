@extends('layouts.finance')

@section('pagecontent')
<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-6 col-sm-12"> 
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white text-center">
                    <h4 class="mb-0">Update Income</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('income.update', $income->income_id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" name="description" id="description" class="form-control" 
                                   value="{{ old('description', $income->description) }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="amount" class="form-label">Amount</label>
                            <input type="number" name="amount" step="0.01" id="amount" class="form-control" 
                                   value="{{ old('amount', $income->amount) }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" name="date" id="date" class="form-control" 
                                   value="{{ old('date', $income->date) }}" required>
                        </div>

                        <div class="form-group mb-4">
                            <label for="category_id" class="form-label">Category</label>
                            <select name="category_id" id="category_id" class="form-select" required>
                                <option disabled>Select a category</option>
                                @foreach($income_categories as $category)
                                    <option value="{{ $category->category_id }}" 
                                        {{ $category->category_id == $income->category_id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-success">Update Income</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
