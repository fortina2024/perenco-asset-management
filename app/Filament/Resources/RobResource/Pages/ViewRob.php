<?php

namespace App\Filament\Resources\RobResource\Pages;

use App\Filament\Resources\RobResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewRob extends ViewRecord
{
    protected static string $resource = RobResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
