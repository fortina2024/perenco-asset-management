<?php

namespace App\Filament\Resources\RhcResource\Pages;

use App\Filament\Resources\RhcResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewRhc extends ViewRecord
{
    protected static string $resource = RhcResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
