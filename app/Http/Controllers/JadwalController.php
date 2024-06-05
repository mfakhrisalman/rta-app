<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\User;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $jadwal = Jadwal::all();
        $jadwal = Jadwal::selectRaw('name, year')
                        ->groupBy('name', 'year')
                        ->get();
        return view('dashboard.jadwal.index', ['jadwals' => $jadwal]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.jadwal.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $siswa = User::where('status', 'Aktif')->where('is_siswa', true)->get();

        foreach ($siswa as $s) {
            $jadwal = new Jadwal();
            $jadwal->id_jadwal = $s->id;
            $jadwal->name = $request->name;
            $jadwal->year = $request->year;
            $jadwal->status = 'Belum Daftar'; 
            $jadwal->save();
        }
        return redirect('/buat-jadwal')->with('success', 'Tagihan berhasil dibuat untuk semua siswa.');
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
    public function destroy($id)
    {
        // Mencari jadwal berdasarkan ID
        dd($id);
        $jadwal = Jadwal::findOrFail($id);

        // Menghapus jadwal
        $jadwal->delete();

        // Redirect kembali dengan pesan sukses
        return redirect('/buat-jadwal')->with('success', 'Jadwal ujian berhasil dihapus');
    }
}
