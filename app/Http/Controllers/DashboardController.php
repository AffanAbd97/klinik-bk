<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Periksa;
use App\Models\DaftarPoli;
use Illuminate\Http\Request;
use App\Models\JadwalPeriksa;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index()
    {

        $session = Session::get('authenticate');
        if ($session->peran == 'Admin') {
            return redirect()->route('admin.home');
        } else if ($session->peran == 'Dokter') {
            return redirect()->route('dokter.home');
        } else if ($session->peran == 'Pasien') {
            return redirect()->route('pasien.home');
        } else {
            return redirect('/');
        }
     

    }
    public function dashboardDokter()
    {
        $session = Session::get('authenticate');
        $poli = Dokter::find($session->user_id)->first()->poli;
        
        $session = Session::get('authenticate');
        $jadwals = JadwalPeriksa::where('id_dokter', $session->user_id)->where('aktif','1')->get();
        $jadwal_ids = $jadwals->pluck('id')->toArray();
        $daftarPoli = DaftarPoli::whereIn('id_jadwal', $jadwal_ids)->get();
        $poli_ids = $daftarPoli->pluck('id')->toArray();
        $pasien = Periksa::whereIn('id_daftar_poli', $poli_ids)->paginate(5);

        return view('pages.home-dokter.index', [
            'poli' => $poli,
            'jadwals' => $jadwals,
            'pasien' => $pasien,
        ]);
    }
    public function dashboardPasien()
    {

        $daftar = DaftarPoli::paginate(5);
        return view('pages.home-pasien.index', ['daftar' => $daftar]);
    }
    public function dashboardAdmin()
    {
        // Your code here
        $dokter = Dokter::all();
        $pasien = Pasien::all();
        $obat = Obat::all();
        return view(
            'pages.home-admin.index',
            [
                'obat' => $obat,
                'pasien' => $pasien,
                'dokter' => $dokter,
            ]
        );
    }

    public function pasienAdmin()
    {
       
        return view(
            'pages.pasien-admin.index'
        );
    }
    public function riwayatPasien()
    {
        $session = Session::get('authenticate');
        $jadwal_periksa = JadwalPeriksa::where('id_dokter', $session->user_id)->get();
        $jadwal_ids = $jadwal_periksa->pluck('id')->toArray();
        $poli = DaftarPoli::whereIn('id_jadwal', $jadwal_ids)->get();
        $poli_ids = $poli->pluck('id')->toArray();
        $pasien = Periksa::whereIn('id_daftar_poli', $poli_ids)->paginate(5);

        return view('pages.home-dokter.riwayat.index', [
            'pasien' => $pasien

        ]);
    }
}
