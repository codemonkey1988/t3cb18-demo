<?php

return [
    'DB' => [
        'Connections' => [
            'Default' => [
                'dbname' => getenv('TYPO3_INSTALL_DB_DBNAME'),
                'driver' => getenv('TYPO3_INSTALL_DB_DRIVER'),
                'host' => getenv('TYPO3_INSTALL_DB_HOST'),
                'password' => getenv('TYPO3_INSTALL_DB_PASSWORD'),
                'port' => getenv('TYPO3_INSTALL_DB_PORT'),
                'unix_socket' => '',
                'user' => getenv('TYPO3_INSTALL_DB_USER'),
            ],
        ]
    ],
    'GFX' => [
        'processor' => 'GraphicsMagick',
        'processor_effects' => -1,
        'processor_path' => getenv('TYPO3_GFX_PROCESSOR_PATH'),
        'processor_path_lzw' => getenv('TYPO3_GFX_PROCESSOR_PATH')
    ],
    'SYS' => [
        'encryptionKey' => getenv('TYPO3_ENCRYPTION_KEY'),
        'sitename' => getenv('TYPO3_INSTALL_SITE_NAME')
    ],
    'BE' => [
        'installToolPassword' => getenv('TYPO3_INSTALL_TOOL_PASSWORD')
    ]
];
