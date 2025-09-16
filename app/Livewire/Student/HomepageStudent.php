<?php

namespace App\Http\Livewire\Student;

use Livewire\Component;
use App\Models\User;

class HomepageStudent extends Component
{
    public $tab = 'antar'; // default tab

    public function setTab($tab)
    {
        $this->tab = $tab;
    }

    public function render()
    {
        // Ambil driver dari users dengan role = driver
        $drivers = User::where('role', 'driver')->get();

        return view('livewire.student.homepage-student', [
            'drivers' => $drivers,
            'tab' => $this->tab,
        ]);
    }
}
    