<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;
use App\Models\JadwalPeriksa;
use Illuminate\Support\Facades\Session;


class JadwalController extends Controller
{

    public function index()
    {

        $session = Session::get('authenticate');
        $id = $session->user_id;

        $dataJadwal = JadwalPeriksa::where('id_dokter', $id)->paginate(5);

        return view('pages.home-dokter.jadwal.index', [
            'dataJadwal' => $dataJadwal
        ]);

    }

    public function create()
    {



        return view('pages.home-dokter.jadwal.create');

    }


    public function store(Request $request)
    {
        $session = Session::get('authenticate');
        $id = $session->user_id;
        // dd($request->all());   
        $credentials = $request->validate([
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',

        ]);
        $currenDokter = Dokter::find($id);
        $dokters = Dokter::where('id_poli', $currenDokter->id_poli)->get();
        $dokterIds = $dokters->pluck('id')->toArray();
        $dataJadwal = JadwalPeriksa::whereIn('id_dokter', $dokterIds)->get();

        if ($dataJadwal->contains('hari', $request->hari)) {
            return redirect()->back()->withErrors(['hari' => 'The selected hari already exists.']);
        }

        $jadwal = new JadwalPeriksa();
        $jadwal->hari = $request->hari;
        $jadwal->jam_mulai = $request->jam_mulai;
        $jadwal->jam_selesai = $request->jam_selesai;
        $jadwal->id_dokter = $currenDokter->id;
        $jadwal->save();


        return redirect()->route('jadwal.index');
    }

    public function destroy(JadwalPeriksa $jadwal)
    {

        $jadwal->delete();
        return redirect()->route('jadwal.index');
    }
    public function edit(JadwalPeriksa $jadwal)
    {
        return view('pages.home-dokter.jadwal.edit', [
            'jadwal' => $jadwal
        ]);

    }
    public function update(Request $request, JadwalPeriksa $jadwal)
    {

        $session = Session::get('authenticate');
        $id = $session->user_id;
        $credentials = $request->validate([
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',

        ]);
        $currenDokter = Dokter::find($id);
        $dokters = Dokter::where('id_poli', $currenDokter->id_poli)->get();
        $dokterIds = $dokters->pluck('id')->toArray();
        $dataJadwal = JadwalPeriksa::whereIn('id_dokter', $dokterIds)->get();

        if ($dataJadwal->contains('hari', $request->hari)) {
            return redirect()->back()->withErrors(['hari' => 'The selected hari already exists.']);
        }


        $jadwal->hari = $request->hari;
        $jadwal->jam_mulai = $request->jam_mulai;
        $jadwal->jam_selesai = $request->jam_selesai;
        $jadwal->id_dokter = $currenDokter->id;
        $jadwal->save();


        return redirect()->route('jadwal.index');
    }
}
