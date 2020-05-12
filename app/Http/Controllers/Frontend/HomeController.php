<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\InfiniteFlight\Live;
use App\Services\InfiniteFlightKorea\Flights;
use App\Services\InfiniteFlightKorea\Frequencies;

class HomeController extends Controller
{
    /**
     * Render home
     * @return Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Home players data [ONLY API]
     * @param Live $live
     * @param Flights $flights
     * @param Frequencies $frequencies
     * @return \Illuminate\Http\JsonResponse
     */
    public function asyncHomeData(Live $live, Flights $flights, Frequencies $frequencies)
    {
        return response()->json([
            'servers' => view('components.home_servers', [
                'sessions' => $live->getAllSessions(),
            ])->render(),
            'players' => view('components.home_players', [
                'flights' => $flights->getIFKFlights(),
                'atcs' => $frequencies->getRKRRFrequencies(),
            ])->render()
        ]);
    }
}
