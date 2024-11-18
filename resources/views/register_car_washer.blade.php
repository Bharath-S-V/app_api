<!-- resources/views/register_car_washer.blade.php -->

@extends('layouts.app')

@section('content')
    <h2 class="text-center">Car Washer Registration</h2>

    <form action="{{ url('register-car-washer') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label for="phone_number" class="form-label">Phone Number</label>
                <input type="text" name="phone_number" class="form-control" required>
            </div>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="business_address" class="form-label">Business Address</label>
            <input type="text" name="business_address" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="photos" class="form-label">Photos of the Washing Center</label>
            <input type="file" name="photos[]" class="form-control" multiple>
        </div>

        <div class="mb-3">
            <label for="service_radius" class="form-label">Service Radius (in kilometers)</label>
            <input type="number" name="service_radius" class="form-control">
        </div>

        <div class="mb-3">
            <label for="services_offered" class="form-label">Services Offered</label>
            <select name="services_offered[]" class="form-select" multiple required>
                <option value="basic_wash">Basic Wash</option>
                <option value="premium_wash">Premium Wash</option>
                <option value="polishing">Polishing</option>
                <option value="detailing">Detailing</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="availability_schedule" class="form-label">Availability Schedule</label>

            <!-- Select Days -->
            <label for="days" class="form-label">Select Days</label>
            <select name="days[]" id="days" class="form-control" multiple required>
                <option value="Monday">Monday</option>
                <option value="Tuesday">Tuesday</option>
                <option value="Wednesday">Wednesday</option>
                <option value="Thursday">Thursday</option>
                <option value="Friday">Friday</option>
                <option value="Saturday">Saturday</option>
                <option value="Sunday">Sunday</option>
            </select>

            <!-- Open and Close Time for Each Day -->
            <div class="mt-3" id="schedule-times">
                <!-- Dynamically added open and close time fields -->
            </div>
        </div>




        <div class="text-center">
            <button type="submit" class="btn btn-primary">Register</button>
        </div>
    </form>

    <script>
        document.getElementById('days').addEventListener('change', function() {
            let selectedDays = Array.from(this.selectedOptions).map(option => option.value);
            let scheduleDiv = document.getElementById('schedule-times');
            scheduleDiv.innerHTML = ''; // Clear previous fields

            selectedDays.forEach(day => {
                let dayDiv = document.createElement('div');
                dayDiv.classList.add('day-time');

                // Create label and inputs for open and close times
                let openLabel = document.createElement('label');
                openLabel.textContent = `Open Time for ${day}`;
                let openTime = document.createElement('input');
                openTime.type = 'text';
                openTime.name = `open_times[${day}]`;
                openTime.classList.add('form-control');
                openTime.placeholder = `Enter open time for ${day}`;

                let closeLabel = document.createElement('label');
                closeLabel.textContent = `Close Time for ${day}`;
                let closeTime = document.createElement('input');
                closeTime.type = 'text';
                closeTime.name = `close_times[${day}]`;
                closeTime.classList.add('form-control');
                closeTime.placeholder = `Enter close time for ${day}`;

                dayDiv.appendChild(openLabel);
                dayDiv.appendChild(openTime);
                dayDiv.appendChild(closeLabel);
                dayDiv.appendChild(closeTime);

                scheduleDiv.appendChild(dayDiv);
            });
        });
    </script>
@endsection
