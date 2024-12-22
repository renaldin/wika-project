<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanQaSubDetails extends Model
{
    use HasFactory;

    public function LaporanQaDetail() 
    {
        return $this->belongsTo(LaporanQaDetails::class, 'id_laporan_Qa_detail');
    }
}
