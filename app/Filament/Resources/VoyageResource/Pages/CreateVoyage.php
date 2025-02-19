<?php

namespace App\Filament\Resources\VoyageResource\Pages;

use App\Filament\Resources\VoyageResource;
use Filament\Actions;
use Filament\Pages\Actions\Action;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Session;

class CreateVoyage extends CreateRecord
{
    protected static string $resource = VoyageResource::class;

    public function submitAndRedirect(): void
    {
        $data = $this->form->getState();

        // Stocker les données temporairement dans la session
        Session::put('voyage_form_data', $data);

        // Rediriger vers le deuxième formulaire
        $this->redirectRoute('pobs.create');
    }
    
    protected function getFormActions(): array
    {
        // Retourne un tableau vide pour cacher toutes les actions par défaut
        return [
        ];
    }
}
