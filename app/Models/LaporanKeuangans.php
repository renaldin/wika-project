<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanKeuangans extends Model
{
    use HasFactory;

    protected $table = 'laporan_keuangans'; // Jika nama tabel tidak sesuai dengan konvensi

    protected $fillable = [
        'id_proyek',
        'verifikasi_keuangan',
        'id_verifikator',
        'periode'
        // Tambahkan kolom lain sesuai kebutuhan
    ];

    public function proyek()
    {
        return $this->belongsTo(ModelProyek::class, 'id_proyek', 'id_proyek');
    }
    
    public function laporanKeuanganDetails()
    {
        return $this->hasMany(LaporanKeuanganDetails::class, 'id_laporan_keuangan'); // pastikan nama kolom foreign key sesuai
    }


}
