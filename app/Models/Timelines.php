<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timelines extends Model
{
    use HasFactory;

    public function proyek()
    {
        return $this->belongsTo(ModelProyek::class, 'id_proyek', 'id_proyek');
    }

    public function timelineDetails()
    {
        return $this->hasMany(TimelineDetails::class, 'id_timeline');
    }
}
