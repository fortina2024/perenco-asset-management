<?php

namespace App\Filament\Resources\HseResource\Pages;

use App\Filament\Resources\HseResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHse extends EditRecord
{
    protected static string $resource = HseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
