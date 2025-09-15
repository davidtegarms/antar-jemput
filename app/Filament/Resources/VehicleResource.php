<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Vehicle;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\VehicleResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\VehicleResource\RelationManagers;

class VehicleResource extends Resource
{
    protected static ?string $model = Vehicle::class;

    protected static ?string $navigationIcon = 'heroicon-o-truck'; // lebih cocok untuk kendaraan

    protected static ?string $modelLabel = 'Kendaraan';
    protected static ?string $pluralModelLabel = 'Kendaraan';
    
    public static function shouldRegisterNavigation(): bool
    {
    return false;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('license_plate')
                    ->label('Plat Nomor')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(20),

                TextInput::make('name_vehicle')
                    ->label('Nama Kendaraan')
                    ->required()
                    ->maxLength(100)
                    ->placeholder('Contoh: Avanza Putih'),

                TextInput::make('type_vehicle')
                    ->label('Tipe/ Model')
                    ->required()
                    ->maxLength(50)
                    ->placeholder('Contoh: Toyota'),

                TextInput::make('year_vehicle')
                    ->label('Tahun')
                    ->numeric()
                    ->minValue(1900)
                    ->maxValue(date('Y'))
                    ->required()
                    ->placeholder('Contoh: 2020'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->sortable(),
                TextColumn::make('license_plate')
                    ->label('Plat Nomor')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('name_vehicle')
                    ->label('Nama Kendaraan')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('type_vehicle')
                    ->label('Tipe/ Model'),
                TextColumn::make('year_vehicle')
                    ->label('Tahun'),
                
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            
            ->headerActions([
                // Tables\Actions\CreateAction::make(),
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
            'index' => Pages\ListVehicles::route('/'),
            // 'create' => Pages\CreateVehicle::route('/create'),
            // 'edit' => Pages\EditVehicle::route('/{record}/edit'),
        ];
    }
}
