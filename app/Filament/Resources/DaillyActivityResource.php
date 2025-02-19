<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DaillyActivityResource\Pages;
use App\Filament\Resources\DaillyActivityResource\RelationManagers;
use App\Models\DaillyActivity;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DaillyActivityResource extends Resource
{
    protected static ?string $model = DaillyActivity::class;

    protected static ?string $navigationIcon = 'heroicon-o-chevron-right';

    protected static ?string $navigationGroup = 'Logs report of boats';

    protected static ?int $navigationSort = 8;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('details')
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
                Tables\Columns\TextColumn::make('details')
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
            'index' => Pages\ListDaillyActivities::route('/'),
            'create' => Pages\CreateDaillyActivity::route('/create'),
            'view' => Pages\ViewDaillyActivity::route('/{record}'),
            'edit' => Pages\EditDaillyActivity::route('/{record}/edit'),
        ];
    }
}
