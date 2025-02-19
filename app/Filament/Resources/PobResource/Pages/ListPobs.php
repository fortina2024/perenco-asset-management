<?php

namespace App\Filament\Resources\PobResource\Pages;

use App\Filament\Resources\PobResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPobs extends ListRecords
{
    protected static string $resource = PobResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
