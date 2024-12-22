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
    public function rtl()
    {
        return $this->hasOne(ModelRtl::class, 'id_monthly_report', 'id_monthly_report');
    }

}
