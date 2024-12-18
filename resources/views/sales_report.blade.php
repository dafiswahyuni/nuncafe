@extends('layout.app_templatenun')

@section('content')
<div class="container">
    <h1>Sales Report</h1>

    <div class="row mb-4">
        <!-- Filter Form -->
        <div class="col-md-6">
            <form action="{{ route('admin.sales-report') }}" method="GET">
                <div class="row">
                    <div class="col-md-5">
                        <label for="start_date" class="form-label">Start Date:</label>
                        <input type="date" name="start_date" id="start_date" class="form-control" value="{{ request('start_date') }}">
                    </div>
                    <div class="col-md-5">
                        <label for="end_date" class="form-label">End Date:</label>
                        <input type="date" name="end_date" id="end_date" class="form-control" value="{{ request('end_date') }}">
                    </div>
                    <div class="col-md-2 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Sales Summary -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5>Total Sales</h5>
                    <h3>Rp{{ number_format($totalSales, 0, ',', '.') }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5>Total Orders</h5>
                    <h3>{{ $totalOrders }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5>Top Menu Item</h5>
                    <h3>{{ $topMenuItem->name ?? 'N/A' }}</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Sales Data Table -->
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>Order ID</th>
                    <th>Customer Name</th>
                    <th>Table Number</th>
                    <th>Total Price</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($salesData as $sale)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $sale->created_at->format('Y-m-d') }}</td>
                    <td>{{ $sale->id }}</td>
                    <td>{{ $sale->name }}</td>
                    <td>{{ $sale->table_number }}</td>
                    <td>Rp{{ number_format($sale->total_price, 0, ',', '.') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">No sales data available for the selected period.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
