@extends('layouts.car-app')
@section('title', 'Create Addon')

@section('content')

    <div class="page-content-wrapper">
        <div class="container-fluid">
            <div class="container mt-5">
                <h1>Add New Addon</h1>

                <form action="{{ route('addons.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="name" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" class="form-control" id="description" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" name="price" class="form-control" id="price" step="0.01" required>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" name="image" class="form-control" id="image">
                    </div>

                    <div class="mb-3">
                        <label for="features" class="form-label">Features</label>
                        <select name="features[]" class="form-control" id="features" multiple>
                            @foreach ($features as $feature)
                                <option value="{{ $feature->name }}">{{ $feature->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="timeline" class="form-label">Timeline</label>
                        <input type="number" name="timeline" class="form-control" id="timeline" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Save Addon</button>
                </form>
            </div>
        </div>
    </div>
@endsection
