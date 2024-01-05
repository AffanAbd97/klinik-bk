<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function destroy(Pasien $pasien)
    {
        $akun = Akun::where('user_id', $pasien->id)->first();
        $akun->delete();
        $pasien->delete();
        return redirect()->route('dokter.index');
    }
    public function edit(Pasien $pasien)
    {
        return view('pages.pasien.edit', [
          
              'pasien' => $pasien
        ]);

    }
    public function update(Request $request, Pasien $pasien)
    {
    
        $credentials = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_ktp' => 'required',
            'no_hp' => 'required|numeric',

        ]);


        $pasien->nama = $request->nama;
        $pasien->alamat = $request->alamat;
        $pasien->no_hp = $request->no_hp;
        $pasien->no_ktp = $request->no_ktp;
        $pasien->save();


        notify()->success('Data Di Update', 'Berhasil');

        return redirect()->route('admin.pasien');
    }
}
