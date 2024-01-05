<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use App\Models\Poli;
use App\Models\Dokter;
use Illuminate\Http\Request;
use App\Models\DetailPeriksa;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class DokterController extends Controller
{
    public function index()
    {
        return view('pages.dokter-admin.index');
    }
    public function create()
    {
        $poli = Poli::all();

        return view('pages.dokter-admin.create', [
            'poli' => $poli
        ]);
    }

    public function store(Request $request)
    {

        $credentials = $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:akun,email',
            'alamat' => 'required',
            'poli' => 'required',
            'no_hp' => 'required|numeric',
            'password' => 'min:8|required|confirmed'
        ]);

        $dokter = new Dokter();
        $dokter->nama = $request->nama;
        $dokter->alamat = $request->alamat;
        $dokter->no_hp = $request->no_hp;
        $dokter->id_poli = $request->poli;
        $dokter->save();


        $akun = new Akun();
        $akun->user_id = $dokter->id;
        $akun->nama = $request->nama;
        $akun->password = Hash::make($request->password);
        $akun->email = $request->email;
        $akun->peran = 'Dokter';
        $akun->save();

        notify()->success('Data Di Tambahkan', 'Berhasil');
        return redirect()->route('dokter.index');
    }

    public function destroy(Dokter $dokter)
    {
        $akun = Akun::where('user_id', $dokter->id)->first();
        $akun->delete();
        $dokter->delete();
        notify()->success('Data Di Hapus', 'Berhasil');
        return redirect()->route('dokter.index');
    }
    public function edit(Dokter $dokter)
    {

        $poli = Poli::all();

        return view('pages.dokter-admin.edit', [
            'poli' => $poli,
            'dokter' => $dokter
        ]);

    }
    public function update(Request $request, Dokter $dokter)
    {
        $credentials = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'poli' => 'required',
            'no_hp' => 'required|numeric',

        ]);


        $dokter->nama = $request->nama;
        $dokter->alamat = $request->alamat;
        $dokter->no_hp = $request->no_hp;
        $dokter->id_poli = $request->poli;
        $dokter->save();

        notify()->success('Data Di Update', 'Berhasil');


        return redirect()->route('dokter.index');
    }
}
