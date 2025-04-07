@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="row">
        {{-- @include('partials.admin_menu') --}}

        <div class="col-md-12 p-3">
            <div class="card shadow-sm">
                <div class="card-header bg-light text-black">
                    @if(session('good_msg'))
                        <div class="alert alert-success">{{ session('good_msg') }}</div>
                    @endif
                    <h5 class="my-3">
                        <i class="fas fa-piggy-bank me-2" style="color: orange;"></i>Expense Categories
                    </h5>
                    <a href="{{ route('admin.expense_categories.create') }}" class="btn btn-success float-end">
                        <i class="fa-solid fa-plus"></i> Add Category
                    </a>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-striped table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Category Name</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($expenseCategories as $index => $category)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $category->category_name }}</td>
                                    <td>
                                        <span class="badge {{ $category->status == 'active' ? 'bg-success' : 'bg-secondary' }}">
                                            <i class="fa {{ $category->status == 'active' ? 'fa-check-circle' : 'fa-times-circle' }}"></i> 
                                            {{ ucfirst($category->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.expense_categories.edit', $category->category_id) }}" class="btn btn-warning btn-sm">
                                            <i class="fa fa-edit"></i> Edit
                                        </a>
                                        <form action="{{ route('admin.expense_categories.status', $category->category_id) }}" method="post" class="d-inline">
                                            @csrf
                                             @method('PUT')
                                            <button type="submit" class="btn {{ $category->status == 'active' ? 'btn-danger' : 'btn-success' }} btn-sm">
                                                <i class="fa {{ $category->status == 'active' ? 'fa-ban' : 'fa-check' }}"></i> 
                                                {{ $category->status == 'active' ? 'Disable' : 'Enable' }}
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
