<?php

namespace App\Filament\Resources\Leads\Pages;

use App\Filament\Resources\Leads\LeadResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Model;

class CreateLead extends CreateRecord
{
    protected static string $resource = LeadResource::class;

    protected function afterCreate(): void
    {
        Notification::make()
            ->title('Lead creato')
            ->success()
            ->send();
    }

    protected function handleRecordCreation(array $data): Model
    {
        try {
            return parent::handleRecordCreation($data);

        } catch (\Throwable $e) {

            Notification::make()
                ->title('Errore durante la creazione del lead')
                ->body($e->getMessage())
                ->danger()
                ->persistent()
                ->send();

            throw $e;
        }
    }
}
