<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelDetailAkhlak extends Model
{
    use HasFactory;
    protected $table = 'detail_akhlak';
    protected $primaryKey = 'id_detail_akhlak';
    protected $fillable = [
        'deskripsi',
        'deskripsi2',
        'deskripsi3',
        'nilai',
        'nilai2',
        'nilai3',
        'evidence',
        'evidence2',
        'evidence3',
        'penilaian'
    ];

    public function akhlak()
    {
        return $this->belongsTo(ModelAkhlak::class, 'id_akhlak');
    }

    public function aspekAkhlak()
    {
        return $this->belongsTo(aspekAkhlak::class, 'id_aspek_akhlak');
    }

    public function data()
    {
        return DB::table('detail_akhlak')
            ->join('aspek_akhlak', 'detail_akhlak.id_aspek_akhlak', '=', 'aspek_akhlak.id_aspek_akhlak')
            ->orderBy('id_detail_akhlak', 'ASC')
            ->get();
    }


    public function detail($id_detail_akhlak)
    {
        return DB::table('detail_akhlak')
            ->join('akhlak', 'akhlak.id_akhlak', '=', 'detail_akhlak.id_akhlak')
            ->join('aspek_akhlak', 'aspek_akhlak.id_aspek_akhlak', '=', 'detail_akhlak.id_aspek_akhlak')
            ->where('id_detail_akhlak', $id_detail_akhlak)
            ->first();
    }

    public function dataByIdAkhlak($id_akhlak)
    {
        return DB::table('detail_akhlak')
            ->join('aspek_akhlak', 'detail_akhlak.id_aspek_akhlak', '=', 'aspek_akhlak.id_aspek_akhlak')
            ->where('id_akhlak', $id_akhlak)
            ->orderBy('id_detail_akhlak', 'ASC')
            ->get();
    }
    public function tambah($data)
    {
        DB::table('detail_akhlak')->insert($data);
    }

    public function edit($data)
    {
        DB::table('detail_akhlak')->where('id_detail_akhlak', $data['id_detail_akhlak'])->update($data);
    }

    public function hapus($id_detail_akhlak)
    {
        DB::table('detail_akhlak')->where('id_detail_akhlak', $id_detail_akhlak)->delete();
    }

    public function hapusByAkhlak($id_akhlak)
    {
        DB::table('detail_akhlak')->where('id_akhlak', $id_akhlak)->delete();
    }

     // Mutator untuk deskripsi
     public function setDeskripsiAttribute($value)
     {
         $this->attributes['deskripsi'] = $value;
         $this->attributes['nilai'] = $value ? 10 : null;
     }
 
     // Mutator untuk deskripsi2
     public function setDeskripsi2Attribute($value)
     {
         $this->attributes['deskripsi2'] = $value;
         $this->attributes['nilai2'] = $value ? 10 : null;
     }
 
     // Mutator untuk deskripsi3
     public function setDeskripsi3Attribute($value)
     {
         $this->attributes['deskripsi3'] = $value;
         $this->attributes['nilai3'] = $value ? 10 : null;
     }
}
