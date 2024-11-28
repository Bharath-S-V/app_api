@extends('layouts.car-app')
@section('title', 'Addons')

@section('content')

    <div class="page-content-wrapper">
        <div class="container-fluid">
            <div class="container mt-5">
                <h1>All Addons</h1>
                <a href="{{ route('addons.create') }}" class="btn btn-primary">Add New Addon</a>

                <table class="table table-striped mt-3">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Timeline</th>
                            <th>Features</th>
                            <th>Image</th> <!-- Added column for image -->
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($addons as $addon)
                            <tr>
                                <td>{{ $addon->name }}</td>
                                <td>{{ $addon->description }}</td>
                                <td>{{ $addon->price }}</td>
                                <td>{{ $addon->timeline }}</td>
                                <td>
                                    @foreach ($addon->features as $feature)
                                        <span class="badge bg-secondary">{{ $feature }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @if ($addon->image)
                                        <img src="{{ asset('storage/' . $addon->image) }}" alt="Addon Image" width="100">
                                    @else
                                        <span>No image</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('addons.edit', $addon->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('addons.destroy', $addon->id) }}" method="POST"
                                        style="display:inline;">
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

@endsection
