<?php

// Ensure /tmp storage directories exist
$tmpDirs = [
    '/tmp/storage',
    '/tmp/storage/app',
    '/tmp/storage/app/public',
    '/tmp/storage/framework',
    '/tmp/storage/framework/cache',
    '/tmp/storage/framework/cache/data',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/framework/views',
    '/tmp/storage/logs',
    '/tmp/bootstrap',
    '/tmp/bootstrap/cache',
];

foreach ($tmpDirs as $dir) {
    if (!is_dir($dir)) {
        @mkdir($dir, 0755, true);
    }
}

// Prepare SQLite database in /tmp
$sourceDb = __DIR__ . '/../database/database.sqlite';
$targetDb = '/tmp/database.sqlite';

if (file_exists($sourceDb) && (!file_exists($targetDb) || filesize($targetDb) === 0)) {
    @copy($sourceDb, $targetDb);
} elseif (!file_exists($targetDb)) {
    @touch($targetDb);
}

// Fallback APP_KEY if not configured
$appKey = getenv('APP_KEY') ?: ($_ENV['APP_KEY'] ?? 'base64:hWwUzPlEF/KFGQuFg0WQkPvnvkVLkqQv17r1rHRiKac=');
putenv('APP_KEY=' . $appKey);
$_ENV['APP_KEY'] = $appKey;
$_SERVER['APP_KEY'] = $appKey;

// Set cache paths to writable /tmp
putenv('APP_PACKAGES_CACHE=/tmp/bootstrap/cache/packages.php');
$_ENV['APP_PACKAGES_CACHE'] = '/tmp/bootstrap/cache/packages.php';
$_SERVER['APP_PACKAGES_CACHE'] = '/tmp/bootstrap/cache/packages.php';

putenv('APP_SERVICES_CACHE=/tmp/bootstrap/cache/services.php');
$_ENV['APP_SERVICES_CACHE'] = '/tmp/bootstrap/cache/services.php';
$_SERVER['APP_SERVICES_CACHE'] = '/tmp/bootstrap/cache/services.php';

putenv('APP_STORAGE=/tmp/storage');
putenv('VIEW_COMPILED_PATH=/tmp/storage/framework/views');
putenv('CACHE_STORE=array');
putenv('SESSION_DRIVER=cookie');
putenv('DB_CONNECTION=sqlite');
putenv('DB_DATABASE=' . $targetDb);

$_ENV['APP_STORAGE'] = '/tmp/storage';
$_ENV['VIEW_COMPILED_PATH'] = '/tmp/storage/framework/views';
$_ENV['CACHE_STORE'] = 'array';
$_ENV['SESSION_DRIVER'] = 'cookie';
$_ENV['DB_CONNECTION'] = 'sqlite';
$_ENV['DB_DATABASE'] = $targetDb;

$_SERVER['APP_STORAGE'] = '/tmp/storage';
$_SERVER['VIEW_COMPILED_PATH'] = '/tmp/storage/framework/views';
$_SERVER['CACHE_STORE'] = 'array';
$_SERVER['SESSION_DRIVER'] = 'cookie';
$_SERVER['DB_CONNECTION'] = 'sqlite';
$_SERVER['DB_DATABASE'] = $targetDb;
$_SERVER['HTTPS'] = 'on';
$_SERVER['SERVER_PORT'] = '443';

// Copy clean packages manifest to /tmp/bootstrap/cache if exists
$cachedPackages = __DIR__ . '/../bootstrap/cache/packages.php';
if (file_exists($cachedPackages)) {
    @copy($cachedPackages, '/tmp/bootstrap/cache/packages.php');
}

require __DIR__ . '/../vendor/autoload.php';

/** @var \Illuminate\Foundation\Application $app */
$app = require __DIR__ . '/../bootstrap/app.php';

$app->useStoragePath('/tmp/storage');

$bootstrappers = [
    \Illuminate\Foundation\Bootstrap\LoadEnvironmentVariables::class,
    \Illuminate\Foundation\Bootstrap\LoadConfiguration::class,
    \Illuminate\Foundation\Bootstrap\HandleExceptions::class,
    \Illuminate\Foundation\Bootstrap\RegisterFacades::class,
    \Illuminate\Foundation\Bootstrap\RegisterProviders::class,
    \Illuminate\Foundation\Bootstrap\BootProviders::class,
];

$app->bootstrapWith($bootstrappers);

$request = \Illuminate\Http\Request::capture();
$kernel = $app->make(\Illuminate\Contracts\Http\Kernel::class);
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);
