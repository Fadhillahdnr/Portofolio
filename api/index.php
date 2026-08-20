<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Vercel's deployment filesystem is read-only. Laravel's generated runtime
// files must live in the writable /tmp directory for every function instance.
$runtimePaths = [
    'APP_CONFIG_CACHE' => '/tmp/laravel/config.php',
    'APP_EVENTS_CACHE' => '/tmp/laravel/events.php',
    'APP_PACKAGES_CACHE' => '/tmp/laravel/packages.php',
    'APP_ROUTES_CACHE' => '/tmp/laravel/routes.php',
    'APP_SERVICES_CACHE' => '/tmp/laravel/services.php',
    'VIEW_COMPILED_PATH' => '/tmp/laravel/views',
];

foreach ($runtimePaths as $key => $fallback) {
    $path = getenv($key) ?: $fallback;
    $directory = $key === 'VIEW_COMPILED_PATH' ? $path : dirname($path);

    if (! is_dir($directory)) {
        mkdir($directory, 0775, true);
    }

    putenv("{$key}={$path}");
    $_ENV[$key] = $path;
    $_SERVER[$key] = $path;
}

if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

require __DIR__.'/../vendor/autoload.php';

/** @var Application $app */
$app = require_once __DIR__.'/../bootstrap/app.php';
$app->handleRequest(Request::capture());
