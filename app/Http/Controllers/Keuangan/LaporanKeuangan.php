<?php

namespace App\Http\Controllers\Keuangan;

use App\Http\Controllers\Controller;
use App\Models\DokumenKeuangans;
use App\Models\ModelUser;
use App\Models\LaporanKeuangans;
use App\Models\ModelProyek;
use App\Models\ProyekUsers;
use App\Models\LaporanKeuanganDetails;
use App\Models\LaporanKeuanganSubDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log; // Pastikan ini ada

class LaporanKeuangan extends Controller
{
    private $ModelUser, $ModelProyek, $public_path;

    public function __construct()
    {
        $this->ModelUser = new ModelUser();
        $this->ModelProyek = new ModelProyek();
        $this->public_path = 'file_laporan_keuangan';
    }

    public function index(Request $request)
    {
        if (!Session::get('role')) {
            return redirect()->route('login');
        }
    
        // Mendapatkan query dasar laporan keuangan
        $query = LaporanKeuangans::with('proyek')->limit(400);
    
        // Filter berdasarkan bulan dan tahun jika parameter 'bulan' ada
        if ($request->has('bulan') && !empty($request->bulan)) {
            $query->where('periode', 'like', $request->bulan . '%');
        }
    
        // Filter data sesuai role pengguna
        if (Session::get('role') == 'Tim Proyek') {
            $proyekUser = ProyekUsers::where('id_user', Session::get('id_user'))->get();
            $idProyek = $proyekUser->pluck('id_proyek')->toArray();
    
            $daftarLaporanKeuangan = $query->whereIn('id_proyek', $idProyek)->get();
        } elseif (Session::get('role') == 'Head Office') {
            $daftarLaporanKeuangan = $query->get();
        } else {
            $daftarLaporanKeuangan = collect(); // Menggunakan koleksi kosong jika role tidak dikenali
        }
    
        $data = [
            'title' => 'Data Laporan Keuangan',
            'subTitle' => 'Daftar Laporan Keuangan',
            'daftarLaporanKeuangan' => $daftarLaporanKeuangan,
            'user' => $this->ModelUser->detail(Session::get('id_user')),
        ];
    
        return view('keuangan.laporanKeuangan.index', $data);
    }
    
    
    
    public function detail($id_laporan_keuangan)
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
    
        // Mengambil detail laporan keuangan berdasarkan ID, dengan menghitung jumlah file
        $laporanKeuanganDetail = LaporanKeuanganDetails::with(['dokumen', 'laporanKeuangan'])
            ->withCount('laporanKeuanganSubDetails') // Hitung jumlah sub-detail
            ->where('id_laporan_keuangan', $id_laporan_keuangan)
            ->get();
            
        // Mengambil laporan keuangan dengan proyek terkait
        $laporanKeuangan = LaporanKeuangans::with('proyek')->find($id_laporan_keuangan);
        
        // Mengambil detail pengguna yang sedang login
        $user = $this->ModelUser->detail(Session()->get('id_user'));
     
        // Mengatur data untuk view
        $data = [
            'title' => 'Data Laporan Keuangan',
            'subTitle' => 'Detail Laporan Keuangan',
            'form' => 'Detail',
            'daftarProyek' => $dataProyekByUser,
            'laporanKeuanganDetail' => $laporanKeuanganDetail,
            'laporanKeuangan' => $laporanKeuangan,
            'user' => $user,
            'detail' => $laporanKeuangan // Pastikan variabel detail ada dan diisi
        ];
    
