<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        App\Providers\FilamentServiceProvider::class;
        ShuvroRoy\FilamentSpatieLaravelBackup\FilamentSpatieLaravelBackupServiceProvider::class;


    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
