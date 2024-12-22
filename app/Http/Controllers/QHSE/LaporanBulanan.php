<?php

namespace App\Http\Controllers\QHSE;

use App\Http\Controllers\Controller;
use App\Models\DokumenBulanans;
use App\Models\ModelUser;
use App\Models\LaporanBulanans;
use App\Models\ModelProyek;
use App\Models\ProyekUsers;
use App\Models\LaporanBulananDetails;
use App\Models\LaporanBulananSubDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log; // Pastikan ini ada

class LaporanBulanan extends Controller
{
    private $ModelUser, $ModelProyek, $public_path;

    public function __construct()
    {
        $this->ModelUser = new ModelUser();
        $this->ModelProyek = new ModelProyek();
        $this->public_path = 'file_laporan_Bulanan';
    }

    public function index(Request $request)
    {
        if (!Session::get('role')) {
            return redirect()->route('login');
        }
    
        // Mendapatkan query dasar laporan keuangan
        $query = LaporanBulanans::with('proyek')->limit(400);
    
        // Filter berdasarkan bulan dan tahun jika parameter 'bulan' ada
        if ($request->has('bulan') && !empty($request->bulan)) {
            $query->where('periode', 'like', $request->bulan . '%');
        }
    
        // Filter data sesuai role pengguna
        if (Session::get('role') == 'Tim Proyek') {
            $proyekUser = ProyekUsers::where('id_user', Session::get('id_user'))->get();
            $idProyek = $proyekUser->pluck('id_proyek')->toArray();
    
            $daftarLaporanBulanan = $query->whereIn('id_proyek', $idProyek)->get();
        } elseif (Session::get('role') == 'Head Office') {
            $daftarLaporanBulanan = $query->get();
        } else {
            $daftarLaporanBulanan = collect(); // Menggunakan koleksi kosong jika role tidak dikenali
        }
    
        $data = [
            'title' => 'Data Dokumen Proyek Bulanan',
            'subTitle' => 'Daftar Dokumen Proyek Bulanan',
            'daftarLaporanBulanan' => $daftarLaporanBulanan,
            'user' => $this->ModelUser->detail(Session::get('id_user')),
        ];
    
        return view('qhse.laporanBulanan.index', $data);
    }
    
    public function detail($id_laporan_bulanan)
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
    
        $laporanBulananDetail = LaporanBulananDetails::with(['laporanBulanan'])
        ->withCount('laporanBulananSubDetails') // Hitung jumlah sub-detail
        ->where('id_laporan_bulanan', $id_laporan_bulanan)
        ->get();
    
        // Mengambil laporan keuangan dengan proyek terkait
        $laporanBulanan = LaporanBulanans::with('proyek')->find($id_laporan_bulanan);
        
        // Mengambil detail pengguna yang sedang login
        $user = $this->ModelUser->detail(Session()->get('id_user'));
     
        // Mengatur data untuk view
        $data = [
            'title' => 'Data Dokumen Proyek Bulanan',
            'subTitle' => 'Detail Dokumen Proyek Bulanan',
            'form' => 'Detail',
            'daftarProyek' => $dataProyekByUser,
            'laporanBulananDetail' => $laporanBulananDetail,
            'laporanBulanan' => $laporanBulanan,
            'user' => $user,
            'detail' => $laporanBulanan// Pastikan variabel detail ada dan diisi
        ];
    
