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
    
        $field = 'email'; 
    
        $user = null;
        if($field === 'email'){
            $user = Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']]);
        }
    
        if ($user) {
            // Pengecekan is_guru
            if (auth()->user()->is_guru) {
                return redirect()->to('/setoran');
            } else {
                $request->session()->regenerate();
                return redirect()->intended('/dashboard');
            }
        }
        
        return back()->with('loginError', 'Login Gagal!');
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
