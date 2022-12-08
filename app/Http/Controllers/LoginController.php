<?php

namespace App\Http\Controllers;

use App\Models\Gerai;
use App\Models\Penjual;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        // $this->middleware('guest:penjual')->except('logout');
        // $this->middleware('guest:kasir')->except('logout');
    }
    public function showLoginAsPenjual()
    {
        return view('HalamanLogin', [
            'title' => "Halaman Login",
            'url' => "penjual"
        ]);
    }
    public function showLoginAsKasir()
    {
        return view('HalamanLogin', [
            'title' => "Halaman Login",
            'url' => "pembeli"
        ]);
    }
    public function loginAsGuest()
    {
        return view('HalamanUtamaPembeli', [
            "title" => "Halaman Utama Pembeli",
            "gerai" => Gerai::get()
        ]);
    }

    public function loginAsPenjual(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            // 'username' => 'required',
            'password' => 'required'
        ]);
        // if (Auth::guard('penjual')->attempt($credentials)) {
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/HalamanUtamaPenjual');
        }
        echo "";
        // $shit = $credentials['username'];
        $shit = $credentials['email'];
        $sh = $credentials['password'];
        return back()->with('loginError', "Login Failed! $shit $sh");

        dd('berhasil login!');
    }
    public function loginAsKasir(Request $request)
    {
        $creadentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        if (Auth::guard('kasir')->attempt($creadentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/HalamanUtamaKasir');
        }
        // if (Auth::guard('kasir')->attempt(
        //     [
        //         'username' => $request->username,
        //         'password' => $request->password
        //     ],
        //     $request->get('remember')
        // )) {

        //     return redirect()->intended('/HalamanUtamaKasir');
        // }
        return back()->with('loginError', 'Login Failed!');

        dd('berhasil login!');
    }
}