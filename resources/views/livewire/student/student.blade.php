<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans">

    <!-- Navbar -->
    <nav class="bg-blue-600 text-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <span class="text-lg font-bold">Antar Jemput</span>
                </div>
                <div class="flex space-x-4">
                    <a href="{{ route('student.dashboard') }}" class="hover:bg-blue-500 px-3 py-2 rounded-md text-sm font-medium">Home</a>
                    <a href="{{ route('student.history') }}" class="hover:bg-blue-500 px-3 py-2 rounded-md text-sm font-medium">History</a>
                    <a href="{{ route('student.profile') }}" class="hover:bg-blue-500 px-3 py-2 rounded-md text-sm font-medium">Profile</a>
                </div>
                <div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="bg-red-500 hover:bg-red-600 px-3 py-2 rounded-md text-sm font-medium">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 py-6">
        @yield('content')
    </main>

</body>
</html>
