<?php

namespace App\Http\Controllers\Keuangan;

use App\Http\Controllers\Controller;
use App\Models\ModelUser;
use App\Models\DokumenProyeks;
use Illuminate\Http\Request;

class DokumenProyek extends Controller
{

    private $ModelUser;

    public function __construct()
    {
        $this->ModelUser = new ModelUser();
    }

    public function index()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $daftarDokumen = DokumenProyeks::orderBy('id', 'ASC')
            ->limit(200)
            ->get();
        
        $data = [
            'title'             => 'Data Dokumen Laporan Proyek',
            'subTitle'          => 'Daftar Dokumen Laporan Proyek',
            'daftarDokumen'     => $daftarDokumen,
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];
        
        return view('keuangan/dokumenProyek.index', $data);
    }

    public function tambah()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Data Dokumen Laporan Proyek',
            'subTitle'          => 'Tambah Dokumen Laporan Proyek',
            'form'              => 'Tambah',
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        return view('keuangan/dokumenProyek.form', $data);
    }

    public function prosesTambah(Request $request)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $dokumenProyek = new DokumenProyeks();
        $dokumenProyek->dokumen      = $request->dokumen;
        $dokumenProyek->save();

        return redirect()->route('daftar-dokumen-proyek')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($id_dokumen_proyek)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Data Dokumen Laporan Proyek',
            'subTitle'          => 'Edit Dokumen Laporan Proyek',
            'form'              => 'Edit',
            'detail'            => DokumenProyeks::find($id_dokumen_proyek),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        return view('keuangan/dokumenProyek.form', $data);
    }

    public function prosesEdit(Request $request, $id_dokumen_proyek)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $dokumenProyek = DokumenProyeks::find($id_dokumen_proyek);
        $dokumenProyek->dokumen      = $request->dokumen;
        $dokumenProyek->save();

        return redirect()->route('daftar-dokumen-proyek')->with('success', 'Data berhasil diedit!');
    }

    public function prosesHapus($id_dokumen_proyek)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $dokumenProyek = DokumenProyeks::find($id_dokumen_proyek);
        $dokumenProyek->delete();

        return back()->with('success', 'Data berhasil dihapus !');
    }
}
