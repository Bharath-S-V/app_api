@extends('layouts.car-app')

@section('title', 'Service Details')

@section('content')
    <div class="page-content-wrapper">
        <div class="container-fluid">
            <div class="container mt-5">
                <h1 class="mb-4">Service Details</h1>
                <a href="{{ route('service_details.create') }}" class="btn btn-primary mb-3">Add New Service</a>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Image</th>
                                <th scope="col">Description</th>
                                <th scope="col">Features</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($services as $service)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $service->name }}</td>
                                    <td>
                                        <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->name }}"
                                            class="img-fluid" style="max-width: 50px;">
                                    </td>
                                    <td>{{ $service->content }}</td>
                                    <td>
                                        @foreach (json_decode($service->features) as $feature)
                                            <div class="badge bg-success mb-2">{{ $feature }}</div>
                                        @endforeach

                                    </td>
                                    <td>
                                        <a href="{{ route('service_details.show', $service) }}"
                                            class="btn btn-info btn-sm mr-2">View</a>
                                        <a href="{{ route('service_details.edit', $service) }}"
                                            class="btn btn-warning btn-sm mr-2">Edit</a>
                                        <form action="{{ route('service_details.destroy', $service) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
