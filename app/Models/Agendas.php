<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agendas extends Model
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

    public function temuans()
    {
        return $this->hasMany(Temuans::class, 'id_agenda', 'id');
    }
}
