@extends('layouts.car-app')
@section('title', 'Feature Details')

@section('content')

    <div class="page-content-wrapper">
        <div class="container-fluid">
            <h1>View Feature</h1>
            <div class="card mt-3">
                <div class="card-body">
                    <h5 class="card-title">Name: {{ $name->name }}</h5>
                    <p class="card-text">Created At: {{ $name->created_at }}</p>
                    <p class="card-text">Updated At: {{ $name->updated_at }}</p>
                    <a href="{{ route('names.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
