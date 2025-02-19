<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RhcResource\Pages;
use App\Filament\Resources\RhcResource\RelationManagers;
use App\Models\Rhc;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RhcResource extends Resource
{
    protected static ?string $model = Rhc::class;

    protected static ?string $navigationIcon = 'heroicon-o-chevron-right';

    protected static ?string $navigationGroup = 'Logs report of boats';

    protected static ?int $navigationSort = 8;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('machinery')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('disponibility')
                    ->maxLength(255),
                Forms\Components\TextInput::make('jourj_1')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('jourj')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('rh')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('stby')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('am')
                    ->numeric(),
                Forms\Components\TextInput::make('pm')
                    ->numeric(),
                Forms\Components\TextInput::make('voyage_id')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('machinery')
                    ->searchable(),
                Tables\Columns\TextColumn::make('disponibility')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jourj_1')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('jourj')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('rh')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('stby')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('am')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('pm')
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
            'index' => Pages\ListRhcs::route('/'),
            'create' => Pages\CreateRhc::route('/create'),
            'view' => Pages\ViewRhc::route('/{record}'),
            'edit' => Pages\EditRhc::route('/{record}/edit'),
        ];
    }
}
