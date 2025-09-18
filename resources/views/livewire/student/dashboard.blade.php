@extends('livewire.student.student')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold text-gray-800">Welcome, {{ auth()->user()->name }} 👋</h1>
    <p class="text-gray-600">Anda login sebagai <span class="font-semibold">{{ auth()->user()->role }}</span></p>

    <!-- Banner -->
    <div class="mt-6 relative rounded-lg overflow-hidden shadow-lg">
        <img src="https://source.unsplash.com/1200x400/?school,children" alt="Banner" class="w-full h-48 object-cover">
        <div class="absolute inset-0 bg-black bg-opacity-30 flex items-center justify-center">
            <h2 class="text-2xl text-white font-bold">SDN Negeri 13 Konoha</h2>
        </div>
    </div>

    <!-- Tombol Antar Jemput -->
    <div class="flex justify-center mt-6 space-x-4">
        <button class="px-6 py-3 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700">Antar</button>
        <button class="px-6 py-3 bg-green-600 text-white rounded-lg shadow hover:bg-green-700">Jemput</button>
    </div>

    <!-- Daftar Driver -->
    <h3 class="mt-8 text-lg font-semibold">Daftar Driver</h3>
    <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mt-4">
        @foreach (['Slamet', 'Budi', 'Fendi'] as $driver)
            <div class="bg-blue-50 p-4 rounded-lg shadow hover:shadow-md">
                <img src="https://source.unsplash.com/100x100/?driver,man" class="w-16 h-16 rounded-full mx-auto">
                <h4 class="text-center mt-2 font-bold">{{ $driver }}</h4>
                <p class="text-center text-sm text-gray-600">Antar: Setela</p>
            </div>
        @endforeach
    </div>
</div>
@endsection
