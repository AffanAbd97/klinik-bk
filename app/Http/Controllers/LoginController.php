<?php

namespace App\Http\Controllers;

use App\Models\Akun;
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
    public function authenticate(Request $request)
    {

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);


    
        $akun = Akun::where('email', $request->email)->first();
        $correctPassword = Hash::check( $request->password ,  $akun->password );
        if ($correctPassword) {
            Session::put('authenticate', $akun);
            return redirect('/');
        }
    
        return back()->withErrors([
            'email' => 'Your provided credentials do not match in our records.',
        ])->onlyInput('email');
    }

    public function logout()
    {
        Session::forget('authenticate');

        return redirect()->back();


    }
}
