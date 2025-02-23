<?php

return [
    'debug' => $_ENV['KIRBY_DEBUG'] ?? false,

    'yaml' => [
        'handler' => 'symfony'
    ],

    'date' => [
        'handler' => 'intl'
    ],

    'languages' => true,

    'cache' => [
        'pages' => [
            'active' => $_ENV['KIRBY_CACHE'] ?? false,
            'ignore' => fn (Page $page) => $page->kirby()->user() !== null
        ]
    ],

    'permalinksResolver' => [
        // Strip the origin from URLs
        'urlParser' => function (string $url, App $kirby) {
            $path = parse_url($url, PHP_URL_PATH);
            return $path;
        }
    ],

    'kql' => [
        'auth' => 'bearer'
    ],
    'headless' => [
        // Enable returning Kirby templates as JSON
        'globalRoutes' => true,

        // Optional API token to use for authentication, also used
        // for for KQL endpoint
        'token' => $_ENV['KIRBY_HEADLESS_API_TOKEN'],

        'panel' => [
            // Preview URL for the Panel preview button
            'frontendUrl' => $_ENV['KIRBY_HEADLESS_FRONTEND_URL'] ?? 'http://localhost',
            // Redirect to the Panel if no authorization header is sent,
            // useful for editors visiting the site directly
            'redirect' => true
        ],

        'cors' => [
            'allowOrigin' => $_ENV['KIRBY_HEADLESS_ALLOW_ORIGIN'] ?? '*',
            'allowMethods' => $_ENV['KIRBY_HEADLESS_ALLOW_METHODS'] ?? 'GET, POST, OPTIONS',
            'allowHeaders' => $_ENV['KIRBY_HEADLESS_ALLOW_HEADERS'] ?? 'Accept, Content-Type, Authorization, X-Language',
            'maxAge' => $_ENV['KIRBY_HEADLESS_MAX_AGE'] ?? '86400',
        ]
    ]
];