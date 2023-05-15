<?php

// SEOMate is only used to generate a sitemap.xml
// Docs: https://github.com/vaersaagod/seomate

return [
    'previewEnabled' => false,

    'sitemapEnabled' => true,
    'sitemapConfig' => [
        'elements' => [
            'home' => ['changefreq' => 'weekly', 'priority' => 0.5],
            'about' => ['changefreq' => 'weekly', 'priority' => 0.5],
        ],
    ],
];
