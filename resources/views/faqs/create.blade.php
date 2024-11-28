@extends('layouts.car-app')
@section('title', 'Create Faqs')

@section('content')

    <div class="page-content-wrapper">
        <div class="container-fluid">
            <div class="container mt-5">
                <h1>Create FAQ</h1>
                <a href="{{ route('faqs.index') }}" class="btn btn-secondary mb-3">Back to List</a>

                <form action="{{ route('faqs.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="question" class="form-label">Question</label>
                        <input type="text" name="question" id="question" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="answer" class="form-label">Answer</label>
                        <textarea name="answer" id="answer" class="form-control" rows="5" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
