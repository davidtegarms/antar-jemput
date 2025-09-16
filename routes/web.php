<?php

use App\Filament\Pages\Dashboard;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Livewire\Student\HomepageStudent;

Route::redirect('/', '/login');

// Login routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Student routes
Route::middleware(['auth', 'role:student'])->group(function () {
    Route::get('/student/homepage-student', HomepageStudent::class)->name('student.homepage');
});

// Admin routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', Dashboard::class)->name('admin.dashboard');
});
