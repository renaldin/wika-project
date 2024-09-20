<?php

namespace App\Http\Controllers\Engineering;

use App\Http\Controllers\Controller;
use App\Models\Divisies;
use App\Models\Jabatans;
use App\Models\ModelUser;
use App\Models\ModelLog;
use Illuminate\Support\Facades\Hash;

class User extends Controller
{

    private $ModelUser, $public_path;

    public function __construct()
    {
        $this->ModelUser = new ModelUser();
        $this->public_path = 'foto_user';
    }

    public function index()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Data User',
            'subTitle'          => 'Kelola User',
            'daftarUser'        => ModelUser::with('jabatanNew', 'divisiNew')->get(),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman Daftar User.';
        $log->feature   = 'USER';
        $log->save();

        return view('engineering.user.index', $data);
    }

    public function tambah()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'         => 'Data User',
            'subTitle'      => 'Tambah User',
            'daftarJabatan' => Jabatans::where('is_active', 1)->get(),
            'daftarDivisi'  => Divisies::where('is_active', 1)->get(),
            'user'          => $this->ModelUser->detail(Session()->get('id_user')),
            'form'          => 'Tambah',
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman Form Tambah User.';
        $log->feature   = 'USER';
        $log->save();

        return view('engineering.user.form', $data);
    }

    public function prosesTambah()
    {
        Request()->validate([
            'nama_user'     => 'required',
            'telepon'       => 'required',
            'nip'           => 'required|unique:user,nip',
            'password'      => 'min:6|required',
            'role'          => 'required',
            'foto_user'     => 'required|mimes:jpeg,png,jpg|max:2048'
        ], [
            'nama_user.required'    => 'Nama lengkap harus diisi!',
            'telepon.required'      => 'Nomor telepon harus diisi!',
            'nip.required'          => 'NIP harus diisi!',
            'nip.unique'            => 'niP sudah digunakan!',
            'password.required'     => 'Password harus diisi!',
            'password.min'          => 'Password minikal 6 karakter!',
            'role.required'         => 'Role harus diisi!',
            'foto_user.required'    => 'Foto Anda harus diisi!',
            'foto_user.mimes'       => 'Format Foto User harus jpg/jpeg/png!',
            'foto_user.max'         => 'Ukuran Foto User maksimal 2 mb',
        ]);

        $file1 = Request()->foto_user;
        $fileUser = date('mdYHis') . ' ' . Request()->nama_user . '.' . $file1->extension();
        $file1->move(public_path($this->public_path), $fileUser);

        if (Request()->fungsi !== null && Request()->role == 'Head Office') {
            $fungsi = Request()->fungsi;
        } else {
            $fungsi = null;
        }

        $jabatan = Jabatans::find(Request()->id_jabatan);
        $divisi = Divisies::find(Request()->id_divisi);

        $data = [
            'nama_user'     => Request()->nama_user,
            'telepon'       => Request()->telepon,
            'nip'           => Request()->nip,
            'jabatan'       => $jabatan->nama_jabatan,
            'id_jabatan'    => Request()->id_jabatan,
            'fungsi'        => $fungsi,
            'foto_user'     => $fileUser,
            'role'          => Request()->role,
            'divisi'        => $divisi->nama_divisi,
            'id_divisi'     => Request()->id_divisi,
            'password'      => Hash::make(Request()->password),
        ];

        $this->ModelUser->tambah($data);

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Menambah Data User.';
        $log->feature   = 'USER';
        $log->save();

        return redirect()->route('engineering-kelola-user')->with('success', 'Data user berhasil ditambahkan!');
    }

    public function edit($id_user)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'         => 'Data User',
            'subTitle'      => 'Edit User',
            'form'          => 'Edit',
            'daftarJabatan' => Jabatans::where('is_active', 1)->get(),
            'daftarDivisi' => Divisies::where('is_active', 1)->get(),
            'user'          => $this->ModelUser->detail(Session()->get('id_user')),
            'detail'        => $this->ModelUser->detail($id_user)
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman Form Edit User.';
        $log->feature   = 'USER';
        $log->save();

        return view('engineering.user.form', $data);
    }

    public function prosesEdit($id_user)
    {
        Request()->validate([
            'nama_user'     => 'required',
            'telepon'       => 'required',
            'nip'           => 'required',
            'role'          => 'required',
            'foto_user'     => 'mimes:jpeg,png,jpg|max:2048'
        ], [
            'nama_user.required'    => 'Nama lengkap harus diisi!',
            'telepon.required'      => 'Nomor telepon harus diisi!',
            'nip.required'          => 'NIP harus diisi!',
            'role.required'         => 'Role harus diisi!',
            'foto_user.mimes'       => 'Format Foto User harus jpg/jpeg/png!',
            'foto_user.max'         => 'Ukuran Foto User maksimal 2 mb',
        ]);

        $detail = $this->ModelUser->detail($id_user);

        $jabatan = Jabatans::find(Request()->id_jabatan);
        $divisi = Divisies::find(Request()->id_divisi);

        if (Request()->fungsi !== null && Request()->role == 'Head Office') {
            $fungsi = Request()->fungsi;
        } else if (Request()->fungsi == null && Request()->role == 'Head Office') {
            $fungsi = $detail->fungsi;
        } else {
            $fungsi = null;
        }

        if (Request()->password) {

            $user = $this->ModelUser->detail($id_user);

            if (Request()->foto_user <> "") {
                if ($user->foto_user <> "") {
                    unlink(public_path($this->public_path) . '/' . $user->foto_user);
                }

                $file = Request()->foto_user;
                $fileUser = date('mdYHis') . Request()->nama_user . '.' . $file->extension();
                $file->move(public_path($this->public_path), $fileUser);

                $data = [
                    'id_user'       => $id_user,
                    'nama_user'     => Request()->nama_user,
                    'telepon'       => Request()->telepon,
                    'nip'           => Request()->nip,
                    'jabatan'       => $jabatan->nama_jabatan,
                    'id_jabatan'    => Request()->id_jabatan,
                    'fungsi'        => $fungsi,
                    'foto_user'     => $fileUser,
                    'role'          => Request()->role,
                    'divisi'        => $divisi->nama_divisi,
                    'id_divisi'     => Request()->id_divisi,
                    'password'      => Hash::make(Request()->password),
                ];
                $this->ModelUser->edit($data);
            } else {
                $data = [
                    'id_user'       => $id_user,
                    'nama_user'     => Request()->nama_user,
                    'telepon'       => Request()->telepon,
                    'nip'           => Request()->nip,
                    'jabatan'       => $jabatan->nama_jabatan,
                    'id_jabatan'    => Request()->id_jabatan,
                    'role'          => Request()->role,
                    'divisi'        => $divisi->nama_divisi,
                    'id_divisi'     => Request()->id_divisi,
                    'fungsi'        => $fungsi,
                    'password'      => Hash::make(Request()->password),
                ];
                $this->ModelUser->edit($data);
            }
        } else {
            $user = $this->ModelUser->detail($id_user);

            if (Request()->foto_user <> "") {
                if ($user->foto_user <> "") {
                    unlink(public_path($this->public_path) . '/' . $user->foto_user);
                }

                $file = Request()->foto_user;
                $fileUser = date('mdYHis') . Request()->nama_user . '.' . $file->extension();
                $file->move(public_path($this->public_path), $fileUser);

                $data = [
                    'id_user'       => $id_user,
                    'nama_user'     => Request()->nama_user,
                    'telepon'       => Request()->telepon,
                    'nip'           => Request()->nip,
                    'jabatan'       => $jabatan->nama_jabatan,
                    'id_jabatan'       => Request()->id_jabatan,
                    'foto_user'     => $fileUser,
                    'fungsi'        => $fungsi,
                    'role'          => Request()->role,
                    'divisi'        => $divisi->nama_divisi,
                    'id_divisi'     => Request()->id_divisi,
                ];
                $this->ModelUser->edit($data);
            } else {
                $data = [
                    'id_user'       => $id_user,
                    'nama_user'     => Request()->nama_user,
                    'telepon'       => Request()->telepon,
                    'nip'           => Request()->nip,
                    'fungsi'        => $fungsi,
                    'jabatan'       => $jabatan->nama_jabatan,
                    'id_jabatan'       => Request()->id_jabatan,
                    'role'          => Request()->role,
                    'divisi'        => $divisi->nama_divisi,
                    'id_divisi'     => Request()->id_divisi,
                ];
                $this->ModelUser->edit($data);
            }
        }

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Mengedit Data User.';
        $log->feature   = 'USER';
        $log->save();

        return redirect()->route('engineering-kelola-user')->with('success', 'Data user berhasil diedit!');
    }

    public function prosesHapus($id_user)
    {
        $user = $this->ModelUser->detail($id_user);

        if ($user->foto_user <> "") {
            unlink(public_path($this->public_path) . '/' . $user->foto_user);
        }

        $this->ModelUser->hapus($id_user);

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Menghapus Data User.';
        $log->feature   = 'USER';
        $log->save();

        return redirect()->route('engineering-kelola-user')->with('success', 'Data user berhasil dihapus !');
    }

    public function profil()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'     => 'Profil',
            'subTitle'  => 'Edit Profil',
            'user'      => $this->ModelUser->detail(Session()->get('id_user'))
        ];

        return view('profil.index', $data);
    }

    public function prosesEditProfil($id_user)
    {
        Request()->validate([
            'nama_user'     => 'required',
            'telepon'       => 'required',
            'nip'           => 'required',
            'foto_user'     => 'mimes:jpeg,png,jpg|max:2048'
        ], [
            'nama_user.required'    => 'Nama lengkap harus diisi!',
            'telepon.required'      => 'Nomor telepon harus diisi!',
            'nip.required'          => 'NIP harus diisi!',
            'foto_user.mimes'       => 'Format Foto User harus jpg/jpeg/png!',
            'foto_user.max'         => 'Ukuran Foto User maksimal 2 mb',
        ]);

        if (Request()->foto_user <> "") {

            $user = $this->ModelUser->detail($id_user);

            if ($user->foto_user <> "") {
                unlink(public_path($this->public_path) . '/' . $user->foto_user);
            }

            $file = Request()->foto_user;
            $fileUser = date('mdYHis') . Request()->nama_user . '.' . $file->extension();
            $file->move(public_path($this->public_path), $fileUser);

            $data = [
                'id_user'       => $id_user,
                'nama_user'     => Request()->nama_user,
                'telepon'       => Request()->telepon,
                'nip'           => Request()->nip,
                'foto_user'     => $fileUser
            ];
        } else {
            $data = [
                'id_user'       => $id_user,
                'nama_user'     => Request()->nama_user,
                'telepon'       => Request()->telepon,
                'nip'           => Request()->nip
            ];
        }


        $this->ModelUser->edit($data);
        return redirect()->route('profil')->with('success', 'Profil berhasil diedit !');
    }

    public function ubahPassword()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'     => 'Profil',
            'subTitle'  => 'Ubah Password',
            'user'      => $this->ModelUser->detail(Session()->get('id_user'))
        ];

        return view('profil.ubahPassword', $data);
    }

    public function prosesUbahPassword($id_user)
    {
        Request()->validate([
            'password_lama'     => 'required|min:6',
            'password_baru'     => 'required|min:6',
        ], [
            'password_lama.required'    => 'Password Lama harus diisi!',
            'password_lama.min'         => 'Password Lama minikal 6 karakter!',
            'password_baru.required'    => 'Password Baru harus diisi!',
            'password_baru.min'         => 'Password Lama minikal 6 karakter!',
        ]);

        $user = $this->ModelUser->detail($id_user);

        if (Hash::check(Request()->password_lama, $user->password)) {
            $data = [
                'id_user'         => $id_user,
                'password'         => Hash::make(Request()->password_baru)
            ];

            $this->ModelUser->edit($data);
            return back()->with('success', 'Password berhasil diubah !');
        } else {
            return back()->with('fail', 'Password Lama tidak sesuai.');
        }
    }
}
