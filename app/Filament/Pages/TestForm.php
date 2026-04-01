<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Forms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Grid;

class TestForm extends Page implements HasForms
{
    use InteractsWithForms;

    protected string $view = 'filament.pages.test-form';

    public $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }


    public function submit()
    {
        $data = $this->form->getState();

        dd($data); // per test
    }


    protected function getFormSchema(): array
    {
        return [

            Grid::make(2)
                ->schema([

                    Section::make('Dati utente')
                        ->schema([
                            TextInput::make('name'),
                            TextInput::make('email'),
                        ]),

                    Section::make('Ruolo')
                        ->schema([
                            Select::make('role')
                                ->options([
                                    'admin' => 'Admin',
                                    'user' => 'User',
                                ]),
                        ]),

                ]),
        ];
    }

}
