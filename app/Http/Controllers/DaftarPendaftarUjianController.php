<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\KelasDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DaftarPendaftarUjianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::with('jadwals');

        if (auth()->user()->is_admin) {
            $data = $data->get();
        } else {
            $data = $data
                ->where('is_siswa', true)
                ->whereHas('jadwals', function ($query) {
                    $query->where('id_jadwal', auth()->user()->id);
                })
                ->get();
        }
        return view('dashboard.jadwal.pendaftar_ujian', ['datas' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Dapatkan nama pengguna yang sedang login
        $userName = Auth::user()->name;
        
        // Ambil data dari model KelasDetail berdasarkan nama pengguna
        $data = KelasDetail::where('name_student', $userName)->get();
        // Kirim data ke view
        return view('dashboard.jadwal.daftar_ujian', ['datas' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang diterima
        $request->validate([
            'id' => 'required',
            'tabi' => 'required',
            'qty_juz' => 'required|integer',
            'status' => 'required',
        ]);
    
        // Cari jadwal berdasarkan id pengguna
        $jadwal = Jadwal::where('id_jadwal', $request->id)->first();
    
        if ($jadwal) {
            // Update data
            $jadwal->tabi = $request->tabi;
            $jadwal->qty_juz = $request->qty_juz;
            $jadwal->status = $request->status;
            $jadwal->save();
    
        return redirect('/dashboard');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
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
