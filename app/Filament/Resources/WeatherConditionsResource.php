<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WeatherConditionsResource\Pages;
use App\Filament\Resources\WeatherConditionsResource\RelationManagers;
use App\Models\WeatherConditions;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WeatherConditionsResource extends Resource
{
    protected static ?string $model = WeatherConditions::class;

    protected static ?string $navigationIcon = 'heroicon-o-chevron-right';

    protected static ?string $navigationGroup = 'Logs report of boats';

    protected static ?int $navigationSort = 6;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('weather')
                    ->maxLength(255),
                Forms\Components\TextInput::make('sea_state')
                    ->maxLength(255),
                Forms\Components\TextInput::make('wind_dir')
                    ->numeric(),
                Forms\Components\TextInput::make('wind_force')
                    ->numeric(),
                Forms\Components\TextInput::make('current_dir')
                    ->numeric(),
                Forms\Components\TextInput::make('current_speed')
                    ->numeric(),
                Forms\Components\TextInput::make('visibility')
                    ->maxLength(255),
                Forms\Components\TextInput::make('voyage_id')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('weather')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sea_state')
                    ->searchable(),
                Tables\Columns\TextColumn::make('wind_dir')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('wind_force')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('current_dir')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('current_speed')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('visibility')
                    ->searchable(),
                Tables\Columns\TextColumn::make('voyage_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListWeatherConditions::route('/'),
            'create' => Pages\CreateWeatherConditions::route('/create'),
            'view' => Pages\ViewWeatherConditions::route('/{record}'),
            'edit' => Pages\EditWeatherConditions::route('/{record}/edit'),
        ];
    }

    public static function shouldRegisterNavigation(): bool
    {
        return false; // Supprime "Weather condition" de la sidebar
    }
}
