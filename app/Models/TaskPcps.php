<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskPcps extends Model
{
    use HasFactory;

    public function createdBy()
    {
        return $this->belongsTo(ModelUser::class, 'id_user', 'id_user');
    }

    public function picTujuan()
    {
        return $this->hasMany(PicTujuanTasks::class, 'id_task_pcp');
    }

    public function picTujuanProyek()
    {
        return $this->hasMany(PicTujuanProyekTasks::class, 'id_task_pcp');
    }
}
