<?php

namespace App\Livewire;

use App\Models\Dokter;
use App\Models\JadwalPeriksa;
use App\Models\Pasien;
use App\Models\Poli;
use Livewire\Component;
use Illuminate\Support\Facades\Session;

class PasienForm extends Component
{

    public $poli;
    public $pasien;
    public $jadwal;

    public $selectedPoli; // Added property for the selected poli
    public $jadwals;
    public function render()
    {
        $session = Session::get('authenticate');
        $this->pasien = Pasien::find($session->user_id);
        $this->jadwals = $this->getJadwals();
        $this->poli = Poli::all();
        return view(
            'livewire.pasien-form',
            ['jadwals' => $this->jadwals]
        );
    }

    public function getJadwals()
    {
        if ($this->selectedPoli) {
            $dokter = Dokter::where('id_poli', $this->selectedPoli)->has('jadwal')->get();

            return $dokter;
        }

        return collect(); // Return an empty collection if no poli is selected
    }

    public function updated($field)
    {
        if ($field == 'selectedPoli') {
            $this->jadwals = $this->getJadwals(); // Update jadwals when poli changes
        }
    }

}
