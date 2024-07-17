<?php

use App\Http\Controllers\DriverController;
use App\Http\Controllers\FuelConsumptionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VechicleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('drivers', DriverController::class);
Route::resource('vehicles', VechicleController::class);
Route::resource('fuel-consumptions', FuelConsumptionController::class);

Route::get('/bookings', function () {
    return view('pages.bookings.index');
})->name('booking.index');

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
