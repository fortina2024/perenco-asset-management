<?php

namespace App\Filament\Resources\ChampofboatResource\Pages;

use App\Filament\Resources\ChampofboatResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditChampofboat extends EditRecord
{
    protected static string $resource = ChampofboatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
