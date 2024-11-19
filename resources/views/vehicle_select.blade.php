@extends('layouts.app')

@section('title', 'Select Vehicle Type')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Select Vehicle Type</h3>
        </div>
        <div class="card-body">
            <form action="{{ url('/vehicle/select/' . $user->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="vehicle_type" class="form-label">Vehicle Type</label>
                    <select name="vehicle_type" id="vehicle_type" class="form-control" required>
                        <option value="">Select Vehicle Type</option>
                        <option value="2-wheeler">2-Wheeler</option>
                        <option value="4-wheeler">4-Wheeler</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
@endsection
