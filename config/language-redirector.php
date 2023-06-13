<?php
/**
 * Language Redirector plugin for Craft CMS 3.x
 *
 * Automatically redirect visitors to their preferred language
 *
 * @link      https://pierrestoffe.be
 * @copyright Copyright (c) 2018 Pierre Stoffe
 */

return [
    // A list of all languages and their matching site
    'languages' => [
            'fr' => 'french',
            'de' => 'deutsch',
    ],

    // The name of the URL query parameter
    'queryParameterName' => 'lang',

    // The name of the HTTP session key
    'sessionKeyName' => 'lang',

    // Should users with access to the Control Panel be redirected
    'redirectUsersWithCpAccess' => true,

    // Can users be automatically redirected or just use the plugin for language switching
    'canRedirect' => true

];
