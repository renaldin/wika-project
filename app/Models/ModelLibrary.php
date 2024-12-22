<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelLibrary extends Model
{
    use HasFactory;

    public function data()
    {
        return DB::table('library')->orderBy('id_library', 'DESC')->get();
    }

    public function detail($id_library)
    {
        return DB::table('library')->where('id_library', $id_library)->first();
    }

    public function tambah($data)
    {
        DB::table('library')->insert($data);
    }

    public function edit($data)
    {
        DB::table('library')->where('id_library', $data['id_library'])->update($data);
    }

    public function hapus($id_library)
    {
        DB::table('library')->where('id_library', $id_library)->delete();
    }

    public function jumlahLibrary()
    {
        return DB::table('library')->count();
    }
}
