@extends('layout.menu')

@section('title', 'Menu Details')

@section('content')
    <h1>Menu Details</h1>

    <div class="mb-3">
        <strong>Name:</strong> {{ $menu->name }}
    </div>
    <div class="mb-3">
        <strong>Tabel number:</strong> {{ $menu->description ?? 'N/A' }}
    </div>
    <div class="mb-3">
        <strong>Price:</strong> ${{ number_format($menu->price, 2) }}
    </div>

    <a href="{{ route('menu.index') }}" class="btn btn-secondary">Back to List</a>
@endsection
