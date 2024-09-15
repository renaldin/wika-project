<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProyekUsers extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(ModelUser::class, 'id_user', 'id_user');
    }

    public function proyek()
    {
        return $this->belongsTo(ModelProyek::class, 'id_proyek', 'id_proyek');
    }
}
