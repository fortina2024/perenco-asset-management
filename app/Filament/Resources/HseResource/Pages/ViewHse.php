<?php

namespace App\Filament\Resources\HseResource\Pages;

use App\Filament\Resources\HseResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewHse extends ViewRecord
{
    protected static string $resource = HseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
