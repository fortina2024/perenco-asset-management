<?php

namespace App\Filament\Resources\ChampofboatResource\Pages;

use App\Filament\Resources\ChampofboatResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListChampofboats extends ListRecords
{
    protected static string $resource = ChampofboatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
