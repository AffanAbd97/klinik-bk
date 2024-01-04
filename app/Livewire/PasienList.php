<?php

namespace App\Livewire;

use App\Models\Pasien;
use Livewire\Component;
use Livewire\WithPagination;

class PasienList extends Component
{
    use WithPagination;
    public $search='';
    protected $queryString = ['search'];
    protected $paginationTheme = 'tailwind';

    public function render()
    {
        $pasien = Pasien::where('nama', 'like', '%'.$this->search.'%')->paginate(7);
        return view('livewire.pasien-list', [
            'pasien' => $pasien
        ]);
    }
}
