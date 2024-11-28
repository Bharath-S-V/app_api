@extends('layouts.car-app')
@section('title', 'Edit Reviews')

@section('content')

    <div class="page-content-wrapper">
        <div class="container-fluid">
            <div class="container mt-5">
                <h1>Edit Review</h1>
                <form action="{{ route('reviews.update', $review->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="ratings">Ratings</label>
                        <input type="number" name="ratings" id="ratings" class="form-control" min="1" max="5"
                            value="{{ $review->ratings }}" required>
                    </div>
                    <div class="form-group">
                        <label for="review">Review</label>
                        <textarea name="review" id="review" class="form-control" rows="5" required>{{ $review->review }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
