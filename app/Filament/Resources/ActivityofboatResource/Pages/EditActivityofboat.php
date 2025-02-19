<?php

namespace App\Filament\Resources\ActivityofboatResource\Pages;

use App\Filament\Resources\ActivityofboatResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditActivityofboat extends EditRecord
{
    protected static string $resource = ActivityofboatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
