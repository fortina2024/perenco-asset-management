<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PobResource\Pages;
use App\Filament\Resources\PobResource\RelationManagers;
use App\Models\Pob;
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
use App\Models\Voyage;
use Filament\Forms\Components\Actions;
use Filament\Forms\Components\Actions\Action;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class PobResource extends Resource
{
    protected static ?string $model = Pob::class;

    protected static ?string $navigationIcon = 'heroicon-o-chevron-right';

    protected static ?string $navigationGroup = 'Logs report of boats';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        $temporaryData = Session::get('pob_form_data', []);

        return $form
            ->schema([
                Forms\Components\Section::make('')
            ->description('')
            ->schema([
                Forms\Components\TextInput::make('Crew')
                ->required()
                ->default($temporaryData['crew'] ?? null)
                ->numeric(),
                Forms\Components\TextInput::make('Cartering')
                ->default($temporaryData['cartering'] ?? null)
                ->numeric(),
                Forms\Components\TextInput::make('Client')
                ->default($temporaryData['client'] ?? null)
                ->numeric(),
                Forms\Components\TextInput::make('Visitor')
                ->default($temporaryData['visitor'] ?? null)
                ->numeric(),

            ])->columns(3),
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
            'index' => Pages\ListPobs::route('/'),
            'create' => Pages\CreatePob::route('/create'),
            'view' => Pages\ViewPob::route('/{record}'),
            'edit' => Pages\EditPob::route('/{record}/edit'),
        ];
    }

    public static function store()
    {
        // Récupérer les données du premier formulaire
        $temporaryData = Session::get('voyage_form_data', []);

        // Valider les données du second formulaire
        $validatedData = request()->validate([
            'crew' => 'required|numeric',
            'client' => 'nullable|numeric',
            'visitor' => 'nullable|numeric',
            'cartering' => 'nullable|numeric',
        ]);

        // Démarrer une transaction
        DB::beginTransaction();

        try {
            // Créer l'enregistrement dans la table voyage
            $voyage = Voyage::create([
                'date' => $temporaryData['date'],
                'boat_id' => $temporaryData['boat'],
                'location' => $temporaryData['location'],
                'destination' => $temporaryData['destination'],
                'miles' => $temporaryData['miles'],
                'fifi' => $temporaryData['fifi'],
                'ais' => $temporaryData['ais'],
                'band_landing' => $temporaryData['band_landing'],
                'passagers' => $temporaryData['passagers'],
                'user_id' => $temporaryData['user_id'],
            ]);

            // Créer un enregistrement dans la table Pob avec la clé étrangère voyage_id
            $pob = Pob::create([
                'voyage_id' => $voyage->id, // Utiliser l'ID du voyage comme clé étrangère
                'crew' => $validatedData['crew'],
                'client' => $validatedData['client'],
                'visitor' => $validatedData['visitor'],
                'cartering' => $validatedData['cartering'],
            ]);

            // Si tout va bien, valider la transaction
            DB::commit();

            // Effacer les données de session
            //dd($temporaryData);
            Session::forget('voyage_form_data'); 

            // Retourner une réponse ou rediriger
            return redirect()->route('filament.admin.resources.voyages.index')->with('success', 'Enregistrement effectué avec succès.');
        } catch (\Exception $e) {
            // En cas d'erreur, annuler la transaction
            DB::rollBack();

            // Afficher un message d'erreur
            return back()->withErrors(['error' => 'Une erreur est survenue, la transaction a été annulée.']);
        }
    }

}
