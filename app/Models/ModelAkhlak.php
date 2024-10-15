<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelAkhlak extends Model
{
    use HasFactory;
    protected $table = 'akhlak';
    protected $primaryKey = 'id_akhlak';

    public function user()
    {
        return $this->belongsTo(ModelUser::class, 'id_user');
    }

    public function data()
    {
        return DB::table('akhlak')
        ->join('user', 'user.id_user', '=', 'akhlak.id_user')
        ->orderBy('id_akhlak', 'DESC')
        ->get();

    }

    public function detail($id_akhlak)
    {
        return DB::table('akhlak')
            ->join('user', 'user.id_user', '=', 'akhlak.id_user')
            ->where('id_akhlak', $id_akhlak)
            ->first(); // Mengembalikan objek atau null
    }


    public function lastData()
    {
        return DB::table('akhlak')
            ->orderBy('id_akhlak', 'DESC')
            ->first();
    }

    public function checkData($id_user, $periode)
    {
        return DB::table('akhlak')
            ->where('id_user', $id_user)
            ->where('periode', $periode)
            ->first();
    }

    public function tambah($data)
    {
        // Pastikan data yang diterima berisi 'id_user' dan 'periode'
        return DB::table('akhlak')->insert($data);
    }
    

    public function edit($data)
    {
        DB::table('akhlak')->where('id_akhlak', $data['id_akhlak'])->update($data);
    }

    public function hapus($id_akhlak)
    {
        DB::table('akhlak')->where('id_akhlak', $id_akhlak)->delete();
    }

    public function jumlah()
    {
        return DB::table('akhlak')->count();
    }
}
