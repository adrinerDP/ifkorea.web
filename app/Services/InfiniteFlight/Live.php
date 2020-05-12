<?php

namespace App\Services\InfiniteFlight;

/**
 * Class Live
 *
 * @package App\Services\InfiniteFlight
 * @author adrinerDP (me@adrinerdp.co)
 */
class Live {
    private Wrapper $wrapper;

    /**
     * Live constructor.
     * @param Wrapper $wrapper
     */
    public function __construct(Wrapper $wrapper)
    {
        $this->wrapper = $wrapper;
    }

    /**
     * Get all sessions except 'X' marked session.
     * @return array
     */
    public function getAllSessions()
    {
        $sessions = $this->wrapper->getSessions();

        $result = [];
        foreach ($sessions as $session) {
            if (\Str::contains($session->Name, '[X]')) continue;
            array_push($result, $session);
        }

        return $result;
    }

    /**
     * Search session information with a session name.
     * @param string $server_name
     * @return object
     */
    public function getSessionWithName(string $server_name)
    {
        $sessions = $this->getAllSessions();

        foreach ($sessions as $session) {
            if (\Str::contains($session->Name, $server_name)) return $session;
        }

        return null;
    }

    /**
     * Return all flights in the given session.
     * @param object $session
     * @return object
     */
    public function getAllFlightsWithSession(object $session)
    {
        return $this->wrapper->getFlights($session->Id);
    }

    /**
     * Search Flight with CallSign in the given session.
     * @param object $session
     * @param string $callsign
     * @return array
     */
    public function getFlightWithCallSign(object $session, string $callsign)
    {
        $flights = $this->wrapper->getFlights($session->Id);

        foreach ($flights as $flight) {
            if (\Str::contains($flight->CallSign, $callsign)) return $flight;
        }

        return null;
    }

    /**
     * Return all flight plans in the given session.
     * @param object $session
     * @return object
     */
    public function getAllFlightPlansWithSession(object $session)
    {
        return $this->wrapper->getFlightPlans($session->Id);
    }

    /**
     * Search Flight with DisplayName in the given session.
     * @param object $session
     * @param string $display_name
     * @return array
     */
    public function getFlightWithDisplayName(object $session, string $display_name)
    {
        $flights = $this->wrapper->getFlights($session->Id);

        foreach ($flights as $flight) {
            if (\Str::contains($flight->DisplayName, $display_name)) return $flight;
        }

        return null;
    }

    /**
     * Get user detail with uuid.
     * @param string $uuid
     * @return object
     */
    public function getUserDetails(string $uuid)
    {
        return $this->wrapper->getUserDetails([$uuid]);
    }

    /**
     * Get All atc frequencies in the given session.
     * @param object $session
     * @return object
     */
    public function getAllATCFacilitiesWithSession(object $session)
    {
        return $this->wrapper->getATCFacilities($session->Id);
    }
}
