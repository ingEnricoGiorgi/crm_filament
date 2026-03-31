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


class AssignLeads extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUserGroup;

    protected string $view = 'filament.pages.assign-leads';

    public ?array $data = [];

    //obbligatorio quando parte il componente
    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Schema  $form): Schema
    {
        return $form
            ->schema([
                Select::make('operator_id')->label('Operatore')
                ->options(User::all()->mapWithKeys(fn ($u) => [$u->id => $u->name . ' ' . $u->surname]))->required(),

                Select::make('lead_ids')->label('Seleziona Lead')
                ->multiple()->searchable()
                ->options(Lead::all()->mapWithKeys(fn ($lead) => [$lead->id => $lead->name . ' ' . $lead->surname]))->required(),
            ])
            ->statePath('data');
    }

    public function submit(){
        $ids=$this->data['lead_ids']??[];
        if(empty($ids)){
            Notification::make()->title('Nessun lead selezionato')->danger()->send();
            return;
            }
        Lead::whereIn('id',$ids)->update(['operator_id'=>$this->data['operator_id']]);
        Notification::make()->title('Lead assegnati')->success()->send();
    }
}
