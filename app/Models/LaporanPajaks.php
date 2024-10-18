<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanPajaks extends Model
{
    use HasFactory;

    protected $table = 'laporan_pajaks'; // Jika nama tabel tidak sesuai dengan konvensi

    protected $fillable = [
        'id_proyek',
        'verifikasi_pajak',
        'id_verifikator',
        // Tambahkan kolom lain sesuai kebutuhan
    ];

    public function proyek()
    {
        return $this->belongsTo(ModelProyek::class, 'id_proyek', 'id_proyek');
    }
    
    public function laporanPajakDetails()
    {
        return $this->hasMany(LaporanPajakDetails::class, 'id_laporan_pajak'); // pastikan nama kolom foreign key sesuai
    }
}
