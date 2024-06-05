<?php

namespace App\Http\Controllers;

use App\Models\Setoran;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->check()) {
            $user = auth()->user();
            
            // Cek apakah user adalah seorang guru
            if ($user->is_admin) {
                $riwayat = Setoran::all(); // Menampilkan semua data
            } else {
                $userName = $user->name;
                $riwayat = Setoran::where('name_student', $userName)->get();
            }
    
            return view('dashboard.riwayat.index', ['riwayats' => $riwayat]);
        } else {
            return redirect('/')->with('error', 'Mohon Login Untuk Melihat Riwayat Pelanggaran Siswa');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
