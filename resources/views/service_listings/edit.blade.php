@extends('layouts.car-app')
@section('title', 'Edit Service List')

@section('content')

    <div class="page-content-wrapper">
        <div class="container-fluid">
            <div class="container mt-5">
                <h2>Edit Service Listing</h2>

                <form action="{{ route('service_listings.update', $serviceListing->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Service Name</label>
                        <input type="text" name="name" id="name" class="form-control"
                            value="{{ old('name', $serviceListing->name) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" name="price" id="price" class="form-control"
                            value="{{ old('price', $serviceListing->price) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" id="image" class="form-control">
                        @if ($serviceListing->image)
                            <img src="{{ asset('storage/' . $serviceListing->image) }}" alt="Service Image"
                                class="img-thumbnail mt-2" width="150">
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select name="category_id" id="category_id" class="form-control" required>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $serviceListing->category_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="services_included">Services Included</label>
                        <select name="services_included[]" id="services_included" class="form-control" multiple required>
                            @foreach ($servicesIncluded as $service)
                                <option value="{{ $service->id }}"
                                    {{ in_array($service->id, old('services_included', $serviceListing->services_included ?? [])) ? 'selected' : '' }}>
                                    {{ $service->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="sub_features">Sub Features</label>
                        <select name="sub_features[]" id="sub_features" class="form-control" multiple required>
                            @foreach ($subFeatures as $subFeature)
                                <option value="{{ $subFeature->id }}"
                                    {{ in_array($subFeature->id, old('sub_features', $serviceListing->sub_features ?? [])) ? 'selected' : '' }}>
                                    {{ $subFeature->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="recommanded_addons">Recommended Add-ons</label>
                        <select name="recommanded_addons[]" id="recommanded_addons" class="form-control" multiple required>
                            @foreach ($addons as $addon)
                                <option value="{{ $addon->id }}"
                                    {{ in_array($addon->id, old('recommanded_addons', $serviceListing->recommanded_addons ?? [])) ? 'selected' : '' }}>
                                    {{ $addon->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="faqs">FAQs</label>
                        <select name="faqs[]" id="faqs" class="form-control" multiple required>
                            @foreach ($faqs as $faq)
                                <option value="{{ $faq->id }}"
                                    {{ in_array($faq->id, old('faqs', $serviceListing->faqs ?? [])) ? 'selected' : '' }}>
                                    {{ $faq->question }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="timeline_in_minutes">Timeline (in minutes)</label>
                        <input type="number" name="timeline_in_minutes" id="timeline_in_minutes" class="form-control"
                            value="{{ old('timeline_in_minutes', $serviceListing->timeline_in_minutes) }}" required>
                    </div>

                    <button type="submit" class="btn btn-warning">Update Service Listing</button>
                </form>
            </div>
        </div>
    </div>
@endsection
