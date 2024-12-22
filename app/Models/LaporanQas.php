<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanQas extends Model
{
    use HasFactory;

    protected $table = 'laporan_qa'; // Jika nama tabel tidak sesuai dengan konvensi

    protected $fillable = [
        'id_proyek',
        'verifikasi_qa',
        'id_verifikator',
        'periode',
        // Tambahkan kolom lain sesuai kebutuhan
    ];

    public function proyek()
    {
        return $this->belongsTo(ModelProyek::class, 'id_proyek', 'id_proyek');
    }
    
    public function laporanQaDetails()
    {
        return $this->hasMany(LaporanQaDetails::class, 'id_laporan_qa'); // pastikan nama kolom foreign key sesuai
    }
}
