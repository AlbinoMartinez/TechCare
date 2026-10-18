<?php

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

if (file_exists($sourceDb) && !file_exists($targetDb)) {
    @copy($sourceDb, $targetDb);
} elseif (!file_exists($targetDb)) {
    @touch($targetDb);
}

// 3. Set environment variables for serverless runtime
putenv('APP_STORAGE=/tmp/storage');
putenv('VIEW_COMPILED_PATH=/tmp/storage/framework/views');
putenv('CACHE_STORE=file');
putenv('SESSION_DRIVER=cookie');
putenv('DB_CONNECTION=sqlite');
putenv('DB_DATABASE=' . $targetDb);

$_ENV['APP_STORAGE'] = '/tmp/storage';
$_ENV['VIEW_COMPILED_PATH'] = '/tmp/storage/framework/views';
$_ENV['CACHE_STORE'] = 'file';
$_ENV['SESSION_DRIVER'] = 'cookie';
$_ENV['DB_CONNECTION'] = 'sqlite';
$_ENV['DB_DATABASE'] = $targetDb;

$_SERVER['APP_STORAGE'] = '/tmp/storage';
$_SERVER['VIEW_COMPILED_PATH'] = '/tmp/storage/framework/views';
$_SERVER['CACHE_STORE'] = 'file';
$_SERVER['SESSION_DRIVER'] = 'cookie';
$_SERVER['DB_CONNECTION'] = 'sqlite';
$_SERVER['DB_DATABASE'] = $targetDb;

// 4. Require Laravel's standard front controller
require __DIR__ . '/../public/index.php';
