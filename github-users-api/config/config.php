<?php
return [
    'api' => [
        'github' => [
            'protocol'  => env('GITHUB_API_PROTOCOL'),
            'host'      => env('GITHUB_API_HOST')
        ],
        'nominatim' => [
            'protocol'  => env('NOMINATIM_API_PROTOCOL'),
            'host'      => env('NOMINATIM_API_HOST')
        ]
    ]
];
