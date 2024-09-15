<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AspekCsies extends Model
{
    use HasFactory;
    protected $table = 'aspek_csi';
    protected $primaryKey = 'id_aspek_csi';
}
