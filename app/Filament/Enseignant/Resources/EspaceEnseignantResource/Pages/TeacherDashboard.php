<?php

namespace App\Filament\Enseignant\Resources\EspaceEnseignantResource\Pages;

use App\Filament\Enseignant\Resources\EspaceEnseignantResource;
use Filament\Resources\Pages\Page;

class TeacherDashboard extends Page
{
    protected static string $resource = EspaceEnseignantResource::class;
     protected static ?string $navigationLabel = 'Mes enseignements';
    protected static ?string $title = 'Tableau de bord enseignant';
    protected static string $view = 'filament.teacher.pages.dashboard';

    // protected static string $view = 'filament.enseignant.resources.espace-enseignant-resource.pages.teacher-dashboard';
}
