<?php

namespace App\Services\Aquila;

use App\Imports\AirportsImport;
use App\Imports\RoutesImport;
use GuzzleHttp\Client;

class Import {
    private Client $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function airportsFromOpenFlights()
    {
        $response = $this->client->request('GET', config('ifkorea.api.airports'));
        \Storage::put('airports.csv', $response->getBody()->getContents());
        \Excel::import(new AirportsImport(), storage_path('app/airports.csv'));
        return true;
    }

    public function routesFromExcel()
    {
        \Excel::import(new RoutesImport(), resource_path('aqulia.csv'));
        return true;
    }
}
