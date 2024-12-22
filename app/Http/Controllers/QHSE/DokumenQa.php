<?php

namespace App\Http\Controllers\QHSE;


use App\Http\Controllers\Controller;
use App\Models\ModelUser;
use App\Models\DokumenQas;
use Illuminate\Http\Request;

class DokumenQa extends Controller
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

        $daftarDokumen = DokumenQas::orderBy('id', 'ASC')
            ->limit(200)
            ->get();
        
        $data = [
            'title'             => 'Data Dokumen Proyek QA',
            'subTitle'          => 'Daftar Dokumen Proyek QA',
            'daftarDokumen'     => $daftarDokumen,
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];
        
        return view('qhse/dokumenQa.index', $data);
    }

    public function tambah()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Data Dokumen Laporan Proyek QA',
            'subTitle'          => 'Tambah Dokumen Laporan Proyek QA',
            'form'              => 'Tambah',
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        return view('qhse/dokumenQa.form', $data);
    }

    public function prosesTambah(Request $request)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $dokumenQa = new DokumenQas();
        $dokumenQa->dokumen      = $request->dokumen;
        $dokumenQa->save();

        return redirect()->route('daftar-dokumen-qa')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($id_dokumen_qa)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Data Dokumen Laporan Akuntansi',
            'subTitle'          => 'Edit Dokumen Laporan Akuntansi',
            'form'              => 'Edit',
            'detail'            => DokumenQas::find($id_dokumen_qa),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        return view('qhse/dokumenQa.form', $data);
    }

    public function prosesEdit(Request $request, $id_dokumen_qa)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $dokumenQa = DokumenQas::find($id_dokumen_qa);
        $dokumenQa->dokumen      = $request->dokumen;
        $dokumenQa->save();

        return redirect()->route('daftar-dokumen-qa')->with('success', 'Data berhasil diedit!');
    }

    public function prosesHapus($id_dokumen_qa)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $dokumenQa = DokumenQas::find($id_dokumen_qa);
        $dokumenQa->delete();

        return back()->with('success', 'Data berhasil dihapus !');
    }
}
