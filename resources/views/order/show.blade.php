@extends('layout.template2')

@section('content')
<div class="container">
    <h1>Order Details</h1>

    <div class="mb-3">
        <strong>Name:</strong>
        <p>{{ $order->name }}</p>
    </div>

    <div class="mb-3">
        <strong>Table Number:</strong>
        <p>{{ $order->table_number }}</p>
    </div>

    <div class="mb-3">
        <strong>Status:</strong>
        @if ($order->status == 'pending')
            <span class="badge bg-warning">Pending</span>
        @elseif ($order->status == 'accepted')
            <span class="badge bg-success">Accepted</span>
        @else
            <span class="badge bg-danger">Rejected</span>
        @endif
    </div>

    <div class="mb-3">
        <strong>Items:</strong>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Menu Item</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->items as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->menu->name }}</td>
                    <td>{{ $item->quantity }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <a href="{{ route('orders.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
