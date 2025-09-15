<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\Driver;
use App\Models\Vehicle;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\CreateAction;

class DriverAndVehicle extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static string $view = 'filament.pages.driver-and-vehicle';
    protected static ?string $navigationLabel = 'Data Sopir + Kendaraan';
    protected static ?string $navigationGroup = 'Konfigurasi Driver & Kendaraan';
    protected static ?int $navigationSort = 50; // Urutan menu di sidebar

    protected static ?string $title = 'Data Sopir & Kendaraan';
}

