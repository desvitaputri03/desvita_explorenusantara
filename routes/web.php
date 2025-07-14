<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DesvitaAdminController;
use App\Http\Controllers\DesvitaFrontendController;
use App\Http\Controllers\DesvitaDestinationController;
use App\Http\Controllers\DesvitaBookingController;
use App\Http\Controllers\DesvitaTouristController;
use App\Http\Controllers\DesvitaReviewController;
use App\Http\Controllers\DesvitaGalleryController;

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Password Reset Routes
Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/reset-password/{token}', [AuthController::class, 'showResetPasswordForm'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');

// Frontend Routes
Route::get('/', [DesvitaFrontendController::class, 'home'])->name('home');
Route::get('/about', [DesvitaFrontendController::class, 'about'])->name('about');
Route::get('/contact', [DesvitaFrontendController::class, 'contact'])->name('contact');
Route::get('/destinations', [DesvitaFrontendController::class, 'destinations'])->name('destinations.index');
Route::get('/destinations/{destination}', [DesvitaFrontendController::class, 'showDestination'])->name('destinations.show');

// Frontend Booking Routes
Route::get('/booking/create/{destination}', [DesvitaBookingController::class, 'createFrontend'])->name('booking.create');
Route::post('/booking/store', [DesvitaBookingController::class, 'storeFrontend'])->name('booking.store');
Route::get('/booking/{booking}/show', [DesvitaBookingController::class, 'showFrontend'])->name('booking.show.frontend');

// Admin Routes
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DesvitaAdminController::class, 'dashboard'])->name('admin.dashboard');
    
    // Profile Management
    Route::get('/profile/edit', [DesvitaAdminController::class, 'editProfile'])->name('admin.profile.edit');
    Route::put('/profile/update', [DesvitaAdminController::class, 'updateProfile'])->name('admin.profile.update');
    Route::get('/profile/password', [DesvitaAdminController::class, 'editPassword'])->name('admin.profile.password');
    Route::put('/profile/password', [DesvitaAdminController::class, 'updatePassword'])->name('admin.profile.update-password');
    
    // Destinations Management
    Route::get('/destinations', [DesvitaDestinationController::class, 'index'])->name('admin.destinations.index');
    Route::get('/destinations/create', [DesvitaDestinationController::class, 'create'])->name('admin.destinations.create');
    Route::post('/destinations', [DesvitaDestinationController::class, 'store'])->name('admin.destinations.store');
    Route::get('/destinations/{destination}/edit', [DesvitaDestinationController::class, 'edit'])->name('admin.destinations.edit');
    Route::put('/destinations/{destination}', [DesvitaDestinationController::class, 'update'])->name('admin.destinations.update');
    Route::delete('/destinations/{destination}', [DesvitaDestinationController::class, 'destroy'])->name('admin.destinations.destroy');
    
    // Bookings Management
    Route::get('/bookings', [DesvitaBookingController::class, 'index'])->name('admin.bookings.index');
    Route::get('/bookings/create', [DesvitaBookingController::class, 'create'])->name('admin.bookings.create');
    Route::post('/bookings', [DesvitaBookingController::class, 'store'])->name('admin.bookings.store');
    Route::get('/bookings/{booking}', [DesvitaBookingController::class, 'show'])->name('admin.bookings.show');
    Route::get('/bookings/{booking}/edit', [DesvitaBookingController::class, 'edit'])->name('admin.bookings.edit');
    Route::put('/bookings/{booking}', [DesvitaBookingController::class, 'update'])->name('admin.bookings.update');
    Route::delete('/bookings/{booking}', [DesvitaBookingController::class, 'destroy'])->name('admin.bookings.destroy');
    
    // Tourists Management
    Route::get('/tourists', [DesvitaTouristController::class, 'index'])->name('admin.tourists.index');
    Route::get('/tourists/create', [DesvitaTouristController::class, 'create'])->name('admin.tourists.create');
    Route::post('/tourists', [DesvitaTouristController::class, 'store'])->name('admin.tourists.store');
    Route::get('/tourists/{tourist}', [DesvitaTouristController::class, 'show'])->name('admin.tourists.show');
    Route::get('/tourists/{tourist}/edit', [DesvitaTouristController::class, 'edit'])->name('admin.tourists.edit');
    Route::put('/tourists/{tourist}', [DesvitaTouristController::class, 'update'])->name('admin.tourists.update');
    Route::delete('/tourists/{tourist}', [DesvitaTouristController::class, 'destroy'])->name('admin.tourists.destroy');
    
    // Reviews Management
    Route::get('/reviews', [DesvitaReviewController::class, 'index'])->name('admin.reviews.index');
    Route::get('/reviews/create', [DesvitaReviewController::class, 'create'])->name('admin.reviews.create');
    Route::post('/reviews', [DesvitaReviewController::class, 'store'])->name('admin.reviews.store');
    Route::get('/reviews/{review}', [DesvitaReviewController::class, 'show'])->name('admin.reviews.show');
    Route::get('/reviews/{review}/edit', [DesvitaReviewController::class, 'edit'])->name('admin.reviews.edit');
    Route::put('/reviews/{review}', [DesvitaReviewController::class, 'update'])->name('admin.reviews.update');
    Route::delete('/reviews/{review}', [DesvitaReviewController::class, 'destroy'])->name('admin.reviews.destroy');
    
    // Gallery Management
    Route::get('/gallery', [DesvitaGalleryController::class, 'index'])->name('admin.gallery.index');
    Route::post('/gallery/upload', [DesvitaGalleryController::class, 'uploadGallery'])->name('admin.gallery.upload');
    Route::delete('/gallery/{gallery}', [DesvitaGalleryController::class, 'deleteGallery'])->name('admin.gallery.delete');
    Route::post('/gallery/reorder', [DesvitaGalleryController::class, 'reorderGallery'])->name('admin.gallery.reorder');
});
