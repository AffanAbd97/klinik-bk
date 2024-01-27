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
            'dataJadwal' => $dataJadwal,

        ]);
    }

    public function create()
    {



        return view('pages.home-dokter.jadwal.create');
    }


    public function store(Request $request)
    {
        // dd($request->all());
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

        if (isset($request->status)) {

            if ($dataJadwal->contains('hari', $request->hari)) {
                return redirect()->back()->withErrors(['hari' => 'The selected hari already exists.']);
            }
        }
        $dataAktiv = JadwalPeriksa::where('id_dokter',$currenDokter->id)->where('aktif', 'Y')->first();

        $jadwal = new JadwalPeriksa();
        $jadwal->hari = $request->hari;
        $jadwal->jam_mulai = $request->jam_mulai;
        $jadwal->jam_selesai = $request->jam_selesai;
        $jadwal->id_dokter = $currenDokter->id;
        $conflik = false;
        if (isset($request->status)) {

            if ($dataAktiv) {
                if ($dataAktiv->id != $jadwal->id) {
                    $dataAktiv->aktif = 'T';
                    $dataAktiv->save();
                    $conflik = true;
                }
            }
            $jadwal->aktif = 'Y';
        } else {
            $jadwal->aktif = 'T';
        }


        $jadwal->save();
        if ($conflik) {
            notify()->info('Terdapat Jadwal Yang Dinonaktifkan', 'Data Di Update');
        }else{

            notify()->success('Data Di Update', 'Berhasil');
        }
        return redirect()->route('jadwal.index');
    }

    public function destroy(JadwalPeriksa $jadwal)
    {

        $jadwal->delete();
        notify()->success('Data Di Hapus', 'Berhasil');
        return redirect()->route('jadwal.index');
    }
    public function edit(JadwalPeriksa $jadwal)
    {
        $dataAktiv = JadwalPeriksa::where('id_dokter', $jadwal->id_dokter)->where('aktif', '1')->first();
        // dd($dataAktiv->id);
        return view('pages.home-dokter.jadwal.edit', [
            'jadwal' => $jadwal,
            'dataAktiv' => $dataAktiv,
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
        $dataAktiv = JadwalPeriksa::where('id_dokter', $jadwal->id_dokter)->where('aktif', 'Y')->first();
        // if ($dataJadwal->contains('hari', $request->hari)) {
        //     return redirect()->back()->withErrors(['hari' => 'The selected hari already exists.']);
        // }



        $jadwal->hari = $request->hari;
        $jadwal->jam_mulai = $request->jam_mulai;
        $jadwal->jam_selesai = $request->jam_selesai;
        $jadwal->id_dokter = $currenDokter->id;
        $conflik = false;
        if (isset($request->status)) {

            if ($dataAktiv) {
                if ($dataAktiv->id != $jadwal->id) {
                    $dataAktiv->aktif = 'T';
                    $dataAktiv->save();
                    $conflik = true;
                }
            }
            $jadwal->aktif = 'Y';
        } else {
            $jadwal->aktif = 'T';
        }
        $jadwal->save();
        if ($conflik) {
            notify()->info('Terdapat Jadwal Yang Dinonaktifkan', 'Data Di Update');
        }else{

            notify()->success('Data Di Update', 'Berhasil');
        }
        return redirect()->route('jadwal.index');
    }
}
