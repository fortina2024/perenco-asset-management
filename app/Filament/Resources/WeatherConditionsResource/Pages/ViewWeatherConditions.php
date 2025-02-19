<?php

namespace App\Filament\Resources\WeatherConditionsResource\Pages;

use App\Filament\Resources\WeatherConditionsResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewWeatherConditions extends ViewRecord
{
    protected static string $resource = WeatherConditionsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
