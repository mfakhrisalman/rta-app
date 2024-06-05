<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PendaftarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pendaftar = User::where('status','Diproses')->Orwhere('status','Wawancara')->get(); 
        return view('dashboard.pendaftar.index', ['pendaftars' => $pendaftar]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.pendaftar.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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
    
        return redirect('/pendaftar')->with('success', 'Data Pendaftar Berhasil Ditambahkan');
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
    public function edit(User $pendaftar)
    {
        return view('dashboard.pendaftar.edit',[
            'pendaftar' => $pendaftar
        ]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $pendaftar)
    {
        $validatedData = $request->validate([
            'status' => 'required',
            'password' => 'required',
            'is_siswa' => 'required',
        ]);

        // Perbarui data pada database
        $pendaftar->update($validatedData);
    
        return redirect('/pendaftar')->with('success', 'Data Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $pendaftar)
    {
        User::destroy($pendaftar->id);
        return redirect('/pendaftar')->with('success', 'Data Pendaftar Berhasil Dihapus');
    }   
}
