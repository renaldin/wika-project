<?php

namespace App\Http\Controllers\Keuangan;

use App\Http\Controllers\Controller;
use App\Models\DokumenProyeks;
use App\Models\ModelUser;
use App\Models\LaporanProyeks;
use App\Models\ModelProyek;
use App\Models\ProyekUsers;
use App\Models\LaporanProyekDetails;
use App\Models\LaporanProyekSubDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log; // Pastikan ini ada

class LaporanProyek extends Controller
{
    private $ModelUser, $ModelProyek, $public_path;

    public function __construct()
    {
        $this->ModelUser = new ModelUser();
        $this->ModelProyek = new ModelProyek();
        $this->public_path = 'file_laporan_proyek';
    }

    public function index()
    {
        if (!Session::get('role')) {
            return redirect()->route('login');
        }
        
        $proyekUser = ProyekUsers::where('id_user', Session::get('id_user'))->get();
        $idProyek = [];
        foreach ($proyekUser as $item) {
            $idProyek[] = $item->id_proyek;
        }
    
        if (Session::get('role') == 'Tim Proyek') {
            $daftarLaporanProyek = LaporanProyeks::with('proyek') // Memastikan ini benar
                ->whereIn('id_proyek', $idProyek)
                ->limit(400)
                ->get();
        } elseif (Session::get('role') == 'Head Office') {
            $daftarLaporanProyek = LaporanProyeks::with('proyek') // Memastikan ini benar
                ->where('verifikasi_proyek', 'Sudah Disetujui')
                ->where('id_verifikator', Session::get('id_user'))
                ->limit(400)
                ->get();
        }
    
        $data = [
            'title' => 'Data Laporan Proyek',
            'subTitle' => 'Daftar Laporan Proyek',
            'daftarLaporanProyek' => $daftarLaporanProyek,
            'user' => $this->ModelUser->detail(Session::get('id_user')),
        ];
    
        return view('keuangan.laporanProyek.index', $data);
    }
    
    public function detail($id_laporan_proyek)
    {
        // Mengecek apakah pengguna telah login
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }
    
        // Mengambil proyek yang terkait dengan pengguna yang sedang login
        $proyekUser = ProyekUsers::where('id_user', Session()->get('id_user'))->get();
        $dataProyekByUser = [];
        foreach ($proyekUser as $item) {
            $dataProyekByUser[] = ModelProyek::find($item->id_proyek);
        }
    
        // Mengambil detail laporan keuangan berdasarkan ID
        $laporanProyekDetail = LaporanProyekDetails::with(['dokumen', 'laporanProyek'])
            ->withCount(['laporanProyekSubDetails' => function ($query) use ($id_laporan_proyek) {
                $query->where('id_laporan_proyek', $id_laporan_proyek);
            }])
            ->where('id_laporan_proyek', $id_laporan_proyek)
            ->get();
    
        // Mengambil laporan keuangan dengan proyek terkait
        $laporanProyek = LaporanProyeks::with('proyek')->find($id_laporan_proyek);
        
        // Mengambil detail pengguna yang sedang login
        $user = $this->ModelUser->detail(Session()->get('id_user'));
     
        // Mengatur data untuk view
        $data = [
            'title' => 'Data Laporan Proyek',
            'subTitle' => 'Detail Laporan Proyek',
            'form' => 'Detail',
            'daftarProyek' => $dataProyekByUser,
            'laporanProyekDetail' => $laporanProyekDetail,
            'laporanProyek' => $laporanProyek,
            'user' => $user,
            'detail' => $laporanProyek// Pastikan variabel detail ada dan diisi
        ];
    
