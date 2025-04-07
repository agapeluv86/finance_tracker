@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        
        {{-- @include('partials.admin_menu')  --}}
        
        <div class="col-md-9 p-3">
            <div class="card shadow-sm">
                <div class="card-header bg-light d-flex align-items-center">
                    <i class="fas fa-money-bill-wave fa-3x me-3" style="color: green;"></i>
                    <h5 class="my-3">Income Details</h5>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered">
                            <thead class="table-success">
                                <tr>
                                    <th>S/N</th>
                                    <th>Description</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                    <th>Income Category</th>
                                    <th>Firstname</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($incomes as $index => $income)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $income->description }}</td>
                                    <td>{{ number_format($income->amount, 2) }}</td>
                                    <td>{{ $income->date }}</td>
                                    <td>{{ $income->category->name ?? 'N/A' }}</td>
                                    <td>{{ $income->user->firstname ?? 'N/A' }}</td>
                                    <td>{{ $income->user->email ?? 'N/A' }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
