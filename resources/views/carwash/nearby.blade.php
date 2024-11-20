<!-- resources/views/carwash/nearby.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Nearby Car Washers</h3>
        </div>
        <div class="card-body">
            <ul class="list-group">
                @foreach ($carWashers as $carWasher)
                    <li class="list-group-item">
                        <h5>{{ $carWasher->name }}</h5>
                        <p>{{ $carWasher->location }}</p>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
