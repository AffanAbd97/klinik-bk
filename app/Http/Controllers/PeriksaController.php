<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Periksa;
use App\Models\DaftarPoli;
use Illuminate\Http\Request;
use App\Models\DetailPeriksa;
use App\Models\JadwalPeriksa;
use Illuminate\Support\Facades\Session;


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


    public function indexDokter()
    {


        // $periksa = DaftarPoli::wherein;


        // $detail = Periksa::where('id_daftar_poli', $periksa->id)->first();
        return view('pages.home-dokter.periksa.index');

    }

    public function createPeriksa(DaftarPoli $detail)
    {


        // $periksa = DaftarPoli::wherein;


        // $detail = Periksa::where('id_daftar_poli', $periksa->id)->first();
        $obat = Obat::all();
        return view('pages.home-dokter.periksa.create', [
            'detail' => $detail,
            'obat' => $obat,
        ]);

    }

    public function savePeriksa(Request $request, DaftarPoli $detail)
    {

      
        // // $periksa = DaftarPoli::wherein;
        $total = 0;
        $obats = Obat::whereIn('id', $request->obat)->get();
        foreach ($obats as $item) {
            $total+=$item->harga;
        }
  
        $periksa = new Periksa();
        $periksa->id_daftar_poli = $request->idPeriksa;
        $periksa->tgl_periksa = $request->tglPeriksa;
        $periksa->catatan = $request->catatan;
        $periksa->biaya_periksa = $request->biaya + $total;
        $periksa->save();

        foreach ($obats as $item) {
            $detail = new DetailPeriksa();
            $detail->id_periksa = $periksa->id;
            $detail->id_obat = $item->id;
            $detail->save();
        }


      return redirect()->route('dokter.periksa');

    }

    public function editPeriksa(Request $request, Periksa $periksa)
    {

      
        $obat = Obat::all();
        return view('pages.home-dokter.periksa.edit', [
            'periksa' => $periksa,
            'obat' => $obat,
        ]);

    }

    public function updatePeriksa(Request $request, Periksa $periksa)
    {

      
        DetailPeriksa::where('id_periksa',$periksa->id)->delete();
        $total = 0;
        $obats = Obat::whereIn('id', $request->obat)->get();
        foreach ($obats as $item) {
            $total+=$item->harga;
        }
  
       
        $periksa->id_daftar_poli = $request->idPeriksa;
        $periksa->tgl_periksa = $request->tglPeriksa;
        $periksa->catatan = $request->catatan;
        $periksa->biaya_periksa = $request->biaya + $total;
        $periksa->save();

        foreach ($obats as $item) {
            $detail = new DetailPeriksa();
            $detail->id_periksa = $periksa->id;
            $detail->id_obat = $item->id;
            $detail->save();
        }


      return redirect()->route('dokter.periksa');

    }
}
