<?php

namespace App\Http\Controllers;

use App\Models\ServiceDetail;
use Illuminate\Http\Request;
use App\Models\Name;

class ServiceDetailController extends Controller
{
    // Show all service details
    public function index()
    {
        $services = ServiceDetail::all();
        return view('service_details.index', compact('services'));
    }

    // Show form to create a new service detail
    public function create()
    {
        $features = Name::all();

        return view('service_details.create', compact('features'));
    }

    // Store a new service detail
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'features' => 'required|array',
            'content' => 'required|string', // Validation for the content column
        ]);

        $imagePath = $request->file('image')->store('images', 'public');

        ServiceDetail::create([
            'name' => $request->name,
            'image' => $imagePath,
            'features' => json_encode($request->features), // Store features as JSON
            'content' => $request->content, // Store the content in the new column

        ]);

        return redirect()->route('service_details.index');
    }

    // Show a specific service detail
    public function show(ServiceDetail $serviceDetail)
    {
        return view('service_details.show', compact('serviceDetail'));
    }

    // Show form to edit a service detail
    public function edit(ServiceDetail $serviceDetail)
    {
        $features = Name::all();
        return view('service_details.edit', compact('serviceDetail', 'features'));
    }

    // Update an existing service detail
    public function update(Request $request, ServiceDetail $serviceDetail)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'features' => 'required|array',
            'content' => 'required|string', // Validation for content

        ]);

        $data = [
            'name' => $request->name,
            'features' => json_encode($request->features),
            'content' => $request->content, // Update the content

        ];

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $data['image'] = $imagePath;
        }

        $serviceDetail->update($data);

        return redirect()->route('service_details.index');
    }

    // Delete a service detail
    public function destroy(ServiceDetail $serviceDetail)
    {
        $serviceDetail->delete();
        return redirect()->route('service_details.index');
    }
}
