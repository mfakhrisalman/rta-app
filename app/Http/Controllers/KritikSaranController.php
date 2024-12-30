<?php

namespace App\Http\Controllers;

use App\Models\KritikSaran;
use Illuminate\Http\Request;

class KritikSaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kritiksaran = KritikSaran::all(); 
        return view('dashboard.kritiksaran.index', ['kritiksarans' => $kritiksaran]);
    }
    public function kirim(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);

        dd($validatedData);
    
        KritikSaran::create($validatedData);
    
        return redirect('/kontak')->with('success', 'Terima Kasih Atas Kritik & Sarannya');
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
