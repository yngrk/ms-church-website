<?php

return [
    'kql' => [
        'auth' => 'bearer'
    ],
    'headless' => [
        // Enable returning Kirby templates as JSON

        // Optional API token to use for authentication, also used
        // for for KQL endpoint
        'token' => getenv('KIRBY_HEADLESS_API_TOKEN'),
    ]
];