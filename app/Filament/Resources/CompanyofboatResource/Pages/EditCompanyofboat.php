<?php

namespace App\Filament\Resources\CompanyofboatResource\Pages;

use App\Filament\Resources\CompanyofboatResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCompanyofboat extends EditRecord
{
    protected static string $resource = CompanyofboatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
