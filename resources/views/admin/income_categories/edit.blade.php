@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8 col-sm-12">
            <div class="card shadow-sm">
                <div class="card-header bg-success text-white text-center">
                    <h3>Update Income Category</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.income_categories.update', $category->category_id) }}" method="post">
                        @csrf
                         @method('PUT') 
                        <div class="form-group mb-3">
                            <label for="name" class="form-label">Category Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}">
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Update Category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
