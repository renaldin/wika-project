<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ModelUser;
use App\Models\Jabatans;
use Illuminate\Http\Request;

class Jabatan extends Controller
{

    public function __construct()
    {
        
    }

    public function index()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $daftarJabatan = Jabatans::where('is_active', 1)
            ->orderBy('created_at', 'DESC')
            ->limit(200)
            ->get();
        
        $data = [
            'title'             => 'Data Jabatan',
            'subTitle'          => 'Daftar Jabatan',
            'daftarJabatan'     => $daftarJabatan,
            'user'              => ModelUser::find(Session()->get('id_user')),
        ];
        
        return view('admin/jabatan.index', $data);
    }

    public function detail($id_jabatan)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Data Jabatan',
            'subTitle'          => 'Detail Jabatan',
            'form'              => 'Detail',
            'detail'            => Jabatans::find($id_jabatan),
            'user'              => ModelUser::find(Session()->get('id_user')),
        ];

        return view('admin/jabatan.form', $data);
    }

    public function tambah()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Data Jabatan',
            'subTitle'          => 'Tambah Jabatan',
            'form'              => 'Tambah',
            'user'              => ModelUser::find(Session()->get('id_user'))
        ];

        return view('admin/jabatan.form', $data);
    }

    public function prosesTambah(Request $request)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $jabatan = new Jabatans();
        $jabatan->nama_jabatan      = $request->nama_jabatan;
        $jabatan->is_active         = 1;
        $jabatan->save();

        return redirect()->route('daftar-jabatan')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($id_jabatan)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Data Jabatan',
            'subTitle'          => 'Edit Jabatan',
            'form'              => 'Edit',
            'detail'            => Jabatans::find($id_jabatan),
            'user'              => ModelUser::find(Session()->get('id_user')),
        ];

        return view('admin/jabatan.form', $data);
    }

    public function prosesEdit(Request $request, $id_jabatan)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $jabatan = Jabatans::find($id_jabatan);
        $jabatan->nama_jabatan       = $request->nama_jabatan;
        $jabatan->save();

        return redirect()->route('daftar-jabatan')->with('success', 'Data berhasil diedit!');
    }

    public function prosesHapus($id_jabatan)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $jabatan = Jabatans::find($id_jabatan);
        $jabatan->is_active = 0;
        $jabatan->save();

        return back()->with('success', 'Data berhasil dihapus !');
    }
}
