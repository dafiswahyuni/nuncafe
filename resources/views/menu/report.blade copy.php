

@section('title', 'Menu List')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Menu List</h1>
        <a href="{{ route('menu.create') }}" class="btn btn-primary">Create New Menu</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Tabel Number</th>
                <th>Price</th>
                <th>Actions</th>
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
                        <a href="{{ route('menu.show', $menu->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('menu.edit', $menu->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('menu.destroy', $menu->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
