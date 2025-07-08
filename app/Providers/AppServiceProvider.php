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
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {        
        // Força o uso de HTTPS em ambiente de produção
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }
    }
}
