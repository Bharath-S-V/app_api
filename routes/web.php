<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\CarWasherController;
use App\Http\Controllers\WashingCenterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ServiceDetailController;
use App\Http\Controllers\NameController;
use App\Http\Controllers\AddonController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ServiceListingController;

// Default homepage route
Route::get('/', function () {
    return view('welcome');
});



Route::post('/signup', [AuthController::class, 'signup']);
Route::post('/login', [AuthController::class, 'login']);
Route::view('/signup', 'signup')->name('signup.view');
Route::view('/login', 'login')->name('user.login');  // Use 'login' instead of 'login.view'


Route::get('/vehicle/select/{user}', [AuthController::class, 'showVehicleSelectionForm'])->name('vehicle.select');
Route::post('/vehicle/select/{user}', [AuthController::class, 'storeVehicleSelection']);

// Show address selection form
Route::get('/address/select/{user}', [AuthController::class, 'showAddressSelectionForm'])->name('address.select');

// Store the address after selection
Route::post('/address/select/{user}', [AuthController::class, 'storeAddressSelection']);

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware('auth')->name(name: 'dashboard');


Route::post('/logout', [AuthController::class, 'logout'])->name('logout');




Route::get('/admin/login', [AdminLoginController::class, 'showLoginForm'])->name('login');
Route::post('/admin/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

// Define routes that are under admin authentication
Route::middleware('auth:admin')->group(function () {
    // Profile routes
    Route::get('/admin/profiles', [UserProfileController::class, 'index'])->name('profiles.index');
    Route::get('/admin/profiles/create', [UserProfileController::class, 'create'])->name('profiles.create');
    Route::post('/admin/profiles', [UserProfileController::class, 'store'])->name('profiles.store');
    Route::get('/admin/profiles/{profile}', [UserProfileController::class, 'show'])->name('profiles.show');
    Route::get('/admin/profiles/{profile}/edit', [UserProfileController::class, 'edit'])->name('profiles.edit');
    Route::put('/admin/profiles/{profile}', [UserProfileController::class, 'update'])->name('profiles.update');
    Route::delete('/admin/profiles/{profile}', [UserProfileController::class, 'destroy'])->name('profiles.destroy');
    Route::resource('car_washers', CarWasherController::class);
    Route::resource('washing_centers', WashingCenterController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('banners', BannerController::class);
    Route::resource('names', NameController::class);
    Route::resource('addons', AddonController::class);
    Route::resource('faqs', FaqController::class);
    Route::resource('service_details', ServiceDetailController::class);
    Route::resource('reviews', ReviewController::class);
    Route::resource('service_listings', ServiceListingController::class);
    Route::put('/car_washers/{washer}/status', [CarWasherController::class, 'updateStatus'])->name('car_washers.update_status');
    // Admin Dashboard route
    Route::get('/admin/dashboard', function () {
        return view('dashboard.index');
    })->name('admin.dashboard');
});
