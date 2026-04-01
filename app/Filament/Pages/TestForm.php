<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Forms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Schemas\Components\Section;;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;

class TestForm extends Page implements HasForms
{
    use InteractsWithForms;

    protected string $view = 'filament.pages.test-form';

    public $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }


    protected function getFormSchema(): array
    {
        return [

            Section::make('Dati utente')
                ->schema([
                    TextInput::make('name')->required(),
                    TextInput::make('email')->email(),
                ])
                ->columns(2),

            Section::make('Altre info')
                ->schema([
                    Select::make('role')
                        ->options([
                            'admin' => 'Admin',
                            'user' => 'User',
                        ]),
                ]),
        ];
    }

    public function submit()
    {
        $data = $this->form->getState();

        dd($data); // per test
    }
}
