<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelChat extends Model
{
    use HasFactory;
    protected $table = 'chat';
    protected $primaryKey = 'id_chat';
    
    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
    }

    public function userSatu()
    {
        return $this->belongsTo(ModelUser::class, 'id_user_satu', 'id_user');
    }

    public function userDua()
    {
        return $this->belongsTo(ModelUser::class, 'id_user_dua', 'id_user');
    }

    public function detailChat()
    {
        return $this->hasMany(ModelDetailChat::class, 'id_chat', 'id_chat');
    }
}
