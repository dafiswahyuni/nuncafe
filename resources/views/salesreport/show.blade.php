{{-- resources/views/salesreport/show.blade.php --}}
@extends('layout.sales')

@section('title', 'Sales Report Details')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h3>Sales Report Details</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Name</th>
                    <td>{{ $salesreport->name }}</td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td>{{ $salesreport->description ?? 'No description available' }}</td>
                </tr>
                <tr>
                    <th>Price</th>
                    <td>${{ number_format($salesreport->price, 2) }}</td>
                </tr>
                <tr>
                    <th>Created At</th>
                    <td>{{ $salesreport->created_at->format('d-m-Y H:i') }}</td>
                </tr>
                <tr>
                    <th>Updated At</th>
                    <td>{{ $salesreport->updated_at->format('d-m-Y H:i') }}</td>
                </tr>
            </table>
        </div>
        <div class="card-footer">
            <a href="{{ route('salesreport.index') }}" class="btn btn-secondary">Back to List</a>
            <a href="{{ route('salesreport.edit', $salesreport->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('salesreport.destroy', $salesreport->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this item?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection
