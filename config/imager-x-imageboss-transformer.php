<?php

use craft\helpers\App;

return [
    'profiles' => [
        '' => [
            'sourceName' => App::env('IMAGEBOSS_SOURCE'),
            'signToken' => App::env('IMAGEBOSS_TOKEN'),
            'useCloudSourcePath' => true,
        ],
    ],
];
