<?php

namespace App\Filament\Resources\PobResource\Pages;

use App\Filament\Resources\PobResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPob extends EditRecord
{
    protected static string $resource = PobResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
