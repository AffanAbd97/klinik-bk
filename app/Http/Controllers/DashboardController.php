<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
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
        // Your code here

    }
    public function dashboardDokter()
    {
        $session = Session::get('authenticate');
        $poli = Dokter::find($session->user_id)->first()->poli;
        $jadwal = JadwalPeriksa::where('id_dokter', $session->user_id)->first();
        return view('pages.home-dokter.index', [
            'poli' => $poli,
            'jadwal' => $jadwal,
        ]);
    }
    public function dashboardPasien()
    {
        // Your code here  
        $daftar = DaftarPoli::paginate(5);
        return view('pages.home-pasien.index', ['daftar' => $daftar]);
    }
    public function dashboardAdmin()
    {
        // Your code here
        return view('pages.home-admin.index');
    }
}
