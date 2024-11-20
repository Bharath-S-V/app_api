<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // Signup method for API
    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required|unique:user_profiles,phone|digits:10',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $userProfile = UserProfile::create([
            'phone' => $request->phone,
        ]);

        // Log the user in and issue an API token
        $token = $userProfile->createToken('YourAppName')->plainTextToken;

        return response()->json(['message' => 'User registered successfully', 'token' => $token], 201);
    }

    public function login(Request $request)
    {
        $request->validate([
            'phone' => 'required|digits:10|exists:user_profiles,phone',
        ]);

        $userProfile = UserProfile::where('phone', $request->phone)->first();

        // Log the user in
        Auth::login($userProfile);

        // Create a token for the user
        $token = $userProfile->createToken('YourAppName')->plainTextToken;

        return response()->json([
            'message' => 'User logged in successfully',
            'user' => $userProfile,
            'token' => $token,
        ], 200);
    }

    // Logout method for API
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logged out successfully'], 200);
    }

    // Store vehicle type selection
    public function storeVehicleSelection(Request $request, $userId)
    {
        $validator = Validator::make($request->all(), [
            'vehicle_type' => 'required|in:2-wheeler,4-wheeler',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $user = UserProfile::findOrFail($userId);
        $user->vehicle_type = $request->vehicle_type;
        $user->save();

        return response()->json(['message' => 'Vehicle type updated successfully', 'user' => $user], 200);
    }

    // Store address selection
    public function storeAddressSelection(Request $request, $userId)
    {
        $validator = Validator::make($request->all(), [
            'address' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $user = UserProfile::findOrFail($userId);
        $user->address = $request->address;
        $user->save();

        return response()->json(['message' => 'Address saved successfully', 'user' => $user], 200);
    }
}
