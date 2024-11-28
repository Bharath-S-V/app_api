@extends('layouts.car-app')

@section('title', 'Service Details: ' . $serviceDetail->name)

@section('content')
    <div class="page-content-wrapper">
        <div class="container-fluid">
            <div class="container mt-5">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h1 class="card-title">{{ $serviceDetail->name }}</h1>

                        <div class="text-center mb-4">
                            <img src="{{ asset('storage/' . $serviceDetail->image) }}" alt="{{ $serviceDetail->name }}"
                                class="img-fluid" style="max-width: 200px;">
                        </div>

                        <h3 class="mt-3">Content</h3>
                        <p>{{ $serviceDetail->content }}</p>

                        <h3 class="mt-3">Features</h3>
                        <ul class="list-group">
                            @foreach (json_decode($serviceDetail->features) as $feature)
                                <li class="list-group-item">{{ $feature }}</li>
                            @endforeach
                        </ul>

                        <div class="mt-4">
                            <a href="{{ route('service_details.index') }}" class="btn btn-secondary">Back to Services</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
