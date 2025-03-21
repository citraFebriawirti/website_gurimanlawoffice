<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class loginController extends Controller
{
    public function index(Request $request)
    {

        // return 'hal login';
        return view('pages.login.index');
    }


    public function login(Request $request)
    {
        $validasi = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);


        // autentikasi user
        if (auth()->attempt($validasi)) {

            if (auth()->user()->status_user == 'Aktif') {

                $request->session()->regenerate();

                $request->session()->put('id_user', auth()->user()->id_user);
                $request->session()->put('nama_user', auth()->user()->nama_user);
                $request->session()->put('jenis_kelamin_user', auth()->user()->jenis_kelamin_user);
                $request->session()->put('alamat_user', auth()->user()->alamat_user);
                $request->session()->put('nomor_user', auth()->user()->nomor_user);
                $request->session()->put('password', auth()->user()->password);
                $request->session()->put('email', auth()->user()->email);

                return redirect('/dashboard')->with('success', 'anda berhasil login');
            } else {
                return redirect('/login')->with('error', 'akun anda tidak aktif');
            }
        } else {
            return redirect('/login')->with('error', 'email atau password salah');
        }
    }
}