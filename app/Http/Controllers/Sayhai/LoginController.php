<?php

namespace App\Http\Controllers\Sayhai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

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

                $toid = auth()->user()->toko_id;
                if($toid == 1){
                    return redirect()->intended('/owner/create-toko');
                }else{
                    // jika user superadmin
                    return redirect()->intended('/owner/dashboard');
                }
            } else {
                // jika user pegawai
                return redirect()->intended('/kasir/dashboard');
            }
        }

        // jika email atau password salah
        // kirimkan session error
        return back()->with('error', 'username atau password salah');
    }
     public function register() {
        return view('daftar');
    }

    public function dodaftar(Request $request) {
        $request->validate([
            'name' => 'required|unique:users',
            'username' => 'required|unique:users',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ]);

        $user = User::create([
            'foto' => 'face-1.jpg',
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role_id' => '1',
            'toko_id' => '1'
        ]);
        if($user){
        return redirect()->route('login')->with('success', 'Berhasil Daftar. Mohon Login!');
        }else{
            return back()->with(
            'password', 'Wrong username or password'
        );
        }
    }

    public function logout(Request $request) {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
