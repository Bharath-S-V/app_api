<?php

namespace App\Http\Controllers\Api;

use App\Models\WashingCenter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WashingCenterController extends Controller
{
    // List all washing centers
    public function index()
    {
        $centers = WashingCenter::all();
        return response()->json($centers, 200);
    }

    // Show a specific washing center by ID
    public function show($id)
    {
        $center = WashingCenter::find($id);

        if (!$center) {
            return response()->json(['message' => 'Washing center not found'], 404);
        }

        return response()->json($center, 200);
    }

    // Store a new washing center
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'business_address' => 'required|string',
            'contact_number' => 'required|string',
            'email' => 'nullable|email',
            'photos' => 'nullable|array',
            'photos.*' => 'image|mimes:jpeg,png,jpg|max:2048',
            'capacity' => 'required|integer',
            'services' => 'required|array',
            'services.*.type' => 'required|string',
            'services.*.price' => 'required|numeric',
        ]);

        // Handle photo uploads
        $photos = [];
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $photos[] = $photo->store('washing_centers', 'public');
            }
        }

        // Create washing center
        $center = WashingCenter::create([
            'name' => $validated['name'],
            'business_address' => $validated['business_address'],
            'contact_number' => $validated['contact_number'],
            'email' => $validated['email'],
            'photos' => $photos,
            'capacity' => $validated['capacity'],
        ]);

        // Attach services to the washing center
        $center->services()->createMany($validated['services']);

        return response()->json($center, 201);
    }

    // Update an existing washing center
    public function update(Request $request, $id)
    {
        $center = WashingCenter::find($id);

        if (!$center) {
            return response()->json(['message' => 'Washing center not found'], 404);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'business_address' => 'required|string',
            'contact_number' => 'required|string',
            'email' => 'nullable|email',
            'photos' => 'nullable|array',
            'photos.*' => 'image|mimes:jpeg,png,jpg|max:2048',
            'capacity' => 'required|integer',
            'services' => 'required|array',
            'services.*.type' => 'required|string',
            'services.*.price' => 'required|numeric',
        ]);

        // Handle photo uploads
        $photos = $center->photos ?? [];
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $photos[] = $photo->store('washing_centers', 'public');
            }
        }

        // Update washing center
        $center->update([
            'name' => $validated['name'],
            'business_address' => $validated['business_address'],
            'contact_number' => $validated['contact_number'],
            'email' => $validated['email'],
            'photos' => $photos,
            'capacity' => $validated['capacity'],
        ]);

        // Update services
        $center->services()->delete();
        $center->services()->createMany($validated['services']);

        return response()->json($center, 200);
    }

    // Delete a washing center
    public function destroy($id)
    {
        $center = WashingCenter::find($id);

        if (!$center) {
            return response()->json(['message' => 'Washing center not found'], 404);
        }

        // Delete the washing center and related services
        $center->services()->delete();
        $center->delete();

        return response()->json(['message' => 'Washing center deleted successfully'], 200);
    }
}
