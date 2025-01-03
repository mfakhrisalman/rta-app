<?php

namespace App\Http\Controllers;

use App\Charts\JumlahSiswaChart;
use App\Charts\KelasBayarChart;
use App\Models\Jadwal;
use App\Models\KelasDetail;
use App\Models\KritikSaran;
use App\Models\Tagihan;
use App\Models\User;
use ArielMejiaDev\LarapexCharts\LarapexChart; // Import LarapexChart
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'totalPendaftars' => User::where('is_siswa', false)
                ->where('is_admin', false)
                ->where('is_guru', false)
                ->count(),
            'totalSiswas' => User::where('is_siswa', true)->count(),
            'totalGurus' => User::where('is_guru', true)->count(),
            'totalKritikSarans' => KritikSaran::count(),
            'totalKonfirmasi' => Tagihan::where('status', 'Menunggu Konfirmasi')->count(),
        ];
    
        $dataKelas = KelasDetail::where('name_student', auth()->user()->name)->get();
        $spp = Tagihan::where('id_tagihan', auth()->user()->id)->get();
        $sppT = Tagihan::where('id_tagihan', auth()->user()->id)->where('status','Belum Lunas')->count();
        
        $daftar_ujian = Jadwal::where('id_jadwal', auth()->user()->id)->get();

        $jumlahSiswaChart = new JumlahSiswaChart(); // Inisialisasi variabel $jumlahSiswaChart
        $jumlahSiswaKelas = $jumlahSiswaChart->build();

      // Create a new instance of LarapexChart
      $larapexChart = new LarapexChart;

      // Pass the instance of LarapexChart to KelasBayarChart constructor
      $kelasBayarChart = new KelasBayarChart($larapexChart);
      $kelasBayarSpp = $kelasBayarChart->build();
        
        return view('dashboard.index', compact('data', 'dataKelas', 'spp', 'sppT', 'jumlahSiswaKelas','kelasBayarSpp','daftar_ujian'));
    }
    public function edit()
    {
        // Dapatkan nama pengguna yang sedang login
        $userName = Auth::user()->name;
        
        // Ambil data dari model User berdasarkan nama pengguna
        $data = User::where('name', $userName)->get();
        // Kirim data ke view
        return view('dashboard.edit_biodata', ['datas' => $data]);
    }
    public function update(Request $request)
    {
        // Validasi data yang diterima
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'nohp' => 'required',
            'address' => 'required',
            'birth_date' => 'required',
        ]);
    
        // Cari jadwal berdasarkan id pengguna
        $datadiri = User::where('id', $request->id)->first();
    
        if ($datadiri) {
            // Update data
            $datadiri->email = $request->email;
            $datadiri->name = $request->name;
            $datadiri->nohp = $request->nohp;
            $datadiri->address = $request->address;
            $datadiri->birth_date = $request->birth_date;
            $datadiri->save();
    
        return redirect('/dashboard');
        }
    }
}
