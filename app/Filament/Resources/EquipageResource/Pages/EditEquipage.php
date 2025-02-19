<?php

namespace App\Filament\Resources\EquipageResource\Pages;

use App\Filament\Resources\EquipageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEquipage extends EditRecord
{
    protected static string $resource = EquipageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
