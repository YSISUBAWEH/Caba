<?php

namespace App\Http\Controllers\Sayhai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class LoginController extends Controller
{
    public function login() {
        return view('masuk');
    }

    public function dologin(Request $request) {
        // validasi
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        if (auth()->attempt($credentials)) {

            // buat ulang session login
            $request->session()->regenerate();
            if (auth()->user()->role_id === 1) {
                // jika user superadmin
                return redirect()->intended('/manager');
            } else {
                // jika user pegawai
                return redirect()->intended('/kasir');
            }
        }

        // jika email atau password salah
        // kirimkan session error
        return back()->with('error', 'username atau password salah');
    }

    public function logout(Request $request) {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
