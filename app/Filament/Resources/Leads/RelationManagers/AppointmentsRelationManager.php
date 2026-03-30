<?php

namespace App\Filament\Resources\Leads\RelationManagers;

use App\Filament\Resources\Appointments\AppointmentResource;
use Filament\Actions\CreateAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;

class AppointmentsRelationManager extends RelationManager
{
    protected static string $relationship = 'appointments';

    protected static ?string $relatedResource = AppointmentResource::class;

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                \Filament\Tables\Columns\TextColumn::make('id')->sortable(),
                \Filament\Tables\Columns\TextColumn::make('date_start')->label('Data'),
                \Filament\Tables\Columns\TextColumn::make('note')->limit(50),
            ])
            ->headerActions([
                CreateAction::make(),
            ]);
    }
}
