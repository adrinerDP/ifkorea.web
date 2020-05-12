<?php

namespace App\Services\InfiniteFlightKorea;

use App\Services\InfiniteFlight\Live;

class Frequencies {
    private Live $live;

    /**
     * Frequencies constructor.
     * @param Live $live
     */
    public function __construct(Live $live)
    {
        $this->live = $live;
    }

    /**
     * Returns RKRR atc frequencies in all sessions.
     * @return array
     */
    public function getRKRRFrequencies()
    {
        $sessions = $this->live->getAllSessions();
        $atcs = [];
        foreach ($sessions as $session) {
            $sessionATCs = $this->live->getAllATCFacilitiesWithSession($session);
            foreach ($sessionATCs as $atc) {
                if (\Str::startsWith($atc->Name, 'RK')) {
                    array_push($atcs, $atc);
                }
            }
        }

        return $atcs;
    }
}
