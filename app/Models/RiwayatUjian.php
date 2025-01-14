<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatUjian extends Model
{
    use HasFactory;
    protected $table = 'riwayat_ujians';
    protected $fillable = [
        'id_student',
        'name_student',
        'class',
        'name_class',
        'year',
        'tabi',
        'qty_juz',
        'status',
        'score', // Jika ada kolom tambahan
    ]; 
}
