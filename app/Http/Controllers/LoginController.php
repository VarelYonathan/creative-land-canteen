<?php

namespace App\Http\Controllers;

use App\Models\Gerai;
use App\Models\Penjual;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:penjual')->except('logout');
        $this->middleware('guest:kasir')->except('logout');
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
            'url' => "kasir"
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
            // 'email' => 'required|email:dns',
            'username' => 'required',
            'password' => 'required'
        ]);
        if (Auth::guard('penjual')->attempt($credentials)) {
            // if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Penjual::where('username', $request->username)->get();
            $request->session()->put('user', $user);
            return redirect()->intended("/HalamanUtamaPenjual/$request[username]");
        }
        return redirect()->intended('/');
        return back()->with('loginError', "Login Failed!");

        dd('berhasil login!');
    }
    public function loginAsKasir(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        if (Auth::guard('kasir')->attempt($credentials)) {
            $request->session()->regenerate();
            $user = Penjual::where('username', $request->username)->get();
            $request->session()->put('user', $user);
            return redirect()->intended('/HalamanUtamaKasir');
        }
        return redirect()->intended('/');
        return back()->with('loginError', 'Login Failed!');

        dd('berhasil login!');
    }

    public function logout()
    {
        Session::flush();

        Auth::logout();

        return redirect('/');
    }
}