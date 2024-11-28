@extends('layouts.car-app')
@section('title', 'Reviews Details')

@section('content')

    <div class="page-content-wrapper">
        <div class="container-fluid">
            <div class="container mt-5">
                <h1>Review Details</h1>
                <p><strong>User:</strong> {{ $review->userProfile->name }}</p>
                <p><strong>Service:</strong> {{ $review->serviceListing->title }}</p>
                <p><strong>Ratings:</strong> {{ $review->ratings }}</p>
                <p><strong>Review:</strong> {{ $review->review }}</p>
                <a href="{{ route('reviews.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
@endsection
