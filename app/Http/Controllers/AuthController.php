<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function authenticate(Request $request): RedirectResponse
    {
        // dd($request);
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Cek role user
            if (Auth::user()->role == 'admin') {
                return redirect()->route('admin.dashboard');
            }

            return redirect()->route('siswa.dashboard');

            // Jika role tidak diketahui
            Auth::logout();
            return redirect()->route('login')->with('info', 'Role tidak dikenali!');
        }

        return back()->with('info', 'Email atau password Anda salah!');
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        return redirect()->route('login');
    }
}
