<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VoyageResource\Pages;
use App\Filament\Resources\VoyageResource\RelationManagers;
use App\Models\Voyage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Illuminate\Support\Facades\Session;
use Filament\Forms\Components\TextInput;
use App\Actions\Star;
use App\Actions\ResetStars;
use Filament\Forms\Components\Actions;
use Filament\Forms\Components\Actions\Action;

class VoyageResource extends Resource
{
    protected static ?string $model = Voyage::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationGroup = 'Logs report of boats';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        $temporaryData = Session::get('voyage_form_data', []);
        
        return $form
        ->schema([
            Forms\Components\Section::make('')
            ->description('')
            ->schema([
                Forms\Components\DatePicker::make('date')
                ->default($temporaryData['date'] ?? null)
                ->required(),
                Forms\Components\Select::make('boat_id')
                ->relationship(name: 'boat', titleAttribute: 'nom')
                ->default($temporaryData['boat'] ?? null)
                ->searchable()
                ->preload()
                ->required(),
            Forms\Components\Select::make('location')
                ->relationship(name: 'champofboat', titleAttribute: 'nom')
                ->default($temporaryData['champofboat'] ?? null)
                ->label('Location')
                ->searchable()
                ->preload()
                ->required(),
            Forms\Components\Select::make('destination')
                ->relationship(name: 'champofboat', titleAttribute: 'nom')
                ->default($temporaryData['champofboat'] ?? null)
                ->label('Destination')
                ->searchable()
                ->preload()
                ->required(),
            Forms\Components\TextInput::make('miles')
                ->default($temporaryData['miles'] ?? null)
                ->numeric(),
            Forms\Components\Select::make('fifi')
                ->options([
                    'yes' => 'Yes',
                    'no' => 'No',
                    'n/a' => 'N/A',
                ])
                ->default($temporaryData['fifi'] ?? null),
            Forms\Components\Select::make('ais')
                ->options([
                    'yes' => 'Yes',
                    'no' => 'No',
                    'n/a' => 'N/A',
                ])
                ->default($temporaryData['ais'] ?? null),
            Forms\Components\TextInput::make('band_landing')
                ->default($temporaryData['band_landing'] ?? null)
                ->numeric(),
            Forms\Components\TextInput::make('passagers')
                ->default($temporaryData['passagers'] ?? null)
                ->numeric(),
            ])->columns(3),
            
            Actions::make([
                Action::make('cancel')
                ->label('Cancel') // Libellé du bouton
                ->icon('heroicon-m-x-mark')
                ->requiresConfirmation()
                ->url(route('filament.admin.resources.voyages.index')),
                Action::make('Valider')
                ->requiresConfirmation()
                ->icon('heroicon-m-chevron-right')
                ->action('submitAndRedirect')
                ->color('success')
                ->label('Valider'),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('date')
                    ->searchable(),
                Tables\Columns\TextColumn::make('boat.nom')
                    ->sortable()
                    ->label('Boat name'),
                Tables\Columns\TextColumn::make('location')
                    //->relationship(name: 'champofboat', titleAttribute: 'nom')
                    ->sortable()
                    ->label('Location'),
                Tables\Columns\TextColumn::make('destination')
                    ->sortable()
                    ->label('Destination'),
                Tables\Columns\TextColumn::make('miles')
                    ->searchable(),
                Tables\Columns\TextColumn::make('fifi')
                    ->sortable(),
                Tables\Columns\TextColumn::make('ais')
                    ->sortable(),
                Tables\Columns\TextColumn::make('band_landing')
                    ->searchable(),
                Tables\Columns\TextColumn::make('passagers')
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->sortable()
                    ->label('User name'),
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
            'index' => Pages\ListVoyages::route('/'),
            'create' => Pages\CreateVoyage::route('/create'),
            'view' => Pages\ViewVoyage::route('/{record}'),
            'edit' => Pages\EditVoyage::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

}
