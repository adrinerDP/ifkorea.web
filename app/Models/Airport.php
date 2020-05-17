<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    protected $fillable = [
        'name',
        'city',
        'country',
        'iata',
        'icao',
        'latitude',
        'longitude',
        'altitude',
        'tz_offset'
    ];

    public function scopeICAO($query, $icao)
    {
        return $query->where('icao', $icao);
    }
}
