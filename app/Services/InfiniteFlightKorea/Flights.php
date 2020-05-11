<?php

namespace App\Services\InfiniteFlightKorea;

use App\Services\InfiniteFlight\Live;

class Flights {
    private Live $live;

    public function __construct(Live $live)
    {
        $this->live = $live;
    }

    public function getIFKFlights()
    {
        $sessions = $this->live->getAllSessions();
        $flights = [];
        foreach ($sessions as $session) {
            $sessionFlights = $this->live->getAllFlightsWithSession($session);
            foreach ($sessionFlights as $flight) {
                if (preg_match('/\bIFK\b/', $flight->CallSign) || preg_match('/\bIFK\b/', $flight->DisplayName)) {
                    array_push($flights, $flight);
                }
            }
        }

        return $flights;
    }
}
