<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    protected $fillable = [
        'flight_number',
        'airline_id',
        'dep_airport_id',
        'arr_airport_id',
        'dep_at',
        'arr_at',
        'fleet_type',
        'day_of_week_status',
        'remarks',
    ];

    protected $casts = [
        'day_of_week_status' => 'json',
        'remarks' => 'json',
    ];

    public function airline()
    {
        return $this->belongsTo('App\Models\Airline');
    }

    public function depAirport()
    {
        return $this->belongsTo('App\Models\Airport', 'dep_airport_id');
    }

    public function arrAirport()
    {
        return $this->belongsTo('App\Models\Airport', 'arr_airport_id');
    }
}
