<?php
return [
    'settings' => [
        // Slim Settings
        'determineRouteBeforeAppMiddleware' => false,
        'displayErrorDetails' => true,
        'db' => [
            'driver' => 'mysql',
            'host' => 'localhost',
            'database' => 'project_manager_app',
            'username' => 'root',
            'password' => '',
            'charset'   => 'utf8mb4_bin',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ]
    ],
];
?>