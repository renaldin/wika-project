<?php

namespace App\Http\Controllers\QHSE;


use App\Http\Controllers\Controller;
use App\Models\ModelUser;
use App\Models\DokumenHses;
use Illuminate\Http\Request;

class DokumenHse extends Controller
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

        $daftarDokumen = DokumenHses::orderBy('id', 'ASC')
            ->limit(200)
            ->get();
        
        $data = [
            'title'             => 'Data Dokumen Proyek HSE',
            'subTitle'          => 'Daftar Dokumen Proyek HSE',
            'daftarDokumen'     => $daftarDokumen,
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];
        
        return view('qhse/dokumenHse.index', $data);
    }

    public function tambah()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Data Dokumen Laporan Proyek HSE',
            'subTitle'          => 'Tambah Dokumen Laporan Proyek HSE',
            'form'              => 'Tambah',
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        return view('qhse/dokumenHse.form', $data);
    }

    public function prosesTambah(Request $request)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $dokumenHse = new DokumenHses();
        $dokumenHse->dokumen      = $request->dokumen;
        $dokumenHse->save();

        return redirect()->route('daftar-dokumen-hse')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($id_dokumen_hse)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Data Dokumen Laporan HSE',
            'subTitle'          => 'Edit Dokumen Laporan HSE',
            'form'              => 'Edit',
            'detail'            => DokumenHses::find($id_dokumen_hse),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        return view('qhse/dokumenHse.form', $data);
    }

    public function prosesEdit(Request $request, $id_dokumen_hse)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $dokumenHse = DokumenHses::find($id_dokumen_hse);
        $dokumenHse->dokumen      = $request->dokumen;
        $dokumenHse->save();

        return redirect()->route('daftar-dokumen-hse')->with('success', 'Data berhasil diedit!');
    }

    public function prosesHapus($id_dokumen_hse)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $dokumenHse = DokumenHses::find($id_dokumen_hse);
        $dokumenHse->delete();

        return back()->with('success', 'Data berhasil dihapus !');
    }
}
