<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PicTujuanTasks extends Model
{
    use HasFactory;

    public function tujuan()
    {
        return $this->belongsTo(ModelUser::class, 'id_tujuan', 'id_user');
    }

    public function taskPcp()
    {
        return $this->belongsTo(TaskPcps::class, 'id_task_pcp');
    }
}
