@extends('layouts.car-app')
@section('title', 'profiles details')

@section('content')
    <div class="page-content-wrapper">
        <div class="container-fluid">

            <h1 class="mt-4">Profile Details</h1>

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $profile->name ?? 'not defined' }}</h5>
                    <p class="card-text"><strong>Email:</strong> {{ $profile->email ?? 'not defined' }}</p>
                    <p class="card-text"><strong>Phone:</strong> {{ $profile->phone }}</p>
                    <p class="card-text"><strong>Address:</strong> {{ $profile->address ?? 'not defined' }}</p>
                    <p class="card-text"><strong>Vehicle Type:</strong> {{ $profile->vehicle_type ?? 'not defined' }}</p>

                    <a href="{{ route('profiles.edit', $profile->id) }}" class="btn btn-primary">Edit</a>

                    <form action="{{ route('profiles.destroy', $profile->id) }}" method="POST" class="d-inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
