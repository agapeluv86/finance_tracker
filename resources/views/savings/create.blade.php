@extends('layouts.finance')

@section('pagecontent')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8 col-sm-12">
            
            @if (session('good_msg'))
                <div class="alert alert-success">
                    {{ session('good_msg') }}
                </div>
            @endif

            <div class="card shadow-sm">
                <div class="card-header bg-info text-white text-center">
                    <h3>Savings</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('savings.store') }}" method="POST">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" name="description" id="description" class="form-control" value="{{ old('description') }}">
                            @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="amount" class="form-label">Amount</label>
                            <input type="number" name="amount" step="0.01" id="amount" class="form-control" value="{{ old('amount') }}">
                            @error('amount')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="start_date" class="form-label">Start Date</label>
                            <input type="date" name="start_date" id="start_date" class="form-control" value="{{ old('start_date') }}">
                            @error('start_date')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="end_date" class="form-label">End Date</label>
                            <input type="date" name="end_date" id="end_date" class="form-control" value="{{ old('end_date') }}">
                            @error('end_date')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-success">Add Savings</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
