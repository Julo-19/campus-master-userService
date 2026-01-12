<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Filament\Resources\AdminDashboardResource\Pages\Dashboard;
use Filament\Facades\Filament;


class FilamentServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Filament::serving(function () {

            Filament::registerPages([
                Dashboard::class,
            ]);

            // Optionnel : rediriger le login vers ton dashboard
            // Filament::registerHomeRoute(Dashboard::getUrl());
        });
    }

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }
}
