<?php

namespace App\Filament\Resources\AdminDashboardResource\Pages;

namespace App\Filament\Resources\Pages;

use App\Filament\Resources\AdminDashboardResource;
use Filament\Resources\Pages\Page;

class Dashboard extends Page
{
    protected static string $resource = AdminDashboardResource::class;

    // protected static string $view = 'filament.resources.admin-dashboard-resource.pages.dashboard';
    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static string $view = 'filament.pages.dashboard';
    protected static ?string $title = 'Tableau de bord';
}
