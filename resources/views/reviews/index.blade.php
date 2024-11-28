@extends('layouts.car-app')
@section('title', 'Reviews')

@section('content')

    <div class="page-content-wrapper">
        <div class="container-fluid">
            <div class="container mt-5">
                <h1>All Reviews</h1>
                <a href="{{ route('reviews.create') }}" class="btn btn-primary mb-3">Add Review</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>User</th>
                            <th>Service</th>
                            <th>Ratings</th>
                            <th>Review</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reviews as $review)
                            <tr>
                                <td>{{ $review->id }}</td>
                                <td>{{ $review->userProfile->name }}</td>
                                <td>{{ $review->serviceListing->title }}</td>
                                <td>{{ $review->ratings }}</td>
                                <td>{{ $review->review }}</td>
                                <td>
                                    <a href="{{ route('reviews.show', $review->id) }}" class="btn btn-info btn-sm">View</a>
                                    <a href="{{ route('reviews.edit', $review->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('reviews.destroy', $review->id) }}" method="POST"
                                        style="display:inline-block;">
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
    </div>
@endsection
