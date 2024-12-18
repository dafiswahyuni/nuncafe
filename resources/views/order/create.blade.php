@extends('layout.template2')

@section('content')
<div class="container">
    <h1>Add New Order</h1>

    <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="table_number" class="form-label">Table Number</label>
            <input type="number" name="table_number" id="table_number" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="menu_items" class="form-label">Menu Items</label>
            <div id="menu_items">
                <div class="d-flex mb-2">
                    <select name="items[0][menu_id]" class="form-select" required>
                        @foreach ($menus as $menu)
                        <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                        @endforeach
                    </select>
                    <input type="number" name="items[0][quantity]" class="form-control ms-2" placeholder="Quantity" required>
                </div>
            </div>
            <button type="button" id="add_item" class="btn btn-secondary">Add More Items</button>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ route('orders.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<script>
    let itemCount = 1;

    document.getElementById('add_item').addEventListener('click', () => {
        const menuItemsDiv = document.getElementById('menu_items');
        const newItem = document.createElement('div');
        newItem.classList.add('d-flex', 'mb-2');
        newItem.innerHTML = `
            <select name="items[${itemCount}][menu_id]" class="form-select" required>
                @foreach ($menus as $menu)
                <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                @endforeach
            </select>
            <input type="number" name="items[${itemCount}][quantity]" class="form-control ms-2" placeholder="Quantity" required>
        `;
        menuItemsDiv.appendChild(newItem);
        itemCount++;
    });
</script>
@endsection
