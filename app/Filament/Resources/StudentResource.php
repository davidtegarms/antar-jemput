<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentResource\Pages;
use App\Filament\Resources\StudentResource\RelationManagers;
use App\Models\Student;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Fieldset;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StudentResource extends Resource
{
    protected static ?string $model = Student::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $modelLabel = 'Siswa';
    protected static ?string $pluralModelLabel = 'Siswa';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                TextInput::make('name')
                    ->required()
                    ->label('Nama Siswa'),
                // Pilihan user dengan peran 'parent' dari tabel users
                Select::make('parent_id')
                    ->relationship('parent', 'name', fn ($query) => $query->where('role', 'parent'))
                    ->required()
                    ->label('Nama Orang Tua'),
                TextInput::make('school_name')
                    ->required()
                    ->label('Nama Sekolah'),

                // --- Form Alamat Penjemputan ---
                Fieldset::make('Alamat Penjemputan')
                ->schema([
                    TextInput::make('pickup_address_jalan')
                        ->required()
                        ->label('Nama Jalan'),
                    TextInput::make('pickup_address_kelurahan')
                        ->required()
                        ->label('Kelurahan'),
                    TextInput::make('pickup_address_kecamatan')
                        ->required()
                        ->label('Kecamatan'),
                    TextInput::make('pickup_address_kabupaten')
                        ->required()
                        ->label('Kabupaten'),
                    TextInput::make('pickup_address_kode_pos')
                        ->required()
                        ->label('Kode Pos'),
                    Textarea::make('pickup_address_keterangan')
                        ->label('Keterangan Tambahan')
                        ->helperText('Contoh: Disebelah toko Pandawa, depan gerbang sekolah.'),
                ])->columns(2),

            // --- Form Alamat Pengantaran ---
            Fieldset::make('Alamat Pengantaran')
                ->schema([
                    TextInput::make('dropoff_address_jalan')
                        ->required()
                        ->label('Nama Jalan'),
                    TextInput::make('dropoff_address_kelurahan')
                        ->required()
                        ->label('Kelurahan'),
                    TextInput::make('dropoff_address_kecamatan')
                        ->required()
                        ->label('Kecamatan'),
                    TextInput::make('dropoff_address_kabupaten')
                        ->required()
                        ->label('Kabupaten'),
                    TextInput::make('dropoff_address_kode_pos')
                        ->required()
                        ->label('Kode Pos'),
                    Textarea::make('dropoff_address_keterangan')
                        ->label('Keterangan Tambahan')
                        ->helperText('Contoh: Belakang gedung olahraga, dekat pos satpam.'),
                ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('name')
                    ->label('Nama Siswa')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('parent.name')
                    ->label('Nama Orang Tua')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('school_name')
                    ->label('Nama Sekolah'),
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
            'index' => Pages\ListStudents::route('/'),
            'create' => Pages\CreateStudent::route('/create'),
            'edit' => Pages\EditStudent::route('/{record}/edit'),
        ];
    }
}
