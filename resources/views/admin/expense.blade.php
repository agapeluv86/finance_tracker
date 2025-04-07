@extends('layouts.admin')

@section('content')
<div class="container">
  <div class="row">
    
    <div class="col-md-9 p-3">
      <div class="card shadow-sm">
        
        <div class="card-header bg-light d-flex align-items-center">
          <i class="fas fa-piggy-bank fa-3x me-3" style="color: orange;"></i>
          <h5 class="my-3">Expense Details</h5>
        </div>
        
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
              <thead class="table-dark">
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Description</th>
                  <th scope="col">Amount</th>
                  <th scope="col">Date</th>
                  <th scope="col">Expense Category</th>
                  <th scope="col">Firstname</th>
                  <th scope="col">Email</th>
                </tr>
              </thead>
              <tbody>
                @foreach($expenses as $index => $expense)
                <tr>
                  <td>{{ $index + 1 }}</td>
                  <td>{{ $expense->description }}</td>
                  <td>{{ number_format($expense->amount, 2) }}</td>
                  <td>{{ $expense->date }}</td>
                  <td>{{ optional($expense->category)->category_name }}</td>
                  <td>{{ optional($expense->user)->firstname }}</td>
                  <td>{{ optional($expense->user)->email }}</td>
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