        // Mengembalikan view dengan data yang telah diambil
        return view('qhse/laporanBulanan.edit', $data);
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
            'title'             => 'Data Dokumen Proyek Bulanan',
            'subTitle'          => 'Tambah Dokumen Proyek Bulanan',
            'form'              => 'Tambah',
            'dokumenBulanan'   => DokumenBulanans::get(),
            'daftarProyek'      => $dataProyekByUser,
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        return view('qhse/laporanBulanan.form', $data);
    }

    public function prosesTambah(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'id_proyek' => 'required|exists:proyek,id_proyek', // Memastikan id_proyek valid
            'periode'   => 'required|date_format:Y-m',
        ]);
    
        // Cek apakah kombinasi id_proyek dan periode sudah ada
        $existingReport = LaporanBulanans::where('id_proyek', $validatedData['id_proyek'])
                        ->where('periode', $validatedData['periode'])
                        ->first();
    
        if ($existingReport) {
            return back()->with('fail', 'Data dengan proyek dan periode tersebut sudah ada!');
        }
    
        DB::beginTransaction();
    
        try {
            // Buat objek laporan keuangan baru
            $laporanBulanan = new LaporanBulanans();
            $laporanBulanan->id_proyek = $validatedData['id_proyek']; // Menyimpan id_proyek yang valid
            $laporanBulanan->verifikasi_bulanan = 'Belum Disetujui'; // Misalnya status default
            $laporanBulanan->periode = $validatedData['periode']; 
    
            // Log informasi sebelum menyimpan
            Log::info('Menyimpan laporan bulanan:', [
                'id_proyek' => $laporanBulanan->id_proyek,
            ]);
    
            // Simpan laporan keuangan
            $laporanBulanan->save();
    
            DB::commit(); // Komit transaksi jika berhasil
            return redirect('/daftar-laporan-bulanan')->with('success', 'Laporan Bulanan berhasil ditambahkan!');
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback jika terjadi kesalahan
            Log::error('Kesalahan saat menyimpan laporan bulanan: ' . $e->getMessage());
            return back()->with('fail', 'Terjadi kesalahan sistem!'); 
        }
    }
    

    public function edit($id_laporan_bulanan)
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
            'title'             => 'Data Laporan Bulanan',
            'subTitle'          => 'Edit Laporan Bulanan',
            'form'              => 'Edit',
            'daftarProyek'      => $dataProyekByUser,
            'LaporanBulananDetail'    => LaporanBulananDetails::with(['dokumen', 'LaporanBulanan'])
                                    ->withCount(['LaporanBulananSubDetails' => function ($query) use ($id_laporan_bulanan) {
                                        $query->where('id_laporan_bulanans', $id_laporan_bulanan);
                                    }])
                                    ->where('id_laporan_bulanans', $id_laporan_bulanan)
                                    ->get(),
            'detail'            => LaporanBulanans::with('proyek')->find($id_laporan_bulanan),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];
        
        return view('qhse/laporanBulanan.edit', $data);
    }
    
    public function prosesHapus($id_laporan_bulanan)
    {
        if (!Session::get('role')) {
            return redirect()->route('login');
        }
    
        try {
            $laporanBulanan = LaporanBulanans::findOrFail($id_laporan_bulanan);
            $laporanBulanan->delete();
    
            // Jika ada file yang perlu dihapus juga
            $laporanBulananDetail = LaporanBulananDetails::where('id_laporan_bulanan', $id_laporan_bulanan)->get();
            foreach ($laporanBulananDetail as $item) {
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

        $daftarLaporanBulanan = LaporanBulanan::with('proyek')->limit(400)->get();

        $data = [
            'title' => 'Data Laporan Bulanan',
            'subTitle' => 'Verifikasi Laporan Bulanan',
            'daftarLaporanBulanan' => $daftarLaporanBulanan,
            'user' => $this->ModelUser->detail(Session::get('id_user')),
        ];

        return view('qhse.laporanBulanan.verifikasi', $data);
    }

    public function prosesVerifikasi($id_laporan_bulanan)
    {
        if (!Session::get('role')) {
            return redirect()->route('login');
        }

        $laporanBulanan = LaporanBulanans::find($id_laporan_bulanan);
        $laporanBulanan->verifikasi_bulanan = 'Sudah Disetujui';
        $laporanBulanan->id_verifikator = Session::get('id_user');
        $laporanBulanan->save();

        return back()->with('success', 'Data berhasil diverifikasi!');
    }

    public function prosesVerifikasiDetail($id_laporan_bulanan)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }
        
        $laporanBulanan = LaporanBulananDetails::find($id_laporan_bulanan);
        $laporanBulanan->status = 1;
        $laporanBulanan->id_verifikator = Session()->get('id_user');
        $laporanBulanan->save();
        
        return back()->with('success', 'Data berhasil diverifikasi!');
    }

    public function prosesBukaVerifikasiDetail($id_laporan_bulanan)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }
        
        $laporanBulanan = LaporanBulananDetails::find($id_laporan_bulanan);
        $laporanBulanan->status = 0;
        $laporanBulanan->id_verifikator = Session()->get('id_user');
        $laporanBulanan->save();
        
        return back()->with('success', 'Data berhasil diverifikasi!');
    }

    public function prosesTolakVerifikasiDetail(Request $request, $id_laporan_bulanan)
    {
        if (!Session::get('role')) {
            return redirect()->route('login');
        }
    
        // Validasi input komentar agar tidak kosong
        $request->validate([
            'comment' => 'required|string|max:255'
        ]);
    
        // Cari data laporan proyek berdasarkan ID
        $laporanBulanan = LaporanBulananDetails::find($id_laporan_bulanan);
    
        if (!$laporanBulanan) {
            return back()->with('fail', 'Laporan tidak ditemukan!');
        }
    
        // Update status menjadi 2 (Verifikasi Ditolak) dan simpan komentar penolakan
        $laporanBulanan->status = 2;
        $laporanBulanan->id_verifikator = Session()->get('id_user');
        $laporanBulanan->komentar = $request->comment; // Pastikan kolom komentar tersedia di database
        $laporanBulanan->save();
    
        return back()->with('success', 'Data berhasil ditolak verifikasinya dengan komentar!');
    }
}