        // Mengembalikan view dengan data yang telah diambil
        return view('keuangan.laporanKeuangan.edit', $data);
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
            'title'             => 'Data Laporan Keuangan',
            'subTitle'          => 'Tambah Laporan Keuangan',
            'form'              => 'Tambah',
            'dokumenKeuangan'   => DokumenKeuangans::get(),
            'daftarProyek'      => $dataProyekByUser,
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        return view('keuangan/laporanKeuangan.form', $data);
    }

    public function prosesTambah(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'id_proyek' => 'required|exists:proyek,id_proyek', // Memastikan id_proyek valid
            'periode'   => 'required|date_format:Y-m',
        ]);
    
        // Cek apakah kombinasi id_proyek dan periode sudah ada
        $existingReport = LaporanKeuangans::where('id_proyek', $validatedData['id_proyek'])
                        ->where('periode', $validatedData['periode'])
                        ->first();
    
        if ($existingReport) {
            return back()->with('fail', 'Data dengan proyek dan periode tersebut sudah ada!');
        }
    
        DB::beginTransaction();
    
        try {
            // Buat objek laporan keuangan baru
            $laporanKeuangan = new LaporanKeuangans();
            $laporanKeuangan->id_proyek = $validatedData['id_proyek']; // Menyimpan id_proyek yang valid
            $laporanKeuangan->verifikasi_keuangan = 'Belum Disetujui'; // Misalnya status default
            $laporanKeuangan->periode = $validatedData['periode']; 
    
            // Log informasi sebelum menyimpan
            Log::info('Menyimpan laporan keuangan:', [
                'id_proyek' => $laporanKeuangan->id_proyek,
            ]);
    
            // Simpan laporan pajak
            $laporanKeuangan->save();
    
            DB::commit(); // Komit transaksi jika berhasil
            return redirect('/daftar-laporan-keuangan')->with('success', 'Laporan keuangan berhasil ditambahkan!');
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback jika terjadi kesalahan
            Log::error('Kesalahan saat menyimpan laporan keuangan: ' . $e->getMessage());
            return back()->with('fail', 'Terjadi kesalahan sistem!'); 
        }
    }
    

    public function edit($id_laporan_keuangan)
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
            'title'             => 'Data Laporan Keuangan',
            'subTitle'          => 'Edit Laporan Keuangan',
            'form'              => 'Edit',
            'daftarProyek'      => $dataProyekByUser,
            'LaporanKeuanganDetail'    => LaporanKeuanganDetails::with(['dokumen', 'LaporanKeuangan'])
                                    ->withCount(['LaporanKeuanganSubDetails' => function ($query) use ($id_laporan_keuangan) {
                                        $query->where('id_laporan_keuangans', $id_laporan_keuangan);
                                    }])
                                    ->where('id_laporan_keuangans', $id_laporan_keuangan)
                                    ->get(),
            'detail'            => LaporanKeuangans::with('proyek')->find($id_laporan_keuangan),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];
        
        return view('keuangan/laporanKeuangan.edit', $data);
    }
    
    public function prosesHapus($id_laporan_keuangan)
    {
        if (!Session::get('role')) {
            return redirect()->route('login');
        }
    
        try {
            $laporanKeuangan = LaporanKeuangans::findOrFail($id_laporan_keuangan);
            $laporanKeuangan->delete();
    
            // Jika ada file yang perlu dihapus juga
            $laporanKeuanganDetail = LaporanKeuanganDetails::where('id_laporan_keuangan', $id_laporan_keuangan)->get();
            foreach ($laporanKeuanganDetail as $item) {
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

        $daftarLaporanKeuangan = LaporanKeuangans::with('proyek')->limit(400)->get();

        $data = [
            'title' => 'Data Laporan Keuangan',
            'subTitle' => 'Verifikasi Laporan Keuangan',
            'daftarLaporanKeuangan' => $daftarLaporanKeuangan,
            'user' => $this->ModelUser->detail(Session::get('id_user')),
        ];

        return view('keuangan.laporanKeuangan.verifikasi', $data);
    }

    public function prosesVerifikasi($id_laporan_keuangan)
    {
        if (!Session::get('role')) {
            return redirect()->route('login');
        }

        $laporanKeuangan = LaporanKeuangans::find($id_laporan_keuangan);
        $laporanKeuangan->verifikasi_keuangan = 'Sudah Disetujui';
        $laporanKeuangan->id_verifikator = Session::get('id_user');
        $laporanKeuangan->save();

        return back()->with('success', 'Data berhasil diverifikasi!');
    }
   
    public function prosesVerifikasiDetail($id_laporan_keuangan)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }
    
        // Temukan laporan berdasarkan ID
        $laporanKeuangan = LaporanKeuanganDetails::find($id_laporan_keuangan);
    
        // Cek jika laporan ditemukan
        if (!$laporanKeuangan) {
            return back()->with('error', 'Laporan tidak ditemukan!');
        }
    
        // Ubah status menjadi 1 (sudah diverifikasi)
        $laporanKeuangan->status = 1;
        $laporanKeuangan->id_verifikator = Session()->get('id_user');
        $laporanKeuangan->save();
    
        return back()->with('success', 'Data berhasil diverifikasi!');
    }
    
    public function prosesBukaVerifikasiDetail($id_laporan_keuangan)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }
    
        // Temukan laporan berdasarkan ID
        $laporanKeuangan = LaporanKeuanganDetails::find($id_laporan_keuangan);
    
        // Cek jika laporan ditemukan
        if (!$laporanKeuangan) {
            return back()->with('error', 'Laporan tidak ditemukan!');
        }
    
        // Ubah status menjadi 0 (belum diverifikasi)
        $laporanKeuangan->status = 0;
        $laporanKeuangan->id_verifikator = Session()->get('id_user');
        $laporanKeuangan->save();
    
        return back()->with('success', 'Data berhasil dibuka verifikasinya!');
    }

    public function prosesTolakVerifikasiDetail(Request $request, $id_laporan_keuangan)
    {
        if (!Session::get('role')) {
            return redirect()->route('login');
        }
    
        // Validasi input komentar agar tidak kosong
        $request->validate([
            'comment' => 'required|string|max:255'
        ]);
    
        // Cari data laporan proyek berdasarkan ID
        $laporanKeuangan = LaporanKeuanganDetails::find($id_laporan_keuangan);
    
        if (!$laporanKeuangan) {
            return back()->with('fail', 'Laporan tidak ditemukan!');
        }
    
        // Update status menjadi 2 (Verifikasi Ditolak) dan simpan komentar penolakan
        $laporanKeuangan->status = 2;
        $laporanKeuangan->id_verifikator = Session()->get('id_user');
        $laporanKeuangan->komentar = $request->comment; // Pastikan kolom komentar tersedia di database
        $laporanKeuangan->save();
    
        return back()->with('success', 'Data berhasil ditolak verifikasinya dengan komentar!');
    }
    
}
