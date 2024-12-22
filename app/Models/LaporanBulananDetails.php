<?php

namespace App\Models;

use App\Http\Controllers\QHSE\LaporanBulanan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanBulananDetails extends Model
{
    use HasFactory;

    protected $table = 'laporan_bulanan_details'; // Jika nama tabel tidak sesuai dengan konvensi

    public function dokumen() 
    {
        return $this->belongsTo(DokumenBulanans::class, 'id_dokumen_bulanan');
    }

    public function laporanBulanan()
    {
        return $this->belongsTo(LaporanBulanans::class, 'id_laporan_bulanan');
    }

    // Pastikan nama metode ini sesuai dengan cara Anda memanggilnya di controller atau view
    public function laporanBulananSubDetails()
    {
        return $this->hasMany(LaporanBulananSubDetails::class, 'id_laporan_bulanan_details', 'id');
    }
    
}
