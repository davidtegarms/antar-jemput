<?php

namespace App\Http\Responses;

use Filament\Http\Responses\Auth\Contracts\LoginResponse as LoginResponseContract;
use Illuminate\Support\Facades\Route;

class LoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {
        $user = $request->user();

        if ($user->role === 'student') {
            return redirect()->route('student.dashboard');
        }

        if ($user->role === 'driver') {
            return redirect()->route('driver.dashboard');
        }

        // default admin -> dashboard Filament
        return redirect()->intended(Route::has('filament.admin.pages.dashboard')
            ? route('filament.admin.pages.dashboard')
            : '/');
    }
}
