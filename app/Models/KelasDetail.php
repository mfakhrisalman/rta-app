<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelasDetail extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function jadwals()
{
    return $this->belongsTo(Jadwal::class, 'name_student', 'name');
}
}
