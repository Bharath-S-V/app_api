<?php

namespace App\Http\Controllers;

use App\Models\UserProfile;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    // ================= WEB METHODS ================= //

    // Show all user profiles (Web)
    public function index()
    {
        $profiles = UserProfile::all();
        return view('profiles.index', compact('profiles'));
    }

    // Show form for creating a new profile (Web)
    public function create()
    {
        return view('profiles.create');
    }

    // Store a new profile (Web)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:user_profiles',
            'phone' => 'required|numeric|digits_between:10,15|unique:user_profiles',
            'address' => 'required|string',
            'vehicle_type' => 'required|in:2-wheeler,4-wheeler',
        ]);

        UserProfile::create($validated);

        return redirect()->route('profiles.index')->with('success', 'Profile created successfully.');
    }

    // Show a single profile (Web)
    public function show(UserProfile $profile)
    {
        return view('profiles.show', compact('profile'));
    }

    // Show form for editing a profile (Web)
    public function edit(UserProfile $profile)
    {
        return view('profiles.edit', compact('profile'));
    }

    // Update an existing profile (Web)
    public function update(Request $request, UserProfile $profile)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:user_profiles,email,' . $profile->id,
            'phone' => 'required|numeric|digits_between:10,15|unique:user_profiles,phone,' . $profile->id,
            'address' => 'required|string',
            'vehicle_type' => 'required|in:2-wheeler,4-wheeler',
        ]);

        $profile->update($validated);

        return redirect()->route('profiles.index')->with('success', 'Profile updated successfully.');
    }

    // Delete a profile (Web)
    public function destroy(UserProfile $profile)
    {
        $profile->delete();
        return redirect()->route('profiles.index')->with('success', 'Profile deleted successfully.');
    }

    // ================= API METHODS ================= //

    // List all profiles (API)
    public function apiIndex()
    {
        $profiles = UserProfile::all();
        return response()->json($profiles);
    }

    // Show a specific profile (API)
    public function apiShow(UserProfile $profile)
    {
        return response()->json($profile);
    }

    // Store a new profile (API)
    public function apiStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:user_profiles',
            'phone' => 'required|numeric|digits_between:10,15|unique:user_profiles',
            'address' => 'required|string',
            'vehicle_type' => 'required|in:2-wheeler,4-wheeler',
        ]);

        $profile = UserProfile::create($validated);

        return response()->json($profile, 201); // 201 Created
    }

    // Update an existing profile (API)
    public function apiUpdate(Request $request, UserProfile $profile)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:user_profiles,email,' . $profile->id,
            'phone' => 'required|numeric|digits_between:10,15|unique:user_profiles,phone,' . $profile->id,
            'address' => 'required|string',
            'vehicle_type' => 'required|in:2-wheeler,4-wheeler',
        ]);

        $profile->update($validated);

        return response()->json($profile);
    }

    // Delete a profile (API)
    public function apiDestroy(UserProfile $profile)
    {
        $profile->delete();
        return response()->json(['message' => 'Profile deleted successfully'], 204); // 204 No Content
    }
}
