<!-- resources/views/promotions/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Promotions</h3>
        </div>
        <div class="card-body">
            <ul class="list-group">
                @foreach ($promotions as $promotion)
                    <li class="list-group-item">
                        <h5>{{ $promotion->title }}</h5>
                        <p>{{ $promotion->description }}</p>
                        <p><strong>Discount:</strong> {{ $promotion->discount }}%</p>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
