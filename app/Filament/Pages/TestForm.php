<?php

namespace App\Filament\Pages;

use Dom\Text;
use Filament\Pages\Page;
use Filament\Forms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Grid;
use Illuminate\Support\Facades\Hash;
use Filament\Notifications\Notification;
use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use \Filament\Support\Icons\Heroicon;
use BackedEnum;

class TestForm extends Page implements HasForms
{
    use InteractsWithForms;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUserGroup;

    protected string $view = 'filament.pages.test-form';

    public $data = [];

    public $alert = null;

    public function mount(): void
    {
        $this->form->fill();
    }

    protected function getFormStatePath(): string
    {
        return 'data';
    }

    /**
     * Salva i dati dell'utente e notifica l'operazione eseguita
     *
     * @throws \Illuminate\Validation\ValidationException
     * @throws \Throwable
     *
     * @return void
     */

    public function submit()
    {
        try {
            $this->alert = null; // reset

            $data = $this->form->getState();

            $data['password'] = Hash::make($data['password']);

            User::create($data);

            $this->alert = [
                'type' => 'success',
                'message' => 'Utente creato con successo',
            ];

        } catch (ValidationException $e) {
            throw $e;

        } catch (\Throwable $e) {
            Log::error($e);

            $this->alert = [
                'type' => 'error',
                'message' => 'Errore durante il salvataggio',
            ];
        }
    }


    //alternativa con notifiche base di filament
    // public function submit()
    // {
    //     try {
    //         $data = $this->form->getState();

    //         $data['password'] = Hash::make($data['password']);

    //         User::create($data);

    //         Notification::make()
    //             ->title('Utente creato')
    //             ->success()
    //             ->send();

    //     } catch (ValidationException $e) {
    //         throw $e;

    //     } catch (\Throwable $e) {
    //         Log::error($e);

    //         Notification::make()
    //             ->title('Errore durante il salvataggio')
    //             ->danger()
    //             ->send();
    //     }
    // }


    protected function getFormSchema(): array
    {
        return [

            Grid::make(2)
                ->schema([

                    Section::make('Utente')
                        ->schema([
                            TextInput::make('name')->required(),
                            TextInput::make('surname')->required(),
                            TextInput::make('email')->email()->required(),
                            TextInput::make('password')
                                ->password()
                                ->autocomplete('off')
                                ->required(),
                        ]),

                    Section::make('Ruolo')
                        ->schema([
                    Select::make('role_id')
                        ->options(UserRole::options())
                        ->required()
                        ]),

                ]),
        ];
    }

}
