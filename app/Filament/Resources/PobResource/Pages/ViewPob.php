<?php

namespace App\Filament\Resources\PobResource\Pages;

use App\Filament\Resources\PobResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewPob extends ViewRecord
{
    protected static string $resource = PobResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
