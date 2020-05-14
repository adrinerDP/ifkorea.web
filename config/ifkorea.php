<?php

return [
    'api' => [
        'endpoint' => env('IFKOREA_API_ENDPOINT', 'http://infinite-flight-public-api.cloudapp.net/v1/'),
        'key' => env('IFKOREA_API_KEY'),
        'airports' => env('IFKOREA_AIRPORTS_DATABASE', 'https://raw.githubusercontent.com/jpatokal/openflights/master/data/airports.dat'),
    ],
    'meta' => [
        'keywords' => '인피니트 플라이트, 인플, 인피니트 플라이트 한국 커뮤니티, 인플코리아, 인플 멀티',
        'description' => '대한민국 최대! 인피니트 플라이트 한국 커뮤니티의 지원 센터입니다.',
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
