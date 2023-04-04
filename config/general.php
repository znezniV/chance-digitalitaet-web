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
    ->devMode(App::env('CRAFT_DEV_MODE') ?? false)
    ->allowAdminChanges(App::env('CRAFT_ALLOW_ADMIN_CHANGES') ?? false)
    ->enableTemplateCaching(App::env('CRAFT_ENABLE_TEMPLATE_CACHING') ?? false)
    ->timezone('Europe/Zurich')
    ->enableGql(false)
    ->defaultCpLanguage('de-CH')
    ->convertFilenamesToAscii()
    ->limitAutoSlugsToAscii()
    ->sendPoweredByHeader(false)
    ->runQueueAutomatically($isDev)
    ->disallowRobots(!$isProd)
    ->defaultSearchTermOptions(['subLeft' => true])
    ->cacheDuration(false)
    ->maxUploadFileSize(67108864) // 64MB
    ->transformGifs(false)
    ->errorTemplatePrefix('_errors/')
    ->userSessionDuration($isDev ? false : 3600 * 4) // 4 Hours
    ->maxSlugIncrement(9999)

    // ->imageEditorRatios([
    //     'Ohne Einschränkung' => 'none',
    //     'Original' => 'original',
    //     'Custom Ratio' => 1.8,
    // ])

    ->aliases([
        '@web' => rtrim(App::env('PRIMARY_SITE_URL'), '/'),
        '@webroot' => dirname(__DIR__).'/web',

        '@assetBaseUrl' => '@web/storage',
        '@assetBasePath' => '@storage/app/public',
        '@imagerBaseUrl' => '@assetBaseUrl/13b6ecc1-ecb4-4427-be4c-c114890bfb98',
        '@imagerBasePath' => '@assetBasePath/13b6ecc1-ecb4-4427-be4c-c114890bfb98',
    ]);
