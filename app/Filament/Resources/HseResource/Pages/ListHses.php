<?php

namespace App\Filament\Resources\HseResource\Pages;

use App\Filament\Resources\HseResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHses extends ListRecords
{
    protected static string $resource = HseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
