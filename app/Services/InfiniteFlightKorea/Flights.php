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
        $CACHE_KEY = 'INFINITE_FLIGHT_KOREA_FLIGHTS';
        if (\Cache::has($CACHE_KEY)) return \Cache::get($CACHE_KEY);

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

        \Cache::put($CACHE_KEY, $flights, 60);
        return $flights;
    }
}
