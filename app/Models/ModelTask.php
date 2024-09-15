<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelTask extends Model
{
    use HasFactory;
    protected $table = 'task';
    protected $primaryKey = 'id_task';

    public function personil()
    {
        return $this->belongsTo(ModelUser::class, 'id_personil', 'id_user');
    }

    public function manajemen()
    {
        return $this->belongsTo(ModelUser::class, 'id_manajemen', 'id_user');
    }
}
