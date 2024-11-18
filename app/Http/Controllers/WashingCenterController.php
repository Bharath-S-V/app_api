<?php

namespace App\Http\Controllers;

use App\Models\WashingCenter;
use Illuminate\Http\Request;

class WashingCenterController extends Controller
{
    public function index()
    {
        $centers = WashingCenter::all();
        return view('washing_centers.index', compact('centers'));
    }

    public function create()
    {
        return view('washing_centers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'business_address' => 'required|string',
            'contact_number' => 'required|string',
            'email' => 'nullable|email',
            'photos.*' => 'image|mimes:jpeg,png,jpg|max:2048',
            'capacity' => 'required|integer',
            'services' => 'required|array',
            'services.*.type' => 'required|string',
            'services.*.price' => 'required|numeric',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        // Handle file uploads
        $photos = [];
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $photos[] = $photo->store('washing_centers', 'public');
            }
        }

        // Save to database
        WashingCenter::create([
            'name' => $validated['name'],
            'business_address' => $validated['business_address'],
            'contact_number' => $validated['contact_number'],
            'email' => $validated['email'] ?? null,
            'photos' => $photos,
            'capacity' => $validated['capacity'],
            'services' => $validated['services'],
            'latitude' => $validated['latitude'],
            'longitude' => $validated['longitude'],
        ]);

        return redirect()->route('washing_centers.index')->with('success', 'Washing center registered successfully.');
    }

    public function show(WashingCenter $washingCenter)
    {
        return view('washing_centers.show', compact('washingCenter'));
    }

    public function edit(WashingCenter $washingCenter)
    {
        return view('washing_centers.edit', compact('washingCenter'));
    }

    public function update(Request $request, WashingCenter $washingCenter)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'business_address' => 'required|string',
            'contact_number' => 'required|string',
            'email' => 'nullable|email',
            'photos.*' => 'image|mimes:jpeg,png,jpg|max:2048',
            'capacity' => 'required|integer',
            'services' => 'required|array',
            'services.*.type' => 'required|string',
            'services.*.price' => 'required|numeric',
        ]);

        // Handle file uploads
        $photos = $washingCenter->photos ?? [];
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $photos[] = $photo->store('washing_centers', 'public');
            }
        }

        // Update washing center
        $washingCenter->update([
            'name' => $validated['name'],
            'business_address' => $validated['business_address'],
            'contact_number' => $validated['contact_number'],
            'email' => $validated['email'],
            'photos' => $photos,
            'capacity' => $validated['capacity'],
            'services' => $validated['services'],
        ]);

        return redirect()->route('washing_centers.index')->with('success', 'Washing center updated successfully.');
    }


    public function destroy(WashingCenter $washingCenter)
    {
        $washingCenter->delete();
        return redirect()->route('washing_centers.index')->with('success', 'Washing center deleted successfully.');
    }
}
