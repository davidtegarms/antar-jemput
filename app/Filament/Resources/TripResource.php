<?php

namespace App\Filament\Resources;

use App\Models\Trip;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\DatePicker;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;

class TripResource extends Resource
{
    protected static ?string $model = Trip::class;

    protected static ?string $navigationIcon = 'heroicon-o-map';
    protected static ?string $modelLabel = 'Trip';
    protected static ?string $pluralModelLabel = 'Trip';

    protected static ?int $navigationSort = 40;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('driver_id')
                    ->relationship('driver', 'name', fn (Builder $query) => $query->where('role', 'driver'))
                    ->required()
                    ->label('Driver'),

                Select::make('student_id')
                    ->relationship('student', 'name')
                    ->required()
                    ->label('Siswa'),

                DatePicker::make('date')
                    ->required()
                    ->label('Tanggal'),

                TimePicker::make('scheduled_time')
                    ->required()
                    ->label('Waktu Terjadwal'),

                Select::make('trip_type')
                    ->options([
                        'jemput' => 'Jemput',
                        'antar' => 'Antar',
                    ])
                    ->required()
                    ->label('Tipe Perjalanan'),

                Select::make('status')
                    ->options([
                        'scheduled' => 'Terjadwal',
                        'in_progress' => 'Dalam Perjalanan',
                        'completed' => 'Selesai',
                        'cancelled' => 'Dibatalkan',
                    ])
                    ->required()
                    ->label('Status'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('driver.name')
                    ->label('Nama Driver')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('student.name')
                    ->label('Nama Siswa')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('date')
                    ->label('Tanggal')
                    ->date()
                    ->sortable(),
                TextColumn::make('scheduled_time')
                    ->label('Waktu')
                    ->time('H:i')
                    ->sortable(),
                TextColumn::make('trip_type')
                    ->label('Tipe')
                    ->badge()
                    ->sortable(),
                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'scheduled' => 'warning',
                        'in_progress' => 'info',
                        'completed' => 'success',
                        'cancelled' => 'danger',
                    }),
            ])
            ->filters([
                SelectFilter::make('driver')
                    ->relationship('driver', 'name', fn (Builder $query) => $query->where('role', 'driver')),
                SelectFilter::make('trip_type')
                    ->options([
                        'jemput' => 'Jemput',
                        'antar' => 'Antar',
                    ]),
                SelectFilter::make('status')
                    ->options([
                        'scheduled' => 'Terjadwal',
                        'in_progress' => 'Dalam Perjalanan',
                        'completed' => 'Selesai',
                        'cancelled' => 'Dibatalkan',
                    ]),
            ])
            ->headerActions([
                // Tables\Actions\CreateAction::make(), // ✅ Tambah data via modal
            ])
            ->actions([
                Tables\Actions\EditAction::make(),   // ✅ Edit juga via modal
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => \App\Filament\Resources\TripResource\Pages\ListTrips::route('/'),
        ];
    }
}
