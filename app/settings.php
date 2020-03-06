<?php
declare(strict_types=1);

use DI\ContainerBuilder;
use Monolog\Logger;

define('APP_ROOT', __DIR__ . '/..');

return function (ContainerBuilder $containerBuilder) {
    // Global Settings Object
    $containerBuilder->addDefinitions([
        'settings' => [
            'displayErrorDetails' => true, // Should be set to false in production
            'logger' => [
                'name' => 'slim-app',
                'path' => isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../logs/app.log',
                'level' => Logger::DEBUG,
            ],
            'doctrine' => [
                // if true, metadata caching is forcefully disabled
                'dev_mode' => true,
    
                // path where the compiled metadata info will be cached
                // make sure the path exists and it is writable
                'cache_dir' => APP_ROOT . '/var/cache/doctrine',
    
                // you should add any other path containing annotated entity classes
                'metadata_dirs' => [APP_ROOT . '/src/Domain'],
    
                'connection' => [
                    'driver' => 'pdo_pgsql',
                    'host' => 'postgres',
                    'port' => 5432,
                    'dbname' => 'postgres',
                    'user' => 'postgres',
                    'password' => '123',
                    'charset' => 'utf-8'
                ]
            ]
        ],
    ]);
};
