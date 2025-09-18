<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Student\Dashboard as StudentDashboard;
use App\Http\Livewire\Student\History as StudentHistory;
use App\Http\Livewire\Student\Profile as StudentProfile;
use App\Http\Livewire\Driver\Dashboard as DriverDashboard;
use App\Http\Livewire\Driver\History as DriverHistory;
use App\Http\Livewire\Driver\Profile as DriverProfile;
use Livewire\Livewire;
use App\Http\Controllers\Auth\LogoutController;

// redirect root ke halaman login Filament
Route::redirect('/', '/admin/login');

Route::middleware(['auth'])->group(function () {
    /**
     * Register Livewire Components
     */
    Livewire::component('student.dashboard', StudentDashboard::class);
    Livewire::component('student.history', StudentHistory::class);
    Livewire::component('student.profile', StudentProfile::class);

    Livewire::component('driver.dashboard', DriverDashboard::class);
    Livewire::component('driver.history', DriverHistory::class);
    Livewire::component('driver.profile', DriverProfile::class);

    /**
     * Student Routes
     */
    Route::prefix('student')
        ->middleware('role:student')
        ->name('student.')
        ->group(function () {
            Route::get('/dashboard', fn () => view('livewire.student.dashboard'))->name('dashboard');
            Route::get('/history', fn () => view('livewire.student.history'))->name('history');
            Route::get('/profile', fn () => view('livewire.student.profile'))->name('profile');
        });

    /**
     * Driver Routes
     */
    Route::prefix('driver')
        ->middleware('role:driver')
        ->name('driver.')
        ->group(function () {
            Route::get('/dashboard', fn () => view('livewire.driver.dashboard'))->name('dashboard');
            Route::get('/history', fn () => view('livewire.driver.history'))->name('history');
            Route::get('/profile', fn () => view('livewire.driver.profile'))->name('profile');
        });
});

/**
 * Logout
 */
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
