@extends('layouts.app')

@section('content')
    <h1>Register New Washing Center</h1>

    <form action="{{ route('washing_centers.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Store Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="business_address" class="form-label">Business Address</label>
            <textarea name="business_address" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label for="contact_number" class="form-label">Contact Number</label>
            <input type="text" name="contact_number" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control">
        </div>

        <div class="mb-3">
            <label for="photos" class="form-label">Upload Photos</label>
            <input type="file" name="photos[]" class="form-control" multiple>
        </div>

        <div class="mb-3">
            <label for="capacity" class="form-label">Store Capacity</label>
            <input type="number" name="capacity" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="services" class="form-label">Services & Prices</label>
            <div id="services-wrapper">
                <div class="service-row mb-2">
                    <input type="text" name="services[0][type]" class="form-control mb-1" placeholder="Service Type"
                        required>
                    <input type="number" name="services[0][price]" class="form-control" placeholder="Price" required>
                </div>
            </div>
            <button type="button" id="add-service" class="btn btn-secondary btn-sm mt-2">Add More Service</button>
        </div>

        <div class="mb-3">
            <label for="latitude" class="form-label">Latitude</label>
            <input type="text" name="latitude" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="longitude" class="form-label">Longitude</label>
            <input type="text" name="longitude" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Submit</button>
    </form>

    <script>
        let serviceIndex = 1;
        document.getElementById('add-service').addEventListener('click', function() {
            const wrapper = document.getElementById('services-wrapper');
            const newRow = document.createElement('div');
            newRow.className = 'service-row mb-2';
            newRow.innerHTML = `
                <input type="text" name="services[${serviceIndex}][type]" class="form-control mb-1" placeholder="Service Type" required>
                <input type="number" name="services[${serviceIndex}][price]" class="form-control" placeholder="Price" required>
            `;
            wrapper.appendChild(newRow);
            serviceIndex++;
        });
    </script>
@endsection
