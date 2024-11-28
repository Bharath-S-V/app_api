@extends('layouts.car-app')
@section('title', 'Create Car Washers')

@section('content')

    <div class="page-content-wrapper">
        <div class="container-fluid">
            <div class="container mt-5">
                <h2 class="mt-5">Register New Car Washer</h2>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                <form action="{{ route('car_washers.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone:</label>
                        <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="business_address">Business Address:</label>
                        <textarea name="business_address" class="form-control">{{ old('business_address') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="photos">Photos of Washing Center:</label>
                        <input type="file" name="photos[]" class="form-control" multiple>
                    </div>

                    <div class="form-group">
                        <label for="service_radius">Service Radius (km):</label>
                        <input type="number" name="service_radius" class="form-control"
                            value="{{ old('service_radius') }}">
                    </div>

                    <div class="form-group">
                        <label for="services_offered">Washing Services Offered:</label>
                        <select name="services_offered[]" class="form-control" multiple>
                            <option value="basic wash">Basic Wash</option>
                            <option value="premium wash">Premium Wash</option>
                            <option value="polishing">Polishing</option>
                            <option value="detailing">Detailing</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="availability_schedule">Availability Schedule:</label>
                        <div>
                            <label>Monday: <input type="text" name="availability_schedule[monday]" class="form-control"
                                    placeholder="e.g., 9 AM - 5 PM"></label>
                            <label>Tuesday: <input type="text" name="availability_schedule[tuesday]" class="form-control"
                                    placeholder="e.g., 9 AM - 5 PM"></label>
                            <label>Wednesday: <input type="text" name="availability_schedule[wednesday]"
                                    class="form-control" placeholder="e.g., 9 AM - 5 PM"></label>
                            <label>Thursday: <input type="text" name="availability_schedule[thursday]"
                                    class="form-control" placeholder="e.g., 9 AM - 5 PM"></label>
                            <label>Friday: <input type="text" name="availability_schedule[friday]" class="form-control"
                                    placeholder="e.g., 9 AM - 5 PM"></label>
                            <label>Saturday: <input type="text" name="availability_schedule[saturday]"
                                    class="form-control" placeholder="e.g., 10 AM - 4 PM"></label>
                            <label>Sunday: <input type="text" name="availability_schedule[sunday]" class="form-control"
                                    placeholder="e.g., Closed"></label>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="verification_documents">Upload Verification Documents:</label>
                        <input type="file" name="verification_documents[]" class="form-control" multiple>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Register</button>
                </form>
            </div>
        </div>
    </div>
@endsection
