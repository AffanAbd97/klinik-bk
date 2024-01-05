<?php

namespace App\Http\Controllers;

use App\Models\Poli;
use Illuminate\Http\Request;

class PoliController extends Controller
{public function index()
    {

        return view('pages.poli.index');
    }
    public function create()
    {
        return view('pages.poli.create');
    }

    public function store(Request $request)
    {
      

        $validated = $request->validate([
            'nama_poli' => 'required',
            'keterangan' => 'required',
          
        ], [
            'nama_poli.required' => 'Diperlukan Sebuah Nama Untuk poli Ini',
            'keterangan.required' => 'Masukkan keterangan poli ini',
            
        ]);
        $poli = new Poli();
        $poli->nama_poli = $request->nama_poli;
        $poli->keterangan = $request->keterangan;
  
        $poli->save();
        
        notify()->success('Data Di Tambahkan', 'Berhasil');

        return redirect()->route('poli.index');

    }

    public function destroy(Poli $poli) {
        $poli->delete();
        notify()->success('Data Di Hapus', 'Berhasil');

        return redirect()->route('poli.index');
    }
    public function edit(Poli $poli) {
       
       return view('pages.poli.edit',[
        'poli'=>$poli
       ]);
    
    }
    public function update(Request $request,Poli $poli) {
        $validated = $request->validate([
            'nama_poli' => 'required',
            'keterangan' => 'required',
           
        ], [
            'nama_poli.required' => 'Diperlukan Sebuah Nama Untuk poli Ini',
            'keterangan.required' => 'Masukkan keterangan poli ini',
          
        ]);
       
        $poli->nama_poli = $request->nama_poli;
        $poli->keterangan = $request->keterangan;
    
        $poli->save();
        
        notify()->success('Data Di Update', 'Berhasil');

        return redirect()->route('poli.index');
    }
}
