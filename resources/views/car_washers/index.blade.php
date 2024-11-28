@extends('layouts.car-app')
@section('title', 'Car Washers')

@section('content')

    <div class="page-content-wrapper">
        <div class="container-fluid">
            <div class="container mt-5">
                <h2 class="mt-5">Car Washers List</h2>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <a href="{{ route('car_washers.create') }}" class="btn btn-primary">Register New Car Washer</a>
                <div class="table-responsive mb-0">
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
                                    <td>
                                        <!-- Status Dropdown -->
                                        <form action="{{ route('car_washers.update_status', $washer->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <select name="status" class="form-control" onchange="this.form.submit()">
                                                <option value="pending"
                                                    {{ $washer->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                <option value="approved"
                                                    {{ $washer->status == 'approved' ? 'selected' : '' }}>Approved</option>
                                                <option value="rejected"
                                                    {{ $washer->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                            </select>
                                        </form>
                                    </td>
                                    <td>
                                        <a href="{{ route('car_washers.show', $washer->id) }}" class="btn btn-info">View</a>
                                        <a href="{{ route('car_washers.edit', $washer->id) }}"
                                            class="btn btn-warning">Edit</a>
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
            </div>
        </div>
    </div>

@endsection
