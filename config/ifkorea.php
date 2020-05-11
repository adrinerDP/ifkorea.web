<?php

return [
    'api' => [
        'endpoint' => env('IFKOREA_API_ENDPOINT', 'http://infinite-flight-public-api.cloudapp.net/v1/'),
        'key' => env('IFKOREA_API_KEY')
    ],
    'freq_types' => [
        'Ground',
        'Tower',
        'Unicom',
        'Clearance',
        'Approach',
        'Departure',
        'Center',
        'ATIS',
        'Aircraft',
        'Recorded',
        'Unknown',
        'Unused',
    ]
];
