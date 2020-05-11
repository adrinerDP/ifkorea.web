<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\InfiniteFlight\Live;
use App\Services\InfiniteFlightKorea\Flights;
use App\Services\InfiniteFlightKorea\Frequencies;

class HomeController extends Controller
{
    public function index(Live $live, Flights $flights, Frequencies $frequencies)
    {
        if (\Cache::has('HOME')) {
            $data = \Cache::get('HOME');
        } else {
            $data = [
                'sessions' => $live->getAllSessions(),
                'flights' => $flights->getIFKFlights(),
                'atcs' => $frequencies->getRKRRFrequencies(),
            ];
            \Cache::put('HOME', $data, 1800);
        }

        return view('home', $data);
    }
}
