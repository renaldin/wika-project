<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ModelDetailAchievement;
use App\Models\ModelLog;

class DetailAchievement extends Controller
{

    private $ModelDetailAchievement;

    public function __construct()
    {
        $this->ModelDetailAchievement = new ModelDetailAchievement();
    }

    public function prosesTambah()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'poin'             => Request()->poin,
            'id_achievement'    => Request()->id_achievement
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Menambah Data Detail Achievement.';
        $log->feature   = 'DETAIL ACHIEVEMENT';
        $log->save();

        $this->ModelDetailAchievement->tambah($data);
        return back()->with('success', 'Data berhasil ditambahkan!');
    }

    public function prosesEdit($id_detail_achievement)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'id_detail_achievement' => $id_detail_achievement,
            'poin'                 => Request()->poin,
            'id_achievement'        => Request()->id_achievement
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Mengedit Data Detail Achievement.';
        $log->feature   = 'DETAIL ACHIEVEMENT';
        $log->save();

        $this->ModelDetailAchievement->edit($data);
        return back()->with('success', 'Data berhasil diedit!');
    }

    public function prosesHapus($id_detail_achievement)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Menghapus Data Detail Achievement.';
        $log->feature   = 'DETAIL ACHIEVEMENT';
        $log->save();

        $this->ModelDetailAchievement->hapus($id_detail_achievement);
        return back()->with('success', 'Data berhasil dihapus!');
    }
}
