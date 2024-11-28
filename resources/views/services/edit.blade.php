@extends('layouts.car-app')
@section('title', 'Edit Category')

@section('content')

    <div class="page-content-wrapper">
        <div class="container-fluid">
            <div class="container mt-5">
                <h1>Edit Category</h1>
                <form action="{{ route('services.update', $service->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Category Name:</label>
                        <input type="text" name="name" id="name" class="form-control"
                            value="{{ old('name', $service->name) }}" required>
                    </div>
                    <button type="submit" class="btn btn-success mt-3">Update Service</button>
                </form>
            </div>
        </div>
    </div>
@endsection
