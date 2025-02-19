<?php

namespace App\Filament\Resources\PobResource\Pages;

use App\Filament\Resources\PobResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Request;

class CreatePob extends CreateRecord
{
    protected static string $resource = PobResource::class;

    public function submitAndRedirect(): void
    {
        $data = $this->form->getState();

        // Stocker les données temporairement dans la session
        Session::put('pob_form_data', $data);

        // Rediriger vers le troisième formulaire
        $this->redirectRoute('equipages.create');
    }

    protected function getFormActions(): array
    {
        // Retourne un tableau vide pour cacher toutes les actions par défaut
        return [
        ];
    }

}
