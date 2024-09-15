<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelCarousel extends Model
{
    use HasFactory;

    public function data($isActive)
    {
        if($isActive == 'All') {
            return DB::table('carousel')
                ->join('user', 'user.id_user', '=', 'carousel.id_user')
                ->orderBy('tanggal_input', 'DESC')
                ->get();
        } else {
            return DB::table('carousel')
                ->join('user', 'user.id_user', '=', 'carousel.id_user')
                ->where('is_active', $isActive)
                ->orderBy('tanggal_input', 'DESC')
                ->get();
        }
    }

    public function detail($id_carousel)
    {
        return DB::table('carousel')
            ->join('user', 'user.id_user', '=', 'carousel.id_user')
            ->where('id_carousel', $id_carousel)
            ->first();
    }

    public function tambah($data)
    {
        DB::table('carousel')->insert($data);
    }

    public function edit($data)
    {
        DB::table('carousel')->where('id_carousel', $data['id_carousel'])->update($data);
    }

    public function hapus($id_carousel)
    {
        DB::table('carousel')->where('id_carousel', $id_carousel)->delete();
    }
}
