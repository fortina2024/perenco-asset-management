<?php

namespace App\Filament\Resources\RobResource\Pages;

use App\Filament\Resources\RobResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRobs extends ListRecords
{
    protected static string $resource = RobResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
