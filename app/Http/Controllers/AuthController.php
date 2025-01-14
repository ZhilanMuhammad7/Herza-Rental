<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function postLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (Auth::user()->role == 'admin') {
                return redirect('/dashboard');
            } elseif (Auth::user()->role == 'user') {
                return redirect()->route('login')->with('error', 'Anda tidak memiliki akses admin!');
            } else {
                return redirect()->route('login')->with('error', 'Email atau password salah!');
            }
        }
        return redirect()->route('login')->with('error', 'Email atau password salah!');
    }
    public function postRegister(Request $request)
    {

        if (User::where('email', $request->email)->exists()) {
            return redirect()->route('register')->with('error', 'Email sudah pernah didaftarkan');
        }

        $data = new User;

        $data->nama = $request->nama;
        $data->email = $request->email;
        $data->password = Hash::make($request->input('password'));
        $data->no_hp = $request->no_hp;
        $data->alamat = $request->alamat;
        $data->role = 'user';

        $post = $data->save();

        if ($post) {
            return redirect()->route('login')->with('success', 'Berhasil Melakukan Pendaftaran');
        } else {
            return redirect()->route('login')->with('error', 'Gagal Melakukan Pendaftaran');
        }
    }

    public function login()
    {
        if (auth()->user() != null) {
            return redirect('dashboard');
        }
        return view('auth.login');
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect('/login');
    }

    public function register()
    {
        return view('auth.register');
    }
}
