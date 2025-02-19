<?php

namespace App\Filament\Resources\RhcResource\Pages;

use App\Filament\Resources\RhcResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRhc extends EditRecord
{
    protected static string $resource = RhcResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
