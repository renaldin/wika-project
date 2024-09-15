<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ModelUser;
use App\Models\ModelRencana;
use App\Models\ModelLog;

class Rencana extends Controller
{

    private $ModelUser, $ModelRencana;

    public function __construct()
    {
        $this->ModelUser        = new ModelUser();
        $this->ModelRencana     = new ModelRencana();
    }

    public function index()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'                     => 'Rencana',
            'subTitle'                  => 'KI/KM',
            'tipe'                      => 'KI/KM',
            'daftarRencana'             => $this->ModelRencana->data(),
            'user'                      => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman Daftar Rencana KI/KM.';
        $log->feature   = 'RENCANA KI/KM';
        $log->save();
        
        return view('rencana.index', $data);
    }

    public function technicalSupport()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'                     => 'Rencana',
            'subTitle'                  => 'Technical Supporting',
            'tipe'                      => 'Technical Supporting',
            'daftarRencana'             => $this->ModelRencana->data(),
            'user'                      => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman Daftar Rencana Technical Supporting.';
        $log->feature   = 'RENCANA TECHNICAL SUPPORTING';
        $log->save();
        
        return view('rencana.index', $data);
    }

    public function detailKiKm($id_rencana)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'                     => 'Rencana',
            'subTitle'                  => 'KI/KM',
            'tipe'                      => 'KI/KM',
            'detail'                    => $this->ModelRencana->detail($id_rencana),
            'user'                      => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman Detail Rencana KI/KM.';
        $log->feature   = 'RENCANA KI/KM';
        $log->save();
        
        return view('rencana.detail', $data);
    }

    public function detailTechnicalSupport($id_rencana)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }
        
        $data = [
            'title'                     => 'Rencana',
            'subTitle'                  => 'Technical Supporting',
            'tipe'                      => 'Technical Supporting',
            'detail'                    => $this->ModelRencana->detail($id_rencana),
            'user'                      => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman Detail Rencana Technical Supporting.';
        $log->feature   = 'RENCANA TECHNICAL SUPPORTING';
        $log->save();
        
        return view('rencana.detail', $data);
    }

    public function prosesTambah()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $check = $this->ModelRencana->checkData(Request()->tipe, Request()->tahun);
        if($check) {
            return back()->with('fail', 'Data tahun rencana sudah ada!');
        }

        $data = [
            'tipe'          => Request()->tipe,
            'tahun'         => Request()->tahun,
            'tanggal_input' => date('Y-m-d')
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Menambah Data Rencana.';
        $log->feature   = 'RENCANA';
        $log->save();
        
        $this->ModelRencana->tambah($data);
        return back()->with('success', 'Data berhasil ditambahkan!');
    }

    public function prosesEdit($id_rencana)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'id_rencana'    => $id_rencana,
            'tahun'         => Request()->tahun
        ];
        
        $this->ModelRencana->edit($data);

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Mengedit Data Rencana.';
        $log->feature   = 'RENCANA';
        $log->save();

        return back()->with('success', 'Data berhasil diedit!');
    }

    public function prosesEditDetail($id_rencana)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'id_rencana'    => $id_rencana,
            'januari'       => Request()->januari,
            'februari'      => Request()->februari,
            'maret'         => Request()->maret,
            'april'         => Request()->april,
            'mei'           => Request()->mei,
            'juni'          => Request()->juni,
            'juli'          => Request()->juli,
            'agustus'       => Request()->agustus,
            'september'     => Request()->september,
            'oktober'       => Request()->oktober,
            'november'      => Request()->november,
            'desember'      => Request()->desember
        ];
        
        $this->ModelRencana->edit($data);

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Mengedit Data Detail Rencana.';
        $log->feature   = 'RENCANA';
        $log->save();

        return back()->with('success', 'Data berhasil diedit!');
    }

    public function prosesHapus($id_rencana)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }
        
        $this->ModelRencana->hapus($id_rencana);

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Menghapus Data Rencana.';
        $log->feature   = 'RENCANA';
        $log->save();

        return back()->with('success', 'Data berhasil dihapus!');
    }
}
