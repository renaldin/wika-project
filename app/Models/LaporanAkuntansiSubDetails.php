<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanAkuntansiSubDetails extends Model
{
    use HasFactory;

    public function LaporanAkuntansiDetail() 
    {
        return $this->belongsTo(LaporanAkuntansiDetails::class, 'id_laporan_akuntansi_detail');
    }
}
