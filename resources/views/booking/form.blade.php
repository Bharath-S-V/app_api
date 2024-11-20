<!-- resources/views/booking/form.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Book a Car Wash</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('booking') }}" method="POST">
                @csrf
                <!-- Form fields for booking a car wash -->
                <div class="form-group">
                    <label for="vehicle">Select Vehicle</label>
                    <select name="vehicle" class="form-control" id="vehicle" required>
                        <option value="2-wheeler">2-Wheeler</option>
                        <option value="4-wheeler">4-Wheeler</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="time">Select Time</label>
                    <input type="datetime-local" name="time" class="form-control" id="time" required>
                </div>
                <button type="submit" class="btn btn-primary">Book Now</button>
            </form>
        </div>
    </div>
@endsection
