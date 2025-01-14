<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\KelasDetail;
use App\Models\RiwayatUjian;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DaftarPendaftarUjianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::with(['jadwals', 'kelasDetails']);

        if (auth()->user()->is_admin) {
            $data = $data->get();
        } else {
            $data = $data
                ->where('is_siswa', true)
                ->whereHas('kelasDetails', function ($query) {
                    $query->whereHas('jadwals', function ($subQuery) {
                        $subQuery->where('id_jadwal', auth()->user()->id)
                                 ->whereColumn('kelas_details.name_student', 'jadwals.name')
                                 ->whereColumn('kelas_details.type_class', 'jadwals.class');
                    });
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

        // Validate the data
        $request->validate([
            'id' => 'required',
            'tabi' => 'required',
            'qty_juz' => 'required|integer',
            'status' => 'required',
            'name_student' => 'required',
            'class' => 'required',
            'name_class' => 'required',
        ]);
        // Find the 'Jadwal' based on the user ID
        $jadwal = Jadwal::where('id_jadwal', $request->id)->first();
    
        if ($jadwal) {
            // Update 'Jadwal' data
            $jadwal->tabi = $request->tabi;
            $jadwal->qty_juz = $request->qty_juz;
            $jadwal->status = $request->status;
            $jadwal->save();
    
            // Store the new data in 'RiwayatUjian'
            $riwayatUjian = new RiwayatUjian();
            $riwayatUjian->id_student = $request->id;
            $riwayatUjian->name_student = $request->name_student;
            $riwayatUjian->class = $request->class;
            $riwayatUjian->name_class = $request->name_class;
            $riwayatUjian->year = Carbon::now()->year;  // Set the current year
            $riwayatUjian->tabi = $request->tabi;
            $riwayatUjian->qty_juz = $request->qty_juz;
            $riwayatUjian->status = $request->status;
            $riwayatUjian->save();
    
            return redirect('/dashboard')->with('success', 'Data saved successfully!');
        }
    
        // If 'Jadwal' not found, return back with error
        return back()->with('error', 'Jadwal not found!');
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
