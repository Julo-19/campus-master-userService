<?php

namespace App\Filament\Enseignant\Resources\TeachingResource\Pages;

use App\Filament\Enseignant\Resources\TeachingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTeaching extends EditRecord
{
    protected static string $resource = TeachingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
