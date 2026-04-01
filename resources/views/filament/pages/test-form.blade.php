<x-filament-panels::page>
    {{-- custom alert component --}}
    @if($this->alert)
        <x-ui.alert :type="$this->alert['type']">
            {{ $this->alert['message'] }}
        </x-ui.alert>
    @endif



    <form wire:submit.prevent="submit">
        {{ $this->form }}

        <x-filament::button type="submit" class="my-button">
            {{ __('translation.save') }}
        </x-filament::button>
    </form>
</x-filament-panels::page>
