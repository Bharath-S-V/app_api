@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Profile Details</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $profile->name }}</h5>
            <p class="card-text"><strong>Email:</strong> {{ $profile->email }}</p>
            <p class="card-text"><strong>Phone:</strong> {{ $profile->phone }}</p>
            <p class="card-text"><strong>Address:</strong> {{ $profile->address }}</p>
            <p class="card-text"><strong>Vehicle Type:</strong> {{ $profile->vehicle_type }}</p>

            <a href="{{ route('profiles.edit', $profile->id) }}" class="btn btn-primary">Edit</a>

            <form action="{{ route('profiles.destroy', $profile->id) }}" method="POST" class="d-inline-block">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
@endsection
