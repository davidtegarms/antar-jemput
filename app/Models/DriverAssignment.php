<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DriverAssignment extends Model
{
    protected $fillable = [
        'driver_id',
        'vehicle_id',
    ];

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
