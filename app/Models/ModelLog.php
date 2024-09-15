<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelLog extends Model
{
    use HasFactory;
    protected $table = 'log';
    protected $primaryKey = 'id_log';
    
    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
    }

    public function user()
    {
        return $this->belongsTo(ModelUser::class, 'id_user', 'id_user');
    }
}
