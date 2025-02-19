<?php

namespace App\Filament\Resources\DaillyActivityResource\Pages;

use App\Filament\Resources\DaillyActivityResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDaillyActivity extends EditRecord
{
    protected static string $resource = DaillyActivityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
