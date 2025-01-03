<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        $title = 'Layanan';
        $active = 'layanan';
        
        return view('landing_page.layanan', compact('title', 'active'));
    }
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'birth_date' => 'required',
            'email' => 'required',
            'nohp' => 'required',
            'address' => 'required',
            'class' => 'required',
            'status' => 'required',
        ]);
    
        User::create($validatedData);
    
        return redirect('/daftar-berhasil')->with('success', 'Registrasi berhasil, Silahkan Login');
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
    
        // Cek apakah email ada di database
        $user = User::where('email', $credentials['email'])->first();
    
        if (!$user) {
            // Jika email tidak ditemukan
            return back()->with('loginError', 'Email tidak terdaftar!');
        }
    
        // Cek apakah password benar
        if (!Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']])) {
            // Jika email benar tetapi password salah
            return back()->with('loginError', 'Password salah!');
        }
    
        // Jika email dan password benar
        if ($user->is_guru) {
            return redirect()->to('/setoran');
        } else {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
    }
    
    
    public function daftarBerhasil()
    {
        return view('landing_page.daftar_berhasil');
    }
    
    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/layanan');
    }
}
