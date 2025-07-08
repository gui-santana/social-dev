<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL; // <-- GARANTA QUE ESTA LINHA ESTÁ EXATAMENTE ASSIM


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
            URL::forceScheme('https'); // Correção: "https" com um 's' no final
        }
    }
}
