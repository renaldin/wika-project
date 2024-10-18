<?php

namespace App\Models;

use App\Http\Controllers\Keuangan\LaporanPajak;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanPajakDetails extends Model
{
    use HasFactory;

    protected $table = 'laporan_pajak_details'; // Jika nama tabel tidak sesuai dengan konvensi

    public function dokumen() 
    {
        return $this->belongsTo(DokumenPajaks::class, 'id_dokumen_pajaks');
    }

    public function laporanPajak()
    {
        return $this->belongsTo(LaporanPajaks::class, 'id_laporan_pajak');
    }

    // Pastikan nama metode ini sesuai dengan cara Anda memanggilnya di controller atau view
    public function laporanPajakSubDetails()
    {
        return $this->hasMany(LaporanPajakSubDetails::class, 'id_laporan_pajak_details', 'id');
    }
    
}
