<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PicPelatihans extends Model
{
    use HasFactory;

    public function pic()
    {
        return $this->belongsTo(ModelUser::class, 'id_pic', 'id_user');
    }
    public function user()
    {
        return $this->belongsTo(ModelUser::class, 'id_pic', 'id_user');
    }
    
}
