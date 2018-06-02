<?php

return array_replace_recursive(
    require __DIR__ . '/env.php',
    require __DIR__ . '/routing.php'
);
