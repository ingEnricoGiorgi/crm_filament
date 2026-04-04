<?php

namespace App\Filament\Resources\Appointments\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;

class AppointmentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('lead_id')
                    ->label('Lead')
                    ->relationship('lead', 'name')
                    ->getOptionLabelFromRecordUsing(fn ($record) => $record->name . ' ' . $record->surname)
                    ->preload() //mostra select options al caricamento della pagina
                    ->searchable()
                    ->required(),
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
