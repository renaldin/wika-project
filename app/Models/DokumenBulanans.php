<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokumenBulanans extends Model
{
    use HasFactory;

    // Jika nama tabel tidak mengikuti konvensi Laravel, definisikan tabel secara eksplisit
    protected $table = 'dokumen_bulanan'; 

    // Jika tidak menggunakan timestamps, nonaktifkan
    public $timestamps = false;

    public function laporanBulananDetails()
{
    return $this->hasMany(LaporanBulananDetails::class, 'id_dokumen', 'id');
}

}
