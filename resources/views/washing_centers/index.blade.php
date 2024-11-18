@extends('layouts.app')

@section('content')
    <h1>Washing Centers</h1>
    <a href="{{ route('washing_centers.create') }}" class="btn btn-primary mb-3">Add New Washing Center</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Contact</th>
                <th>Capacity</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($centers as $center)
                <tr>
                    <td>{{ $center->name }}</td>
                    <td>{{ $center->contact_number }}</td>
                    <td>{{ $center->capacity }} cars</td>
                    <td>
                        <a href="{{ route('washing_centers.show', $center->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('washing_centers.edit', $center->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('washing_centers.destroy', $center->id) }}" method="POST"
                            style="display:inline;">
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
@endsection
