<?php

namespace App\Services\Aquila;

use App\Imports\AirportsImport;
use GuzzleHttp\Client;

class ImportRoutes {
    private Client $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function fromOpenFlights()
    {
        $response = $this->client->request('GET', config('ifkorea.api.airports'));
        \Storage::put('airports.csv', $response->getBody()->getContents());
        \Excel::import(new AirportsImport(), storage_path('app/airports.csv'));
        return true;
    }
}
