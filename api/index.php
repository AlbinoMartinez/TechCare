<?php

// Custom error & exception handler to immediately expose serverless errors
set_exception_handler(function (\Throwable $e) {
    http_response_code(500);
    header('Content-Type: text/html; charset=utf-8');
    echo "<div style='font-family: monospace; padding: 20px; background: #fff0f0; border: 2px solid red;'>";
    echo "<h2>SERVERLESS BOOTSTRAP EXCEPTION:</h2>";
    echo "<p style='color: red; font-size: 18px;'><b>" . htmlspecialchars($e->getMessage()) . "</b></p>";
    echo "<p><b>File:</b> " . htmlspecialchars($e->getFile()) . " : line " . $e->getLine() . "</p>";
    echo "<hr><pre>" . htmlspecialchars($e->getTraceAsString()) . "</pre>";
    echo "</div>";
    exit(1);
});

// 1. Prepare temporary storage directory in /tmp for Vercel Serverless environment
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

// 2. Prepare writable SQLite database in /tmp
$sourceDb = __DIR__ . '/../database/database.sqlite';
$targetDb = '/tmp/database.sqlite';

if (file_exists($sourceDb) && (!file_exists($targetDb) || filesize($targetDb) === 0)) {
    @copy($sourceDb, $targetDb);
} elseif (!file_exists($targetDb)) {
    @touch($targetDb);
}

// 3. Fallback APP_KEY if not configured in environment
$appKey = getenv('APP_KEY') ?: ($_ENV['APP_KEY'] ?? 'base64:hWwUzPlEF/KFGQuFg0WQkPvnvkVLkqQv17r1rHRiKac=');
putenv('APP_KEY=' . $appKey);
$_ENV['APP_KEY'] = $appKey;
$_SERVER['APP_KEY'] = $appKey;

// 4. Temporarily enable debug to diagnose exact 500 error cause
putenv('APP_DEBUG=true');
$_ENV['APP_DEBUG'] = 'true';
$_SERVER['APP_DEBUG'] = 'true';

// 5. Set environment variables for serverless runtime
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

// Copy cached packages and services to /tmp/bootstrap/cache if needed
$cachedPackages = __DIR__ . '/../bootstrap/cache/packages.php';
if (file_exists($cachedPackages) && !file_exists('/tmp/bootstrap/cache/packages.php')) {
    @copy($cachedPackages, '/tmp/bootstrap/cache/packages.php');
}
$cachedServices = __DIR__ . '/../bootstrap/cache/services.php';
if (file_exists($cachedServices) && !file_exists('/tmp/bootstrap/cache/services.php')) {
    @copy($cachedServices, '/tmp/bootstrap/cache/services.php');
}

// 6. Require Laravel front controller
require __DIR__ . '/../public/index.php';
