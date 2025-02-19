<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OperationResource\Pages;
use App\Filament\Resources\OperationResource\RelationManagers;
use App\Models\Operation;
use Filament\Forms;
use Filament\Forms\Components\Actions;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OperationResource extends Resource
{
    protected static ?string $model = Operation::class;

    protected static ?string $navigationIcon = 'heroicon-o-chevron-right';

    protected static ?string $navigationGroup = 'Logs report of boats';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\Section::make('')
        ->description('')
            ->schema([
                Forms\Components\TimePicker::make('from')
                    ->seconds(false)
                    ->live()
                    ->required(),
                Forms\Components\TimePicker::make('to')
                    ->seconds(false)
                    ->live()
                    ->required(),
                Forms\Components\TimePicker::make('time')
                    ->seconds(false)
                    ->disabled() // Désactivé pour éviter la modification manuelle
                    ->live() // Permet la mise à jour automatique
                    ->dehydrated() // Permet d'envoyer la valeur au backend
                    ->afterStateUpdated(fn ($state, callable $set, callable $get) => self::calculateDuration($set, $get)),
                Forms\Components\Select::make('activity')
                    ->relationship(name: 'activityofboat', titleAttribute: 'nom')
                    ->default($temporaryData['activityofboat'] ?? null)
                    ->label('Activity')
                    ->searchable()
                    ->preload()
                    ->required(),
                    Forms\Components\Select::make('champ')
                    ->relationship(name: 'champofboat', titleAttribute: 'nom')
                    ->default($temporaryData['champofboat'] ?? null)
                    ->label('Champ')
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\TextInput::make('detail')
                    ->maxLength(255),

                    ])->columns(6),
                Actions::make([
                    Action::make('Retour')
                    ->icon('heroicon-m-chevron-left')
                    ->label('Retour')
                    ->action(function (array $data) {
                        return redirect()->route('voyages.create');
                    })
                    ->requiresConfirmation(),
                    Action::make('Valider')
                    ->icon('heroicon-m-chevron-right')
                    ->color('success')
                    ->action('submitAndRedirect')
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('from'),
                Tables\Columns\TextColumn::make('to'),
                Tables\Columns\TextColumn::make('time'),
                Tables\Columns\TextColumn::make('activity'),
                Tables\Columns\TextColumn::make('champ')
                    ->searchable(),
                Tables\Columns\TextColumn::make('detail')
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
            'index' => Pages\ListOperations::route('/'),
            'create' => Pages\CreateOperation::route('/create'),
            'view' => Pages\ViewOperation::route('/{record}'),
            'edit' => Pages\EditOperation::route('/{record}/edit'),
        ];
    }

    public static function calculateDuration(callable $set, callable $get): void
    {
        $from = $get('from'); // Heure de départ
        $to = $get('to'); // Heure d'arrivée

        if ($from && $to) {
            $fromTime = strtotime($from);
            $toTime = strtotime($to);

            if ($fromTime !== false && $toTime !== false) {
                $diff = ($toTime - $fromTime) / 60; // Différence en minutes
                $set('time', max(0, $diff)); // Évite les valeurs négatives
            }
        }
    }
}
