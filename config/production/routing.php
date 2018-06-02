<?php

return [
    'EXTCONF' => [
        'realurl' => [
            '_DEFAULT' => [
                'init' => [
                    'appendMissingSlash' => 'ifNotFile,redirect',
                    'reapplyAbsRefPrefix' => 1
                ],
                'pagePath' => [
                    'rootpage_id' => '1'
                ],
                'preVars' => [
                    [
                        'GETvar' => 'L',
                        'valueMap' => [],
                        'valueDefault' => 0,
                        'noMatch' => 'bypass'
                    ]
                ],
                'fixedPostVars' => [
                    [
                        'news' => [
                            'GETvar' => 'tx_news_pi1[news]',
                            'lookUpTable' => [
                                'table' => 'tx_news_domain_model_news',
                                'id_field' => 'uid',
                                'alias_field' => 'title',
                                'useUniqueCache' => 1,
                                'useUniqueCache_conf' => [
                                    'strtolower' => 1,
                                    'spaceCharacter' => '-'
                                ]
                            ]
                        ],
                    ]
                    // 7 => 'news'
                ],
                'postVarSets' => [
                    '_DEFAULT' => [
                        'seite' => [
                            'GETvar' => 'tx_news_pi1[@widget_0][currentPage]'
                        ]
                    ]
                ],
                'fileName' => [
                    'defaultToHTMLsuffixOnPrev' => 0,
                    'acceptHTMLsuffix' => 0
                ]
            ]
        ]
    ]
];
