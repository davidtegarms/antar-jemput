@extends('livewire.student.student')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold text-gray-800">Riwayat Perjalanan</h1>
    <p class="text-gray-600">Lihat semua perjalanan antar-jemput Anda.</p>

    <table class="min-w-full mt-6 border border-gray-200 rounded-lg overflow-hidden">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2 border">Tanggal</th>
                <th class="px-4 py-2 border">Driver</th>
                <th class="px-4 py-2 border">Tujuan</th>
                <th class="px-4 py-2 border">Status</th>
            </tr>
        </thead>
        <tbody>
            <tr class="text-center">
                <td class="px-4 py-2 border">2025-09-10</td>
                <td class="px-4 py-2 border">Slamet</td>
                <td class="px-4 py-2 border">Sekolah</td>
                <td class="px-4 py-2 border text-green-600">Selesai</td>
            </tr>
            <tr class="text-center">
                <td class="px-4 py-2 border">2025-09-11</td>
                <td class="px-4 py-2 border">Budi</td>
                <td class="px-4 py-2 border">Rumah</td>
                <td class="px-4 py-2 border text-yellow-600">Pending</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
