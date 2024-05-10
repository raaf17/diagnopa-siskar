<?php

namespace App\Providers;

use App\Models\Admin;
use App\Models\Users;
use Illuminate\Support\Facades\Gate;
use Laravel\Sanctum\Sanctum;


use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Sanctum::ignoreMigrations();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('admin', function($admin){
            return $admin instanceof Admin;
        });
        Gate::define('users', function($users){
            return $users instanceof Users;
        });
    }
}
