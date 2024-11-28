@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Welcome to the Dashboard, {{ $user->name }}</h3> <!-- Display phone number or any other data -->
        </div>
        <div class="card-body">
            <p>Your registration is complete. Welcome to the dashboard!</p>
            <p><strong>Name:</strong> {{ $user->name ?? 'Not Defined' }}</p>
            <p><strong>Phone:</strong> {{ $user->phone }}</p>
            <p><strong>Vehicle Type:</strong> {{ $user->vehicle_type ?? 'Not selected' }}</p>
            <p><strong>Address:</strong> {{ $user->address ?? 'Not set' }}</p>
        </div>
    </div>

    <form action="{{ route('logout') }}" method="POST" class="d-inline">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>

@endsection
