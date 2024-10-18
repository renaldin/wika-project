<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanProyeks extends Model
{
    use HasFactory;

    protected $table = 'laporan_proyeks'; // Jika nama tabel tidak sesuai dengan konvensi

    protected $fillable = [
        'id_proyek',
        'verifikasi_royek',
        'id_verifikator',
        // Tambahkan kolom lain sesuai kebutuhan
    ];

    public function proyek()
    {
        return $this->belongsTo(ModelProyek::class, 'id_proyek', 'id_proyek');
    }
    
    public function laporanProyekDetails()
    {
        return $this->hasMany(LaporanProyekDetails::class, 'id_laporan_proyek'); // pastikan nama kolom foreign key sesuai
    }
}
