<x-filament::widget>
    <x-filament::card>
       {{-- <livewire:comments :model="$records" /> --}}
    <livewire:filament-ticket::comments :model="$record"/>
    </x-filament::card>
</x-filament::widget>
