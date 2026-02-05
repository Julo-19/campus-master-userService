<?php

namespace App\src\Infrastructure\Providers;

use Illuminate\Support\ServiceProvider;
use App\src\Domain\Repositories\TeachingRepositoryInterface;
use App\src\Infrastructure\Persistence\TeachingRepository;

class TeachingServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            TeachingRepositoryInterface::class,
            TeachingRepository::class
        );
    }
}
