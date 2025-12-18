<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    
    Route::resource('doctors', App\Http\Controllers\Admin\DoctorController::class);
    Route::resource('schedules', App\Http\Controllers\Admin\ScheduleController::class);
    
    // Admin Payments
    Route::get('/payments', [App\Http\Controllers\Admin\PaymentController::class, 'index'])->name('payments.index');
    Route::put('/payments/{payment}', [App\Http\Controllers\Admin\PaymentController::class, 'update'])->name('payments.update');
});

Route::middleware(['auth', 'verified', 'role:doctor'])->prefix('doctor')->name('doctor.')->group(function () {
    Route::get('/dashboard', function () {
        return view('doctor.dashboard');
    })->name('dashboard');

    Route::get('/schedules', [App\Http\Controllers\Doctor\ScheduleController::class, 'index'])->name('schedules.index');
});

Route::middleware(['auth', 'verified', 'role:patient'])->prefix('patient')->name('patient.')->group(function () {
    Route::get('/dashboard', function () {
        return view('patient.dashboard');
    })->name('dashboard');

    Route::get('/appointments/create', [App\Http\Controllers\Patient\BookingController::class, 'create'])->name('appointments.create');
    Route::get('/appointments/{doctor}/schedule', [App\Http\Controllers\Patient\BookingController::class, 'showSchedule'])->name('appointments.schedule');
    Route::post('/appointments', [App\Http\Controllers\Patient\BookingController::class, 'store'])->name('appointments.store');
    Route::get('/appointments/{id}/confirmed', [App\Http\Controllers\Patient\BookingController::class, 'confirmed'])->name('appointments.confirmed');
    
    Route::get('/payments', [App\Http\Controllers\Patient\PaymentController::class, 'index'])->name('payments.index');
    Route::get('/payments/{payment}/register', [App\Http\Controllers\Patient\PaymentController::class, 'showRegister'])->name('payments.showRegister');
    Route::post('/payments/{payment}/register', [App\Http\Controllers\Patient\PaymentController::class, 'register'])->name('payments.register');
});

Route::get('/dashboard', function () {
    return redirect()->route(auth()->user()->role . '.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/auth/google', [App\Http\Controllers\Auth\SocialiteController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [App\Http\Controllers\Auth\SocialiteController::class, 'handleGoogleCallback']);
