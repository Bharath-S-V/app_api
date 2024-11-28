@extends('layouts.car-app')
@section('title', 'Service Details')

@section('content')

    <div class="page-content-wrapper">
        <div class="container-fluid">
            <div class="container mt-5">
                <h1>{{ $serviceListing->name }}</h1>
                <p><strong>Price:</strong> ${{ $serviceListing->price }}</p>
                <p><strong>Category:</strong> {{ $serviceListing->category->name }}</p>
                @if ($serviceListing->image)
                    <img src="{{ asset('storage/' . $serviceListing->image) }}" alt="Service Image" class="img-thumbnail mt-2"
                        width="300">
                @endif

                <h3>Services Included</h3>
                <ul>
                    @foreach ($serviceListing->services_included as $service)
                        <li>{{ $service }}</li>
                    @endforeach
                </ul>

                <h3>Sub Features</h3>
                <ul>
                    @foreach ($serviceListing->sub_features as $subFeature)
                        <li>{{ $subFeature }}</li>
                    @endforeach
                </ul>

                <h3>Recommended Add-ons</h3>
                <ul>
                    @foreach ($serviceListing->recommanded_addons as $addon)
                        <li>{{ $addon }}</li>
                    @endforeach
                </ul>

                <h3>FAQs</h3>
                <ul>
                    @foreach ($serviceListing->faqs as $faqId)
                        @php
                            $faq = \App\Models\FAQ::find($faqId);
                        @endphp
                        @if ($faq)
                            <li><strong>Q:</strong> {{ $faq->question }}<br><strong>A:</strong> {{ $faq->answer }}</li>
                        @endif
                    @endforeach
                </ul>

                <p><strong>Timeline:</strong> {{ $serviceListing->timeline_in_minutes }} minutes</p>

                <a href="{{ route('service_listings.index') }}" class="btn btn-secondary">Back to Service List</a>
            </div>
        </div>
    </div>

@endsection
