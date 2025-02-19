<?php

namespace App\Filament\Resources\EquipageResource\Pages;

use App\Filament\Resources\EquipageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEquipages extends ListRecords
{
    protected static string $resource = EquipageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
