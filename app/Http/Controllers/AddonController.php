<?php

// app/Http/Controllers/AddonController.php

namespace App\Http\Controllers;

use App\Models\Addon;
use App\Models\Name; // Assuming 'Name' model for features
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AddonController extends Controller
{
    public function index()
    {
        $addons = Addon::all();  // Get all addons
        return view('addons.index', compact('addons'));
    }

    public function create()
    {
        $features = Name::all(); // Fetch all features from the 'Name' table
        return view('addons.create', compact('features'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'features' => 'nullable|array',  // Features can be null or an array
            'timeline' => 'required|string',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $validated['image'] = $imagePath;
        }

        Addon::create($validated);
        return redirect()->route('addons.index')->with('success', 'Addon created successfully!');
    }

    public function edit(Addon $addon)
    {
        $features = Name::all();  // Fetch all features from the 'Name' table
        return view('addons.edit', compact('addon', 'features'));
    }

    public function update(Request $request, Addon $addon)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'features' => 'nullable|array',  // Features can be null or an array
            'timeline' => 'required|string',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($addon->image) {
                Storage::delete('public/' . $addon->image);
            }
            $imagePath = $request->file('image')->store('images', 'public');
            $validated['image'] = $imagePath;
        }

        // Update the addon with validated data
        $addon->update($validated);

        return redirect()->route('addons.index')->with('success', 'Addon updated successfully!');
    }


    public function destroy(Addon $addon)
    {
        if ($addon->image) {
            Storage::delete('public/' . $addon->image);
        }

        $addon->delete();
        return redirect()->route('addons.index')->with('success', 'Addon deleted successfully!');
    }
}
