@extends('layouts.car-app')
@section('title', 'Service List')

@section('content')

    <div class="page-content-wrapper">
        <div class="container-fluid">
            <div class="container mt-5">
                <h1>Service List</h1>
                <a href="{{ route('service_listings.create') }}" class="btn btn-primary">Add New</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($listings as $listing)
                            <tr>
                                <td>{{ $listing->id }}</td>
                                <td>{{ $listing->name }}</td>
                                <td>{{ $listing->price }}</td>
                                <td>{{ $listing->category->name }}</td>
                                <td>
                                    <a href="{{ route('service_listings.show', $listing) }}" class="btn btn-info">View</a>

                                    <a href="{{ route('service_listings.edit', $listing) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('service_listings.destroy', $listing) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger"
                                            onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
