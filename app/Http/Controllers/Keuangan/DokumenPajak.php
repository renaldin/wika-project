<?php

namespace App\Http\Controllers\Keuangan;

use App\Http\Controllers\Controller;
use App\Models\ModelUser;
use App\Models\DokumenPajaks;
use Illuminate\Http\Request;

class DokumenPajak extends Controller
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

        $daftarDokumen = DokumenPajaks::orderBy('id', 'ASC')
            ->limit(200)
            ->get();
        
        $data = [
            'title'             => 'Data Dokumen Laporan Pajak',
            'subTitle'          => 'Daftar Dokumen Laporan Pajak',
            'daftarDokumen'     => $daftarDokumen,
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];
        
        return view('keuangan/dokumenPajak.index', $data);
    }

    public function tambah()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Data Dokumen Laporan Pajak',
            'subTitle'          => 'Tambah Dokumen Laporan Pajak',
            'form'              => 'Tambah',
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        return view('keuangan/dokumenPajak.form', $data);
    }

    public function prosesTambah(Request $request)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $dokumenPajak = new DokumenPajaks();
        $dokumenPajak->dokumen      = $request->dokumen;
        $dokumenPajak->save();

        return redirect()->route('daftar-dokumen-pajak')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($id_dokumen_pajak)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Data Dokumen Laporan Pajak',
            'subTitle'          => 'Edit Dokumen Laporan Pajak',
            'form'              => 'Edit',
            'detail'            => DokumenPajaks::find($id_dokumen_pajak),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        return view('keuangan/dokumenPajak.form', $data);
    }

    public function prosesEdit(Request $request, $id_dokumen_pajak)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $dokumenPajak = DokumenPajaks::find($id_dokumen_pajak);
        $dokumenPajak->dokumen      = $request->dokumen;
        $dokumenPajak->save();

        return redirect()->route('daftar-dokumen-pajak')->with('success', 'Data berhasil diedit!');
    }

    public function prosesHapus($id_dokumen_pajak)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $dokumenPajak = DokumenPajaks::find($id_dokumen_pajak);
        $dokumenPajak->delete();

        return back()->with('success', 'Data berhasil dihapus !');
    }
}
