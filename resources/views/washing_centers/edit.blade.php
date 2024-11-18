@extends('layouts.app')

@section('content')
    <h1>Edit Washing Center</h1>

    <form action="{{ route('washing_centers.update', $washingCenter->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Store Name</label>
            <input type="text" name="name" class="form-control" value="{{ $washingCenter->name }}" required>
        </div>

        <div class="mb-3">
            <label for="business_address" class="form-label">Business Address</label>
            <textarea name="business_address" class="form-control" required>{{ $washingCenter->business_address }}</textarea>
        </div>

        <div class="mb-3">
            <label for="contact_number" class="form-label">Contact Number</label>
            <input type="text" name="contact_number" class="form-control" value="{{ $washingCenter->contact_number }}"
                required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $washingCenter->email }}">
        </div>

        <div class="mb-3">
            <label for="photos" class="form-label">Upload Photos (Leave empty to keep existing)</label>
            <input type="file" name="photos[]" class="form-control" multiple>
            @if ($washingCenter->photos)
                <div class="mt-3">
                    <p>Existing Photos:</p>
                    <div class="d-flex flex-wrap">
                        @foreach ($washingCenter->photos as $photo)
                            <img src="{{ asset('storage/' . $photo) }}" alt="Photo" class="img-thumbnail me-2"
                                style="width: 100px;">
                        @endforeach
                    </div>
                </div>
            @endif
        </div>

        <div class="mb-3">
            <label for="capacity" class="form-label">Store Capacity</label>
            <input type="number" name="capacity" class="form-control" value="{{ $washingCenter->capacity }}" required>
        </div>

        <div class="mb-3">
            <label for="services" class="form-label">Services & Prices</label>
            <div id="services-wrapper">
                @foreach ($washingCenter->services as $index => $service)
                    <div class="service-row mb-2">
                        <input type="text" name="services[{{ $index }}][type]" class="form-control mb-1"
                            placeholder="Service Type" value="{{ $service['type'] }}" required>
                        <input type="number" name="services[{{ $index }}][price]" class="form-control"
                            placeholder="Price" value="{{ $service['price'] }}" required>
                    </div>
                @endforeach
            </div>
            <button type="button" id="add-service" class="btn btn-secondary btn-sm mt-2">Add More Service</button>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
    </form>

    <script>
        let serviceIndex = {{ count($washingCenter->services) }};
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
