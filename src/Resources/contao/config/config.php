<?php

// Backend menu
array_insert($GLOBALS['BE_MOD'], array_search('system', array_keys($GLOBALS['BE_MOD'])) + 1, array
(
    'agentur1601com' => [
        'core' => [

        ],
    ]
));


// Hook for backend menu entry
$GLOBALS['TL_HOOKS']['getUserNavigation'][] = ['Agentur1601com\\CoreBundle\\EventListener\\GetUserNavigationListener', '__invoke'];

// Load backend style sheet
if (TL_MODE == "BE") {
    $GLOBALS['TL_CSS'][] = '/bundles/agentur1601comcore/css/be_core_style.css';
}