<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\CarWasherController;
use App\Http\Controllers\WashingCenterController;
use App\Http\Controllers\AuthController;

// Default homepage route
Route::get('/', function () {
    return view('welcome');
});

// Web routes for User Profiles (with views)
Route::get('/profiles', [UserProfileController::class, 'index'])->name('profiles.index');
Route::get('/profiles/create', [UserProfileController::class, 'create'])->name('profiles.create');
Route::post('/profiles', [UserProfileController::class, 'store'])->name('profiles.store');
Route::get('/profiles/{profile}', [UserProfileController::class, 'show'])->name('profiles.show');
Route::get('/profiles/{profile}/edit', [UserProfileController::class, 'edit'])->name('profiles.edit');
Route::put('/profiles/{profile}', [UserProfileController::class, 'update'])->name('profiles.update');
Route::delete('/profiles/{profile}', [UserProfileController::class, 'destroy'])->name('profiles.destroy');


Route::resource('washing_centers', WashingCenterController::class);
Route::resource('car_washers', CarWasherController::class);

Route::post('/signup', [AuthController::class, 'signup']);
Route::post('/login', [AuthController::class, 'login']);
Route::view('/signup', 'signup')->name('signup.view');
Route::view('/login', 'login')->name('login.view');

Route::get('/vehicle/select/{user}', [AuthController::class, 'showVehicleSelectionForm'])->name('vehicle.select');
Route::post('/vehicle/select/{user}', [AuthController::class, 'storeVehicleSelection']);

// Show address selection form
Route::get('/address/select/{user}', [AuthController::class, 'showAddressSelectionForm'])->name('address.select');

// Store the address after selection
Route::post('/address/select/{user}', [AuthController::class, 'storeAddressSelection']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
