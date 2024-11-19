@extends('layouts.app')

@section('title', 'Select Address')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Select Address</h3>
        </div>
        <div class="card-body">
            <form action="{{ url('/address/select/' . $user->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea name="address" id="address" class="form-control" placeholder="Enter your address" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Save Address</button>
            </form>
        </div>
    </div>
@endsection
