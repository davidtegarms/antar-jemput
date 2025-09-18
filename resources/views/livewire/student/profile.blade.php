@extends('livewire.student.student')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold text-gray-800">Profil Saya</h1>

    <div class="mt-6 flex flex-col md:flex-row items-center">
        <img src="https://source.unsplash.com/150x150/?student,profile" class="w-32 h-32 rounded-full shadow-md">
        <div class="md:ml-6 mt-4 md:mt-0">
            <h2 class="text-xl font-bold">{{ auth()->user()->name }}</h2>
            <p class="text-gray-600">{{ auth()->user()->email }}</p>
            <p class="mt-2"><span class="font-semibold">Role:</span> {{ auth()->user()->role }}</p>
        </div>
    </div>

    <div class="mt-6">
        <a href="#" class="inline-block px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Edit Profil</a>
    </div>
</div>
@endsection
