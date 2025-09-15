<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vehicle extends Model
{
    use HasFactory;

    // Nama tabel (opsional, kalau tidak sesuai konvensi Laravel)
    protected $table = 'vehicles';

    // Kolom yang bisa diisi (fillable)
    protected $fillable = [
        'license_plate',
        'name_vehicle',
        'type_vehicle',
        'year_vehicle',
    ];

    public function driverAssignments(): HasMany
    {
        return $this->hasMany(DriverAssignment::class);
    }
}
