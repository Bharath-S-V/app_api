<?php

namespace App\Http\Controllers;

use App\Models\CarWasher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarWasherController extends Controller
{
    public function index()
    {
        $carWashers = CarWasher::all();
        return view('car_washers.index', compact('carWashers'));
    }

    public function create()
    {
        return view('car_washers.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|unique:car_washers,email',
            'business_address' => 'nullable|string',
            'photos' => 'nullable|array',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'service_radius' => 'nullable|numeric',
            'services_offered' => 'nullable|array',
            'availability_schedule' => 'nullable|array', // Expecting an array here
            'verification_documents' => 'nullable|array',
            'verification_documents.*' => 'mimes:pdf,jpeg,png,jpg|max:2048',
        ]);

        // Handle file uploads
        if ($request->hasFile('photos')) {
            $data['photos'] = array_map(fn($photo) => $photo->store('uploads/photos', 'public'), $request->file('photos'));
        }

        if ($request->hasFile('verification_documents')) {
            $data['verification_documents'] = array_map(fn($document) => $document->store('uploads/documents', 'public'), $request->file('verification_documents'));
        }

        CarWasher::create($data);

        return redirect()->route('car_washers.index')->with('success', 'Car Washer Registered Successfully');
    }


    public function show(CarWasher $carWasher)
    {
        return view('car_washers.show', compact('carWasher'));
    }

    public function edit(CarWasher $carWasher)
    {
        return view('car_washers.edit', compact('carWasher'));
    }

    public function update(Request $request, CarWasher $carWasher)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|unique:car_washers,email,' . $carWasher->id,
            'business_address' => 'nullable|string',
            'service_radius' => 'nullable|numeric',
            'services_offered' => 'nullable|array',
            'availability_schedule' => 'nullable|array',
            'photos' => 'nullable|array',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'verification_documents' => 'nullable|array',
            'verification_documents.*' => 'mimes:pdf,jpeg,png,jpg|max:2048',
            'remove_photos' => 'nullable|array',
            'remove_documents' => 'nullable|array',
        ]);

        // Remove selected photos
        if ($request->filled('remove_photos')) {
            foreach ($request->remove_photos as $photo) {
                Storage::disk('public')->delete($photo);
            }
            $data['photos'] = array_diff($carWasher->photos ?? [], $request->remove_photos);
        } else {
            $data['photos'] = $carWasher->photos ?? [];
        }

        // Remove selected documents
        if ($request->filled('remove_documents')) {
            foreach ($request->remove_documents as $document) {
                Storage::disk('public')->delete($document);
            }
            $data['verification_documents'] = array_diff($carWasher->verification_documents ?? [], $request->remove_documents);
        } else {
            $data['verification_documents'] = $carWasher->verification_documents ?? [];
        }

        // Add new photos
        if ($request->hasFile('photos')) {
            $newPhotos = array_map(fn($photo) => $photo->store('uploads/photos', 'public'), $request->file('photos'));
            $data['photos'] = array_merge($data['photos'], $newPhotos);
        }

        // Add new verification documents
        if ($request->hasFile('verification_documents')) {
            $newDocuments = array_map(fn($document) => $document->store('uploads/documents', 'public'), $request->file('verification_documents'));
            $data['verification_documents'] = array_merge($data['verification_documents'], $newDocuments);
        }

        $carWasher->update($data);

        return redirect()->route('car_washers.index')->with('success', 'Car Washer Updated Successfully');
    }



    public function destroy(CarWasher $carWasher)
    {
        $carWasher->delete();

        return redirect()->route('car_washers.index')->with('success', 'Car Washer Deleted Successfully');
    }

    public function updateStatus(Request $request, CarWasher $washer)
    {
        // Validate the status input
        $request->validate([
            'status' => 'required|in:pending,approved,rejected', // Validate status values
        ]);

        // Update the status
        $washer->status = $request->input('status');
        $washer->save();

        // Redirect back with a success message
        return redirect()->route('car_washers.index')->with('success', 'Status updated successfully');
    }
}
