<?php

use craft\helpers\App;

return [
    'transformer' => App::env('IMAGER_TRANSFORMER') === 'imgix' ? 'imgix' : 'craft',

    'fillTransforms' => true,
    'allowUpscale' => false,
    'removeMetadata' => true,
    'jpgQuality' => 85,
    'webpQuality' => 85,
    'avifQuality' => 85,

    'imagerUrl' => rtrim(App::env('PRIMARY_SITE_URL'), '/') . '/imager/',
    'imgixApiKey' => App::env('IMGIX_API_KEY'),
    'imgixConfig' => [
        'default' => [
            'domain' => App::env('IMGIX_DOMAIN'),
            'signKey' => App::env('IMGIX_SIGN_KEY'),
            'useHttps' => true,
            'sourceIsWebProxy' => false,
            'addPath' => [
                'uploads' => 'uploads',
            ],
            'getExternalImageDimensions' => true,
            'defaultParams' => ['auto' => 'compress,format', 'q' => 85],
        ],
    ],
];
