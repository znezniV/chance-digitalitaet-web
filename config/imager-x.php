<?php

use craft\helpers\App;

$imageQuality = 80;

return [
    'transformer' => App::env('IMAGER_TRANSFORMER') ?? 'craft',
    'imagerUrl' => '@web/imager/',

    'fillTransforms' => true,
    'allowUpscale' => false,
    'removeMetadata' => true,
    'jpgQuality' => $imageQuality,
    'webpQuality' => $imageQuality,
    'avifQuality' => $imageQuality,

    // Uncomment if using imgix
//    'imgixApiKey' => App::env('IMGIX_API_KEY'),
//    'imgixConfig' => [
//        'default' => [
//            'domain' => App::env('IMGIX_DOMAIN'),
//            'signKey' => App::env('IMGIX_SIGN_KEY'),
//            'useHttps' => true,
//            'sourceIsWebProxy' => false,
//            'addPath' => [
                // Insert all paths (volumes) that are being used with imgix
//                'images' => 'images',
//            ],
//            'getExternalImageDimensions' => true,
//            'defaultParams' => ['auto' => 'compress,format', 'q' => $imageQuality],
//        ],
//    ],
];
