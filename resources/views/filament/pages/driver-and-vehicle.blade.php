<x-filament::page>
    {{-- Bagian Driver --}}
    <div class="space-y-4">
        {{-- <h2 class="text-xl font-bold">Data Sopir</h2> --}}
        @livewire(\App\Filament\Resources\DriverResource\Pages\ListDrivers::class)
    </div>

    {{-- Bagian Kendaraan --}}
    <div class="mt-8 space-y-4">
        {{-- <h2 class="text-xl font-bold">Data Kendaraan</h2> --}}
        @livewire(\App\Filament\Resources\VehicleResource\Pages\ListVehicles::class)
    </div>
</x-filament::page>
