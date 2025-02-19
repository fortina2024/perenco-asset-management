<?php

namespace App\Filament\Resources\WeatherConditionsResource\Pages;

use App\Filament\Resources\WeatherConditionsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWeatherConditions extends ListRecords
{
    protected static string $resource = WeatherConditionsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
