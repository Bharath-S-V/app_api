@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Edit Profile</h1>

    <form action="{{ route('profiles.update', $profile->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $profile->name) }}"
                required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email"
                value="{{ old('email', $profile->email) }}" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone"
                value="{{ old('phone', $profile->phone) }}" required>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <textarea class="form-control" id="address" name="address" required>{{ old('address', $profile->address) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="vehicle_type" class="form-label">Vehicle Type</label>
            <select class="form-select" id="vehicle_type" name="vehicle_type" required>
                <option value="2-wheeler"
                    {{ old('vehicle_type', $profile->vehicle_type) == '2-wheeler' ? 'selected' : '' }}>2-Wheeler</option>
                <option value="4-wheeler"
                    {{ old('vehicle_type', $profile->vehicle_type) == '4-wheeler' ? 'selected' : '' }}>4-Wheeler</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update Profile</button>
    </form>
@endsection
