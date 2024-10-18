<?php

namespace App\Models;

use App\Http\Controllers\Keuangan\LaporanProyek;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanProyekDetails extends Model
{
    use HasFactory;

    protected $table = 'laporan_proyek_details'; // Jika nama tabel tidak sesuai dengan konvensi

    public function dokumen() 
    {
        return $this->belongsTo(DokumenProyeks::class, 'id_dokumen_proyeks');
    }

    public function laporanProyek()
    {
        return $this->belongsTo(LaporanProyeks::class, 'id_laporan_proyek');
    }

    // Pastikan nama metode ini sesuai dengan cara Anda memanggilnya di controller atau view
    public function laporanProyekSubDetails()
    {
        return $this->hasMany(LaporanProyekSubDetails::class, 'id_laporan_proyek_details', 'id');
    }
    
}
