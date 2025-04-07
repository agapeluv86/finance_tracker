@extends('layouts.finance')

@section('pagecontent')
<div class="container">
    @if(session('good_msg'))
        <div class="alert alert-success">{{ session('good_msg') }}</div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h5><i class="fas fa-piggy-bank fa-2x text-orange"></i> Expense</h5>
        <a href="{{ route('expense.create') }}" class="btn btn-success">
            <i class="fa-solid fa-plus"></i> Add Expense
        </a>
    </div>

    <table class="table table-hover table-bordered">
        <thead class="bg-light">
            <tr>
                <th>#</th>
                <th>Description</th>
                <th>Amount</th>
                <th>Category</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($expenses as $index => $expense)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $expense->description }}</td>
                <td>&#8358;{{ number_format($expense->amount, 2) }}</td>
                 <td>{{ $expense->category ? $expense->category->category_name : 'N/A' }}</td>
                <td>{{ \Carbon\Carbon::parse($expense->date)->format('d M Y') }}</td>
                <td>
                    <a href="{{ route('expense.edit', ['expense_id' => $expense->expense_id]) }}" class="btn btn-warning btn-sm">
                        <i class="fa fa-edit"></i> Edit
                    </a>
                    <form action="{{ route('expense.destroy', $expense->expense_id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this expense?')">
                                <i class="fa-solid fa-trash-can"></i> Delete
                            </button>
                        </form>

                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center text-muted">No entries yet</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="d-flex justify-content-end mt-3">
        <h5>Total Expense: &#8358;{{ number_format($totalExpense, 2) }}</h5>
    </div>
</div>
@endsection