        // Mengembalikan view dengan data yang telah diambil
        return view('keuangan.laporanProyek.edit', $data);
    }
    public function tambah()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $proyekUser = ProyekUsers::where('id_user', Session()->get('id_user'))->get();
        $dataProyekByUser = [];
        foreach($proyekUser as $item) {
            $dataProyekByUser[] = ModelProyek::find($item->id_proyek);
        }

        $data = [
            'title'             => 'Data Laporan Proyek',
            'subTitle'          => 'Tambah Laporan Proyek',
            'form'              => 'Tambah',
            'dokumenProyek'   => DokumenProyeks::get(),
            'daftarProyek'      => $dataProyekByUser,
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        return view('keuangan/laporanProyek.form', $data);
    }

    public function prosesTambah(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'id_proyek' => 'required|exists:proyek,id_proyek', // Memastikan id_proyek valid
        ]);

        DB::beginTransaction();

        try {
            // Buat objek laporan keuangan baru
            $laporanProyek = new LaporanProyeks();
            $laporanProyek->id_proyek = $validatedData['id_proyek']; // Menyimpan id_proyek yang valid
            $laporanProyek->verifikasi_proyek = 'Belum Disetujui'; // Misalnya status default

            // Log informasi sebelum menyimpan
            Log::info('Menyimpan laporan akuntansi:', [
                'id_proyek' => $laporanProyek->id_proyek,
            ]);

            // Simpan laporan keuangan
            $laporanProyek->save();

            DB::commit(); // Komit transaksi jika berhasil
            return redirect('/daftar-laporan-proyek')->with('success', 'Laporan proyel berhasil ditambahkan!');
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback jika terjadi kesalahan
            Log::error('Kesalahan saat menyimpan laporan proyek: ' . $e->getMessage());
            return back()->with('fail', 'Terjadi kesalahan sistem!'); 
        }
    }

    public function edit($id_laporan_proyek)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $proyekUser = ProyekUsers::where('id_user', Session()->get('id_user'))->get();
        $dataProyekByUser = [];
        foreach($proyekUser as $item) {
            $dataProyekByUser[] = ModelProyek::find($item->id_proyek);
        }

        $data = [
            'title'             => 'Data Laporan Proyek',
            'subTitle'          => 'Edit Laporan Proyek',
            'form'              => 'Edit',
            'daftarProyek'      => $dataProyekByUser,
            'LaporanProyekDetail'    => LaporanProyekDetails::with(['dokumen', 'LaporanProyek'])
                                    ->withCount(['LaporanProyekSubDetails' => function ($query) use ($id_laporan_proyek) {
                                        $query->where('id_laporan_proyeks', $id_laporan_proyek);
                                    }])
                                    ->where('id_laporan_proyeks', $id_laporan_proyek)
                                    ->get(),
            'detail'            => LaporanProyeks::with('proyek')->find($id_laporan_proyek),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];
        
        return view('keuangan/laporanProyek.edit', $data);
    }
    
    public function prosesHapus($id_laporan_proyek)
    {
        if (!Session::get('role')) {
            return redirect()->route('login');
        }

        $LaporanProyek = LaporanProyek::find($id_laporan_proyek);
        $LaporanProyek->delete();

        $LaporanProyekDetails = LaporanProyekDetails::where('id_laporan_proyek', $id_laporan_proyek)->get();
        foreach ($LaporanProyekDetails as $item) {
            if ($item->file_dokumen != "") {
                unlink(public_path($this->public_path) . '/' . $item->file_dokumen);
            }
            $item->delete();
        }

        return back()->with('success', 'Data berhasil dihapus!');
    }

    public function verifikasi()
    {
        if (!Session::get('role')) {
            return redirect()->route('login');
        }

        $daftarLaporanProyek = LaporanProyek::with('proyek')->limit(400)->get();

        $data = [
            'title' => 'Data Laporan Proyek',
            'subTitle' => 'Verifikasi Laporan Proyek',
            'daftarLaporanProyek' => $daftarLaporanProyek,
            'user' => $this->ModelUser->detail(Session::get('id_user')),
        ];

        return view('keuangan.laporanProyek.verifikasi', $data);
    }

    public function prosesVerifikasi($id)
    {
        // Cek apakah user sudah login
        if (!Session::get('role')) {
            return redirect()->route('login');
        }
    
        // Mencari laporan keuangan berdasarkan ID
        $laporanKeuangan = LaporanKeuangan::find($id);
    
        // Jika laporan tidak ditemukan
        if (!$laporanKeuangan) {
            return back()->with('fail', 'Laporan keuangan tidak ditemukan!');
        }
    
        // Memverifikasi laporan
        $laporanKeuangan->verifikasi_keuangan = 'Sudah Disetujui';
        $laporanKeuangan->id_verifikator = Session::get('id_user'); // Simpan ID pengguna yang memverifikasi
        $laporanKeuangan->save(); // Simpan perubahan
    
        return back()->with('success', 'Laporan keuangan berhasil diverifikasi!');
    }
    

    public function prosesBukaVerifikasiDetail($id_laporan_proyek)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }
        
        $LaporanProyek = LaporanProyekDetails::find($id_laporan_proyek);
        $LaporanProyek->status = 0;
        $LaporanProyek->id_verifikator = Session()->get('id_user');
        $LaporanProyek->save();
        
        return back()->with('success', 'Data berhasil diverifikasi!');
    }
}
