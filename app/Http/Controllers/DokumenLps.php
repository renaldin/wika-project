<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ModelDokumenLps;
use App\Models\ModelUser;
use App\Models\ModelLog;

class DokumenLps extends Controller
{

    private $ModelDokumenLps, $ModelUser;

    public function __construct()
    {
        $this->ModelDokumenLps      = new ModelDokumenLps();
        $this->ModelUser            = new ModelUser();
    }

    public function index()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'                     => 'Dokumen LPS',
            'subTitle'                  => 'Daftar',
            'daftar'                    => $this->ModelDokumenLps->data(),
            'user'                      => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman Daftar Dokumen LPS.';
        $log->feature   = 'DOKUMEN LPS';
        $log->save();

        return view('admin.dokumenLps.index', $data);
    }

    public function prosesTambah()
    {
        $data = [
            'nama_dokumen'  => Request()->nama_dokumen,
            'jenis_dokumen' => Request()->jenis_dokumen,
            'no_urut'       => Request()->no_urut,
            'tanggal_input' => date('Y-m-d')
        ];

        $this->ModelDokumenLps->tambah($data);

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Menambah Data Dokumen LPS.';
        $log->feature   = 'DOKUMEN LPS';
        $log->save();

        return back()->with('success', 'Data berhasil ditambahkan!');
    }

    public function prosesEdit($id_dokumen_lps)
    {
        $data = [
            'id_dokumen_lps'=> $id_dokumen_lps,
            'nama_dokumen'  => Request()->nama_dokumen,
            'jenis_dokumen' => Request()->jenis_dokumen,
            'no_urut'       => Request()->no_urut,
            'tanggal_input' => date('Y-m-d')
        ];

        $this->ModelDokumenLps->edit($data);

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Mengedit Data Dokumen LPS.';
        $log->feature   = 'DOKUMEN LPS';
        $log->save();

        return back()->with('success', 'Data berhasil diedit!');
    }

    public function prosesHapus($id_dokumen_lps)
    {
        $data = [
            'id_dokumen_lps'    => $id_dokumen_lps,
            'is_active'         => 0
        ];

        $this->ModelDokumenLps->edit($data);

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Menghapus Data Dokumen LPS.';
        $log->feature   = 'DOKUMEN LPS';
        $log->save();

        return back()->with('success', 'Data berhasil dihapus!');
    }
}
