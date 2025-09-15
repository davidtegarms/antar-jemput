<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use App\Models\Student;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\StudentResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\StudentResource\RelationManagers;

class StudentResource extends Resource
{
    protected static ?string $model = Student::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $modelLabel = 'Siswa';
    protected static ?string $pluralModelLabel = 'Siswa';

    protected static ?int $navigationSort = 20; // Urutan menu di sidebar

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Select::make('user_id')
                    ->label('Username')
                    ->options(User::where('role', 'student')->pluck('name', 'id'))
                    ->searchable()
                    ->required(),

                TextInput::make('name_student')
                    ->label('Nama Lengkap')
                    ->required(),

                TextInput::make('address_student')
                    ->label('Alamat')
                    ->required(),

                TextInput::make('phone_student')
                    ->label('Nomor Telepon')
                    ->tel()
                    ->nullable(),

                TextInput::make('class_student')
                    ->label('Kelas')
                    ->nullable(),

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
                TextColumn::make('id')
                    ->sortable(),
                TextColumn::make('user.name')
                    ->label('Username')
                    ->sortable(),
                TextColumn::make('name_student')
                    ->label('Nama Lengkap')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('class_student')
                    ->label('Kelas')
                    ->sortable(),
                TextColumn::make('phone_student')
                    ->label('No. Telepon')
                    ->searchable(),
            
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])

            ->headerActions([
                // Tables\Actions\CreateAction::make(),
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
            // 'create' => Pages\CreateStudent::route('/create'),
            // 'edit' => Pages\EditStudent::route('/{record}/edit'),
        ];
    }
}
