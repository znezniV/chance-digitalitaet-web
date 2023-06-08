<?php
/**
 * Yii Web Application Config
 *
 * Edit this file at your own risk!
 *
 * The array returned by this file will get merged with
 * vendor/craftcms/cms/src/config/app.php and app.[web|console].php, when
 * Craft's bootstrap script is defining the configuration for the entire
 * application.
 *
 * You can define custom modules and system components, and even override the
 * built-in system components.
 *
 * This application config is applied only for *only* web requests
 */

use craft\helpers\App;

/**
 * Use Redis as Session cache
 */
return [
    'components' => [
        // 'session' => static function() {
        //     // Get the default component config
        //     $config = App::sessionConfig();
        //     // Override the class to use Redis' session class and our config settings
        //     $config['class'] = yii\redis\Session::class;
        //     $config['keyPrefix'] = App::env('CRAFT_APP_ID') ?: 'CraftCMS';
        //     $config['redis'] = [
        //         'hostname' => App::env('REDIS_HOSTNAME') ?: '127.0.0.1',
        //         'port' => App::env('REDIS_PORT') ?: 6379,
        //         'database' => App::env('REDIS_DEFAULT_DB') ?: 0,
        //     ];
        //     // Instantiate and return it
        //     return Craft::createObject($config);
        // },
    ],
];
