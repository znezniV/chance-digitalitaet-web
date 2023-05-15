<?php

return [
    'fullscreen' => [
        'transforms' => [
            ['width' => 800],
            ['width' => 2400],
        ],
        'defaults' => [
            'fillInterval' => 200,
        ],
    ],

    'grid' => [
        'transforms' => [
            ['width' => 600],
            ['width' => 1200],
        ],
        'defaults' => [
            'fillInterval' => 150,
        ],
    ],

    'shareImage' => [
        'transforms' => [
            ['width' => 1200, 'height' => 630],
        ],
        'defaults' => [
            'format' => 'jpg',
        ],
    ],
];
