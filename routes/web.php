<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/bookings', function () {
    return view('pages.bookings.index');
})->name('booking.index');

Route::get('/vehicles', function () {
    return view('pages.vehicles.index');
})->name('vehicles.index');

Route::get('/drivers', function () {
    return view('pages.drivers.index');
})->name('drivers.index');

Route::get('/fuel-consumptions', function () {
    return view('pages.fuel-consumptions.index');
})->name('fuel-consumptions.index');

Route::get('/services', function () {
    return view('pages.services.index');
})->name('services.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
