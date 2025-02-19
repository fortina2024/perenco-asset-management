<?php

namespace App\Filament\Resources\DaillyActivityResource\Pages;

use App\Filament\Resources\DaillyActivityResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDaillyActivities extends ListRecords
{
    protected static string $resource = DaillyActivityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
