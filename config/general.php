<?php
/**
 * General Configuration
 *
 * All of your system's general configuration settings go in here. You can see a
 * list of the available settings in vendor/craftcms/cms/src/config/GeneralConfig.php.
 *
 * @see \craft\config\GeneralConfig
 */

use craft\config\GeneralConfig;
use craft\helpers\App;

$isDev = App::env('CRAFT_ENVIRONMENT') === 'dev';
$isProd = App::env('CRAFT_ENVIRONMENT') === 'production';

return GeneralConfig::create()
    ->omitScriptNameInUrls()
    ->defaultWeekStartDay(1)
    ->allowUpdates(false)
    ->timezone('Europe/Zurich')
    ->enableGql(false)
    ->defaultCpLanguage('de-CH')
    ->convertFilenamesToAscii()
    ->limitAutoSlugsToAscii()
    ->sendPoweredByHeader(false)
    ->runQueueAutomatically($isDev)
    ->disallowRobots(!$isProd)

    ->cacheDuration(false)
    ->maxUploadFileSize(67108864) // 64MB
    ->transformGifs(false)
    ->userSessionDuration($isDev ? false : 3600 * 4) // 4 Hours

    // ->allowedFileExtensions(['json', 'jpg', 'jpeg', 'png', 'gif', 'pdf', 'zip'])
    // ->extraAllowedFileExtensions(['json'])

    ->aliases([
        // '@web' => App::env('PRIMARY_SITE_URL'),
        // '@webroot' => dirname(__DIR__).'/web',
        // '@publicUrl' => App::env('PRIMARY_SITE_URL'),
    ])
;
