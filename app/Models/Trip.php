<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'origin_city',
        'origin_country',
        'destination_city',
        'destination_country',
        'departure_date',
        'arrival_date',
        'transportation_mode',
        'max_weight_kg',
        'max_volume_l',
        'notes',
        'status',
        // needs to remove geographic point for now since it involves several steps, 
        // including setting up the database schema, creating a custom cast for the point type, 
        // and handling the data in your application.
        // 'origin_coordinates',
        // 'destination_coordinates',
    ];

    protected $casts = [
        'departure_date' => 'datetime',
        'arrival_date' => 'datetime',
        'max_weight_kg' => 'float',
        'max_volume_l' => 'float',
        // needs to remove geographic point for now since it involves several steps, 
        // including setting up the database schema, creating a custom cast for the point type, 
        // and handling the data in your application.
        // 'origin_coordinates' => 'point',
        // 'destination_coordinates' => 'point',
    ];
}