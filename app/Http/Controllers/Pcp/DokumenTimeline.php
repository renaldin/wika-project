<?php

namespace App\Http\Controllers\Pcp;

use App\Http\Controllers\Controller;
use App\Models\ModelUser;
use App\Models\DokumenTimelines;
use Illuminate\Http\Request;

class DokumenTimeline extends Controller
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

        $daftarDokumen = DokumenTimelines::orderBy('id', 'ASC')
            ->limit(200)
            ->get();
        
        $data = [
            'title'             => 'Data Dokumen Timeline',
            'subTitle'          => 'Daftar Dokumen Timeline',
            'daftarDokumen'     => $daftarDokumen,
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];
        
        return view('pcp/dokumenTimeline.index', $data);
    }

    public function tambah()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Data Dokumen Timeline',
            'subTitle'          => 'Tambah Dokumen Timeline',
            'form'              => 'Tambah',
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        return view('pcp/dokumenTimeline.form', $data);
    }

    public function prosesTambah(Request $request)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $dokumenTimeline = new DokumenTimelines();
        $dokumenTimeline->dokumen      = $request->dokumen;
        $dokumenTimeline->save();

        return redirect()->route('daftar-dokumen-timeline')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($id_dokumen_timeline)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Data Dokumen Timeline',
            'subTitle'          => 'Edit Dokumen Timeline',
            'form'              => 'Edit',
            'detail'            => DokumenTimelines::find($id_dokumen_timeline),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        return view('pcp/dokumenTimeline.form', $data);
    }

    public function prosesEdit(Request $request, $id_dokumen_timeline)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $dokumenTimeline = DokumenTimelines::find($id_dokumen_timeline);
        $dokumenTimeline->dokumen      = $request->dokumen;
        $dokumenTimeline->save();

        return redirect()->route('daftar-dokumen-timeline')->with('success', 'Data berhasil diedit!');
    }

    public function prosesHapus($id_dokumen_timeline)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $dokumenTimeline = DokumenTimelines::find($id_dokumen_timeline);
        $dokumenTimeline->delete();

        return back()->with('success', 'Data berhasil dihapus !');
    }
}
