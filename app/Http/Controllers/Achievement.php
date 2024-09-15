<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ModelUser;
use App\Models\ModelAchievement;
use App\Models\ModelDetailAchievement;
use App\Models\ModelLog;

class Achievement extends Controller
{

    private $ModelUser, $public_path, $ModelAchievement, $ModelDetailAchievement;

    public function __construct()
    {
        $this->ModelUser = new ModelUser();
        $this->ModelAchievement = new ModelAchievement();
        $this->ModelDetailAchievement = new ModelDetailAchievement();
        $this->public_path = 'achievement';
    }

    public function index()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Data Landing',
            'subTitle'          => 'Achievement',
            'daftarAchievement' => $this->ModelAchievement->data('All'),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        $log = new ModelLog();
        $log->id_user = Session()->get('id_user');
        $log->activity = 'Melihat Halaman Daftar Achievement.';
        $log->feature = 'ACHIEVEMENT';
        $log->save();

        return view('admin.achievement.index', $data);
    }

    public function detail($id_achievement)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Data Landing',
            'subTitle'          => 'Achievement',
            'detail'            => $this->ModelAchievement->detail($id_achievement),
            'daftarPoin'        => $this->ModelDetailAchievement->data(),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman Detail Achievement.';
        $log->feature   = 'ACHIEVEMENT';
        $log->save();

        return view('admin.achievement.detail', $data);
    }

    public function prosesTambah()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        Request()->validate([
            'judul'         => 'required',
            'sub_judul'     => 'required',
            'deskripsi'     => 'required',
            'gambar'    => 'required|mimes:jpeg,png,jpg|max:2048'
        ], [
            'judul.required'        => 'Judul harus diisi!',
            'sub_judul.required'    => 'Sub judul harus diisi!',
            'deskripsi.required'    => 'Deskripsi harus diisi!',
            'gambar.required'       => 'Gambar Anda harus diisi!',
            'gambar.mimes'          => 'Format gambar harus jpg/jpeg/png!',
            'gambar.max'                => 'Ukuran gambar maksimal 2 mb',
        ]);

        $file = Request()->gambar;
        $fileName = date('mdYHis') . ' ' . Request()->judul . '.' . $file->extension();
        $file->move(public_path($this->public_path), $fileName);

        if(Request()->is_active) {
            $isActive = 1;
        } else {
            $isActive = 0;
        }

        $data = [
            'judul'         => Request()->judul,
            'sub_judul'     => Request()->sub_judul,
            'deskripsi'     => Request()->deskripsi,
            'gambar'        => $fileName,
            'is_active'     => $isActive,
            'tanggal_input' => date('Y-m-d H:i:s'),
            'id_user'       => Session()->get('id_user')
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Menambah Data Achievement.';
        $log->feature   = 'ACHIEVEMENT';
        $log->save();

        $this->ModelAchievement->tambah($data);
        return back()->with('success', 'Data berhasil ditambahkan!');
    }

    public function prosesEdit($id_achievement)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        Request()->validate([
            'judul'         => 'required',
            'sub_judul'     => 'required',
            'deskripsi'     => 'required',
            'gambar'    => 'required|mimes:jpeg,png,jpg|max:2048'
        ], [
            'judul.required'        => 'Judul harus diisi!',
            'sub_judul.required'    => 'Sub judul harus diisi!',
            'deskripsi.required'    => 'Deskripsi harus diisi!',
            'gambar.mimes'          => 'Format gambar harus jpg/jpeg/png!',
            'gambar.max'                => 'Ukuran gambar maksimal 2 mb',
        ]);

        $detail = $this->ModelAchievement->detail($id_achievement);

        if(Request()->is_active) {
            $isActive = 1;
        } else {
            $isActive = 0;
        }

        $data = [
            'id_achievement'=> $id_achievement,
            'sub_judul'     => Request()->sub_judul,
            'judul'         => Request()->judul,
            'deskripsi'     => Request()->deskripsi,
            'is_active'     => $isActive,
            'id_user'       => Session()->get('id_user')
        ];

        if (Request()->gambar <> "") {
            if ($detail->gambar <> "") {
                unlink(public_path($this->public_path) . '/' . $detail->gambar);
            }

            $file = Request()->gambar;
            $fileName = date('mdYHis') . Request()->judul . '.' . $file->extension();
            $file->move(public_path($this->public_path), $fileName);

            $data['gambar'] = $fileName;
        }

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Mengedit Data Achievement.';
        $log->feature   = 'ACHIEVEMENT';
        $log->save();

        $this->ModelAchievement->edit($data);
        return back()->with('success', 'Data berhasil diedit!');
    }

    public function prosesHapus($id_achievement)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $detail = $this->ModelAchievement->detail($id_achievement);

        if ($detail->gambar <> "") {
            unlink(public_path($this->public_path) . '/' . $detail->gambar);
        }

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Menghapus Data Achievement.';
        $log->feature   = 'ACHIEVEMENT';
        $log->save();

        $this->ModelAchievement->hapus($id_achievement);
        $this->ModelDetailAchievement->hapusByAchievement($id_achievement);
        return back()->with('success', 'Data berhasil dihapus !');
    }
}
