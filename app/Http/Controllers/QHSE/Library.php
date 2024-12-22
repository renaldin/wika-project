<?php

namespace App\Http\Controllers\QHSE;

use App\Http\Controllers\Controller;
use App\Models\ModelUser;
use App\Models\ModelLibrary;
use App\Models\ModelLog;

class Library extends Controller
{

    private $ModelUser, $public_path, $ModelSni;

    public function __construct()
    {
        $this->ModelUser = new ModelUser();
        $this->ModelLibrary = new ModelLibrary();
        $this->public_path = 'library';
    }

    public function index()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Data Library QHSE',
            'subTitle'          => 'Daftar  Library QHSE',
            'daftarLibrary'    => $this->ModelLibrary->data(),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman Daftar LIBRARY.';
        $log->feature   = 'LIBRARY';
        $log->save();

        return view('qhse.library.index', $data);
    }

    public function tambah()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'     => 'Data Library',
            'subTitle'  => 'Tambah',
            'form'      => 'Tambah',
            'user'      => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman Form Tambah Library.';
        $log->feature   = 'LIBRARY';
        $log->save();

        return view('qhse.library.form', $data);
    }

    public function prosesTambah()
    {
        Request()->validate([
            'nama_dokumen' => 'required',
            'file' => 'required|mimes:pdf|max:4096'
        ], [
            'nama_dokumen.required'    => 'Nama Dokumen harus diisi!',
            'file.required'           => 'File harus diisi!',
            'file.mimes'              => 'Format File harus pdf!',
            'file.max'                => 'Ukuran File maksimal 4 mb',
        ]);

        $file = Request()->file;
        $fileLibrary = date('mdYHis') . ' ' . Request()->nama_dokumen . '.' . $file->extension();
        $file->move(public_path($this->public_path), $fileLibrary);

        $data = [
            'nama_dokumen' => Request()->nama_dokumen,
            'file'        => $fileLibrary
        ];

        $this->ModelLibrary->tambah($data);

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Menambah Data LIBRARY.';
        $log->feature   = 'LIBRARY';
        $log->save();

        return redirect()->route('daftar-library')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($id_library)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'         => 'Data Library',
            'subTitle'      => 'Edit',
            'form'          => 'Edit',
            'detail'        => $this->ModelLibrary->detail($id_library),
            'user'          => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman Form Edit LIBRARY.';
        $log->feature   = 'LIBRARY';
        $log->save();

        return view('qhse.library.form', $data);
    }

    public function prosesEdit($id_library)
    {
        Request()->validate([
            'nama_dokumen' => 'required',
            'file' => 'required|mimes:pdf|max:4096'
        ], [
            'nama_dokumen.required'    => 'Nama Dokumen harus diisi!',
            'file.mimes'              => 'Format File harus pdf!',
            'file.max'                => 'Ukuran File maksimal 4 mb',
        ]);

        $library = $this->ModelLibrary->detail($id_library);

        if (Request()->file <> "") {
            if ($library->file <> "") {
                unlink(public_path($this->public_path) . '/' . $library->file);
            }

            $file = Request()->file;
            $fileLibrary = date('mdYHis') . ' ' . Request()->nama_dokumen . '.' . $file->extension();
            $file->move(public_path($this->public_path), $fileLibrary);

            $data = [
                'id_library'   => $id_library,
                'nama_dokumen' => Request()->nama_dokumen,
                'file'        => $fileLibrary
            ];
        } else {
            $data = [
                'id_library'   => $id_library,
                'nama_dokumen' => Request()->nama_dokumen,
                'fungsi'        => Request()->fungsi,
                'kategori'      => Request()->kategori
            ];
        }

        $this->ModelLibrary->edit($data);

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Mengedit Data LIBRARY.';
        $log->feature   = 'LIBRARY';
        $log->save();

        return redirect()->route('daftar-library')->with('success', 'Data berhasil diedit!');
    }

    public function prosesHapus($id_library)
    {
        $library = $this->ModelLibrary->detail($id_library);

        if ($library->file <> "") {
            unlink(public_path($this->public_path) . '/' . $library->file);
        }

        $this->ModelLibrary->hapus($id_library);

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Menghapus Data LIBRARY.';
        $log->feature   = 'LIBRARY';
        $log->save();

        return back()->with('success', 'Data berhasil dihapus!');
    }
}
