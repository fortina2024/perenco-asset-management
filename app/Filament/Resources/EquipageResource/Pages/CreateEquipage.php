<?php

namespace App\Filament\Resources\EquipageResource\Pages;

use App\Filament\Resources\EquipageResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Contracts\Session\Session;

class CreateEquipage extends CreateRecord
{
    protected static string $resource = EquipageResource::class;

    public function submitAndRedirect(): void
    {
        $data = $this->form->getState();

        // Stocker les données temporairement dans la session
        //Session::put('voyage_form_data', $data);

        // Rediriger vers le deuxième formulaire
        $this->redirectRoute('operations.create');
    }
    
    protected function getFormActions(): array
    {
        // Retourne un tableau vide pour cacher toutes les actions par défaut
        return [
        ];
    }
}
