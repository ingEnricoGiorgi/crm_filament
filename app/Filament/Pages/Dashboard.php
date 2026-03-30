<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use BackedEnum;

class Dashboard extends Page
{
    protected static ?string $navigationLabel = 'Home';
    protected static string|BackedEnum|null $navigationIcon = \Filament\Support\Icons\Heroicon::OutlinedHome;

    protected static ?string $title = 'Home';

    protected string $view = 'filament.pages.dashboard';
    protected function getHeaderWidgets(): array { return [\App\Filament\Widgets\LeadStats::class]; }
}
