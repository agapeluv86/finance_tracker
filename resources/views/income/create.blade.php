@extends("layouts.finance")

@section('pagecontent')
<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5"> 
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white text-center">
                    <h4 class="mb-0">Add Income</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('income.store') }}" method="POST">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" name="description" id="description" class="form-control" value="{{ old('description') }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="amount" class="form-label">Amount</label>
                            <input type="number" name="amount" step="0.01" id="amount" class="form-control" value="{{ old('amount') }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" name="date" id="date" class="form-control" value="{{ old('date') }}" required>
                        </div>

                        <div class="form-group mb-4">
                            <label for="category_id" class="form-label">Category</label>
                            <select name="category_id" id="category_id" class="form-select" required>
                                <option selected disabled>Select Category</option>
                                @foreach ($income_categories as $category)
                                    <option value="{{ $category->category_id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-success">Add Income</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
