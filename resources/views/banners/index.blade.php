@extends('layouts.car-app')
@section('title', 'Banners')

@section('content')

    <div class="page-content-wrapper">
        <div class="container-fluid">
            <div class="container mt-5">
                <h1>Banners</h1>
                <a href="{{ route('banners.create') }}" class="btn btn-primary">Add Banner</a>

                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Category</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($banners as $banner)
                            <tr>
                                <td><img src="{{ asset('storage/' . $banner->image) }}" alt="Banner" style="width: 100px;">
                                </td>
                                <td>{{ ucfirst($banner->category) }}</td>
                                <td>
                                    <a href="{{ route('banners.edit', $banner->id) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('banners.destroy', $banner->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Delete</button>
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
