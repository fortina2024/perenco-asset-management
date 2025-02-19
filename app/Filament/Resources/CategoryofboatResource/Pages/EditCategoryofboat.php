<?php

namespace App\Filament\Resources\CategoryofboatResource\Pages;

use App\Filament\Resources\CategoryofboatResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCategoryofboat extends EditRecord
{
    protected static string $resource = CategoryofboatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
