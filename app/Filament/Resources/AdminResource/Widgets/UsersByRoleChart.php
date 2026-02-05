<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\src\Infrastructure\Persistence\User;

class UsersByRoleChart extends ChartWidget
{
    protected static ?string $heading = 'Répartition par rôle';
    protected string|int|array $columnSpan = 1;

    protected function getType(): string
    {
        return 'bar';
    }

    protected function getData(): array
    {
        return [
            'labels' => ['Étudiants', 'Enseignants', 'Admins'],
            'datasets' => [
                [
                    'label' => 'Utilisateurs',
                    'data' => [
                        User::where('role', 'student')->count(),
                        User::where('role', 'teacher')->count(),
                        User::where('role', 'admin')->count(),
                    ],
                    'backgroundColor' => ['#3B82F6', '#FACC15', '#EF4444'],
                    'borderColor' => ['#1D4ED8', '#CA8A04', '#B91C1C'],
                ],
            ],
        ];
    }
}
