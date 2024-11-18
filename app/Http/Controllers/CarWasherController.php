<?php

namespace App\Http\Controllers;

use App\Models\CarWasher;
use Illuminate\Http\Request;

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
        ]);

        $carWasher->update($data);

        return redirect()->route('car_washers.index')->with('success', 'Car Washer Updated Successfully');
    }


    public function destroy(CarWasher $carWasher)
    {
        $carWasher->delete();

        return redirect()->route('car_washers.index')->with('success', 'Car Washer Deleted Successfully');
    }
}
