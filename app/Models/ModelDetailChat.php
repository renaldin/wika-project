<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelDetailChat extends Model
{
    use HasFactory;
    protected $table = 'detail_chat';
    protected $primaryKey = 'id_detail_chat';
    
    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
    }

    public function user() 
    {
        return $this->belongsTo(ModelUser::class, 'id_user', 'id_user');
    }

    public function chat()
    {
        return $this->belongsTo(ModelChat::class, 'id_chat', 'id_chat');
    }
}
