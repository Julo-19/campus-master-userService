<?php

namespace App\Filament\Enseignant\Resources\TeachingResource\Pages;

use App\Filament\Enseignant\Resources\TeachingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTeachings extends ListRecords
{
    protected static string $resource = TeachingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
