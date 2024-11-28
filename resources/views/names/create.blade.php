@extends('layouts.car-app')
@section('title', 'Create Features')

@section('content')

    <div class="page-content-wrapper">
        <div class="container-fluid">
            <h1>Add New Feature</h1>
            <form action="{{ route('names.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Feature</label>
                    <input type="text" name="name" class="form-control" id="name" required>
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
@endsection
