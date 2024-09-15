<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PicDivisiTasks extends Model
{
    use HasFactory;

    public function divisi()
    {
        return $this->belongsTo(ModelUser::class, 'id_divisi', 'id_user');
    }

    public function taskPcp()
    {
        return $this->belongsTo(TaskPcps::class, 'id_task_pcp');
    }
}
