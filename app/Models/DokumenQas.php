<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokumenQas extends Model
{
    use HasFactory;

    // Jika nama tabel tidak mengikuti konvensi Laravel, definisikan tabel secara eksplisit
    protected $table = 'dokumen_qa'; 

    // Jika tidak menggunakan timestamps, nonaktifkan
    public $timestamps = false;

    public function laporanQaDetails()
{
    return $this->hasMany(LaporanQaDetails::class, 'id_dokumen', 'id');
}

}
