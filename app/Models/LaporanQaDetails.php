<?php

namespace App\Models;

use App\Http\Controllers\QHSE\LaporanQa;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanQaDetails extends Model
{
    use HasFactory;

    protected $table = 'laporan_qa_details'; // Jika nama tabel tidak sesuai dengan konvensi

    public function dokumen() 
    {
        return $this->belongsTo(DokumenQas::class, 'id_dokumen_qa');
    }

    public function laporanQa()
    {
        return $this->belongsTo(LaporanQas::class, 'id_laporan_qa');
    }

    // Pastikan nama metode ini sesuai dengan cara Anda memanggilnya di controller atau view
    public function laporanQaSubDetails()
    {
        return $this->hasMany(LaporanQaSubDetails::class, 'id_laporan_qa_details', 'id');
    }
    
}
