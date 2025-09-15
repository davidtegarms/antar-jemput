<?php

namespace App\Filament\Resources\DriverAssignmentResource\Pages;

use App\Filament\Resources\DriverAssignmentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDriverAssignments extends ListRecords
{
    protected static string $resource = DriverAssignmentResource::class;

    // Judul halaman
    protected static ?string $title = 'Konfigurasi Sopir & Kendaraan';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah Konfigurasi'),
        ];
    }
}
