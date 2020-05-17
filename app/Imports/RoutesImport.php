<?php

namespace App\Imports;

use App\Models\Airport;
use App\Models\Route;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class RoutesImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Route([
            'flight_number' => substr($row['callsign'], 3, 10),
            'airline_id' => 1, // TODO
            'dep_airport_id' => Airport::icao($row['dep_airport'])->first()->id,
            'arr_airport_id' => Airport::icao($row['arr_airport'])->first()->id,
            'dep_at' => $row['dep_time'],
            'arr_at' => $row['arr_time'],
            'fleet_type' => $row['fleet_type'],
            'day_of_week_status' => $this->parseDayOfWeek($row),
            'remarks' => $this->parseRemarks($row),
        ]);
    }

    private function parseDayOfWeek(array $row): string
    {
        $keys = ['sun', 'mon', 'tue', 'wed', 'thr', 'fri', 'sat'];
        $result = [];
        foreach ($keys as $key) {
            if ($row[$key] == '●') $result[$key] = true;
            if ($row[$key] == '○') $result[$key] = false;
        }
        return json_encode($result, JSON_UNESCAPED_UNICODE);
    }

    private function parseRemarks(array $row): string
    {
        $remarks = explode(',', $row['remark']);
        $result = [];
        foreach($remarks as $remark) {
            $keyval = explode('=', $remark);
            array_push($result, [
                $keyval[0] => $keyval[1]
            ]);
        }
        return json_encode($result, JSON_UNESCAPED_UNICODE);
    }

    public function headingRow(): int
    {
        return 3;
    }

    public function chunkSize(): int
    {
        return 100;
    }

}
