<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\DriverAssignment;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use App\Filament\Resources\DriverAssignmentResource\Pages;

class DriverAssignmentResource extends Resource
{
    protected static ?string $model = DriverAssignment::class;

    protected static ?string $navigationIcon = 'heroicon-o-link';
    protected static ?string $navigationLabel = 'Konfigurasi';
    protected static ?string $navigationGroup = 'Konfigurasi Driver & Kendaraan';
    protected static ?string $pluralModelLabel = 'Konfigurasi Sopir & Kendaraan';
    protected static ?string $modelLabel = 'Konfigurasi Sopir & Kendaraan';

    protected static ?int $navigationSort = 60;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('driver_id')
                    ->label('Driver')
                    ->relationship('driver', 'name_driver')
                    ->required(),

                Select::make('vehicle_id')
                    ->label('Kendaraan (Plat Nomor)')
                    ->relationship('vehicle', 'license_plate')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->sortable(),
                TextColumn::make('driver.name_driver')
                    ->label('Sopir')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('vehicle.license_plate')
                    ->label('Plat Nomor')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('vehicle.name_vehicle')
                    ->label('Nama Kendaraan')
                    ->sortable(),

                TextColumn::make('vehicle.year_vehicle')
                    ->label('Tahun')
                    ->sortable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->headerActions([
                //
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDriverAssignments::route('/'),
            // 'edit' => Pages\EditDriverAssignment::route('/{record}/edit'),
        ];
    }
}
