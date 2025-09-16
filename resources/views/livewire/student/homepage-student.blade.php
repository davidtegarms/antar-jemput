<div class="min-h-screen flex flex-col bg-blue-50">
    {{-- Header --}}
    <div class="bg-blue-400 text-white p-4 rounded-b-2xl">
        <h2 class="text-lg font-bold">Halo Siswa,</h2>
        <p>Selamat datang di Aplikasi</p>
    </div>

    {{-- Banner --}}
    <div class="p-4">
        <img src="https://placehold.co/600x200" alt="banner" class="rounded-xl w-full">
    </div>

    {{-- Tab Antar/Jemput --}}
    <div class="flex justify-center space-x-4 mb-4">
        <button wire:click="setTab('antar')" 
            class="px-4 py-2 rounded-full 
            {{ $tab === 'antar' ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-700' }}">
            Antar
        </button>
        <button wire:click="setTab('jemput')" 
            class="px-4 py-2 rounded-full 
            {{ $tab === 'jemput' ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-700' }}">
            Jemput
        </button>
    </div>

    {{-- Daftar Driver --}}
    <div class="px-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 flex-1">
        @foreach($drivers as $driver)
            <div class="bg-white shadow rounded-xl p-4 flex items-center space-x-4">
                <img src="{{ $driver->photo ?? 'https://placehold.co/80x80' }}" 
                     alt="foto {{ $driver->username }}" 
                     class="w-16 h-16 rounded-full object-cover">
                <div>
                    <p class="font-semibold">{{ $driver->username }}</p>
                    <button class="mt-2 px-3 py-1 text-sm rounded-lg bg-blue-500 text-white">
                        {{ ucfirst($tab) }} : Setel
                    </button>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Navbar bawah --}}
    <div class="bg-white shadow-inner p-3 flex justify-around mt-4">
        <a href="#" class="flex flex-col items-center text-blue-500">
            <span class="material-icons">home</span>
            <span class="text-xs">Home</span>
        </a>
        <a href="#" class="flex flex-col items-center text-gray-500">
            <span class="material-icons">history</span>
            <span class="text-xs">History</span>
        </a>
        <a href="#" class="flex flex-col items-center text-gray-500">
            <span class="material-icons">person</span>
            <span class="text-xs">Profile</span>
        </a>
    </div>
</div>
