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

    public function index(Request $request)
    {
        if (!Session::get('role')) {
            return redirect()->route('login');
        }
    
        // Mendapatkan query dasar laporan keuangan
        $query = LaporanProyeks::with('proyek')->limit(400);
    
        // Filter berdasarkan bulan dan tahun jika parameter 'bulan' ada
        if ($request->has('bulan') && !empty($request->bulan)) {
            $query->where('periode', 'like', $request->bulan . '%');
        }
    
        // Filter data sesuai role pengguna
        if (Session::get('role') == 'Tim Proyek') {
            $proyekUser = ProyekUsers::where('id_user', Session::get('id_user'))->get();
            $idProyek = $proyekUser->pluck('id_proyek')->toArray();
    
            $daftarLaporanProyek = $query->whereIn('id_proyek', $idProyek)->get();
        } elseif (Session::get('role') == 'Head Office') {
            $daftarLaporanProyek = $query->get();
        } else {
            $daftarLaporanProyek = collect(); // Menggunakan koleksi kosong jika role tidak dikenali
        }
    
        $data = [
            'title' => 'Data Laporan Keuangan',
            'subTitle' => 'Daftar Laporan Keuangan',
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
    
        $laporanProyekDetail = LaporanProyekDetails::with(['dokumen', 'laporanProyek'])
        ->withCount('laporanProyekSubDetails') // Menghitung jumlah sub-detail
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
            'periode'   => 'required|date_format:Y-m',
        ]);
    
        // Cek apakah kombinasi id_proyek dan periode sudah ada
        $existingReport = LaporanProyeks::where('id_proyek', $validatedData['id_proyek'])
                        ->where('periode', $validatedData['periode'])
                        ->first();
    
        if ($existingReport) {
            return back()->with('fail', 'Data dengan proyek dan periode tersebut sudah ada!');
        }
    
        DB::beginTransaction();
    
        try {
            // Buat objek laporan keuangan baru
            $laporanProyek = new LaporanProyeks();
            $laporanProyek->id_proyek = $validatedData['id_proyek']; // Menyimpan id_proyek yang valid
            $laporanProyek->verifikasi_proyek = 'Belum Disetujui'; // Misalnya status default
            $laporanProyek->periode = $validatedData['periode']; 
    
            // Log informasi sebelum menyimpan
            Log::info('Menyimpan laporan proyek:', [
                'id_proyek' => $laporanProyek->id_proyek,
            ]);
    
            // Simpan laporan proyek
            $laporanProyek->save();
    
            DB::commit(); // Komit transaksi jika berhasil
            return redirect('/daftar-laporan-proyek')->with('success', 'Laporan proyek berhasil ditambahkan!');
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
            'title'             => 'Data Laporan Pajak',
            'subTitle'          => 'Edit Laporan Pajak',
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
    
        try {
            $laporanProyek = LaporanProyeks::findOrFail($id_laporan_proyek);
            $laporanProyek->delete();
    
            // Jika ada file yang perlu dihapus juga
            $laporanProyekDetail = LaporanProyekDetails::where('id_laporan_proyek', $id_laporan_proyek)->get();
            foreach ($laporanProyekDetail as $item) {
                if ($item->file_dokumen != "") {
                    unlink(public_path($this->public_path) . '/' . $item->file_dokumen);
                }
                $item->delete();
            }
    
            return back()->with('success', 'Data berhasil dihapus!');
        } catch (\Exception $e) {
            return back()->with('fail', 'Terjadi kesalahan saat menghapus data!');
        }
    }

    public function verifikasi()
    {
        if (!Session::get('role')) {
            return redirect()->route('login');
        }

        $daftarLaporanProyek = LaporanProyeks::with('proyek')->limit(400)->get();

        $data = [
            'title' => 'Data Laporan Proyek',
            'subTitle' => 'Verifikasi Laporan Proyek',
            'daftarLaporanProyek' => $daftarLaporanProyek,
            'user' => $this->ModelUser->detail(Session::get('id_user')),
        ];

        return view('keuangan.laporanProyek.verifikasi', $data);
    }

    public function prosesVerifikasi($id_laporan_proyek)
    {
        if (!Session::get('role')) {
            return redirect()->route('login');
        }

        $laporanProyek = LaporanPajaks::find($id_laporan_proyek);
        $laporanProyek->verifikasi_proyek = 'Sudah Disetujui';
        $laporanProyek->id_verifikator = Session::get('id_user');
        $laporanProyek->save();

        return back()->with('success', 'Data berhasil diverifikasi!');
    }

    public function prosesVerifikasiDetail($id_laporan_proyek)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }
        
        $laporanProyek = LaporanProyekDetails::find($id_laporan_proyek);
        $laporanProyek->status = 1;
        $laporanProyek->id_verifikator = Session()->get('id_user');
        $laporanProyek->save();
        
        return back()->with('success', 'Data berhasil diverifikasi!');
    }

    public function prosesBukaVerifikasiDetail($id_laporan_proyek)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }
        
        $laporanProyek = LaporanProyekDetails::find($id_laporan_proyek);
        $laporanProyek->status = 0;
        $laporanProyek->id_verifikator = Session()->get('id_user');
        $laporanProyek->save();
        
        return back()->with('success', 'Data berhasil diverifikasi!');
    }

    public function prosesTolakVerifikasiDetail(Request $request, $id_laporan_proyek)
    {
        if (!Session::get('role')) {
            return redirect()->route('login');
        }
    
        // Validasi input komentar agar tidak kosong
        $request->validate([
            'comment' => 'required|string|max:255'
        ]);
    
        // Cari data laporan proyek berdasarkan ID
        $laporanProyek = LaporanProyekDetails::find($id_laporan_proyek);
    
        if (!$laporanProyek) {
            return back()->with('fail', 'Laporan tidak ditemukan!');
        }
    
        // Update status menjadi 2 (Verifikasi Ditolak) dan simpan komentar penolakan
        $laporanProyek->status = 2;
        $laporanProyek->id_verifikator = Session()->get('id_user');
        $laporanProyek->komentar = $request->comment; // Pastikan kolom komentar tersedia di database
        $laporanProyek->save();
    
        return back()->with('success', 'Data berhasil ditolak verifikasinya dengan komentar!');
    }
    
}
