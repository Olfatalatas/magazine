<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

// Deteksi apakah aplikasi berjalan di serverless Vercel
if (isset($_SERVER['VERCEL_HOSTNAME']) || env('APP_ENV') === 'production') {
    // Paksa Laravel menggunakan folder /tmp yang writable oleh Vercel
    $storagePath = '/tmp/storage';

    if (!is_dir($storagePath)) {
        mkdir($storagePath, 0755, true);
        mkdir($storagePath . '/logs', 0755, true);
        mkdir($storagePath . '/framework/views', 0755, true);
        mkdir($storagePath . '/framework/cache', 0755, true);
        mkdir($storagePath . '/framework/sessions', 0755, true);
    }

    // Override path bawaan bootstrap cache
    $_ENV['APP_BASE_PATH'] = dirname(__DIR__);
    config(['bootstrap.cache' => '/tmp/bootstrap/cache']);

    // Buat folder bootstrap cache di /tmp jika belum ada
    if (!is_dir('/tmp/bootstrap/cache')) {
        mkdir('/tmp/bootstrap/cache', 0755, true);
    }
}

$app = Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();

// Binding ulang alamat folder storage setelah aplikasi di-create
if (isset($_SERVER['VERCEL_HOSTNAME']) || env('APP_ENV') === 'production') {
    $app->useStoragePath('/tmp/storage');
}

return $app;