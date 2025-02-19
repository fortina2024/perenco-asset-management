<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RobResource\Pages;
use App\Filament\Resources\RobResource\RelationManagers;
use App\Models\Rob;
use Filament\Forms;
use Filament\Forms\Components\Actions;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;


class RobResource extends Resource
{
    protected static ?string $model = Rob::class;

    protected static ?string $navigationIcon = 'heroicon-o-chevron-right';

    protected static ?string $navigationGroup = 'Logs report of boats';

    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        // Liste des produits
        $products = [
            'Fuel', 'FW', 'Lub Oil', 'Hydraulic Oil', 'Gearbox Oil',
            'Dirty Oil', 'Base Oil', 'Brine', 'Oil Base Mud', 'Barite', 'Bentonite', 'Calcium carbonate', 'Cement'
        ];
    
        return $form
            ->schema([
                Section::make('')
                    ->schema([

                        // Ligne des titres
                        Grid::make(8)
                            ->schema([
                                Placeholder::make('')
                                    ->content('Product')
                                    ->columnSpan(1)
                                    ->extraAttributes([
                                        'style' => 'border-bottom: 2px solid #333; padding-bottom: 5px;' // Ajouter une ligne sous le titre
                                    ]),
                                Placeholder::make('')
                                    ->content('Jour J-1')
                                    ->columnSpan(1)
                                    ->extraAttributes([
                                        'style' => 'border-bottom: 2px solid #333; padding-bottom: 5px;'
                                    ]),
                                Placeholder::make('')
                                    ->content('Received')
                                    ->columnSpan(1)
                                    ->extraAttributes([
                                        'style' => 'border-bottom: 2px solid #333; padding-bottom: 5px;'
                                    ]),
                                Placeholder::make('')
                                    ->content('Delivered')
                                    ->columnSpan(1)
                                    ->extraAttributes([
                                        'style' => 'border-bottom: 2px solid #333; padding-bottom: 5px;'
                                    ]),
                                Placeholder::make('')
                                    ->content('Produced')
                                    ->columnSpan(1)
                                    ->extraAttributes([
                                        'style' => 'border-bottom: 2px solid #333; padding-bottom: 5px;'
                                    ]),
                                Placeholder::make('')
                                    ->content('Consumption')
                                    ->columnSpan(1)
                                    ->extraAttributes([
                                        'style' => 'border-bottom: 2px solid #333; padding-bottom: 5px;'
                                    ]),
                                Placeholder::make('')
                                    ->content('Correction')
                                    ->columnSpan(1)
                                    ->extraAttributes([
                                        'style' => 'border-bottom: 2px solid #333; padding-bottom: 5px;'
                                    ]),
                                Placeholder::make('')
                                    ->content('Jour J')
                                    ->columnSpan(1)
                                    ->extraAttributes([
                                        'style' => 'border-bottom: 2px solid #333; padding-bottom: 5px;'
                                    ]),
                            ]),

                        // Génération dynamique des lignes de données
                        Grid::make(8)
                            ->schema(
                                collect(range(0, 12))->map(fn ($i) => [
                                    // Assigner chaque produit de la liste aux inputs
                                    TextInput::make("product_$i")
                                        ->label("")
                                        ->default($products[$i]) // Assigner le produit à chaque ligne
                                        ->readOnly() // Rendre l'input en lecture seule
                                        ->columnSpan(1)
                                        ->extraAttributes([
                                            'style' => 'border: none; height: 30px; margin-bottom: -14px;' // Réduire l'espacement entre les inputs et hauteur
                                        ]),
                                    // background-color: #f0f0f0; color: #333;
                                    // Les autres champs (jourj-1, reçu, livré, etc.)
                                    TextInput::make("jourj-1_$i")->label("")->numeric()->columnSpan(1)
                                        ->extraAttributes(['style' => 'height: 30px; margin-bottom: -14px;']),
                                    TextInput::make("received_$i")->label("")->numeric()->columnSpan(1)
                                        ->extraAttributes(['style' => 'height: 30px; margin-bottom: -14px;']),
                                    TextInput::make("delivered_$i")->label("")->numeric()->columnSpan(1)
                                        ->extraAttributes(['style' => 'height: 30px; margin-bottom: -14px;']),
                                    TextInput::make("produced_$i")->label("")->numeric()->columnSpan(1)
                                        ->extraAttributes(['style' => 'height: 30px; margin-bottom: -14px;']),
                                    TextInput::make("consumption_$i")->label("")->numeric()->columnSpan(1)
                                        ->extraAttributes(['style' => 'height: 30px; margin-bottom: -14px;']),
                                    TextInput::make("correction_$i")->label("")->numeric()->columnSpan(1)
                                        ->extraAttributes(['style' => 'height: 30px; margin-bottom: -14px;']),
                                    TextInput::make("jourj_$i")->label("")->numeric()->columnSpan(1)
                                        ->extraAttributes(['style' => 'height: 30px; margin-bottom: -14px;']),
                                    Hidden::make("voyage_id_$i"),
                                ])->flatten()->toArray()
                            ),
]),
                        // Ajout des boutons Save et Cancel
                        Actions::make([
                            Action::make('cancel')
                            ->label('Cancel') // Libellé du bouton
                            ->icon('heroicon-m-x-mark')
                            ->requiresConfirmation()
                            ->url(route('filament.admin.resources.operations.create')),
                            Action::make('Valider')
                            ->requiresConfirmation()
                            ->icon('heroicon-m-chevron-right')
                            ->url(route('filament.admin.resources.liftings.create'))
                            ->color('success')
                            ->label('Valider'),
                        ]),
            ]) ->extraAttributes([
                'style' => 'margin-top: -30px;' // Ajouter une ligne sous le titre
            ]);
    }
        

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('product')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jourj-1')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('received')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('delivered')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('produced')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('consumption')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('correction')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('jourj')
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
            'index' => Pages\ListRobs::route('/'),
            'create' => Pages\CreateRob::route('/create'),
            'view' => Pages\ViewRob::route('/{record}'),
            'edit' => Pages\EditRob::route('/{record}/edit'),
        ];
    }
}
