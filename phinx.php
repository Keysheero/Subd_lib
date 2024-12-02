<?php

return
[
    'paths' => [
        'migrations' => 'src/internal/infrastructure/database/migrations',
        'seeds' => ''
    ],
    'environments' => [
        'default_migration_table' => 'phinxlog',
        'default_environment' => 'development',
        'production' => [
            'adapter' => 'mysql',
            'host' => 'localhost',
            'name' => 'production_db',
            'user' => 'root',
            'pass' => '',
            'port' => '3306',
            'charset' => 'utf8',
        ],
        'development' => [
            'adapter' => 'pgsql',
            'host' => 'localhost',
            'name' => 'GrandPrixPG',
            'user' => 'keysheero',
            'pass' => 'keysheero_db',
            'port' => '5444',
            'charset' => 'utf8',
        ],
        'testing' => [
            'adapter' => 'postgresql',
            'host' => 'localhost',
            'name' => 'GrandPrixPG',
            'user' => 'keysheero',
            'pass' => 'keysheero_db',
            'port' => '5444',
            'charset' => 'utf8',
        ]
    ],
    'version_order' => 'creation'
];
