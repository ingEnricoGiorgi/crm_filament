<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use BackedEnum;

class Dashboard extends Page
{
    public static function getNavigationLabel(): string { return __('translation.home'); }
    protected static string|BackedEnum|null $navigationIcon = \Filament\Support\Icons\Heroicon::OutlinedHome;

    public function getTitle(): string { return __('translation.home'); }

    protected string $view = 'filament.pages.dashboard';
    protected function getHeaderWidgets(): array { return [\App\Filament\Widgets\LeadStats::class]; }
}
