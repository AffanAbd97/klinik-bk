<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    //
    public function index()
    {
        // Your code here
        return view('pages.obat.index');
    }
    public function create()
    {

 
        return view('pages.obat.create');
    }

    public function store(Request $request)
    {
      

        $validated = $request->validate([
            'nama_obat' => 'required',
            'harga' => 'required',
            'kemasan' => 'required',
        ], [
            'nama_obat.required' => 'Diperlukan Sebuah Nama Untuk Obat Ini',
            'harga.required' => 'Masukkan Harga Obat ini',
            'kemasan.required' => 'Bagaimana Kemasana Obat ini?'
        ]);
        $obat = new Obat();
        $obat->nama_obat = $request->nama_obat;
        $obat->harga = $request->harga;
        $obat->kemasan = $request->kemasan;
        $obat->save();
        
        notify()->success('Data Di Tambahkan');

        return redirect()->route('obat.index');

    }

    public function destroy(Obat $obat) {
        $obat->delete();
        notify()->success('Data Di Hapus');

        return redirect()->route('obat.index');
    }
    public function edit(Obat $obat) {
       
       return view('pages.obat.edit',[
        'obat'=>$obat
       ]);
    
    }
    public function update(Request $request,Obat $obat) {
        $validated = $request->validate([
            'nama_obat' => 'required',
            'harga' => 'required',
            'kemasan' => 'required',
        ], [
            'nama_obat.required' => 'Diperlukan Sebuah Nama Untuk Obat Ini',
            'harga.required' => 'Masukkan Harga Obat ini',
            'kemasan.required' => 'Bagaimana Kemasana Obat ini?'
        ]);
       
        $obat->nama_obat = $request->nama_obat;
        $obat->harga = $request->harga;
        $obat->kemasan = $request->kemasan;
        $obat->save();
        
        notify()->success('Data Di Update');

        return redirect()->route('obat.index');
    }

}
