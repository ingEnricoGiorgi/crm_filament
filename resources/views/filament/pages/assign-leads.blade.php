<x-filament-panels::page>
    <form wire:submit="submit" class="space-y-6">
        {{ $this->form }}

        <div class="mt-10 flex justify-start" style="margin-top:1em">
            <x-filament::button type="submit">
                Assegna Lead
            </x-filament::button>
        </div>
    </form>
</x-filament-panels::page>
