<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Student\Dashboard as StudentDashboard;
use App\Http\Livewire\Driver\Dashboard as DriverDashboard;
use Livewire\Livewire;
// redirect root ke halaman login Filament
Route::redirect('/', '/admin/login');

Route::middleware(['auth'])->group(function () {
    Livewire::component('student.dashboard', \App\Http\Livewire\Student\Dashboard::class);
    Livewire::component('driver.dashboard', \App\Http\Livewire\Driver\Dashboard::class);

    Route::get('/student/dashboard', fn () => view('livewire.student.dashboard'))
        ->middleware('role:student')
        ->name('student.dashboard');

    Route::get('/driver/dashboard', fn () => view('livewire.driver.dashboard'))
        ->middleware('role:driver')
        ->name('driver.dashboard');
});


