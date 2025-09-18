<div class="p-6">
    <h1 class="text-2xl font-bold">Dashboard Driver</h1>
    <p>Halo, {{ auth()->user()->name }}! Anda login sebagai <strong>{{ auth()->user()->role }}</strong>.</p>
</div>

<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Logout</button>
</form>
