<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\CarWasherController;
use App\Http\Controllers\WashingCenterController;

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