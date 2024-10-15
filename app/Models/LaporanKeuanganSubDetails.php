<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanKeuanganSubDetails extends Model
{
    use HasFactory;

    public function LaporanKeuanganDetail() 
    {
        return $this->belongsTo(LaporanKeuanganDetails::class, 'id_laporan_keuangan_detail');
    }
}
