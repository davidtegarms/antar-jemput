<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    protected static string $view = 'filament.pages.dashboard';
    
    protected static ?string $navigationIcon = 'heroicon-o-home'; // Ikon Home
    protected static ?string $title = 'Dashboard';
    protected static ?string $slug = 'dashboard';
    protected static array $widgets = [
    ];

    public function getColumns(): int | array
    {
        return [
            'default' => 2,
            'md' => 2,
            'xl' => 3,
        ];
    }
}