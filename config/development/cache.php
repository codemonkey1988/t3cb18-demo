<?php

return [
    'SYS' => [
        'caching' => [
            'cacheConfigurations' => [
                'cache_core' => [
                    'backend' => \TYPO3\CMS\Core\Cache\Backend\NullBackend::class
                ],
                'fluid_template' => [
                    'backend' => \TYPO3\CMS\Core\Cache\Backend\NullBackend::class
                ],
                'cache_hash' => [
                    'backend' => \TYPO3\CMS\Core\Cache\Backend\NullBackend::class
                ],
                'cache_pages' => [
                    'backend' => \TYPO3\CMS\Core\Cache\Backend\NullBackend::class
                ],
                'cache_pagesection' => [
                    'backend' => \TYPO3\CMS\Core\Cache\Backend\NullBackend::class
                ],
                'cache_phpcode' => [
                    'backend' => \TYPO3\CMS\Core\Cache\Backend\NullBackend::class
                ],
                'cache_runtime' => [
                    'backend' => \TYPO3\CMS\Core\Cache\Backend\TransientMemoryBackend::class
                ],
                'cache_rootline' => [
                    'backend' => \TYPO3\CMS\Core\Cache\Backend\NullBackend::class
                ],
                'cache_imagesizes' => [
                    'backend' => \TYPO3\CMS\Core\Cache\Backend\TransientMemoryBackend::class
                ],
                'l10n' => [
                    'backend' => \TYPO3\CMS\Core\Cache\Backend\TransientMemoryBackend::class
                ],
                'extbase_object' => [
                    'backend' => \TYPO3\CMS\Core\Cache\Backend\TransientMemoryBackend::class
                ],
                'extbase_reflection' => [
                    'backend' => \TYPO3\CMS\Core\Cache\Backend\TransientMemoryBackend::class
                ],
                'extbase_datamapfactory_datamap' => [
                    'backend' => \TYPO3\CMS\Core\Cache\Backend\TransientMemoryBackend::class
                ]
            ]
        ]
    ]
];
