<?php

namespace App\Filament\Resources\CategoryofboatResource\Pages;

use App\Filament\Resources\CategoryofboatResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCategoryofboats extends ListRecords
{
    protected static string $resource = CategoryofboatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
