<?php

use craft\helpers\App;

$isProd = App::env('CRAFT_ENVIRONMENT') === 'production';

return [
    'showLabel' => !$isProd,
    'labelText' => Craft::t('app', 'env_label'),
    'prefixText' => null,
    'suffixText' => null,
    'labelColor' => '#f3b737',
    'textColor' => '#000000',
    'targetSelector' => '#global-header:before',
];
