<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Trip extends Model
{
    use HasFactory;

    protected $fillable = [
        'driver_id', 
        'student_id', 
        'trip_type', 
        'status', 
        'scheduled_time', 
        'date',
    ];

    //Relasi
    public function driver() : BelongsTo
    { 
        return $this->belongsTo(User::class, 'driver_id');
    }

    public function student() : BelongsTo
    { 
        return $this->belongsTo(Student::class); 
    }
}
