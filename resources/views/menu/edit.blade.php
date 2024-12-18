@extends('layout.menu')

@section('title', 'Edit Menu')

@section('content')
    <h1>Edit Menu</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('menu.update', $menu->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Menu:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $menu->name) }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Table Number:</label>
            <textarea name="description" id="description" class="form-control">{{ old('description', $menu->description) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price:</label>
            <input type="number" name="price" id="price" class="form-control" value="{{ old('price', $menu->price) }}" step="0.01" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('menu.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
