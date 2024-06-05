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
}
