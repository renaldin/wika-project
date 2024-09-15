<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ModelDetailTimProyek;
use App\Models\ModelLog;

class DetailTimProyek extends Controller
{

    private $ModelDetailTimProyek;

    public function __construct()
    {
        $this->ModelDetailTimProyek = new ModelDetailTimProyek();
    }

    public function index()
    {
        
    }

    public function prosesTambah()
    {
        $data = [
            'id_tim_proyek'   => Request()->id_tim_proyek,
            'id_user'         => Request()->id_user
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Menambah Data Detail Tim Proyek.';
        $log->feature   = 'DETAIL TIM PROYEK';
        $log->save();

        $this->ModelDetailTimProyek->tambah($data);
        return back()->with('success', 'Anggota berhasil ditambahkan!');
    }

    public function prosesHapus($id_detail_tim_proyek)
    {
        $this->ModelDetailTimProyek->hapus($id_detail_tim_proyek);

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Menghapus Data Detail Tim Proyek.';
        $log->feature   = 'DETAIL TIM PROYEK';
        $log->save();

        return back()->with('success', 'Anggota berhasil dihapus !');
    }
}
