@extends('layout.sales')

@section('title', 'Menu List')

@section('content')

<div class="tab-header text-center">
    <h3>PESANAN</h3>
</div>

<table class="table table-bordered">
    <thead>

        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Tabel Number</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($menus as $menu)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $menu->name }}</td>
            <td>{{ $menu->description ?? 'N/A' }}</td>
            <td>${{ number_format($menu->price, 2) }}</td>
            <td>
                <form action="{{ route('menu.destroy', $menu->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
    </tbody>
</table>
@endsection