<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use App\Models\Pasien;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        $session = Session::get('authenticate');
        if ($session) {
            return redirect('/');
        }
        return view("login");
    }


    public function login_dokter()
    {
        $session = Session::get('authenticate');
        if ($session) {
            return redirect('/');
        }
        return view("auth.login", [
            'registerLink' => false,
            'tipe' => 'Dokter'
        ]);
    }

    public function login_admin()
    {
        $session = Session::get('authenticate');
        if ($session) {
            return redirect('/');
        }
        return view("auth.login", [
            'registerLink' => false,
            'tipe' => 'Administrator'
        ]);
    }

    public function login_pasien()
    {
        $session = Session::get('authenticate');
        if ($session) {
            return redirect('/');
        }
        return view("auth.login", [
            'registerLink' => true,
            'tipe' => 'Pasien'
        ]);
    }
    public function register()
    {
        $session = Session::get('authenticate');
        if ($session) {
            return redirect('/');
        }
        return view("auth.register");

    }
    public function authenticate(Request $request)
    {

        $credentials = $request->validate([
            'email' => 'required|email|exists:akun,email',
            'password' => 'required'
        ],[
          'email.exists'=>'Email Not Found'  
        ]);



        $akun = Akun::where('email', $request->email)->first();
        $correctPassword = Hash::check($request->password, $akun->password);
        if ($correctPassword) {
            Session::put('authenticate', $akun);
            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'email' => 'Your provided credentials do not match in our records.',
        ])->onlyInput('email');
    }
    public function save(Request $request)
    {


        $credentials = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:akun,email',
            'alamat' => 'required',
            'NIK' => 'required|numeric',
            'telp' => 'required|numeric',
            'password' => 'min:8|required|confirmed'
        ]);



        $currentMonth = date('m');
        $currentYear = date('Y');


        $currentMonthYear = $currentYear . $currentMonth;
        $lastData = Pasien::where('no_rm', 'like', $currentMonthYear . '%')->orderBy('no_rm', 'desc')->first();


        $lastThreeDigits = $lastData ? (int) substr($lastData->no_rm, -3) + 1 : 1;


        $incrementedValue = sprintf('%03d', $lastThreeDigits);


        $newNoRm = $currentMonthYear . '-' . $incrementedValue;




        $pasien = new Pasien();
        $pasien->nama = $request->name;
        $pasien->alamat = $request->alamat;
        $pasien->no_ktp = $request->NIK;
        $pasien->no_hp = $request->telp;
        $pasien->no_rm = $newNoRm;
        $pasien->save();


        $akun = new Akun();
        $akun->user_id = $pasien->id;
        $akun->nama = $request->name;
        $akun->password = Hash::make($request->password);
        $akun->email = $request->email;
        $akun->peran = 'Pasien';
        $akun->save();
        notify()->success('Silahkan Login Ke Akun Anda', 'Pendaftaran Berhasil');
        return redirect()->route('login.pasien');
    }
    public function logout()
    {
        Session::forget('authenticate');

        return redirect()->back();


    }
}
