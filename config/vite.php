<?php

use craft\helpers\App;

$isDev = App::env('CRAFT_ENVIRONMENT') === 'dev';

return [
    'useDevServer' => $isDev,
    'manifestPath' => '@webroot/dist/manifest.json',
    'devServerPublic' => 'http://localhost:5173/',
    'serverPublic' => '/dist/',
    'errorEntry' => '',
    'cacheKeySuffix' => '',
    'devServerInternal' => 'http://localhost:5173',
    'checkDevServer' => $isDev,
    'includeReactRefreshShim' => false,
    'includeModulePreloadShim' => true,
    'criticalPath' => '@webroot/dist/criticalcss',
    'criticalSuffix' => '_critical.min.css',
];
