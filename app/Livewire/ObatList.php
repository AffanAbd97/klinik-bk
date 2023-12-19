<?php

namespace App\Livewire;

use App\Models\Obat;
use Livewire\Component;
use Livewire\WithPagination;

class ObatList extends Component
{
    use WithPagination;
    public $search='';
    protected $queryString = ['search'];
    protected $paginationTheme = 'tailwind';

    public function render()
    {
        $obat = Obat::where('nama_obat', 'like', '%'.$this->search.'%')->paginate(7);
        return view('livewire.obat-list', [
            'obat' => $obat
        ]);
    }
}
