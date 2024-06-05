<?php

namespace App\Http\Controllers;

use App\Models\KelasDetail;
use App\Models\Setoran;
use App\Models\Surah;
use App\Models\User;
use Illuminate\Http\Request;

class SetoranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $siswas = User::where('is_siswa', true)->get();         
        $surahs = Surah::all(); 
        $siswas = KelasDetail::all(); 
    
        return view('dashboard.setoran.index', [
            'siswas' => $siswas, 
            'surahs' => $surahs
        ]);
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
        $validatedData = $request->validate([
            'date' => 'required',
            'name_student' => 'required',
            'name_class' => 'required',
            'type_class' => 'required',
            'surah' => 'required|array', // Validasi untuk memastikan data surah berupa array
            'information' => 'required',
            'created_by' => 'required',
        ]);
    
        // Gabungkan nilai surah yang dipilih menjadi satu string yang dipisahkan oleh koma
        $surahString = implode(',', $validatedData['surah']);
    
        // Simpan data ke dalam database
        Setoran::create([
            'date' => $validatedData['date'],
            'name_student' => $validatedData['name_student'],
            'name_class' => $validatedData['name_class'],
            'type_class' => $validatedData['type_class'],
            'surah' => $surahString,
            'information' => $validatedData['information'],
            'created_by' => $validatedData['created_by'],
        ]);
    
        return redirect('/setoran')->with('success', 'Data Setoran Berhasil Ditambahkan');
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
