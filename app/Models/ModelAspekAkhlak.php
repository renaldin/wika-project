<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelAspekAkhlak extends Model
{
    use HasFactory;

    public function data()
    {
        return DB::table('aspek_akhlak')
            ->orderBy('id_aspek_akhlak', 'ASC')
            ->get();
    }
}
