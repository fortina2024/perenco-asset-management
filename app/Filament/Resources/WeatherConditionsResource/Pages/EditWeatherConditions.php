<?php

namespace App\Filament\Resources\WeatherConditionsResource\Pages;

use App\Filament\Resources\WeatherConditionsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWeatherConditions extends EditRecord
{
    protected static string $resource = WeatherConditionsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
