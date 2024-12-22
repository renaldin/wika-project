<?php

namespace App\Http\Controllers\QHSE;


use App\Http\Controllers\Controller;
use App\Models\ModelUser;
use App\Models\DokumenBulanans;
use Illuminate\Http\Request;

class DokumenBulanan extends Controller
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

        $daftarDokumen = DokumenBulanans::orderBy('id', 'ASC')
            ->limit(200)
            ->get();
        
        $data = [
            'title'             => 'Data Dokumen Proyek Bulanan',
            'subTitle'          => 'Daftar Dokumen Proyek Bulanan',
            'daftarDokumen'     => $daftarDokumen,
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];
        
        return view('qhse/dokumenBulanan.index', $data);
    }

    public function tambah()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Data Dokumen Laporan Proyek Bulanan',
            'subTitle'          => 'Tambah Dokumen Laporan Proyek Bulanan',
            'form'              => 'Tambah',
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        return view('qhse/dokumenBulanan.form', $data);
    }

    public function prosesTambah(Request $request)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $dokumenBulanan = new DokumenBulanans();
        $dokumenBulanan->dokumen      = $request->dokumen;
        $dokumenBulanan->save();

        return redirect()->route('daftar-dokumen-bulanan')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($id_dokumen_bulanan)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Data Dokumen Laporan Bulanan',
            'subTitle'          => 'Edit Dokumen Laporan Bulanan',
            'form'              => 'Edit',
            'detail'            => DokumenBulanans::find($id_dokumen_bulanan),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        return view('qhse/dokumenBulanan.form', $data);
    }

    public function prosesEdit(Request $request, $id_dokumen_bulanan)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $dokumenBulanan = DokumenBulanans::find($id_dokumen_bulanan);
        $dokumenBulanan->dokumen      = $request->dokumen;
        $dokumenBulanan->save();

        return redirect()->route('daftar-dokumen-bulanan')->with('success', 'Data berhasil diedit!');
    }

    public function prosesHapus($id_dokumen_bulanan)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $dokumenBulanan = DokumenBulanans::find($id_dokumen_bulanan);
        $dokumenBulanan->delete();

        return back()->with('success', 'Data berhasil dihapus !');
    }
}
