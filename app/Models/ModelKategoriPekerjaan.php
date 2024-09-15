<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelKategoriPekerjaan extends Model
{
    use HasFactory;
    protected $table = 'kategori_pekerjaan';
    protected $primaryKey = 'id_kategori_pekerjaan';

    public function data()
    {
        return DB::table('kategori_pekerjaan')->get();
    }

    public function dataFungsi()
    {
        return DB::table('kategori_pekerjaan')
            ->select('fungsi')
            ->distinct()
            ->get();
    }
}
