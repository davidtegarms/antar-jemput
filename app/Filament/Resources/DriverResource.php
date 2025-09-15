<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use App\Models\Driver;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use App\Filament\Resources\DriverResource\Pages;

class DriverResource extends Resource
{
    protected static ?string $model = Driver::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';
    protected static ?string $modelLabel = 'Driver';
    protected static ?string $pluralModelLabel = 'Sopir';
    
    public static function shouldRegisterNavigation(): bool
    {
    return false;
    }
    
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('user_id')
                    ->label('Username')
                    ->options(User::where('role', 'driver')->pluck('name', 'id'))
                    ->searchable()
                    ->required(),
                    
                TextInput::make('name_driver')
                    ->label('Full Name')
                    ->required(),

                DatePicker::make('birthdate_driver')
                    ->label('Birthdate')
                    ->nullable(),

                TextInput::make('address_driver')
                    ->label('Address')
                    ->nullable(),

                TextInput::make('phone_driver')
                    ->label('Phone Number')
                    ->tel()
                    ->nullable(),

                Select::make('status_driver')
                    ->options([
                        'active' => 'Active',
                        'inactive' => 'Inactive',
                    ])
                    ->default('inactive')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->sortable(),
                TextColumn::make('user.name')
                    ->label('Username')
                    ->sortable(),
                TextColumn::make('name_driver')
                    ->label('Nama')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('birthdate_driver')
                    ->label('Tanggal Lahir')
                    ->date(),
                TextColumn::make('phone_driver')
                    ->label('Nomor HP'),
                TextColumn::make('status_driver')
                    ->label('Status')
                    ->badge()
                    ->colors([
                        'success' => 'active',
                        'danger' => 'inactive',
                    ]),
            
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])

            ->headerActions([
                // 
            ])

            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDrivers::route('/'),
            // 'create' => Pages\CreateDriver::route('/create'),
            // 'edit' => Pages\EditDriver::route('/{record}/edit'),
        ];
    }
}
