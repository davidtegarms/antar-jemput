<?php

use App\Filament\Pages\Dashboard;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Livewire\Student\HomepageStudent;

Route::redirect('/', '/login');
