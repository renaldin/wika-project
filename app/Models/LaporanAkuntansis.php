<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanAkuntansis extends Model
{
    use HasFactory;

    protected $table = 'laporan_akuntansis'; // Jika nama tabel tidak sesuai dengan konvensi

    protected $fillable = [
        'id_proyek',
        'verifikasi_akuntansi',
        'id_verifikator',
        'periode',
        // Tambahkan kolom lain sesuai kebutuhan
    ];

    public function proyek()
    {
        return $this->belongsTo(ModelProyek::class, 'id_proyek', 'id_proyek');
    }
    
    public function laporanAkuntansiDetails()
    {
        return $this->hasMany(LaporanAkuntansiDetails::class, 'id_laporan_akuntansi'); // pastikan nama kolom foreign key sesuai
    }
}
