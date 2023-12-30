<?php

namespace App\Livewire;

use App\Models\Dokter;
use Livewire\Component;
use Livewire\WithPagination;

class DokterList extends Component
{
    use WithPagination;
    public $search='';
    protected $queryString = ['search'];
    protected $paginationTheme = 'tailwind';

    public function render()
    {
        $dokter = Dokter::where('nama', 'like', '%'.$this->search.'%')->paginate(7);
        return view('livewire.dokter-list', [
            'dokter' => $dokter
        ]);
    }
}
