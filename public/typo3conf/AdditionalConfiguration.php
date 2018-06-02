<?php
defined('TYPO3_MODE') || die();
defined('BASE_DIR') || die();

call_user_func(function() {
    $GLOBALS['TYPO3_CONF_VARS'] = array_replace_recursive(
        $GLOBALS['TYPO3_CONF_VARS'],
        require BASE_DIR . '/config/' . strtolower(str_replace('/', '-', getenv('TYPO3_CONTEXT'))) . '/config.php'
    );
});
