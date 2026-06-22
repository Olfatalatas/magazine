<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// 1. Trik Environment khusus untuk Serverless Vercel
if (isset($_SERVER['VERCEL_HOSTNAME']) || isset($_ENV['VERCEL_HOSTNAME'])) {
    $storagePath = '/tmp/storage';
    
    // Buat folder-folder writable yang dibutuhkan di dalam /tmp jika belum ada
    if (!is_dir($storagePath)) {
        mkdir($storagePath, 0755, true);
        mkdir($storagePath . '/logs', 0755, true);
        mkdir($storagePath . '/framework/views', 0755, true);
        mkdir($storagePath . '/framework/cache', 0755, true);
        mkdir($storagePath . '/framework/cache/data', 0755, true);
        mkdir($storagePath . '/framework/sessions', 0755, true);
        mkdir('/tmp/bootstrap/cache', 0755, true);
    }

    // Bind paths ke environment PHP
    putenv("APP_STORAGE={$storagePath}");
    putenv("VIEW_COMPILED_PATH={$storagePath}/framework/views");
    
    // Inisialisasi dasar agar root app dikenali oleh trik Stack Overflow
    $_ENV['APP_BASE_PATH'] = dirname(__DIR__);
}

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require __DIR__.'/../vendor/autoload.php';

// 2. Bootstrap Laravel dengan menangkap instance aplikasinya terlebih dahulu
$app = require_once __DIR__.'/../bootstrap/app.php';

// 3. Jika berjalan di Vercel, paksa override lokasi storage dan bootstrap cache path ke /tmp
if (isset($_SERVER['VERCEL_HOSTNAME']) || isset($_ENV['VERCEL_HOSTNAME'])) {
    $app->useStoragePath('/tmp/storage');
    $app->useBootstrapCachePath('/tmp/bootstrap/cache'); // <--- Solusi Inti Stack Overflow Anda!
}

// 4. Jalankan request handling menggunakan instance yang sudah dimodifikasi
$app->handleRequest(Request::capture());