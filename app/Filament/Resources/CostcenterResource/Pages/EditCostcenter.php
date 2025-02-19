<?php

namespace App\Filament\Resources\CostcenterResource\Pages;

use App\Filament\Resources\CostcenterResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCostcenter extends EditRecord
{
    protected static string $resource = CostcenterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
