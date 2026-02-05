<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\src\Infrastructure\Persistence\User;

class UsersByStatusChart extends ChartWidget
{
    protected static ?string $heading = 'Répartition par statut';
    protected string|int|array $columnSpan = 1;

    protected function getType(): string
    {
        return 'doughnut'; 
    }

    protected function getData(): array
    {
        return [
            'labels' => ['En attente', 'Actifs', 'Rejetés'],
            'datasets' => [
                [
                    'label' => 'Utilisateurs',
                    'data' => [
                        User::where('status', 'pending')->count(),
                        User::where('status', 'active')->count(),
                        User::where('status', 'rejected')->count(),
                    ],
                    'backgroundColor' => ['#3B82F6', '#FACC15', '#EF4444'], // 🔵🟡🔴
                    'borderColor' => ['#1D4ED8', '#CA8A04', '#B91C1C'],
                ],
            ],
        ];
    }
}
