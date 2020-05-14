<?php

namespace App\Imports;

use App\Models\Airport;
use Maatwebsite\Excel\Concerns\ToModel;

class AirportsImport implements ToModel
{
    public function model(array $row)
    {
        return new Airport([
            'name' => ($row[1] == '\N') ? null : $row[1],
            'city' => ($row[2] == '\N') ? null : $row[2],
            'country' => ($row[3] == '\N') ? null : $row[3],
            'iata' => ($row[4] == '\N') ? null : $row[4],
            'icao' => ($row[5] == '\N') ? null : $row[5],
            'latitude' => ($row[6] == '\N') ? null : $row[6],
            'longitude' => ($row[7] == '\N') ? null : $row[7],
            'altitude' => ($row[8] == '\N') ? null : $row[8],
            'tz_offset' => ($row[9] == '\N') ? null : $row[9],
        ]);
    }

    public function chunkSize(): int
    {
        return 500;
    }
}
