<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelUser extends Model
{
    use HasFactory;
    protected $table = 'user';
    protected $primaryKey = 'id_user';

    public function jabatanNew() 
    {
        return $this->belongsTo(Jabatans::class, 'id_jabatan');
    }

    public function divisiNew() 
    {
        return $this->belongsTo(Divisies::class, 'id_divisi');
    }

    public function dataUser()
    {
        return DB::table('user')->orderBy('id_user', 'DESC')->get();
    }

    public function detail($id_user)
    {
        return DB::table('user')->where('id_user', $id_user)->first();
    }

    public function tambah($data)
    {
        DB::table('user')->insert($data);
    }

    public function edit($data)
    {
        DB::table('user')->where('id_user', $data['id_user'])->update($data);
    }

    public function hapus($id_user)
    {
        DB::table('user')->where('id_user', $id_user)->delete();
    }

    public function jumlahUser()
    {
        return DB::table('user')->count();
    }

    public function jumlahHeadOffice()
    {
        return DB::table('user')->where('role', 'Head Office')->count();
    }
    public function picPelatihans()
    {
        return $this->hasMany(PicPelatihans::class, 'id_pic', 'id_user');
    }

}
