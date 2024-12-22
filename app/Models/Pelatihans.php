<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelatihans extends Model
{
    use HasFactory;

    public function createdBy()
    {
        return $this->belongsTo(ModelUser::class, 'id_user', 'id_user');
    }

    public function proyek()
    {
        return $this->belongsTo(ModelProyek::class, 'id_proyek', 'id_proyek');
    }

    public function personilPelatihan()
    {
        return $this->hasMany(PicPelatihans::class, 'id_pelatihan');
    }
    

}
