<?php

namespace App\Livewire;

use App\Models\DaftarPoli;
use App\Models\Poli;
use App\Models\Dokter;
use App\Models\Pasien;
use Livewire\Component;
use App\Models\JadwalPeriksa;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Session;

class PasienForm extends Component
{

    public $poli;
    public $pasien;

    #[Validate('required', message: 'Wajib memilih Jadwal Periksa')]
    public $jadwal;

    #[Validate('required', message: 'Wajib memilih Poli')]
    public $selectedPoli;

    #[Validate('required', message: 'Tulis Keluhan Andi')]
    public $keluhan;
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
    public function save()
    {
        $this->validate();
        $session = Session::get('authenticate');


        $jadwalPeriksa = new DaftarPoli();
        $jadwalPeriksa->id_pasien = $session->user_id;
        $jadwalPeriksa->id_jadwal = $this->jadwal;
        $jadwalPeriksa->keluhan = $this->keluhan;
        $latestRecord = DaftarPoli::where('id_jadwal', $this->jadwal)
            ->whereDate('created_at', now()->toDateString())
            ->latest('created_at')
            ->first();

        if ($latestRecord) {
            // If a record is found, increment no_antrian by 1
            $jadwalPeriksa->no_antrian = $latestRecord->no_antrian + 1;
        } else {
            // If no record is found, set no_antrian to 1
            $jadwalPeriksa->no_antrian = 1;
        }

        $jadwalPeriksa->save();
        return  $this->redirect('/dashboard/pasien');


        // Post::create(
        //     $this->only(['title', 'content'])
        // );

        // return $this->redirect('/posts')
        //     ->with('status', 'Post successfully created.');
    }
}
