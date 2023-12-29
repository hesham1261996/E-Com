<?php

namespace App\Providers;

use App\Http\viewComposer\CategoryComposer;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades;
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
        Facades\View::composer('layouts.main' ,CategoryComposer::class);
    }
}
