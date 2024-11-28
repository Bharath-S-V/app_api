@extends('layouts.car-app')
@section('title', 'Create Category')

@section('content')

    <div class="page-content-wrapper">
        <div class="container-fluid">
            <div class="container mt-5">
                <h1>Add Category</h1>
                <form action="{{ route('services.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Category Name:</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}"
                            required>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Add Service</button>
                </form>
            </div>
        </div>
    </div>
@endsection
