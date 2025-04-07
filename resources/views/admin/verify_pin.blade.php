@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2>Enter PIN to Manage Users</h2>
    
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('admin.checkPin') }}">
        @csrf
        <div class="mb-3">
            <label for="admin_pin" class="form-label">Enter Admin PIN:</label>
            <input type="password" name="admin_pin" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Verify</button>
    </form>
</div>
@endsection
