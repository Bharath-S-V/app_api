@extends('layouts.app')

@section('content')
    <h1 class="mb-4">User Profiles</h1>

    <a href="{{ route('profiles.create') }}" class="btn btn-primary mb-3">Create Profile</a>

    <div class="list-group">
        @foreach ($profiles as $profile)
            <a href="{{ route('profiles.show', $profile->id) }}" class="list-group-item list-group-item-action">
                <h5 class="mb-1">{{ $profile->name }}</h5>
                <p class="mb-1">{{ $profile->email }}</p>
                <small>{{ $profile->vehicle_type }}</small>
            </a>
        @endforeach
    </div>
@endsection
