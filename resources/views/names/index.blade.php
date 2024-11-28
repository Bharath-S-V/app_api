@extends('layouts.car-app')
@section('title', 'Feature List')

@section('content')

    <div class="page-content-wrapper">
        <div class="container-fluid">
            <h1>Feature Records</h1>
            <a href="{{ route('names.create') }}" class="btn btn-primary">Add New Name</a>

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="table table-striped mt-3">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Features</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($names as $name)
                        <tr>
                            <td>{{ $name->id }}</td>
                            <td>{{ $name->name }}</td>
                            <td>{{ $name->created_at }}</td>
                            <td>{{ $name->updated_at }}</td>
                            <td>
                                <a href="{{ route('names.show', $name->id) }}" class="btn btn-info btn-sm">View</a>
                                <a href="{{ route('names.edit', $name->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('names.destroy', $name->id) }}" method="POST"
                                    style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
