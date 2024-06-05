<?php

namespace App\Http\Controllers;

use App\Models\donasi;
use Illuminate\Http\Request;

class DonasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $donasi = Donasi::all(); 
        return view('dashboard.donasi.index', ['donasis' => $donasi]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.donasi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'date' => 'required',
            'name_donor' => 'required',
            'amount' => 'required',
            'information' => 'required',
        ]);
    
        Donasi::create($validatedData);
    
        return redirect('/donasi')->with('success', 'Data Donasi Berhasil Ditambahkan');
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
    public function edit(Donasi $donasi)
    {
        return view('dashboard.donasi.edit',[
            'donasi' => $donasi
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Donasi $donasi)
    {
        // dd($donasi);
        $validatedData = $request->validate([
            'date' => 'required',
            'name_donor' => 'required',
            'amount' => 'required',
            'information' => 'required',
        ]);

        // Perbarui data pada database
        $donasi->update($validatedData);
    
        return redirect('/donasi')->with('success', 'Data Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Donasi $donasi)
    {
        Donasi::destroy($donasi->id);
        return redirect('/donasi')->with('success', 'Data Donasi Berhasil Dihapus');
    }  
}
