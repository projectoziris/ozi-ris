<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\Role;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Binding Role Model jika dipanggil melalui Container
        $this->app->bind('role', function () {
            return new Role();
        });

        // Bisa juga menggunakan singleton jika Role sebaiknya dibuat hanya sekali
        // $this->app->singleton(Role::class, function () {
        //     return new Role();
        // });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Menggunakan Bootstrap untuk Pagination
        Paginator::useBootstrap();
    }
}
