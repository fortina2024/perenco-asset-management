<?php

namespace App\Filament\Resources\RobResource\Pages;

use App\Filament\Resources\RobResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateRob extends CreateRecord
{
    protected static string $resource = RobResource::class;
    
    protected function getFormActions(): array
    {
        // Retourne un tableau vide pour cacher toutes les actions par défaut
        return [
        ];
    }
}
