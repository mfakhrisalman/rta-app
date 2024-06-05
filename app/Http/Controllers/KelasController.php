<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\KelasDetail;
use App\Models\User;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelas = Kelas::all(); 
        return view('dashboard.kelas.index', ['kelass' => $kelas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $guru = User::where('is_guru',true)->get();
        return view('dashboard.kelas.create', ['gurus' => $guru]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'name_class' => 'required',
            'name_teacher' => 'required',
            'room' => 'required',
            'information' => 'required',
        ]);
        
        User::updated($validatedData);
        Kelas::create($validatedData);
    
        return redirect('/kelas')->with('success', 'Data Kelas Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kelas $kela)
    {
        $siswas = User::where('is_siswa', true)->get(); // Ambil semua data guru dari model Siswa
        $detail_siswa = KelasDetail::all(); 
     
        return view('dashboard.kelas_detail.index', [
            'kelas' => $kela,
            'siswas' => $siswas, // Kirim data siswa ke tampilan
            'detail_siswas' => $detail_siswa
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */

     public function edit(Kelas $kela)
     {
         $gurus = User::where('is_guru', true)->get(); // Ambil semua data guru dari model Guru
     
         return view('dashboard.kelas.edit', [
             'kelas' => $kela,
             'gurus' => $gurus // Kirim data guru ke tampilan
         ]);
     }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kelas $kela)
    {
        
        $validatedData = $request->validate([
            'name' => 'required',
            'name_class' => 'required',
            'name_teacher' => 'required',
            'room' => 'required',
            'information' => 'required',
        ]);

        // Perbarui data pada database
        $kela->update($validatedData);
    
        return redirect('/kelas')->with('success', 'Data Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kelas $kela)
    {
        Kelas::destroy($kela->id);
        return redirect('/kelas')->with('success', 'Data Kelas Berhasil Dihapus');
    } 

    public function tambahSiswa(Request $request)
    {
        $validatedData = $request->validate([
            'name_class' => 'required',
            'type_class' => 'required',
            'name_teacher' => 'required',
            'room' => 'required',
            'name_student' => 'required',
        ]);
        
        KelasDetail::create($validatedData);
        return redirect()->back()->with('success', 'Data Siswa Berhasil Ditambahkan');
    }
    
    public function destroySiswa(KelasDetail $detail_siswa)
    {
        KelasDetail::destroy($detail_siswa->id);
        return redirect()->back()->with('success', 'Data Kelas Berhasil Dihapus');
    } 
};
