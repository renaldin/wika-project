<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelRkpMankon extends Model
{
    use HasFactory;
    protected $table = 'rkp_mankon';
    protected $primaryKey = 'id_rkp_mankon';

    public function userRespon()
    {
        return $this->belongsTo(ModelUser::class, 'id_user_respon');
    }

    public function proyek()
    {
        return $this->belongsTo(ModelProyek::class, 'id_proyek');
    }

    public function data()
    {
        return DB::table('rkp_mankon')
            ->join('user', 'user.id_user', '=', 'rkp_mankon.id_user_respon')
            ->join('proyek', 'proyek.id_proyek', '=', 'rkp_mankon.id_proyek')
            ->orderBy('id_rkp_mankon', 'DESC')
            ->get();
    }
    
    public function dataIsRespon($isRespon)
    {
        return DB::table('rkp_mankon')
            ->join('user', 'user.id_user', '=', 'rkp_mankon.id_user_respon')
            ->join('proyek', 'proyek.id_proyek', '=', 'rkp_mankon.id_proyek')
            ->where('is_respon', $isRespon)
            ->orderBy('id_rkp_mankon', 'DESC')
            ->get();
    }

    public function detail($id_rkp_mankon)
    {
        return DB::table('rkp_mankon')
            ->join('user', 'user.id_user', '=', 'rkp_mankon.id_user_respon')
            ->join('proyek', 'proyek.id_proyek', '=', 'rkp_mankon.id_proyek')
            ->where('id_rkp_mankon', $id_rkp_mankon)
            ->first();
    }

    public function tambah($data)
    {
        DB::table('rkp_mankon')->insert($data);
    }

    public function edit($data)
    {
        DB::table('rkp_mankon')->where('id_rkp_mankon', $data['id_rkp_mankon'])->update($data);
    }

    public function hapus($id_rkp_mankon)
    {
        DB::table('rkp_mankon')->where('id_rkp_mankon', $id_rkp_mankon)->delete();
    }

}
