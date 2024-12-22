<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanBulanans extends Model
{
    use HasFactory;

    protected $table = 'laporan_bulanan'; // Jika nama tabel tidak sesuai dengan konvensi

    protected $fillable = [
        'id_proyek',
        'verifikasi_bulanan',
        'id_verifikator',
        'periode'
        // Tambahkan kolom lain sesuai kebutuhan
    ];

    public function proyek()
    {
        return $this->belongsTo(ModelProyek::class, 'id_proyek', 'id_proyek');
    }
    
    public function laporanBulananDetails()
    {
        return $this->hasMany(LaporanBulananDetails::class, 'id_laporan_bulanan'); // pastikan nama kolom foreign key sesuai
    }


}
