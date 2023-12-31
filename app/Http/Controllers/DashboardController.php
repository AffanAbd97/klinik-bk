<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\JadwalPeriksa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function dashboardDokter()
    {
        $session = Session::get('authenticate');
        $poli = Dokter::find($session->user_id)->first()->poli;
        $jadwal = JadwalPeriksa::where('id_dokter',$session->user_id)->first();
        return view('pages.home-dokter.index', [
            'poli' => $poli,
            'jadwal' => $jadwal,
        ]);
    }
    // public function dashboardDokter()
    // {
    //     // Your code here
    //     return view('pages.home-dokter.index');
    // }
    // public function dashboardDokter()
    // {
    //     // Your code here
    //     return view('pages.home-dokter.index');
    // }
}
