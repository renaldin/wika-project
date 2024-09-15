<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimelineDetails extends Model
{
    use HasFactory;

    public function dokumen() 
    {
        return $this->belongsTo(DokumenTimelines::class, 'id_dokumen_timeline');
    }

    public function timeline()
    {
        return $this->belongsTo(Timelines::class, 'id_timeline');
    }

    public function timelineSubDetail()
    {
        return $this->hasMany(TimelineSubDetails::class, 'id_timeline_detail');
    }
}
