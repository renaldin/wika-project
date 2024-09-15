<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PicTujuanProyekTasks extends Model
{
    use HasFactory;

    public function proyek()
    {
        return $this->belongsTo(ModelProyek::class, 'id_proyek');
    }

    public function taskPcp()
    {
        return $this->belongsTo(TaskPcps::class, 'id_task_pcp');
    }
}
