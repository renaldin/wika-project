<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ModelTimProyek;
use App\Models\ModelDetailTimProyek;
use App\Models\ModelUser;
use App\Models\ModelLog;

class TimProyek extends Controller
{

    private $ModelTimProyek, $ModelDetailTimProyek, $ModelUser;

    public function __construct()
    {
        $this->ModelTimProyek       = new ModelTimProyek();
        $this->ModelDetailTimProyek = new ModelDetailTimProyek();
        $this->ModelUser            = new ModelUser();
    }

    public function index()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'                 => 'Data Tim Proyek',
            'subTitle'              => 'Daftar Tim Proyek',
            'daftarDetailTimProyek' => $this->ModelDetailTimProyek->data(),
            'daftarTimProyek'       => $this->ModelTimProyek->data(),
            'user'                  => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman Daftar Tim Proyek.';
        $log->feature   = 'TIM PROYEK';
        $log->save();

        return view('admin.timProyek.index', $data);
    }

    public function tambah()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'     => 'Data Tim Proyek',
            'subTitle'  => 'Tambah Tim Proyek',
            'user'      => $this->ModelUser->detail(Session()->get('id_user')),
            'form'      => 'Tambah',
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman Form Tambah Tim Proyek.';
        $log->feature   = 'TIM PROYEK';
        $log->save();

        return view('admin.timProyek.form', $data);
    }

    public function prosesTambah()
    {
        Request()->validate([
            'nama_tim_proyek'   => 'required',
            'deskripsi'         => 'required',
            'tanggal_dibuat'    => 'required|date'
        ], [
            'nama_tim_proyek.required'  => 'Nama Tim Proyek harus diisi!',
            'deskripsi.required'        => 'Deskripsi harus diisi!',
            'tanggal_dibuat.required'   => 'Tanggal Dibuat harus diisi!',
            'tanggal_dibuat.date'       => 'Tanggal Dibuat harus format tanggal!'
        ]);

        $data = [
            'nama_tim_proyek'   => Request()->nama_tim_proyek,
            'deskripsi'         => Request()->deskripsi,
            'tanggal_dibuat'    => Request()->tanggal_dibuat
        ];

        $this->ModelTimProyek->tambah($data);

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Menambah Data Tim Proyek.';
        $log->feature   = 'TIM PROYEK';
        $log->save();

        return redirect()->route('daftar-tim-proyek')->with('success', 'Data Tim Proyek berhasil ditambahkan!');
    }

    public function edit($id_tim_proyek)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'                 => 'Data Tim Proyek',
            'subTitle'              => 'Edit Tim Proyek',
            'form'                  => 'Edit',
            'daftarUser'            => $this->ModelUser->dataUser(),
            'daftarDetailTimProyek' => $this->ModelDetailTimProyek->data(),
            'anggota'   => $this->ModelDetailTimProyek->dataNonDuplicate(),
            'user'                  => $this->ModelUser->detail(Session()->get('id_user')),
            'detail'                => $this->ModelTimProyek->detail($id_tim_proyek)
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman Form Edit Tim Proyek.';
        $log->feature   = 'TIM PROYEK';
        $log->save();
        
        return view('admin.timProyek.form', $data);
    }

    public function prosesEdit($id_tim_proyek)
    {
        Request()->validate([
            'nama_tim_proyek'   => 'required',
            'deskripsi'         => 'required',
            'tanggal_dibuat'    => 'required|date'
        ], [
            'nama_tim_proyek.required'  => 'Nama Tim Proyek harus diisi!',
            'deskripsi.required'        => 'Deskripsi harus diisi!',
            'tanggal_dibuat.required'   => 'Tanggal Dibuat harus diisi!',
            'tanggal_dibuat.date'       => 'Tanggal Dibuat harus format tanggal!'
        ]);

        $data = [
            'id_tim_proyek'     => $id_tim_proyek,
            'nama_tim_proyek'   => Request()->nama_tim_proyek,
            'deskripsi'         => Request()->deskripsi,
            'tanggal_dibuat'    => Request()->tanggal_dibuat
        ];

        $this->ModelTimProyek->edit($data);

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Mengedit Data Tim Proyek.';
        $log->feature   = 'TIM PROYEK';
        $log->save();

        return redirect()->route('daftar-tim-proyek')->with('success', 'Data Tim Proyek berhasil diedit!');
    }

    public function prosesHapus($id_tim_proyek)
    {
        $this->ModelTimProyek->hapus($id_tim_proyek);
        $this->ModelDetailTimProyek->hapusAnggota($id_tim_proyek);

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Menghapus Data Tim Proyek.';
        $log->feature   = 'TIM PROYEK';
        $log->save();

        return redirect()->route('daftar-tim-proyek')->with('success', 'Data Tim Proyek berhasil dihapus !');
    }
}
