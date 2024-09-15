<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelSni extends Model
{
    use HasFactory;

    public function data()
    {
        return DB::table('sni')->orderBy('id_sni', 'DESC')->get();
    }

    public function detail($id_sni)
    {
        return DB::table('sni')->where('id_sni', $id_sni)->first();
    }

    public function tambah($data)
    {
        DB::table('sni')->insert($data);
    }

    public function edit($data)
    {
        DB::table('sni')->where('id_sni', $data['id_sni'])->update($data);
    }

    public function hapus($id_sni)
    {
        DB::table('sni')->where('id_sni', $id_sni)->delete();
    }

    public function jumlahSni()
    {
        return DB::table('sni')->count();
    }
}
