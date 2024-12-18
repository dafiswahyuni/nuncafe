@extends('layout.menu')

@section('title', 'Create Menu')

@section('content')
    <h1>Create New Menu</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('menu.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Menu:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Table Number:</label>
            <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price:</label>
            <input type="number" name="price" id="price" class="form-control" value="{{ old('price') }}" step="0.01" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('menu.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection