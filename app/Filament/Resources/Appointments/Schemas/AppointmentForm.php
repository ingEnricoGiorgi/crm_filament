<?php

namespace App\Filament\Resources\Appointments\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class AppointmentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('lead_id')
                    ->required()
                    ->numeric(),
                DateTimePicker::make('date_start')
                    ->required(),
                TextInput::make('duration')
                    ->required()
                    ->numeric()
                    ->default(60),
                TextInput::make('note'),
            ]);
    }
}
