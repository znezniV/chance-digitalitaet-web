<?php

return [
    'pluginName' => 'Redirects',
//    'cacheEnabled' => !App::devMode(),
//    'trackQueryString' => false,
//    'queryStringPassthrough' => false,
    'track' => [
//        'ip',
        'referrer',
        'useragent',
    ],
//    'excludeUrlPatterns' => [],
//    'autoCreateElementRedirects' => true,
//    'autoCreateElementRedirectsMatchBy' => 'pathonly',
//    'csvDelimiter' => ',',
];
