<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use App\src\Infrastructure\Persistence\User;
use Illuminate\Support\Facades\Http;

class AdminOverview extends StatsOverviewWidget
{
    protected ?string $heading = 'Statistiques Admin';

    protected function getCards(): array
    {
        return [

            // Total utilisateurs
            Card::make('Total Utilisateurs', User::count())
                ->description('Nombre total d’utilisateurs')
                ->color('success'),

            // Utilisateurs actifs (status = active)
            Card::make('Utilisateurs Actifs', User::where('status', 'active')->count())
                ->description('Utilisateurs avec status actif')
                ->color('primary'),
             
            // Étudiants
            Card::make('Étudiants', User::where('role', 'student')->count())
                ->description('Nombre total d’étudiants')
                ->color('primary'),

            // Enseignants
            Card::make('Enseignants', User::where('role', 'teacher')->count())
                ->description('Nombre total d’enseignants')
                ->color('warning'),

            // ✅ Users en attente
            Card::make('En attente', User::where('status', 'pending')->count())
                ->description('Comptes en attente de validation')
                ->color('secondary'),

            Card::make('Actifs', User::where('status', 'active')->count())
                ->color('success'),


            // Nombre de cours depuis le microservice sur le port 8001
            Card::make('Cours', function () {
                try {
                    $response = Http::timeout(5)->get('http://127.0.0.1:8001/api/courses/count');
                    
                    if ($response->successful()) {
                        return $response->json('count');
                    }
                } catch (\Exception $e) {
                    return 'N/A';
                }

                return 'N/A';
            })
            ->description('Nombre total de cours')
            ->color('info'),
        ];
    }
}
