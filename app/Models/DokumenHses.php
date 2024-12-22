<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokumenHses extends Model
{
    use HasFactory;

    // Jika nama tabel tidak mengikuti konvensi Laravel, definisikan tabel secara eksplisit
    protected $table = 'dokumen_hse'; 

    // Jika tidak menggunakan timestamps, nonaktifkan
    public $timestamps = false;

    public function laporanHseDetails()
{
    return $this->hasMany(LaporanHseDetails::class, 'id_dokumen', 'id');
}

}
