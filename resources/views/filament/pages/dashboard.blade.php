@php
    use App\Models\User;
    
    // Ambil data langsung dari model
    $totalAdmin = User::where('role', 'admin')->count();
    $totalDriver = User::where('role', 'driver')->count();
    $totalParent = User::where('role', 'parent')->count();
    // Ambil 5 data perjalanan terbaru langsung dari database
    $recentTrips = \App\Models\Trip::latest()->limit(5)->get();
@endphp

<x-filament-panels::page>
    <div style="text-align: center; padding: 40px; background-color: #f8fafc; border-radius: 12px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
        <h1 style="font-size: 2.5rem; font-weight: bold; color: #1f2937;">Halo, Admin!</h1>
        <p style="font-size: 1.2rem; color: #4b5563; margin-top: 10px;">
            Selamat datang di Dashboard Sistem Antar Jemput Siswa.
        </p>
        <p style="font-size: 1rem; color: #6b7280; margin-top: 20px;">
            Anda dapat mengelola driver, siswa, dan perjalanan dari menu di samping.
        </p>
    </div>
    <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
        
        <div style="flex: 1; min-width: 250px; background-color: #d1f7e0; padding: 1.5rem; border-radius: 0.5rem; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
            <h2 style="font-size: 1.25rem; font-weight: bold;">Total Admin</h2>
            <p style="font-size: 2rem; font-weight: bold; color: #16a34a;">{{ $totalAdmin }}</p>
        </div>
        
        <div style="flex: 1; min-width: 250px; background-color: #cff4fc; padding: 1.5rem; border-radius: 0.5rem; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
            <h2 style="font-size: 1.25rem; font-weight: bold;">Total Driver</h2>
            <p style="font-size: 2rem; font-weight: bold; color: #0891b2;">{{ $totalDriver }}</p>
        </div>
        
        <div style="flex: 1; min-width: 250px; background-color: #fef3c7; padding: 1.5rem; border-radius: 0.5rem; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
            <h2 style="font-size: 1.25rem; font-weight: bold;">Total Orang Tua</h2>
            <p style="font-size: 2rem; font-weight: bold; color: #d97706;">{{ $totalParent }}</p>
        </div>
    </div>
     <style>
        .table-container {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 1.5rem;
        }
        .table-heading {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 1rem;
        }
    </style>
    
    <div class="table-container">
        <div class="table-heading">Riwayat Perjalanan Terbaru</div>
        
        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr style="border-bottom: 1px solid #e5e7eb;">
                        <th style="padding: 0.75rem; text-align: left; font-weight: 600; color: #6b7280;">Nama Driver</th>
                        <th style="padding: 0.75rem; text-align: left; font-weight: 600; color: #6b7280;">Nama Siswa</th>
                        <th style="padding: 0.75rem; text-align: left; font-weight: 600; color: #6b7280;">Tanggal</th>
                        <th style="padding: 0.75rem; text-align: left; font-weight: 600; color: #6b7280;">Waktu</th>
                        <th style="padding: 0.75rem; text-align: left; font-weight: 600; color: #6b7280;">Tipe</th>
                        <th style="padding: 0.75rem; text-align: left; font-weight: 600; color: #6b7280;">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($recentTrips as $trip)
                        <tr style="border-bottom: 1px solid #e5e7eb;">
                            <td style="padding: 0.75rem;">{{ $trip->driver->name ?? '-' }}</td>
                            <td style="padding: 0.75rem;">{{ $trip->student->name ?? '-' }}</td>
                            <td style="padding: 0.75rem;">{{ $trip->date ?? '-' }}</td>
                            <td style="padding: 0.75rem;">{{ $trip->scheduled_time ?? '-' }}</td>
                            <td style="padding: 0.75rem;">
                                @php
                                    $color = ($trip->trip_type === 'jemput') ? '#3b82f6' : '#10b981';
                                @endphp
                                <span style="display: inline-block; padding: 0.25rem 0.5rem; font-size: 0.75rem; font-weight: bold; border-radius: 0.25rem; color: white; background-color: {{ $color }};">
                                    {{ $trip->trip_type }}
                                </span>
                            </td>
                            <td style="padding: 0.75rem;">
                                @php
                                    $color = match ($trip->status) {
                                        'scheduled' => '#f59e0b',
                                        'in_progress' => '#3b82f6',
                                        'completed' => '#10b981',
                                        'cancelled' => '#ef4444',
                                        default => '#6b7280',
                                    };
                                @endphp
                                <span style="display: inline-block; padding: 0.25rem 0.5rem; font-size: 0.75rem; font-weight: bold; border-radius: 0.25rem; color: white; background-color: {{ $color }};">
                                    {{ $trip->status }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-filament-panels::page>