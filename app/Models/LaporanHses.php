<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanHses extends Model
{
    use HasFactory;

    protected $table = 'laporan_hse'; // Jika nama tabel tidak sesuai dengan konvensi

    protected $fillable = [
        'id_proyek',
        'verifikasi_hse',
        'id_verifikator',
        'periode'
        // Tambahkan kolom lain sesuai kebutuhan
    ];

    public function proyek()
    {
        return $this->belongsTo(ModelProyek::class, 'id_proyek', 'id_proyek');
    }
    
    public function laporanHseDetails()
    {
        return $this->hasMany(LaporanHseDetails::class, 'id_laporan_hse'); // pastikan nama kolom foreign key sesuai
    }


}
