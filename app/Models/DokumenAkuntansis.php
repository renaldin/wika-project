<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokumenAkuntansis extends Model
{
    use HasFactory;

    // Jika nama tabel tidak mengikuti konvensi Laravel, definisikan tabel secara eksplisit
    protected $table = 'dokumen_akuntansis'; 

    // Jika tidak menggunakan timestamps, nonaktifkan
    public $timestamps = false;
}
