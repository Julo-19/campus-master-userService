<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\src\Domain\Repositories\UserRepositoryInterface;
use App\src\Infrastructure\Persistence\EloquentUserRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            UserRepositoryInterface::class,
            EloquentUserRepository::class
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
