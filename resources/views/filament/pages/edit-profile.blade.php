<x-filament-panels::page>
    <h1>Edit Profile</h1>
    <x-filament-panels::form wire:submit="save">
        {{ $this->form }}
        <x-filament-panels::form.actions
            :actions="$this->getFormActions()"
        />

    </x-filament-panels::form >
</x-filament-panels::page>
