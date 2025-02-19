<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HseResource\Pages;
use App\Filament\Resources\HseResource\RelationManagers;
use App\Models\Hse;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HseResource extends Resource
{
    protected static ?string $model = Hse::class;

    protected static ?string $navigationIcon = 'heroicon-o-chevron-right';

    protected static ?string $navigationGroup = 'Logs report of boats';

    protected static ?int $navigationSort = 6;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('injury')
                    ->numeric(),
                Forms\Components\TextInput::make('sea_state')
                    ->numeric(),
                Forms\Components\TextInput::make('pollution')
                    ->numeric(),
                Forms\Components\TextInput::make('damage')
                    ->numeric(),
                Forms\Components\TextInput::make('near_miss')
                    ->numeric(),
                Forms\Components\TextInput::make('illness')
                    ->numeric(),
                Forms\Components\TextInput::make('permit_to_work')
                    ->numeric(),
                Forms\Components\TextInput::make('drill')
                    ->numeric(),
                Forms\Components\TextInput::make('safety_meeting')
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('injury')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('sea_state')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('pollution')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('damage')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('near_miss')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('illness')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('permit_to_work')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('drill')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('safety_meeting')
                    ->numeric()
                    ->sortable(),
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
            'index' => Pages\ListHses::route('/'),
            'create' => Pages\CreateHse::route('/create'),
            'view' => Pages\ViewHse::route('/{record}'),
            'edit' => Pages\EditHse::route('/{record}/edit'),
        ];
    }
}
