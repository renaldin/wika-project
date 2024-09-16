<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ModelUser;
use App\Models\Divisies;
use App\Models\ModelProyek;
use App\Models\ModelAspekAkhlak;
use App\Models\ModelDetailAkhlak;
use App\Models\ModelAkhlak;
use Illuminate\Http\Request;

class Divisi extends Controller
{

    public function __construct()
    {
        
    }

    public function index()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $daftarDivisi = Divisies::where('is_active', 1)
            ->orderBy('created_at', 'DESC')
            ->limit(200)
            ->get();
        
        $data = [
            'title'             => 'Data Divisi',
            'subTitle'          => 'Daftar Divisi',
            'daftarDivisi'      => $daftarDivisi,
            'user'              => ModelUser::find(Session()->get('id_user')),
        ];
        
        return view('admin/divisi.index', $data);
    }

    public function detail($id_divisi)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Data Divisi',
            'subTitle'          => 'Detail Divisi',
            'form'              => 'Detail',
            'detail'            => Divisies::find($id_divisi),
            'user'              => ModelUser::find(Session()->get('id_user')),
        ];

        return view('admin/divisi.form', $data);
    }

    public function tambah()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Data Divisi',
            'subTitle'          => 'Tambah Divisi',
            'form'              => 'Tambah',
            'user'              => ModelUser::find(Session()->get('id_user'))
        ];

        return view('admin/divisi.form', $data);
    }

    public function prosesTambah(Request $request)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $divisi = new Divisies();
        $divisi->nama_divisi      = $request->nama_divisi;
        $divisi->is_active         = 1;
        $divisi->save();

        return redirect()->route('daftar-divisi')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($id_divisi)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Data Divisi',
            'subTitle'          => 'Edit Divisi',
            'form'              => 'Edit',
            'detail'            => Divisies::find($id_divisi),
            'user'              => ModelUser::find(Session()->get('id_user')),
        ];

        return view('admin/divisi.form', $data);
    }

    public function prosesEdit(Request $request, $id_divisi)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $divisi = Divisies::find($id_divisi);
        $divisi->nama_divisi       = $request->nama_divisi;
        $divisi->save();

        return redirect()->route('daftar-divisi')->with('success', 'Data berhasil diedit!');
    }

    public function prosesHapus($id_divisi)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $divisi = Divisies::find($id_divisi);
        $divisi->is_active = 0;
        $divisi->save();

        return back()->with('success', 'Data berhasil dihapus !');
    }

    
}
