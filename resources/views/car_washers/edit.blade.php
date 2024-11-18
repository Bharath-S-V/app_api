@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Car Washer Details</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('car_washers.update', $carWasher->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $carWasher->name) }}" required>
            </div>

            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" name="phone" class="form-control" value="{{ old('phone', $carWasher->phone) }}"
                    required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $carWasher->email) }}"
                    required>
            </div>

            <div class="form-group">
                <label for="business_address">Business Address:</label>
                <textarea name="business_address" class="form-control">{{ old('business_address', $carWasher->business_address) }}</textarea>
            </div>

            <div class="form-group">
                <label for="service_radius">Service Radius (km):</label>
                <input type="number" name="service_radius" class="form-control"
                    value="{{ old('service_radius', $carWasher->service_radius) }}">
            </div>

            <div class="form-group">
                <label for="services_offered">Washing Services Offered:</label>
                <select name="services_offered[]" class="form-control" multiple>
                    <option value="basic wash"
                        {{ in_array('basic wash', $carWasher->services_offered ?? []) ? 'selected' : '' }}>Basic Wash
                    </option>
                    <option value="premium wash"
                        {{ in_array('premium wash', $carWasher->services_offered ?? []) ? 'selected' : '' }}>Premium Wash
                    </option>
                    <option value="polishing"
                        {{ in_array('polishing', $carWasher->services_offered ?? []) ? 'selected' : '' }}>Polishing</option>
                    <option value="detailing"
                        {{ in_array('detailing', $carWasher->services_offered ?? []) ? 'selected' : '' }}>Detailing
                    </option>
                </select>
            </div>

            <div class="form-group">
                <label for="availability_schedule">Availability Schedule:</label>
                <div>
                    <label>Monday: <input type="text" name="availability_schedule[monday]" class="form-control"
                            value="{{ old('availability_schedule.monday', $carWasher->availability_schedule['monday'] ?? '') }}"></label>
                    <label>Tuesday: <input type="text" name="availability_schedule[tuesday]" class="form-control"
                            value="{{ old('availability_schedule.tuesday', $carWasher->availability_schedule['tuesday'] ?? '') }}"></label>
                    <label>Wednesday: <input type="text" name="availability_schedule[wednesday]" class="form-control"
                            value="{{ old('availability_schedule.wednesday', $carWasher->availability_schedule['wednesday'] ?? '') }}"></label>
                    <label>Thursday: <input type="text" name="availability_schedule[thursday]" class="form-control"
                            value="{{ old('availability_schedule.thursday', $carWasher->availability_schedule['thursday'] ?? '') }}"></label>
                    <label>Friday: <input type="text" name="availability_schedule[friday]" class="form-control"
                            value="{{ old('availability_schedule.friday', $carWasher->availability_schedule['friday'] ?? '') }}"></label>
                    <label>Saturday: <input type="text" name="availability_schedule[saturday]" class="form-control"
                            value="{{ old('availability_schedule.saturday', $carWasher->availability_schedule['saturday'] ?? '') }}"></label>
                    <label>Sunday: <input type="text" name="availability_schedule[sunday]" class="form-control"
                            value="{{ old('availability_schedule.sunday', $carWasher->availability_schedule['sunday'] ?? '') }}"></label>
                </div>
            </div>


            <button type="submit" class="btn btn-success mt-3">Update</button>
        </form>
    </div>
@endsection
