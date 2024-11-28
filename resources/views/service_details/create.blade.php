@extends('layouts.car-app')
@section('title', 'Create Services')

@section('content')

    <div class="page-content-wrapper">
        <div class="container-fluid">
            <div class="container mt-5">
                <h1>Add New Service</h1>
                <form action="{{ route('service_details.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Service Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Service Image</label>
                        <input type="file" class="form-control" id="image" name="image" required>
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea name="content" id="content" class="form-control" rows="5" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Features</label><br>
                        @foreach ($features as $feature)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="features[]"
                                    value="{{ $feature->name }}" id="feature_{{ $feature->id }}">
                                <label class="form-check-label"
                                    for="feature_{{ $feature->id }}">{{ $feature->name }}</label>
                            </div>
                        @endforeach

                    </div>

                    <button type="submit" class="btn btn-success">Save Service</button>
                    <a href="{{ route('service_details.index') }}" class="btn btn-secondary">Back to Services</a>
                </form>

            </div>
        </div>
    </div>
@endsection
