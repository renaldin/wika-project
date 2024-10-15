<?php

namespace App\Http\Controllers\Keuangan;

use App\Http\Controllers\Controller;
use App\Models\ModelUser;
use App\Models\DokumenKeuangans;
use Illuminate\Http\Request;

class DokumenKeuangan extends Controller
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

        $daftarDokumen = DokumenKeuangans::orderBy('id', 'ASC')
            ->limit(200)
            ->get();
        
        $data = [
            'title'             => 'Data Dokumen Laporan Keungan',
            'subTitle'          => 'Daftar Dokumen Laporan Keuangan',
            'daftarDokumen'     => $daftarDokumen,
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];
        
        return view('keuangan/dokumenKeuangan.index', $data);
    }

    public function tambah()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Data Dokumen Laporan Keuangan',
            'subTitle'          => 'Tambah Dokumen Laporan Keuangan',
            'form'              => 'Tambah',
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        return view('keuangan/dokumenKeuangan.form', $data);
    }

    public function prosesTambah(Request $request)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $dokumenKeuangan = new DokumenKeuangans();
        $dokumenKeuangan->dokumen      = $request->dokumen;
        $dokumenKeuangan->save();

        return redirect()->route('daftar-dokumen-keuangan')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($id_dokumen_keuangan)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Data Dokumen Laporan Keuangan',
            'subTitle'          => 'Edit Dokumen Laporan Keuangan',
            'form'              => 'Edit',
            'detail'            => DokumenKeuangans::find($id_dokumen_keuangan),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        return view('keuangan/dokumenKeuangan.form', $data);
    }

    public function prosesEdit(Request $request, $id_dokumen_keuangan)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $dokumenKeuangan = DokumenKeuangans::find($id_dokumen_keuangan);
        $dokumenKeuangan->dokumen      = $request->dokumen;
        $dokumenKeuangan->save();

        return redirect()->route('daftar-dokumen-keuangan')->with('success', 'Data berhasil diedit!');
    }

    public function prosesHapus($id_dokumen_keuangan)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $dokumenKeuangan = DokumenKeuangans::find($id_dokumen_keuangan);
        $dokumenKeuangan->delete();

        return back()->with('success', 'Data berhasil dihapus !');
    }
}
