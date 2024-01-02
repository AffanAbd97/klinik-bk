<?php

namespace App\Http\Controllers;

use App\Models\DaftarPoli;
use App\Models\Periksa;


class PeriksaController extends Controller
{
    public function index(DaftarPoli $daftarPoli)
    {
        $detail = Periksa::where('id_daftar_poli', $daftarPoli->id)->first();
        return view('pages.home-pasien.periksa.index', [
            'detail' => $detail,
            'poli' => $daftarPoli
        ]);

    }
}
