<?php

namespace App\Filament\Resources\ActivityofboatResource\Pages;

use App\Filament\Resources\ActivityofboatResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListActivityofboats extends ListRecords
{
    protected static string $resource = ActivityofboatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
