<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ModelProyek;
use App\Models\ModelUser;
use App\Models\ProyekUsers;
use Illuminate\Http\Request;

class ProyekUser extends Controller
{

    public function __construct()
    {
        
    }

    public function index($id_proyek)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $daftarProyekUser = ProyekUsers::where('id_proyek', $id_proyek)
            ->limit(200)
            ->get();
        
        $data = [
            'title'             => 'Data Proyek',
            'subTitle'          => 'Daftar Tim Proyek',
            'proyek'            => ModelProyek::find($id_proyek),
            'daftarUser'        => ModelUser::where('role', 'Tim Proyek')->get(),      
            'daftarProyekUser'  => $daftarProyekUser,
            'user'              => ModelUser::find(Session()->get('id_user')),
        ];
        
        return view('admin/proyekUser.index', $data);
    }

    public function prosesTambah(Request $request)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $proyekUser = new ProyekUsers();
        $proyekUser->id_proyek      = $request->id_proyek;
        $proyekUser->id_user        = $request->id_user;
        $proyekUser->save();

        return back()->with('success', 'Data berhasil ditambahkan!');
    }

    public function prosesHapus($id_proyek_user)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $proyekUser = ProyekUsers::find($id_proyek_user);
        $proyekUser->delete();

        return back()->with('success', 'Data berhasil dihapus!');
    }
}
