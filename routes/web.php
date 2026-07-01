<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Role Dashboards
Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('dashboards.admin');
    })->name('admin.dashboard');
});

Route::middleware(['auth', 'role:Management'])->group(function () {
    Route::get('/management/dashboard', function () {
        return view('dashboards.management');
    })->name('management.dashboard');
});

Route::middleware(['auth', 'role:Koordinator'])->group(function () {
    Route::get('/koordinator/dashboard', function () {
        return view('dashboards.koordinator');
    })->name('koordinator.dashboard');
});

Route::middleware(['auth', 'role:Satpam'])->group(function () {
    Route::get('/satpam/dashboard', function () {
        return view('dashboards.satpam');
    })->name('satpam.dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
