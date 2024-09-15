<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimelineSubDetails extends Model
{
    use HasFactory;

    public function timelineDetail() 
    {
        return $this->belongsTo(TimelineDetails::class, 'id_timeline_detail');
    }
}
