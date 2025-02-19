<?php

namespace App\Filament\Resources\RobResource\Pages;

use App\Filament\Resources\RobResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRob extends EditRecord
{
    protected static string $resource = RobResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
