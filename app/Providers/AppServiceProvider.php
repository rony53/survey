<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::define('admin-menu', function (User $user) {
            return $user->role_id == 1;
        });


        Gate::define('regular-manu', function (User $user) {
            return $user->role_id == 2;
        });

        Paginator::useBootstrap();

    }
}
