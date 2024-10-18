<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanPajakSubDetails extends Model
{
    use HasFactory;

    public function LaporanPajakDetail() 
    {
        return $this->belongsTo(LaporanPajakDetails::class, 'id_laporan_pajak_detail');
    }
}
