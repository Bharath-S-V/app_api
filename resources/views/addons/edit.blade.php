@extends('layouts.car-app')
@section('title', 'Edit Addons')

@section('content')

    <div class="page-content-wrapper">
        <div class="container-fluid">
            <div class="container mt-5">
                <h1>Edit Addon</h1>

                <form action="{{ route('addons.update', $addon->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="name"
                            value="{{ old('name', $addon->name) }}" required>
                    </div>

                    <!-- Description -->
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" class="form-control" id="description" required>{{ old('description', $addon->description) }}</textarea>
                    </div>

                    <!-- Price -->
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" name="price" class="form-control" id="price"
                            value="{{ old('price', $addon->price) }}" step="0.01" required>
                    </div>

                    <!-- Image (Optional) -->
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" name="image" class="form-control" id="image">
                        @if ($addon->image)
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $addon->image) }}" alt="Addon Image" width="150">
                            </div>
                        @endif
                    </div>

                    <!-- Features (Multiple Select) -->
                    <div class="mb-3">
                        <label for="features" class="form-label">Features</label>
                        <select name="features[]" class="form-control" id="features" multiple>
                            @foreach ($features as $feature)
                                <option value="{{ $feature->name }}" @if (in_array($feature->name, old('features', $addon->features))) selected @endif>
                                    {{ $feature->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Timeline -->
                    <div class="mb-3">
                        <label for="timeline" class="form-label">Timeline</label>
                        <input type="text" name="timeline" class="form-control" id="timeline"
                            value="{{ old('timeline', $addon->timeline) }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Addon</button>
                </form>
            </div>
        </div>
    </div>

@endsection
