<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class EnseignantPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('enseignant')
            ->path('enseignant')
            ->login() // ✅ CRÉE /enseignant/login
            ->colors([
                'primary' => Color::Amber,
            ])

            // 📦 Ressources Enseignant
            ->discoverResources(
                in: app_path('Filament/Enseignant/Resources'),
                for: 'App\\Filament\\Enseignant\\Resources'
            )

            // 📄 Pages Enseignant
            ->discoverPages(
                in: app_path('Filament/Enseignant/Pages'),
                for: 'App\\Filament\\Enseignant\\Pages'
            )

            // 📊 Widgets
            ->discoverWidgets(
                in: app_path('Filament/Enseignant/Widgets'),
                for: 'App\\Filament\\Enseignant\\Widgets'
            )

            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
            ])

            // 🔐 Middleware standard Filament
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])

            // 🔑 Auth Filament
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
