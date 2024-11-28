<?php

namespace App\Http\Controllers;

use App\Models\ServiceListing;
use App\Models\Service;
use App\Models\ServiceDetail;
use App\Models\Name;
use App\Models\Addon;
use App\Models\FAQ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceListingController extends Controller
{
    public function index()
    {
        $listings = ServiceListing::with('category')->get();
        return view('service_listings.index', compact('listings'));
    }

    public function create()
    {
        $categories = Service::all();
        $servicesIncluded = ServiceDetail::all();
        $subFeatures = Name::all();
        $addons = Addon::all();
        $faqs = FAQ::all();
        return view('service_listings.create', compact('categories', 'servicesIncluded', 'subFeatures', 'addons', 'faqs'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
            'category_id' => 'required|exists:services,id',
            'services_included' => 'required|array',
            'sub_features' => 'required|array',
            'recommanded_addons' => 'required|array',
            'faqs' => 'required|array',
            'timeline_in_minutes' => 'required|integer',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('service_images', 'public');
        }

        ServiceListing::create($data);

        return redirect()->route('service_listings.index')->with('success', 'Service listing created successfully.');
    }

    public function edit(ServiceListing $serviceListing)
    {
        $categories = Service::all();
        $servicesIncluded = ServiceDetail::all();
        $subFeatures = Name::all();
        $addons = Addon::all();
        $faqs = FAQ::all();
        return view('service_listings.edit', compact('serviceListing', 'categories', 'servicesIncluded', 'subFeatures', 'addons', 'faqs'));
    }

    public function update(Request $request, ServiceListing $serviceListing)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
            'category_id' => 'required|exists:services,id',
            'services_included' => 'required|array',
            'sub_features' => 'required|array',
            'recommanded_addons' => 'required|array',
            'faqs' => 'required|array',
            'timeline_in_minutes' => 'required|integer',
        ]);

        if ($request->hasFile('image')) {
            Storage::delete('public/' . $serviceListing->image);
            $data['image'] = $request->file('image')->store('service_images', 'public');
        }

        $serviceListing->update($data);

        return redirect()->route('service_listings.index')->with('success', 'Service listing updated successfully.');
    }

    public function destroy(ServiceListing $serviceListing)
    {
        Storage::delete('public/' . $serviceListing->image);
        $serviceListing->delete();

        return redirect()->route('service_listings.index')->with('success', 'Service listing deleted successfully.');
    }
    public function show(ServiceListing $serviceListing)
    {
        $faqs = FAQ::whereIn('id', $serviceListing->faqs)->get();
        $servicesIncluded = ServiceDetail::whereIn('id', $serviceListing->services_included)->get();
        return view('service_listings.show', compact('serviceListing', 'faqs', 'servicesIncluded'));
    }



}
