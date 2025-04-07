@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    @if(session('good_msg'))
        <div class="alert alert-success">{{ session('good_msg') }}</div>
    @endif

    <div class="card">
        <div class="card-header bg-light">
            <h5>
                <i class="fas fa-money-bill-wave me-2 text-success"></i> Income Categories
                <a href="{{ route('admin.income_categories.create') }}" class="btn btn-success float-end">
                    <i class="fa-solid fa-plus"></i> Add Category
                </a>
            </h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Category Name</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $key => $category)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                <span class="badge {{ $category->status === 'active' ? 'bg-success' : 'bg-danger' }}">
                                    <i class="fa {{ $category->status === 'active' ? 'fa-check-circle' : 'fa-ban' }}"></i>
                                    {{ ucfirst($category->status) }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('admin.income_categories.edit', ['category_id' => $category->category_id]) }}" class="btn btn-warning btn-sm">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('admin.income_categories.status', ['category_id' => $category->category_id]) }}" method="POST" style="display:inline;">
                                  @csrf
                                  @method('PUT')
                                  <button type="submit" class="btn btn-sm {{ $category->status === 'active' ? 'btn-danger' : 'btn-success' }}">
                                  <i class="fa fa-{{ $category->status == 'active' ? 'ban' : 'check' }}"></i>
                                 {{ $category->status === 'active' ? 'Disable' : 'Activate' }}
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
@endsection
