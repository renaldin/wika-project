<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelMonthlyReport extends Model
{
    use HasFactory;

    protected $table = 'monthly_report';
    protected $primaryKey = 'id_monthly_report';

    protected static function booted()
    {
        static::created(function ($monthlyReport) {
            // Tambahkan data default ke tabel RTL
            DB::table('rtl')->insert([
                'id_monthly_report' => $monthlyReport->id_monthly_report,
                'rtl_eir' => null, // Atur nilai default jika diperlukan
                'rtl_bep' => null,
                'rtl_produksi_bim' => null,
                'rtl_monitoring_evaluasi' => null,
                'rtl_3d' => null,
                'rtl_4d' => null,
                'rtl_5d' => null,
            ]);
        });
    }

    public function proyek()
    {
        return $this->belongsTo(ModelProyek::class, 'id_proyek', 'id_proyek');
    }

    public function data()
    {
        return DB::table('monthly_report')
            ->join('proyek', 'proyek.id_proyek', '=', 'monthly_report.id_proyek')
            ->join('tim_proyek', 'tim_proyek.id_tim_proyek', '=', 'proyek.id_tim_proyek')
            ->orderBy('id_monthly_report', 'DESC')
            ->get();
    }

    public function detail($id_monthly_report)
    {
        return DB::table('monthly_report')
            ->join('proyek', 'proyek.id_proyek', '=', 'monthly_report.id_proyek', 'monthly_report')
            ->where('id_monthly_report', $id_monthly_report)
            ->first();
    }

    public function tambah($data)
    {
        DB::table('monthly_report')->insert($data);
    }

    public function edit($data)
    {
        DB::table('monthly_report')->where('id_monthly_report', $data['id_monthly_report'])->update($data);
    }

    public function hapus($id_monthly_report)
    {
        DB::table('monthly_report')->where('id_monthly_report', $id_monthly_report)->delete();
    }
}
