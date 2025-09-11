<?php

namespace App\Filament\Pages\Auth;

use Filament\Pages\Auth\Login as BaseLogin;

class CustomLogin extends BaseLogin
{
    // menunjuk ke file custom-login.blade.php 
    protected static string $view = 'filament.pages.auth.custom-login'; 
}