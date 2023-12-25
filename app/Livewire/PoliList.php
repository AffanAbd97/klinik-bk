<?php

namespace App\Livewire;

use App\Models\Poli;
use Livewire\Component;
use Livewire\WithPagination;

class PoliList extends Component
{
    use WithPagination;
    public $search = '';
    protected $queryString = ['search'];
    protected $paginationTheme = 'tailwind';
    public function render()
    {
        $poli = Poli::where('nama_poli', 'like', '%' . $this->search . '%')->paginate(7);
        return view('livewire.poli-list', [
            'poli' => $poli
        ]);
    }
}
