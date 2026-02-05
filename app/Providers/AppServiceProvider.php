<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\src\Domain\Repositories\UserRepositoryInterface;
use App\src\Infrastructure\Persistence\EloquentUserRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
        UserRepositoryInterface::class,
        EloquentUserRepository::class
    );

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
