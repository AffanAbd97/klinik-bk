<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use App\Models\Poli;
use App\Models\Dokter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    public function index()
    {
 
        $session = Session::get('authenticate');
        $dokter = Dokter::find($session->user_id);
        $poli = Poli::all();
        return view('pages.home-dokter.profile.index', [
            'dokter' => $dokter,
            'poli' => $poli
        ]);

    }


    public function update(Request $request, Dokter $dokter)
    {

        $credentials = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'poli' => 'required',
            'no_hp' => 'required|numeric',

        ], [
            'required' => 'Kolom Ini tidak Boleh Kosong'
        ]);
        $dokter->nama = $request->nama;
        $dokter->alamat = $request->alamat;
        $dokter->no_hp = $request->no_hp;
        $dokter->poli = $request->id_poli;
        $dokter->save();
        notify()->success('Data Di Update', 'Berhasil');
        return redirect()->back();

    }
    public function savePassword(Request $request)
    {
        $credentials = $request->validate([
            'oldPassword' => 'required',

            'password' => 'min:8|required|confirmed'
        ], [
            'password.confirmed' => 'Password Tidak Sesuai',
        ]);
        $session = Session::get('authenticate');

        if (!Hash::check($request->oldPassword, $session->password)) {
            return redirect()->back()->withErrors(['oldPassword' => 'Password yang anda Masukkan Tidak Benar'])->withInput();
        }
        $akun = Akun::where('id', $session->id)->first();
        $akun->password = Hash::make($request->password);
        $akun->save();
        notify()->success('Silahkan Login KEmbali', 'Berhasil Mengubah Password');
        return redirect()->route('logout');

    }

}
