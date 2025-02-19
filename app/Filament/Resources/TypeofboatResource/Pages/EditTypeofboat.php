<?php

namespace App\Filament\Resources\TypeofboatResource\Pages;

use App\Filament\Resources\TypeofboatResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTypeofboat extends EditRecord
{
    protected static string $resource = TypeofboatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
