@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Car Washers List</h2>
        <a href="{{ route('car_washers.create') }}" class="btn btn-primary">Register New Car Washer</a>
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($carWashers as $washer)
                    <tr>
                        <td>{{ $washer->name }}</td>
                        <td>{{ $washer->email }}</td>
                        <td>{{ $washer->phone }}</td>
                        <td>{{ ucfirst($washer->status) }}</td>
                        <td>
                            <a href="{{ route('car_washers.show', $washer->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('car_washers.edit', $washer->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('car_washers.destroy', $washer->id) }}" method="POST"
                                style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
