<?php

return [

    'gecko' => [
        'url' => env('COIN_GECKO_URL', 'https://api.coingecko.com/api/v3'),
        'key' => env('COIN_GECKO_KEY', 'CG-QACdbTp2ZE9BARgA7r19UwoP'),
    ],

    'default' => env('COIN_DRIVER', 'gecko')
];