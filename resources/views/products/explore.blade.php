<!-- resources/views/products/explore.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Explore Products</h3>
        </div>
        <div class="card-body">
            <ul class="list-group">
                @foreach ($products as $product)
                    <li class="list-group-item">
                        <h5>{{ $product->name }}</h5>
                        <p>{{ $product->description }}</p>
                        <p><strong>Price:</strong> ${{ $product->price }}</p>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
