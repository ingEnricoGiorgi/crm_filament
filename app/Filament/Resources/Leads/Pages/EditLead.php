<?php

namespace App\Filament\Resources\Leads\Pages;

use App\Filament\Resources\Leads\LeadResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;

class EditLead extends EditRecord
{
    protected static string $resource = LeadResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function afterSave(): void
    {
        Notification::make()
            ->title('Lead aggiornato')
            ->success()
            ->send();
    }
    protected function handleRecordCreation(array $data): Model
    {
        try {
            return parent::handleRecordCreation($data);

        } catch (\Throwable $e) {

            Notification::make()
                ->title('Errore durante aggiornamento del lead')
                ->body($e->getMessage())
                ->danger()
                ->persistent()
                ->send();

            throw $e;
        }
    }
}
