<?php

namespace App\Http\Controllers;

use App\Models\RiwayatUjian;
use Illuminate\Http\Request;

class RiwayatUjianController extends Controller
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
                $riwayat = RiwayatUjian::all(); // Menampilkan semua data
            } else {
                $userId = $user->id;
                $riwayat = RiwayatUjian::where('id_student', $userId)->get();
            }
    
            return view('dashboard.jadwal.riwayat_ujian', ['riwayats' => $riwayat]);
        } else {
            return redirect('/')->with('error', 'Mohon Login Untuk Melihat Riwayat Ujian Siswa');
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

    public function edit($id)
    {
        $riwayat = RiwayatUjian::findOrFail($id);
        return view('dashboard.jadwal.riwayat_ujian_edit', compact('riwayat'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi input
        $validated = $request->validate([
            'score' => 'required|numeric|min:0|max:100', // Score wajib diisi, antara 0-100
            'status' => 'required|string',              // Status wajib diisi
        ]);
    
        // Cari data berdasarkan ID
        $riwayat = RiwayatUjian::findOrFail($id);
    
        // Update hanya kolom score dan status
        $riwayat->update([
            'score' => $validated['score'],
            'status' => $validated['status'],
        ]);
    
        // Redirect dengan pesan sukses
        return redirect('/catatan-ujian')->with('success', 'Score dan status berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
