<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\FuelConsumptionController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'web'])
    ->name('dashboard');

Route::middleware(['auth', 'web'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('drivers', DriverController::class)->only(['index', 'store']);
    Route::resource('vehicles', VehicleController::class)->only(['index', 'store']);
    Route::resource('fuel-consumptions', FuelConsumptionController::class)->only(['index', 'store']);
    Route::resource('services', ServiceController::class)->only(['index', 'store']);
    Route::resource('bookings', BookingController::class)->only(['index', 'store']);
    Route::post('/bookings/{booking}/approve', [BookingController::class, 'approve'])->name('bookings.approve');
    Route::post('/bookings/{booking}/reject', [BookingController::class, 'reject'])->name('bookings.reject');
    Route::get('/bookings/export', [BookingController::class, 'export'])->name('bookings.export');
    Route::get('/logs', [LogController::class, 'index'])->name('logs.index');
});

require __DIR__ . '/auth.php';
