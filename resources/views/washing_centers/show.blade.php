@extends('layouts.car-app')
@section('title', 'Washing Centre Details')

@section('content')

    <div class="page-content-wrapper">
        <div class="container-fluid">
            <div class="container mt-5">
                <h1>{{ $washingCenter->name }}</h1>
                <p><strong>Address:</strong> {{ $washingCenter->business_address }}</p>
                <p><strong>Contact Number:</strong> {{ $washingCenter->contact_number }}</p>
                @if ($washingCenter->email)
                    <p><strong>Email:</strong> {{ $washingCenter->email }}</p>
                @endif
                <p><strong>Capacity:</strong> {{ $washingCenter->capacity }} cars</p>

                <h3>Photos</h3>
                <div class="d-flex flex-wrap">
                    @if (!empty($washingCenter->photos))
                        @foreach ($washingCenter->photos as $photo)
                            <div class="p-2">
                                <img src="{{ asset('storage/' . $photo) }}" alt="Photo of {{ $washingCenter->name }}"
                                    class="img-thumbnail" style="max-width: 150px;">
                            </div>
                        @endforeach
                    @else
                        <p>No photos available.</p>
                    @endif
                </div>

                <h3>Services Offered</h3>
                <ul>
                    @foreach ($washingCenter->services as $service)
                        <li>{{ $service['type'] }} - ${{ $service['price'] }}</li>
                    @endforeach
                </ul>

                <h3>Location</h3>
                <p><strong>Latitude:</strong> {{ $washingCenter->latitude }}</p>
                <p><strong>Longitude:</strong> {{ $washingCenter->longitude }}</p>

                <a href="{{ route('washing_centers.index') }}" class="btn btn-primary">Back to List</a>
            </div>
        </div>
    </div>
@endsection
