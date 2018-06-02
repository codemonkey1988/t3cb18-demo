<?php

return array_replace_recursive(
    include dirname(__DIR__) . '/production/config.php',
    include __DIR__ . '/cache.php',
    [
        'SYS' => [
            'displayErrors' => 1,
            'devIPmask' => '*',
            'sqlDebug' => 1,
            'enableDeprecationLog' => 'file'
        ],
        'BE' => [
            'debug' => true,
            'sessionTimeout' => 31536000,
            'enabledBeUserIPLock' => false,
            'versionNumberInFilename' => '0',
            'lockSSL' => false
        ],
        'FE' => [
            'debug' => 'true',
            'compressionLevel' => 0,
            'versionNumberInFilename' => ''
        ],
        'MAIL' => [
            // Every mail will be redirected into MailHog
            'transport' => 'mail',
        ]
    ]
);
