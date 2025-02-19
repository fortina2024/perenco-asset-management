<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EquipageResource\Pages;
use App\Filament\Resources\EquipageResource\RelationManagers;
use App\Models\Equipage;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Illuminate\Support\Facades\Session;
use Filament\Forms\Components\Actions;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;

class EquipageResource extends Resource
{
    protected static ?string $model = Equipage::class;

    protected static ?string $navigationIcon = 'heroicon-o-chevron-right';

    protected static ?string $navigationGroup = 'Logs report of boats';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('')
                ->schema([
                    Repeater::make('')
                    ->addActionLabel('Ajouter une ligne') // Personnalisation du texte du bouton
                    ->collapsible() // Permet de réduire les entrées
                    ->defaultItems(1) // Une ligne par défaut
                ->schema([
                    Forms\Components\TextInput::make('rank')
                    ->default($temporaryData['rank'] ?? null)
                    ->maxLength(255),
                    Forms\Components\TextInput::make('nom')
                    ->default($temporaryData['nom'] ?? null)
                    ->maxLength(255),
                    Forms\Components\TextInput::make('postnom')
                    ->default($temporaryData['postnom'] ?? null)
                    ->maxLength(255) 
    
                ])->columns(3)
                ]),
                Actions::make([
                    Action::make('cancel')
                    ->label('Cancel') // Libellé du bouton
                    ->icon('heroicon-m-x-mark')
                    ->requiresConfirmation()
                    ->url(route('filament.admin.resources.pobs.create')),
                    Action::make('Valider')
                    ->requiresConfirmation()
                    ->icon('heroicon-m-chevron-right')
                    ->url(route('filament.admin.resources.operations.create'))
                    ->color('success')
                    ->label('Valider'),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListEquipages::route('/'),
            'create' => Pages\CreateEquipage::route('/create'),
            'view' => Pages\ViewEquipage::route('/{record}'),
            'edit' => Pages\EditEquipage::route('/{record}/edit'),
        ];
    }
}
