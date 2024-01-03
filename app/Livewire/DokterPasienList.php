<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\DaftarPoli;
use Livewire\WithPagination;
use App\Models\JadwalPeriksa;
use Illuminate\Support\Facades\Session;

class DokterPasienList extends Component
{

    use WithPagination;
    public $search='';
    protected $queryString = ['search'];
    protected $paginationTheme = 'tailwind';

   
    
    public function render()
    {
        $session = Session::get('authenticate');
        $jadwal_periksa = JadwalPeriksa::where('id_dokter',$session->user_id)->get();
        $jadwal_ids = $jadwal_periksa->pluck('id')->toArray();
        $pasien = DaftarPoli::whereIn('id_jadwal', $jadwal_ids)->paginate(5);
        return view('livewire.dokter-pasien-list',[
            'pasien'=>$pasien
        ]);
    }
}
