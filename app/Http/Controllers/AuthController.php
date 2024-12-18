<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    // Signup method
    public function signup(Request $request)
    {
        $request->validate([
            'phone' => 'required|unique:user_profiles,phone|digits:10',
        ]);

        $userProfile = UserProfile::create([
            'phone' => $request->phone,
        ]);

        // Log the user in
        auth()->login($userProfile);

        // Redirect to the vehicle selection page
        return redirect()->route('vehicle.select', ['user' => $userProfile->id]);
    }


    public function login(Request $request)
    {
        $request->validate([
            'phone' => 'required|digits:10|exists:user_profiles,phone',
        ]);

        $userProfile = UserProfile::where('phone', $request->phone)->first();

        // Log the user in
        auth()->login($userProfile);

        // Redirect to the dashboard
        return redirect()->route('dashboard')->with('message', 'User logged in successfully');
    }

    // Show vehicle selection form
    public function showVehicleSelectionForm($userId)
    {
        // Retrieve the user profile
        $user = UserProfile::findOrFail($userId);
        return view('vehicle_select', compact('user'));
    }

    // Save the vehicle type
    public function storeVehicleSelection(Request $request, $userId)
    {
        // Validate the vehicle type
        $request->validate([
            'vehicle_type' => 'required|in:2-wheeler,4-wheeler',
        ]);

        // Find the user and update the vehicle type
        $user = UserProfile::findOrFail($userId);
        $user->vehicle_type = $request->vehicle_type;
        $user->save();

        // Redirect to a success page or dashboard
        return redirect()->route('address.select', ['user' => $user->id]);
    }
    // Show address selection form
    public function showAddressSelectionForm($userId)
    {
        // Retrieve the user profile
        $user = UserProfile::findOrFail($userId);
        return view('address_select', compact('user'));
    }

    // Store address
    public function storeAddressSelection(Request $request, $userId)
    {
        // Validate the address
        $request->validate([
            'address' => 'required|string',
        ]);

        // Find the user and update the address
        $user = UserProfile::findOrFail($userId);
        $user->address = $request->address;
        $user->save();

        // Redirect to a success page or dashboard after the address is saved
        return redirect()->route('dashboard')->with('message', 'Address saved successfully!');
    }
    public function logout()
    {
        auth()->logout();
        return redirect()->route('login')->with('message', 'Logged out successfully');
    }
}
