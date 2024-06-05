<?php

namespace App\Charts;

use App\Models\User;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class JumlahSiswaChart
{
    protected $chart;

    public function __construct()
    {
        $this->chart = new LarapexChart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $siswa = User::where('is_siswa', true)->whereIn('class', ['Kelas Anak-anak', 'Kelas Remaja', 'Kelas Reguler', 'Kelas Pekerja'])->get();

        $data = [
            $siswa->where('class','Kelas Anak-anak')->count(),
            $siswa->where('class','Kelas Remaja')->count(),
            $siswa->where('class','Kelas Reguler')->count(),
            $siswa->where('class','Kelas Pekerja')->count(),
        ];
        $label=[
            'Kelas Anak-anak',
            'Kelas Remaja',
            'Kelas Reguler',
            'Kelas Pekerja',
        ];

        return $this->chart->pieChart()
            ->setTitle('Grafik Data Siswa')
            ->setSubtitle(date('Y'))
            ->addData($data)
            ->setDataLabels(true)
            ->setLabels($label);
    }
}
