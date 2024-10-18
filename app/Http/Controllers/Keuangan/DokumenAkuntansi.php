<?php

namespace App\Http\Controllers\Keuangan;

use App\Http\Controllers\Controller;
use App\Models\ModelUser;
use App\Models\DokumenAkuntansis;
use Illuminate\Http\Request;

class DokumenAkuntansi extends Controller
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

        $daftarDokumen = DokumenAkuntansis::orderBy('id', 'ASC')
            ->limit(200)
            ->get();
        
        $data = [
            'title'             => 'Data Dokumen Laporan Akuntansi',
            'subTitle'          => 'Daftar Dokumen Laporan Akuntansi',
            'daftarDokumen'     => $daftarDokumen,
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];
        
        return view('keuangan/dokumenAkuntansi.index', $data);
    }

    public function tambah()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Data Dokumen Laporan Akuntansi',
            'subTitle'          => 'Tambah Dokumen Laporan Akuntansi',
            'form'              => 'Tambah',
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        return view('keuangan/dokumenAkuntansi.form', $data);
    }

    public function prosesTambah(Request $request)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $dokumenAkuntansi = new DokumenAkuntansis();
        $dokumenAkuntansi->dokumen      = $request->dokumen;
        $dokumenAkuntansi->save();

        return redirect()->route('daftar-dokumen-akuntansi')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($id_dokumen_akuntansi)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Data Dokumen Laporan Akuntansi',
            'subTitle'          => 'Edit Dokumen Laporan Akuntansi',
            'form'              => 'Edit',
            'detail'            => DokumenAkuntansis::find($id_dokumen_akuntansi),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        return view('keuangan/dokumenAkuntansi.form', $data);
    }

    public function prosesEdit(Request $request, $id_dokumen_akuntansi)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $dokumenAkuntansi = DokumenAkuntansis::find($id_dokumen_akuntansi);
        $dokumenAkuntansi->dokumen      = $request->dokumen;
        $dokumenAkuntansi->save();

        return redirect()->route('daftar-dokumen-akuntansi')->with('success', 'Data berhasil diedit!');
    }

    public function prosesHapus($id_dokumen_akuntansi)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $dokumenAkuntansi = DokumenAkuntansis::find($id_dokumen_akuntansi);
        $dokumenAkuntansi->delete();

        return back()->with('success', 'Data berhasil dihapus !');
    }
}
