<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CarWasher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarWasherController extends Controller
{
    // List all car washers
    public function index()
    {
        $carWashers = CarWasher::all();
        return response()->json($carWashers, 200);
    }

    // Show a specific car washer
    public function show($id)
    {
        $carWasher = CarWasher::find($id);

        if (!$carWasher) {
            return response()->json(['error' => 'Car Washer not found'], 404);
        }

        return response()->json($carWasher, 200);
    }

    // Store a new car washer
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|unique:car_washers,email',
            'business_address' => 'nullable|string',
            'photos' => 'nullable|array',
            'photos.*' => 'image|mimes:jpeg,png,jpg|max:2048',
            'service_radius' => 'nullable|numeric',
            'services_offered' => 'nullable|array',
            'availability_schedule' => 'nullable|array',
            'verification_documents' => 'nullable|array',
            'verification_documents.*' => 'mimes:pdf,jpeg,png,jpg|max:2048',
        ]);

        // Handle file uploads for photos
        if ($request->hasFile('photos')) {
            $validatedData['photos'] = array_map(
                fn($photo) => $photo->store('uploads/photos', 'public'),
                $request->file('photos')
            );
        }

        // Handle file uploads for verification documents
        if ($request->hasFile('verification_documents')) {
            $validatedData['verification_documents'] = array_map(
                fn($document) => $document->store('uploads/documents', 'public'),
                $request->file('verification_documents')
            );
        }

        $carWasher = CarWasher::create($validatedData);

        return response()->json($carWasher, 201);
    }

    // Update an existing car washer
    public function update(Request $request, $id)
    {
        $carWasher = CarWasher::find($id);

        if (!$carWasher) {
            return response()->json(['error' => 'Car Washer not found'], 404);
        }

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|unique:car_washers,email,' . $carWasher->id,
            'business_address' => 'nullable|string',
            'service_radius' => 'nullable|numeric',
            'services_offered' => 'nullable|array',
            'availability_schedule' => 'nullable|array',
        ]);

        $carWasher->update($validatedData);

        return response()->json($carWasher, 200);
    }

    // Delete a car washer
    public function destroy($id)
    {
        $carWasher = CarWasher::find($id);

        if (!$carWasher) {
            return response()->json(['error' => 'Car Washer not found'], 404);
        }

        $carWasher->delete();

        return response()->json(['message' => 'Car Washer deleted successfully'], 200);
    }
}
