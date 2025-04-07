@extends('layouts.admin') 

@section('content')
<div class="container mt-4">
    <h2>All Users</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                @if(auth()->user()->isSuperAdmin())
                    <th>Action</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($users as $index => $user)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $user->firstname }} {{ $user->lastname }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ ucfirst($user->role) }}</td>

                @if(auth()->user()->isSuperAdmin())
                    <td>
                        @if($user->role !== 'admin')
                            <form action="{{ route('admin.promote', $user->user_id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary"
                                   onclick="return confirm('Are you sure you want to upgrade {{ $user->firstname }} to an admin?')">
                                    Upgrade to Admin
                                </button>
                            </form>
                        @endif
                    </td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
