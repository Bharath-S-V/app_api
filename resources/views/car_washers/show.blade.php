@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Car Washer Details</h2>

        <!-- Basic Information -->
        <div class="card mb-4">
            <div class="card-header">Personal/Business Information</div>
            <div class="card-body">
                <p><strong>Name:</strong> {{ $carWasher->name }}</p>
                <p><strong>Phone:</strong> {{ $carWasher->phone }}</p>
                <p><strong>Email:</strong> {{ $carWasher->email }}</p>
                <p><strong>Business Address:</strong> {{ $carWasher->business_address }}</p>
            </div>
        </div>

        <!-- Photos -->
        @if (!empty($carWasher->photos))
            <div class="card mb-4">
                <div class="card-header">Photos of Washing Center</div>
                <div class="card-body">
                    <div class="row">
                        @foreach ($carWasher->photos as $photo)
                            <div class="col-md-4 mb-3">
                                <img src="{{ asset('storage/' . $photo) }}" class="img-fluid img-thumbnail"
                                    alt="Car Washer Photo">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        <!-- Service Radius -->
        <div class="card mb-4">
            <div class="card-header">Service Radius</div>
            <div class="card-body">
                <p>{{ $carWasher->service_radius }} km</p>
            </div>
        </div>

        <!-- Washing Services Offered -->
        <div class="card mb-4">
            <div class="card-header">Washing Services Offered</div>
            <div class="card-body">
                @if (!empty($carWasher->services_offered))
                    <ul>
                        @foreach ($carWasher->services_offered as $service)
                            <li>{{ ucfirst($service) }}</li>
                        @endforeach
                    </ul>
                @else
                    <p>No services listed.</p>
                @endif
            </div>
        </div>

        <!-- Availability Schedule -->
        <div class="card mb-4">
            <div class="card-header">Availability Schedule</div>
            <div class="card-body">
                @if (!empty($carWasher->availability_schedule))
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Day</th>
                                <th>Available Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($carWasher->availability_schedule as $day => $time)
                                <tr>
                                    <td>{{ ucfirst($day) }}</td>
                                    <td>{{ $time ?: 'Not Available' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p>No availability schedule set.</p>
                @endif
            </div>
        </div>

        <!-- Verification Documents -->
        @if (!empty($carWasher->verification_documents))
            <div class="card mb-4">
                <div class="card-header">Verification Documents</div>
                <div class="card-body">
                    <ul>
                        @foreach ($carWasher->verification_documents as $document)
                            <li><a href="{{ asset('storage/' . $document) }}" target="_blank">View Document</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <!-- Approval Status -->
        <div class="card mb-4">
            <div class="card-header">Approval Status</div>
            <div class="card-body">
                @if ($carWasher->is_approved)
                    <p class="text-success">Approved</p>
                @else
                    <p class="text-warning">Pending Review</p>
                @endif
            </div>
        </div>

        <!-- Action Buttons -->
        <a href="{{ route('car_washers.edit', $carWasher->id) }}" class="btn btn-primary">Edit</a>
        <a href="{{ route('car_washers.index') }}" class="btn btn-secondary">Back to List</a>
    </div>
@endsection
