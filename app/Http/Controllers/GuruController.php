<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guru = User::where('is_guru',true)->get(); 
        return view('dashboard.guru.index', ['gurus' => $guru]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.guru.create');
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
            'is_guru' => 'required',
            'password' => 'required',
        ]);
    
        User::create($validatedData);
    
        return redirect('/guru')->with('success', 'Data Guru Berhasil Ditambahkan');
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
    public function edit(User $guru)
    {
        return view('dashboard.guru.edit',[
            'guru' => $guru
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $guru)
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
        $guru->update($validatedData);
    
        return redirect('/guru')->with('success', 'Data Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $guru)
    {
        User::destroy($guru->id);
        return redirect('/guru')->with('success', 'Data Guru Berhasil Dihapus');
    }   
}
