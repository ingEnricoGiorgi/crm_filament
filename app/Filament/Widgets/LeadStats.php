<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Enums\LeadStatus;
use App\Models\Lead;

class LeadStats extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Totale Lead', Lead::count()),
            Stat::make('Nuovi', Lead::where('current_status', 'NEW')->count()),
            Stat::make('Prospect', Lead::where('current_status', 'PROSPECT')->count()),
            Stat::make('Chiusi', Lead::where('current_status', 'CLOSED')->count()),
        ];
    }
}
