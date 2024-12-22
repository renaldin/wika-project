<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanHseSubDetails extends Model
{
    use HasFactory;

    public function LaporanHseDetail() 
    {
        return $this->belongsTo(LaporanHseDetails::class, 'id_laporan_hse_detail');
    }
}
