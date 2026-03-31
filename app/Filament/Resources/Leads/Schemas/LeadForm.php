<?php

namespace App\Filament\Resources\Leads\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use App\Enums\LeadStatus;

class LeadForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')->required(),
                TextInput::make('surname')->required(),
                TextInput::make('email')->label('Email address')->email(),
                TextInput::make('phone')->tel(),
                Select::make('current_status')->options(collect(\App\Enums\LeadStatus::cases())
                ->mapWithKeys(fn($c)=>[$c->value=>$c->name])->toArray())->default(\App\Enums\LeadStatus::NEW->value)->required(),]);
    }
}
