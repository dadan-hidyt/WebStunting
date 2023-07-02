<?php

namespace App\Providers;

use App\Services\PengukuranIbuHamil;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind('PengukuranIbuHamilService',function(){
            return new PengukuranIbuHamil();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
      
    }
}
