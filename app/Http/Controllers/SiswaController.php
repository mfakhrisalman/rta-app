<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswa = User::where('is_siswa',true)->get(); 
        return view('dashboard.siswa.index', ['siswas' => $siswa]);
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
    public function edit(User $siswa)
    {
        return view('dashboard.siswa.edit',[
            'siswa' => $siswa
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $siswa)
    {
        $validatedData = $request->validate([
            'email' => 'required',
            'name' => 'required',
            'class' => 'required',
            'nohp' => 'required',
            'address' => 'required',
            'birth_date' => 'required',
            'status' => 'required',
        ]);

        // Perbarui data pada database
        $siswa->update($validatedData);
    
        return redirect('/siswa')->with('success', 'Data Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $siswa)
    {
        User::destroy($siswa->id);
        return redirect('/siswa')->with('success', 'Data Siswa Berhasil Dihapus');
    }  
}
