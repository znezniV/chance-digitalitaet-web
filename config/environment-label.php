<?php

use craft\helpers\App;

$isProd = App::env('CRAFT_ENVIRONMENT') === 'production';
$isLocal = App::env('CRAFT_ENVIRONMENT') === 'dev';

return [
    'showLabel' => !$isProd && !$isLocal,
    'labelText' => Craft::t('app', 'env_label'),
    'prefixText' => null,
    'suffixText' => null,
    'labelColor' => $isLocal ? '#00d0ff' : '#f3b737',
    'textColor' => '#000000',
    'targetSelector' => '#global-sidebar:after',
];
