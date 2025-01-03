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
        // Ambil tahun saat ini
        $currentYear = date('Y');

        // Inisialisasi array untuk menyimpan jumlah siswa lunas dan belum lunas untuk setiap bulan
        $lunasData = [];
        $belumLunasData = [];

        // Daftar bulan
        $bulan = [
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];

        foreach ($bulan as $b) {
            // Ambil data tagihan untuk bulan dan tahun tertentu
            $tagihan = Tagihan::where('month', $b)->where('year', $currentYear)->get();

            // Hitung jumlah siswa yang sudah lunas dan belum lunas
            $lunas = $tagihan->where('status', 'Lunas')->count();
            $belumLunas = $tagihan->where('status', 'Belum Lunas')->count();

            // Tambahkan jumlah siswa yang sudah lunas dan belum lunas ke dalam array
            $lunasData[] = $lunas;
            $belumLunasData[] = $belumLunas;
        }

        return $this->chart->barChart()
            ->setTitle('Grafik Pembayaran')
            ->setSubtitle("Tahun $currentYear")
            ->addData('Belum Lunas', $belumLunasData)
            ->addData('Lunas', $lunasData)
            ->setDataLabels(true)
            ->setXAxis($bulan)
            ->setHeight(287);
    }
}
