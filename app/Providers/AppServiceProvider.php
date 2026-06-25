<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Livewire\Features\SupportFileUploads\FileUploadController;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Nonaktifkan middleware bermasalah khusus untuk file upload Livewire di Vercel
        if (isset($_SERVER['VERCEL_HOSTNAME']) || env('APP_ENV') === 'production') {
            FileUploadController::$middleware = ['web']; // Menghapus middleware 'signed' bawaan jika bermasalah
        }
    }
}