<?php
/**
 * Oh Dear plugin for Craft CMS 3.x
 *
 * Integrate Oh Dear into Craft CMS.
 *
 * @link      https://webhub.de
 * @copyright Copyright (c) 2019 webhub GmbH
 */

/**
 * Oh Dear config.php
 *
 * This file exists only as a template for the Oh Dear settings.
 * It does nothing on its own.
 *
 * Don't edit this file, instead copy it to 'craft/config' as 'ohdear.php'
 * and make your changes there to override default settings.
 *
 * Once copied to 'craft/config', this file will be multi-environment aware as
 * well, so you can have different settings groups for each environment, just as
 * you do for 'general.php'
 */

use craft\helpers\App;
use webhubworks\ohdear\health\checks\Check;

return [
    'apiToken' => App::env('OH_DEAR_API_TOKEN'),
    'siteId' => App::env('OH_DEAR_SITE_ID'),
    'healthCheckSecret' => App::env('OH_DEAR_HEALTH_CHECK_SECRET'),
    'healthChecks' => [
        // Check::availableUpdates()->warnWhenTotalAvailableUpdatesIsAtLeast(5),
        Check::serverRequirements(),
        Check::devMode(),
        Check::usedDiskSpace(),
        Check::failedJobs(),
        Check::environment(),
    ],
];
