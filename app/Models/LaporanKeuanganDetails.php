<?php

namespace App\Models;

use App\Http\Controllers\Keuangan\LaporanKeuangan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanKeuanganDetails extends Model
{
    use HasFactory;

    protected $table = 'laporan_keuangan_details'; // Jika nama tabel tidak sesuai dengan konvensi

    public function dokumen() 
    {
        return $this->belongsTo(DokumenKeuangans::class, 'id_dokumen_keuangans');
    }

    public function laporanKeuangan()
    {
        return $this->belongsTo(LaporanKeuangans::class, 'id_laporan_keuangan');
    }

    // Pastikan nama metode ini sesuai dengan cara Anda memanggilnya di controller atau view
    public function laporanKeuanganSubDetails()
    {
        return $this->hasMany(LaporanKeuanganSubDetails::class, 'id_laporan_keuangan_details', 'id');
    }
    
}
