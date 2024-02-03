<?php

return [

    'gecko' => [
        'url' => env('COIN_GECKO_URL', 'prod-uri'),
        'key' => env('COIN_GECKO_KEY', 'prod-key'),
    ],

    'default' => env('COIN_DRIVER', 'gecko')
];