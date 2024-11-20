@extends('layouts.app')

@section('content')
    <h1 class="mb-4 text-center">User Profiles</h1>

    <a href="{{ route('profiles.create') }}" class="btn btn-primary mb-3">Create Profile</a>

    <div class="row">
        @foreach ($profiles as $profile)
            <div class="col-md-4 mb-4">
                <div class="card shadow-lg border-0 rounded-lg overflow-hidden">
                    {{-- <img src="https://via.placeholder.com/150" class="card-img-top rounded-top" alt="{{ $profile->name }}'s profile picture"> --}}
                    <div class="card-body">
                        <h5 class="card-title text-primary">{{ $profile->name }}</h5>
                        <p class="card-text text-muted">{{ $profile->email }}</p>
                        <p class="card-text text-success"><small>{{ $profile->vehicle_type }}</small></p>
                        <a href="{{ route('profiles.show', $profile->id) }}" class="btn btn-outline-primary btn-sm">View Profile</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

