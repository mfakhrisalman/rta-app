<?php

namespace App\Charts;

use App\Models\Tagihan;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class KelasBayarChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        // Inisialisasi array untuk menyimpan jumlah siswa lunas dan belum lunas untuk setiap bulan
        $lunasData = [];
        $belumLunasData = [];

        // Loop untuk bulan-bulan tertentu (misalnya, Januari hingga Desember)
        $bulanTahun = [
            ['Januari', 2024],
            ['Februari', 2024],
            ['Maret', 2024],
            ['April', 2024],
            ['Mei', 2024],
            ['Juni', 2024],
            ['Juli', 2024],
            ['Agustus', 2024],
            ['September', 2024],
            ['Oktober', 2024],
            ['November', 2024],
            ['Desember', 2024],
        ];

        foreach ($bulanTahun as $bt) {
            // Ambil data tagihan untuk bulan dan tahun tertentu
            $tagihan = Tagihan::where('month', $bt[0])->where('year', $bt[1])->get();

            // Hitung jumlah siswa yang sudah lunas dan belum lunas
            $lunas = $tagihan->where('status', 'Lunas')->count();
            $belumLunas = $tagihan->where('status', 'Belum Lunas')->count();

            // Tambahkan jumlah siswa yang sudah lunas dan belum lunas ke dalam array
            $lunasData[] = $lunas;
            $belumLunasData[] = $belumLunas;
        }
        
        return $this->chart->barChart()
            ->setTitle('Grafik Pembayaran')
            ->setSubtitle('Tahun 2024')
            ->addData('Belum Lunas', $belumLunasData)
            ->addData('Lunas', $lunasData)
            ->setDataLabels(true)
            ->setXAxis([
                'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 
                'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
            ])
            ->setHeight(287);
            
    }
}
