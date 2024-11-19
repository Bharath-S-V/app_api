<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // Signup method for API
    public function signup(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'phone' => 'required|unique:user_profiles,phone|digits:10',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors(),
            ], 422);
        }

        // Create the user
        $userProfile = UserProfile::create([
            'phone' => $request->phone,
        ]);

        // Return a success response
        return response()->json([
            'message' => 'User registered successfully.',
            'user' => $userProfile,
        ], 201);
    }

    // Login method for API
    public function login(Request $request)
    {
        // Validate the phone number
        $validator = Validator::make($request->all(), [
            'phone' => 'required|digits:10|exists:user_profiles,phone',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors(),
            ], 422);
        }

        // Get the user profile
        $userProfile = UserProfile::where('phone', $request->phone)->first();

        // In a real-world app, generate a token here (JWT or Passport)
        // For simplicity, let's just return user data in this example
        return response()->json([
            'message' => 'User logged in successfully.',
            'user' => $userProfile,
        ], 200);
    }

    // Store vehicle selection for the user
    public function storeVehicleSelection(Request $request, $userId)
    {
        // Validate the vehicle type
        $validator = Validator::make($request->all(), [
            'vehicle_type' => 'required|in:2-wheeler,4-wheeler',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors(),
            ], 422);
        }

        // Find the user and update vehicle type
        $user = UserProfile::findOrFail($userId);
        $user->vehicle_type = $request->vehicle_type;
        $user->save();

        // Return a success response
        return response()->json([
            'message' => 'Vehicle type updated successfully.',
            'user' => $user,
        ], 200);
    }

    // Store address selection for the user
    public function storeAddressSelection(Request $request, $userId)
    {
        // Validate the address
        $validator = Validator::make($request->all(), [
            'address' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors(),
            ], 422);
        }

        // Find the user and update the address
        $user = UserProfile::findOrFail($userId);
        $user->address = $request->address;
        $user->save();

        // Return a success response
        return response()->json([
            'message' => 'Address saved successfully.',
            'user' => $user,
        ], 200);
    }
}
