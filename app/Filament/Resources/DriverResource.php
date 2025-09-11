<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DriverResource\Pages;
use App\Filament\Resources\DriverResource\RelationManagers;
use App\Models\Driver;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DriverResource extends Resource
{
    protected static ?string $model = Driver::class;

    protected static ?string $navigationIcon = 'heroicon-o-truck';
    protected static ?string $modelLabel = 'Driver';
    protected static ?string $pluralModelLabel = 'Driver';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Pilihan user dengan peran 'driver' dari tabel users
                Select::make('user_id')
                    ->relationship('user', 'name', fn ($query) => $query->where('role', 'driver'))
                    ->required()
                    ->label('Nama Driver'),
                TextInput::make('phone_number')
                    ->tel()
                    ->required()
                    ->label('Nomor Telepon'),
                TextInput::make('license_plate')
                    ->required()
                    ->label('Plat Nomor Kendaraan'),
                TextInput::make('vehicle_type')
                    ->label('Jenis Kendaraan')
                    ->placeholder('Contoh: Mobil, Motor'),
                TextInput::make('vehicle_name')
                    ->label('Nama Kendaraan')
                     ->placeholder('Contoh: Honda CRV Merah'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('user.name')
                    ->label('Nama Driver')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('phone_number')
                    ->label('Nomor Telepon'),
                TextColumn::make('license_plate')
                    ->label('Plat Nomor'),
                TextColumn::make('vehicle_type')
                    ->label('Jenis Kendaraan'),
                TextColumn::make('vehicle_name')
                    ->label('Nama Kendaraan'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDrivers::route('/'),
            'create' => Pages\CreateDriver::route('/create'),
            'edit' => Pages\EditDriver::route('/{record}/edit'),
        ];
    }
}
