<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
    'name',
    'parent_id',
    'school_name',
    'pickup_address_jalan', 
    'pickup_address_kelurahan', 
    'pickup_address_kecamatan', 
    'pickup_address_kabupaten', 
    'pickup_address_kode_pos', 
    'pickup_address_keterangan', 
    'dropoff_address_jalan', 
    'dropoff_address_kelurahan', 
    'dropoff_address_kecamatan', 
    'dropoff_address_kabupaten', 
    'dropoff_address_kode_pos',
    'dropoff_address_keterangan',
];
    //Relasi
    public function parent() 
    { 
        return $this->belongsTo(User::class, 'parent_id'); 
    }

    public function trips() 
    { 
        return $this->hasMany(Trip::class); 
    }
}
