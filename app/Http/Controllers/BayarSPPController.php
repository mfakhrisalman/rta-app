<?php

namespace App\Http\Controllers;

use App\Models\Tagihan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BayarSPPController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
        return view('dashboard.pembayaran.bayar_spp', compact('data_pembayaran', 'tagihan'));
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
    
            // Proses upload gambar baru jika ada
            if ($request->hasFile('receipt')) {
                // Simpan gambar ke storage dan dapatkan pathnya
                $imagePath = $request->file('receipt')->store('history_images', 'public');
                
                // Ubah nama field menjadi receipt_path sesuai dengan yang ada di database
                $validatedData['receipt'] = $imagePath;
                // dd($validatedData);

            }
    
            // Perbarui data tagihan
            $tagihan->update([
                'status' => $validatedData['status'],
                'receipt' => $validatedData['receipt'] ?? $tagihan->receipt_path, // Gunakan nilai existing jika tidak ada file baru
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
