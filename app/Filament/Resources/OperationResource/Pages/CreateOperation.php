<?php

namespace App\Filament\Resources\OperationResource\Pages;

use App\Filament\Resources\OperationResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Session as FacadesSession;
use Livewire\Attributes\Session as AttributesSession;

class CreateOperation extends CreateRecord
{
    protected static string $resource = OperationResource::class;

    public function submitAndRedirect(): void
    {
        $data = $this->form->getState();

        // Stocker les données temporairement dans la session
       AttributesSession::put('operation_form_data', $data);

        // Rediriger vers le troisième formulaire
        $this->redirectRoute('robs.create');
    }
        
    protected function getFormActions(): array
    {
        // Retourne un tableau vide pour cacher toutes les actions par défaut
        return [
        ];
    }
}
