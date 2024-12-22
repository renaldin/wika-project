<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanBulananSubDetails extends Model
{
    use HasFactory;

    public function LaporanBulananDetail() 
    {
        return $this->belongsTo(LaporanBulananDetails::class, 'id_laporan_bulanan_detail');
    }
}
