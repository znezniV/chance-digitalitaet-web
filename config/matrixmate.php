<?php

// Docs: https://github.com/vaersaagod/matrixmate

return [
    'fields' => [
        'pagebuilder' => [
            'section:brands' => [
                'types' => [
                    'image' => [
                        'hiddenFields' => ['aboutImage', 'storyImage'],
                    ]
                ],
            ],
        ],
        'homePagebuilder' => [
            'types' => [
                'teaser' => [
                    'tabs' => [[
                        'label' => 'Teaser',
                        'fields' => ['header', 'lead', 'hyper'],
                    ], [
                        'label' => 'Darstellung',
                        'fields' => ['inverted'],
                    ]],
                ],
                'stories' => [
                    'maxLimit' => 1,
                ],
            ],
        ],
    ],
];
