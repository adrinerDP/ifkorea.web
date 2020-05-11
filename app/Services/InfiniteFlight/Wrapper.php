<?php

namespace App\Services\InfiniteFlight;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;

/**
 * Wrapper for Infinite Flight Live API
 *
 * @package App\Services\InfiniteFlight
 * @author adrinerDP (me@adrinerdp.co)
 * @link https://community.infiniteflight.com/t/infinite-flight-live-api/387/1
 */
class Wrapper
{
    private Client $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => config('ifkorea.api.endpoint')
        ]);
    }

    /**
     * Get the current server list.
     * @return object
     */
    public function getSessions()
    {
        $CACHE_KEY = 'INFINITE_FLIGHT_LIVE_API_SESSIONS';
        if (Cache::has($CACHE_KEY)) return Cache::get($CACHE_KEY);

        $response = $this->client->request('GET', 'GetSessionsInfo.aspx', [
            'query' => [
                'apikey' => config('ifkorea.api.key')
            ]
        ]);
        $result = json_decode($response->getBody()->getContents());

        Cache::put($CACHE_KEY, $result, 3600);
        return $result;
    }

    /**
     * Get all current flights for specified server.
     * @param string $sessionId
     * @param bool $positionOnly
     * @return object
     */
    public function getFlights(string $sessionId, bool $positionOnly = false)
    {
        $response = $this->client->request('GET', 'Flights.aspx', [
            'query' => [
                'apikey' => config('ifkorea.api.key'),
                'sessionid' => $sessionId,
                'positionsonly' => $positionOnly
            ]
        ]);
        $result = json_decode($response->getBody()->getContents());

        return $result;
    }

    /**
     * Get flight details.
     * @param string $flightId
     * @return object
     */
    public function getFlightDetails(string $flightId)
    {
        $response = $this->client->request('GET', 'FlightDetails.aspx', [
            'query' => [
                'apikey' => config('ifkorea.api.key'),
                'flightid' => $flightId
            ]
        ]);
        $result = json_decode($response->getBody()->getContents());

        return $result;
    }

    /**
     * Get the list of active ATC Facilities for specified server.
     * @param string $sessionId
     * @return object
     */
    public function getATCFacilities(string $sessionId)
    {
        $response = $this->client->request('GET', 'GetATCFacilities.aspx', [
            'query' => [
                'apikey' => config('ifkorea.api.key'),
                'sessionid' => $sessionId
            ]
        ]);
        $result = json_decode($response->getBody()->getContents());

        return $result;
    }

    /**
     * Get information about a user
     * @param array $userIds
     * @return object
     */
    public function getUserDetails(array $userIds)
    {
        $response = $this->client->request('POST', 'UserDetails.aspx', [
            'query' => [
                'apikey' => config('ifkorea.api.key'),
            ],
            'json' => [
                'UserIDs' => $userIds
            ]
        ]);

        return json_decode($response->getBody()->getContents());
    }

    /**
     * Get all current flight plans of flights for specified server.
     * @param string $sessionId
     * @return object
     */
    public function getFlightPlans(string $sessionId)
    {
        $response = $this->client->request('GET', 'GetFlightPlans.aspx', [
            'query' => [
                'apikey' => config('ifkorea.api.key'),
                'sessionid' => $sessionId,
            ]
        ]);
        $result = json_decode($response->getBody()->getContents());

        return $result;
    }

    public static function getFrequencyType(int $freq_type)
    {
        return config('ifkorea.freq_types')[$freq_type];
    }
}
