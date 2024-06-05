<?php

namespace App\Http\Controllers;

use App\Models\Tagihan;
use App\Models\User;
use Illuminate\Http\Request;

class TagihanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tagihan = Tagihan::selectRaw('MIN(id) as id, class, month, year, amount')
                          ->groupBy('class', 'month', 'year', 'amount')
                          ->get();
        return view('dashboard.pembayaran.index', ['tagihans' => $tagihan]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.pembayaran.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $siswa = User::where('status', 'Aktif')->where('is_siswa', true)->where('class', $request->class)->get();

        foreach ($siswa as $s) {
            $tagihan = new Tagihan();
            $tagihan->id_tagihan = $s->id;
            $tagihan->class = $request->class; 
            $tagihan->month = $request->month; 
            $tagihan->year = $request->year;
            $tagihan->amount = $request->amount; 
            $tagihan->status = 'Belum Lunas'; 
            $tagihan->save();
        }
        return redirect('/tagihan')->with('success', 'Tagihan berhasil dibuat untuk semua siswa.');
    }

    // ...

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
    public function destroy(Request $request, $id)
    {
        // Validasi permintaan
        $request->validate([
            'class' => 'required|string',
            'month' => 'required|string',
            'year' => 'required|string',
            'amount' => 'required|numeric',
        ]);
    
        // Dapatkan data yang akan dihapus
        $class = $request->input('class');
        $month = $request->input('month');
        $year = $request->input('year');
        $amount = $request->input('amount');
    
        // Hapus semua tagihan dengan atribut yang sama
        Tagihan::where('class', $class)
               ->where('month', $month)
               ->where('year', $year)
               ->where('amount', $amount)
               ->delete();
    
        return redirect('/tagihan')->with('success', 'Tagihan berhasil dihapus.');
    }
}
