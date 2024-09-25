<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ModelUser;
use App\Models\ModelSni;
use App\Models\ModelLog;

class Sni extends Controller
{

    private $ModelUser, $public_path, $ModelSni;

    public function __construct()
    {
        $this->ModelUser = new ModelUser();
        $this->ModelSni = new ModelSni();
        $this->public_path = 'sni';
    }

    public function index()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Data Sni',
            'subTitle'          => 'Daftar Sni',
            'daftarSni'    => $this->ModelSni->data(),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman Daftar SNI.';
        $log->feature   = 'SNI';
        $log->save();

        return view('engineering.sni.index', $data);
    }

    public function tambah()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'     => 'Data Sni',
            'subTitle'  => 'Tambah',
            'form'      => 'Tambah',
            'user'      => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman Form Tambah SNI.';
        $log->feature   = 'SNI';
        $log->save();

        return view('engineering.sni.form', $data);
    }

    public function prosesTambah()
    {
        Request()->validate([
            'nama_sni' => 'required',
            'file' => 'required|mimes:pdf|max:4096'
        ], [
            'nama_sni.required'    => 'Nama SNI harus diisi!',
            'file.required'           => 'File harus diisi!',
            'file.mimes'              => 'Format File harus pdf!',
            'file.max'                => 'Ukuran File maksimal 4 mb',
        ]);

        $file = Request()->file;
        $fileSni = date('mdYHis') . ' ' . Request()->nama_sni . '.' . $file->extension();
        $file->move(public_path($this->public_path), $fileSni);

        $data = [
            'nama_sni' => Request()->nama_sni,
            'file'        => $fileSni
        ];

        $this->ModelSni->tambah($data);

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Menambah Data SNI.';
        $log->feature   = 'SNI';
        $log->save();

        return redirect()->route('daftar-sni')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($id_sni)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'         => 'Data Sni',
            'subTitle'      => 'Edit',
            'form'          => 'Edit',
            'detail'        => $this->ModelSni->detail($id_sni),
            'user'          => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman Form Edit SNI.';
        $log->feature   = 'SNI';
        $log->save();

        return view('engineering.sni.form', $data);
    }

    public function prosesEdit($id_sni)
    {
        Request()->validate([
            'nama_sni' => 'required',
            'file' => 'required|mimes:pdf|max:4096'
        ], [
            'nama_sni.required'    => 'Nama SNI harus diisi!',
            'file.mimes'              => 'Format File harus pdf!',
            'file.max'                => 'Ukuran File maksimal 4 mb',
        ]);

        $sni = $this->ModelSni->detail($id_sni);

        if (Request()->file <> "") {
            if ($sni->file <> "") {
                unlink(public_path($this->public_path) . '/' . $sni->file);
            }

            $file = Request()->file;
            $fileSni = date('mdYHis') . ' ' . Request()->nama_sni . '.' . $file->extension();
            $file->move(public_path($this->public_path), $fileSni);

            $data = [
                'id_sni'   => $id_sni,
                'nama_sni' => Request()->nama_sni,
                'file'        => $fileSni
            ];
        } else {
            $data = [
                'id_sni'   => $id_sni,
                'nama_sni' => Request()->nama_sni,
                'fungsi'        => Request()->fungsi,
                'kategori'      => Request()->kategori
            ];
        }

        $this->ModelSni->edit($data);

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Mengedit Data SNI.';
        $log->feature   = 'SNI';
        $log->save();

        return redirect()->route('daftar-sni')->with('success', 'Data berhasil diedit!');
    }

    public function prosesHapus($id_sni)
    {
        $sni = $this->ModelSni->detail($id_sni);

        if ($sni->file <> "") {
            unlink(public_path($this->public_path) . '/' . $sni->file);
        }

        $this->ModelSni->hapus($id_sni);

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Menghapus Data SNI.';
        $log->feature   = 'SNI';
        $log->save();

        return back()->with('success', 'Data berhasil dihapus!');
    }
}
