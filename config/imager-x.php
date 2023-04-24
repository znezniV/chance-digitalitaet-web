<?php

use craft\helpers\App;

return [
    'transformer' => App::env('IMAGER_TRANSFORMER') ?? 'craft',
    'imagerUrl' => '@web/imager/',

    'fillTransforms' => true,
    'allowUpscale' => false,
    'removeMetadata' => true,
    'jpgQuality' => 80,
    'webpQuality' => 80,
    'avifQuality' => 80,
];
