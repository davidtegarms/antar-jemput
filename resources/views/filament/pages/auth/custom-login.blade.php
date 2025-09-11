<div style="display: flex; justify-content: center; align-items: center; min-height: 100vh; padding: 20px; background-color: #007bff; font-family: sans-serif;">
    <div style="width: 100%; max-width: 450px; padding: 2.5rem; background-color: white; border-radius: 12px; box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);">
        
        <div style="text-align: center; margin-bottom: 2rem;">
            <img src="{{ asset('images/logo.jpg') }}" alt="Logo Aplikasi" style="width: 120px; height: auto; margin-bottom: 1rem; display: block; margin-left: auto; margin-right: auto;">
            <h1 style="font-size: 1.8rem; font-weight: 700; color: #333; margin-bottom: 0.5rem;">Selamat Datang!</h1>
            <p style="color: #666;">Masuk untuk mengelola sistem antar jemput siswa.</p>
        </div>

        <form wire:submit.prevent="authenticate">
            {{ $this->form }}

            <button type="submit" style="width: 100%; padding: 0.9rem; margin-top: 1.5rem; background-color: #007bff; color: white; border: none; border-radius: 8px; font-size: 1rem; cursor: pointer; transition: background-color 0.3s;">
                Masuk
            </button>
        </form>
    </div>
</div>