<?php

namespace App\Models;

use App\Http\Controllers\QHSE\LaporanHse;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanHseDetails extends Model
{
    use HasFactory;

    protected $table = 'laporan_hse_details'; // Jika nama tabel tidak sesuai dengan konvensi

    public function dokumen() 
    {
        return $this->belongsTo(DokumenHses::class, 'id_dokumen_hse');
    }

    public function laporanHse()
    {
        return $this->belongsTo(LaporanHses::class, 'id_laporan_hse');
    }

    // Pastikan nama metode ini sesuai dengan cara Anda memanggilnya di controller atau view
    public function laporanHseSubDetails()
    {
        return $this->hasMany(LaporanHseSubDetails::class, 'id_laporan_hse_details', 'id');
    }
    
}
