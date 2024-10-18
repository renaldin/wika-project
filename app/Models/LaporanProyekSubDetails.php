<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanProyekSubDetails extends Model
{
    use HasFactory;

    public function LaporanProyekDetail() 
    {
        return $this->belongsTo(LaporanProyekDetails::class, 'id_laporan_proyek_detail');
    }
}
