<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\Api\CarWasherController;
use App\Http\Controllers\Api\WashingCenterController;
use App\Http\Controllers\Api\AuthController;


// API routes for User Profiles (with JSON responses)
Route::get('/profiles', [UserProfileController::class, 'apiIndex'])->name('api.profiles.index');
Route::get('/profiles/{profile}', [UserProfileController::class, 'apiShow'])->name('api.profiles.show');
Route::post('/profiles', [UserProfileController::class, 'apiStore'])->name('api.profiles.store');
Route::put('/profiles/{profile}', [UserProfileController::class, 'apiUpdate'])->name('api.profiles.update');
Route::delete('/profiles/{profile}', [UserProfileController::class, 'apiDestroy'])->name('api.profiles.destroy');

Route::prefix('car-washers')->group(function () {
    Route::get('/', [CarWasherController::class, 'index']); // List all car washers
    Route::post('/', [CarWasherController::class, 'store']); // Create a new car washer
    Route::get('/{id}', [CarWasherController::class, 'show']); // Get details of a specific car washer
    Route::put('/{id}', [CarWasherController::class, 'update']); // Update an existing car washer
    Route::delete('/{id}', [CarWasherController::class, 'destroy']); // Delete a car washer
});

// Get a list of all washing centers
Route::get('/washing_centers', [WashingCenterController::class, 'index']);

// Get a single washing center by ID
Route::get('/washing_centers/{id}', [WashingCenterController::class, 'show']);

// Create a new washing center
Route::post('/washing_centers', [WashingCenterController::class, 'store']);

// Update an existing washing center
Route::put('/washing_centers/{id}', [WashingCenterController::class, 'update']);

// Delete a washing center
Route::delete('/washing_centers/{id}', [WashingCenterController::class, 'destroy']);

// Signup Route
Route::post('/signup', [AuthController::class, 'signup']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::middleware('auth:api')->group(function () {
    // Routes that require the user to be authenticated
    Route::post('/vehicle/select/{user}', [AuthController::class, 'storeVehicleSelection']);
    Route::post('/address/select/{user}', [AuthController::class, 'storeAddressSelection']);
});
