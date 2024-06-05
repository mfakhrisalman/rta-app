<?php

namespace App\Http\Controllers;

use App\Models\Tagihan;
use App\Models\User;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_pembayaran = User::with('tagihans');

        if (auth()->user()->is_admin) {
            $data_pembayaran = $data_pembayaran->get();
        } else {
            $data_pembayaran = $data_pembayaran
                ->where('is_siswa', true)
                ->whereHas('tagihans', function ($query) {
                    $query->where('id_tagihan', auth()->user()->id);
                })
                ->get();
        }
        return view('dashboard.pembayaran.data_pembayaran', ['data_pembayarans' => $data_pembayaran]);
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
    public function edit(Request $request, $id)
    {
        // Ambil data pembayaran berdasarkan ID
        $data_pembayaran = User::findOrFail($id);
        
        // Ambil ID tagihan dari query string
        $tagihan_id = $request->query('tagihan_id');
        $bulan = $request->query('bulan');
        $tahun = $request->query('tahun');
        // Ambil data tagihan berdasarkan ID
        $tagihan = Tagihan::where('id_tagihan', $tagihan_id)
                   ->where('month', $bulan) 
                   ->where('year', $tahun) 
                   ->firstOrFail();
        // Kirim data ke view edit
        return view('dashboard.pembayaran.edit', compact('data_pembayaran', 'tagihan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // Validasi data yang diterima dari permintaan
        $validatedData = $request->validate([
            'status' => 'required|string|max:255',
        ]);
    
        try {
            // Ambil data tagihan berdasarkan ID tagihan
            $tagihan = Tagihan::findOrFail($request->input('id'));
    
            // Perbarui data tagihan
            $tagihan->update([
                'status' => $validatedData['status'],
            ]);
    
            // Redirect ke halaman pembayaran dengan pesan sukses
            return redirect('/pembayaran')->with('success', 'Data Pembayaran SPP berhasil diperbarui.');
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            return redirect()->back()->with('error', 'Terjadi kesalahan. Silakan coba lagi.');
        }
    }
    
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
