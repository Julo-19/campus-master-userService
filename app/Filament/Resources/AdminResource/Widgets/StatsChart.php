<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\src\Infrastructure\Persistence\User;

class StatsChart extends ChartWidget
{
    protected static ?string $heading = 'Répartition des utilisateurs par rôle';

    protected function getType(): string
    {
        // return 'doughnut';
        return 'bar';
    }

    protected function getData(): array
    {
        return [
            'labels' => ['Étudiants', 'Enseignants', 'Etudiants en attente'],
            'datasets' => [
                [
                    'label' => 'Nombre d’utilisateurs',
                    'data' => [
                        User::where('role', 'student')->count(),
                        User::where('role', 'teacher')->count(),
                        User::where('status', 'pending')->count(),
                    ],

                    'backgroundColor' => ['#3B82F6', '#FACC15', '#EF4444'],
                    'borderColor' => ['#1D4ED8', '#CA8A04', '#B91C1C'],
                ],
            ],
        ];
        
    }
}
