<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Driver extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'phone_number',
        'license_plate',
        'vehicle_type',
        'vehicle_name',
    ];
    //Relasi
    public function user(): BelongsTo
    { 
        return $this->belongsTo(User::class); 
    }

    public function trips() 
    { 
        return $this->hasMany(Trip::class); 
    }
}

