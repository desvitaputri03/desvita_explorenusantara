<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DesvitaFrontendController;
use App\Http\Controllers\DesvitaAdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DesvitaDestinationController;
use App\Http\Controllers\DesvitaTouristController;
use App\Http\Controllers\DesvitaBookingController;
use App\Http\Controllers\DesvitaReviewController;
use App\Http\Controllers\DesvitaGalleryController;

// Halaman utama (root)
Route::get('/', [DesvitaFrontendController::class, 'index'])->name('home');

// Frontend routes
Route::prefix('frontend')->name('frontend.')->group(function () {
    Route::get('/', [DesvitaFrontendController::class, 'index'])->name('home');
    Route::get('/destinations', [DesvitaFrontendController::class, 'destinations'])->name('destinations');
    Route::get('/destinations/{destination}', [DesvitaFrontendController::class, 'show'])->name('destinations.show');
    Route::get('/booking/{destination}', [DesvitaBookingController::class, 'createFrontend'])->name('booking.create');
    Route::post('/booking/{destination}', [DesvitaBookingController::class, 'storeFrontend'])->name('booking.store');
    Route::get('/booking-detail/{booking}', [DesvitaBookingController::class, 'showFrontend'])->name('booking.show');
    Route::get('/check-booking', [DesvitaBookingController::class, 'checkBookingForm'])->name('booking.check');
    Route::post('/check-booking', [DesvitaBookingController::class, 'checkBooking'])->name('booking.check.post');
    Route::get('/bookings', [DesvitaBookingController::class, 'indexFrontend'])->name('bookings.index');
    Route::get('/contact', [DesvitaFrontendController::class, 'contact'])->name('contact');
});

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');

// Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/', [DesvitaAdminController::class, 'index'])->name('dashboard');
    
    // Destinations Management
    Route::resource('destinations', DesvitaDestinationController::class);
    
    // Gallery Management
    Route::get('gallery', [DesvitaGalleryController::class, 'index'])->name('gallery.index');
    Route::post('gallery/upload', [DesvitaGalleryController::class, 'uploadGallery'])->name('gallery.upload');
    Route::delete('gallery/{gallery}', [DesvitaGalleryController::class, 'deleteGallery'])->name('gallery.delete');
    Route::post('gallery/reorder', [DesvitaGalleryController::class, 'reorderGallery'])->name('gallery.reorder');
    
    // Tourist Management
    Route::resource('tourists', DesvitaTouristController::class);
    
    // Booking Management
    Route::resource('bookings', DesvitaBookingController::class);
    
    // Review Management
    Route::resource('reviews', DesvitaReviewController::class);

    // Admin Profile
    Route::get('profile', [DesvitaAdminController::class, 'editProfile'])->name('profile.edit');
    Route::post('profile', [DesvitaAdminController::class, 'updateProfile'])->name('profile.update');
    Route::get('profile/password', [DesvitaAdminController::class, 'editPassword'])->name('profile.password');
    Route::post('profile/password', [DesvitaAdminController::class, 'updatePassword'])->name('profile.password.update');
});
