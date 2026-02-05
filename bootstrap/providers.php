<?php

return [
    App\Providers\AppServiceProvider::class,
    App\Providers\Filament\AdminPanelProvider::class,
    App\Providers\Filament\EnseignantPanelProvider::class,
    App\Providers\RepositoryServiceProvider::class,
    App\src\Infrastructure\Providers\TeachingServiceProvider::class,
    App\src\Infrastructure\Providers\EnseignantPanelProvider::class,
];
