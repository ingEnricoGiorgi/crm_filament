<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Support\Icons\Heroicon;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use BackedEnum;
use App\Models\User;
use App\Models\Lead;
    use Filament\Schemas\Components\Callout;

class AssignLeads extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUserGroup;

    protected string $view = 'filament.pages.assign-leads';

    public ?array $data = [];

    public ?string $message = null;

    public ?string $type = null;

    //obbligatorio quando parte il componente
    public function mount(): void
    {
        $this->form->fill();
    }

    public function submit()
    {
        $ids = $this->data['lead_ids'] ?? [];

        if (empty($ids)) {
            $this->type = 'danger';
            $this->message = 'Nessun lead selezionato';
            return;
        }

        Lead::whereIn('id', $ids)->update([
            'operator_id' => $this->data['operator_id']
        ]);

        $this->type = 'success';
        $this->message = 'Lead assegnati';
    }

    public function form(Schema $form): Schema
    {
        return $form
            ->schema([

                Callout::make('alert')
                    ->visible(fn () => $this->message !== null)
                    ->description(fn () => $this->message)
                    ->success(fn () => $this->type === 'success')
                    ->danger(fn () => $this->type === 'danger')
                    ->columnSpan(1),

                Select::make('operator_id')
                    ->label('Operatore')
                    ->options(User::all()->pluck('name', 'id'))
                    ->columnSpan(1)
                    ->required(),

                Select::make('lead_ids')
                    ->label('Seleziona Lead')
                    ->multiple()
                    ->options(Lead::all()->pluck('name', 'id'))
                    ->columnSpan(1)
                    ->required(),
            ])
            ->columns(2)
            ->statePath('data');
    }


}
