<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonthlyReportPcps extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function monthlyReportEng()
    {
        return $this->belongsTo(ModelMonthlyReport::class, 'id_monthly_report', 'id_monthly_report');
    }

    public function proyek()
    {
        return $this->belongsTo(ModelProyek::class, 'id_proyek', 'id_proyek');
    }

    protected static function boot()
    {
        parent::boot();

        static::updated(function ($monthlyReportPcp) {
            $proyek = Proyek::find($monthlyReportPcp->id_proyek);
            if ($proyek) {
                $proyek->status_report = $monthlyReportPcp->status_report;

                // Update status_percentage based on status_report
                switch ($proyek->status_report) {
                    case 'open':
                        $proyek->status_percentage = 0;
                        break;
                    case 'revisi':
                        $proyek->status_percentage = 50;
                        break;
                    case 'process':
                        $proyek->status_percentage = 75;
                        break;
                    case 'closed':
                        $proyek->status_percentage = 100;
                        break;
                    default:
                        $proyek->status_percentage = 0;
                        break;
                }

                $proyek->save();
            }
        });
    }
}
