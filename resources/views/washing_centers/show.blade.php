@extends('layouts.app')

@section('content')
    <h1>{{ $washingCenter->name }}</h1>
    <p><strong>Address:</strong> {{ $washingCenter->business_address }}</p>
    <p><strong>Contact:</strong> {{ $washingCenter->contact_number }}</p>
    <p><strong>Capacity:</strong> {{ $washingCenter->capacity }} cars</p>

    <h3>Services Offered</h3>
    <ul>
        @foreach ($washingCenter->services as $service)
            <li>{{ $service['type'] }} - ${{ $service['price'] }}</li>
        @endforeach
    </ul>

    <a href="{{ route('washing_centers.index') }}" class="btn btn-primary">Back to List</a>
@endsection
