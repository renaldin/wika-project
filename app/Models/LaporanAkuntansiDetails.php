<?php

namespace App\Models;

use App\Http\Controllers\Keuangan\LaporanAkuntansi;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanAkuntansiDetails extends Model
{
    use HasFactory;

    protected $table = 'laporan_akuntansi_details'; // Jika nama tabel tidak sesuai dengan konvensi

    public function dokumen() 
    {
        return $this->belongsTo(DokumenAkuntansis::class, 'id_dokumen_akuntansis');
    }

    public function laporanAkuntansi()
    {
        return $this->belongsTo(LaporanAkuntansis::class, 'id_laporan_akuntansi');
    }

    // Pastikan nama metode ini sesuai dengan cara Anda memanggilnya di controller atau view
    public function laporanAkuntansiSubDetails()
    {
        return $this->hasMany(LaporanAkuntansiSubDetails::class, 'id_laporan_akuntansi_details', 'id');
    }
    
}
