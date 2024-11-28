@extends('layouts.car-app')
@section('title', ' Edit Profiles')

@section('content')

    <div class="page-content-wrapper">
        <div class="container-fluid">
            <h1>Edit Features</h1>
            <form action="{{ route('names.update', $name->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Feature</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ $name->name }}"
                        required>
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
