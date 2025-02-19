<?php

namespace App\Filament\Resources\DaillyActivityResource\Pages;

use App\Filament\Resources\DaillyActivityResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewDaillyActivity extends ViewRecord
{
    protected static string $resource = DaillyActivityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
