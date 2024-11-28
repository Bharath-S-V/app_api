@extends('layouts.car-app')
@section('title', 'user profiles')

@section('content')

    <div class="page-content-wrapper">
        <div class="container-fluid">
            <h1 class="mt-5 text-center">User Profiles</h1>
            <div class="row">
                <a href="{{ route('profiles.create') }}" class="btn btn-primary mb-3">Create Profile</a>


                <div class="table-responsive mb-0">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>phone</th>
                                <th>Email</th>
                                <th>Vehicle Type</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($profiles as $profile)
                                <tr>
                                    <td>{{ $profile->name ?? 'not defined' }}</td>
                                    <td>{{ $profile->phone ?? 'XXXXXXXXXX' }}</td>
                                    <td>{{ $profile->email ?? 'not defined' }}</td>
                                    <td>{{ $profile->vehicle_type ?? 'not defined' }}</td>
                                    <td>
                                        <a href="{{ route('profiles.show', $profile->id) }}"
                                            class="btn btn-outline-primary btn-sm">View Profile</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div><!-- end row-->
        </div><!-- container -->
    </div><!-- Page content Wrapper -->
@endsection
