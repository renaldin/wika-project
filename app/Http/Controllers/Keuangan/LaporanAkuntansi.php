<?php

namespace App\Http\Controllers\Keuangan;

use App\Http\Controllers\Controller;
use App\Models\DokumenAkuntansis;
use App\Models\ModelUser;
use App\Models\LaporanAkuntansis;
use App\Models\ModelProyek;
use App\Models\ProyekUsers;
use App\Models\LaporanAkuntansiDetails;
use App\Models\LaporanAkuntansiSubDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log; // Pastikan ini ada

class LaporanAkuntansi extends Controller
{
    private $ModelUser, $ModelProyek, $public_path;

    public function __construct()
    {
        $this->ModelUser = new ModelUser();
        $this->ModelProyek = new ModelProyek();
        $this->public_path = 'file_laporan_akuntansi';
    }

    public function index(Request $request)
    {
        if (!Session::get('role')) {
            return redirect()->route('login');
        }
    
        // Mendapatkan query dasar laporan keuangan
        $query = LaporanAkuntansis::with('proyek')->limit(400);
    
        // Filter berdasarkan bulan dan tahun jika parameter 'bulan' ada
        if ($request->has('bulan') && !empty($request->bulan)) {
            $query->where('periode', 'like', $request->bulan . '%');
        }
    
        // Filter data sesuai role pengguna
        if (Session::get('role') == 'Tim Proyek') {
            $proyekUser = ProyekUsers::where('id_user', Session::get('id_user'))->get();
            $idProyek = $proyekUser->pluck('id_proyek')->toArray();
    
            $daftarLaporanAkuntansi = $query->whereIn('id_proyek', $idProyek)->get();
        } elseif (Session::get('role') == 'Head Office') {
            $daftarLaporanAkuntansi = $query->get();
        } else {
            $daftarLaporanAkuntansi = collect(); // Menggunakan koleksi kosong jika role tidak dikenali
        }
    
        $data = [
            'title' => 'Data Laporan Akuntansi',
            'subTitle' => 'Daftar Laporan Akuntansi',
            'daftarLaporanAkuntansi' => $daftarLaporanAkuntansi,
            'user' => $this->ModelUser->detail(Session::get('id_user')),
        ];
    
        return view('keuangan.laporanAkuntansi.index', $data);
    }
    
    public function detail($id_laporan_akuntansi)
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
    
        $laporanAkuntansiDetail = LaporanAkuntansiDetails::with(['dokumen', 'laporanAkuntansi'])
            ->withCount('laporanAkuntansiSubDetails') // Hitung jumlah sub-detail
            ->where('id_laporan_akuntansi', $id_laporan_akuntansi)
            ->get();
            
        // Mengambil laporan keuangan dengan proyek terkait
        $laporanAkuntansi = LaporanAkuntansis::with('proyek')->find($id_laporan_akuntansi);
        
        // Mengambil detail pengguna yang sedang login
        $user = $this->ModelUser->detail(Session()->get('id_user'));
     
        // Mengatur data untuk view
        $data = [
            'title' => 'Data Laporan Akuntansi',
            'subTitle' => 'Detail Laporan Akuntansi',
            'form' => 'Detail',
            'daftarProyek' => $dataProyekByUser,
            'laporanAkuntansiDetail' => $laporanAkuntansiDetail,
            'laporanAkuntansi' => $laporanAkuntansi,
            'user' => $user,
            'detail' => $laporanAkuntansi// Pastikan variabel detail ada dan diisi
        ];
    
        // Mengembalikan view dengan data yang telah diambil
        return view('keuangan.laporanAkuntansi.edit', $data);
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
            'title'             => 'Data Laporan Akuntansi',
            'subTitle'          => 'Tambah Laporan Akuntansi',
            'form'              => 'Tambah',
            'dokumenAkuntansi'   => DokumenAkuntansis::get(),
            'daftarProyek'      => $dataProyekByUser,
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        return view('keuangan/laporanAkuntansi.form', $data);
    }

    public function prosesTambah(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'id_proyek' => 'required|exists:proyek,id_proyek', // Memastikan id_proyek valid
            'periode'   => 'required|date_format:Y-m',
        ]);
    
        // Cek apakah kombinasi id_proyek dan periode sudah ada
        $existingReport = LaporanAkuntansis::where('id_proyek', $validatedData['id_proyek'])
                        ->where('periode', $validatedData['periode'])
                        ->first();
    
        if ($existingReport) {
            return back()->with('fail', 'Data dengan proyek dan periode tersebut sudah ada!');
        }
    
        DB::beginTransaction();
    
        try {
            // Buat objek laporan keuangan baru
            $laporanAkuntansi = new LaporanAkuntansis();
            $laporanAkuntansi->id_proyek = $validatedData['id_proyek']; // Menyimpan id_proyek yang valid
            $laporanAkuntansi->verifikasi_akuntansi = 'Belum Disetujui'; // Misalnya status default
            $laporanAkuntansi->periode = $validatedData['periode']; 
    
            // Log informasi sebelum menyimpan
            Log::info('Menyimpan laporan akuntansi:', [
                'id_proyek' => $laporanAkuntansi->id_proyek,
            ]);
    
            // Simpan laporan keuangan
            $laporanAkuntansi->save();
    
            DB::commit(); // Komit transaksi jika berhasil
            return redirect('/daftar-laporan-akuntansi')->with('success', 'Laporan akuntansi berhasil ditambahkan!');
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback jika terjadi kesalahan
            Log::error('Kesalahan saat menyimpan laporan akuntansi: ' . $e->getMessage());
            return back()->with('fail', 'Terjadi kesalahan sistem!'); 
        }
    }
    

    public function edit($id_laporan_akuntansi)
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
            'title'             => 'Data Laporan Akuntansi',
            'subTitle'          => 'Edit Laporan Akuntansi',
            'form'              => 'Edit',
            'daftarProyek'      => $dataProyekByUser,
            'LaporanAkuntansiDetail'    => LaporanAkuntansiDetails::with(['dokumen', 'LaporanAkuntansi'])
                                    ->withCount(['LaporanAkuntansiSubDetails' => function ($query) use ($id_laporan_akuntansi) {
                                        $query->where('id_laporan_akuntansis', $id_laporan_akuntansi);
                                    }])
                                    ->where('id_laporan_akuntansis', $id_laporan_akuntansi)
                                    ->get(),
            'detail'            => LaporanAkuntansis::with('proyek')->find($id_laporan_akuntansi),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];
        
        return view('keuangan/laporanAkuntansi.edit', $data);
    }
    
    public function prosesHapus($id_laporan_akuntansi)
    {
        if (!Session::get('role')) {
            return redirect()->route('login');
        }
    
        try {
            $laporanAkuntansi = LaporanAkuntansis::findOrFail($id_laporan_akuntansi);
            $laporanAkuntansi->delete();
    
            // Jika ada file yang perlu dihapus juga
            $laporanAkuntansiDetail = LaporanAkuntansiDetails::where('id_laporan_akuntansi', $id_laporan_akuntansi)->get();
            foreach ($laporanAkuntansiDetail as $item) {
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

        $daftarLaporanAkuntansi = LaporanAkuntansi::with('proyek')->limit(400)->get();

        $data = [
            'title' => 'Data Laporan Akuntansi',
            'subTitle' => 'Verifikasi Laporan Akuntansi',
            'daftarLaporanAkuntansi' => $daftarLaporanAkuntansi,
            'user' => $this->ModelUser->detail(Session::get('id_user')),
        ];

        return view('keuangan.laporanAkuntansi.verifikasi', $data);
    }

    public function prosesVerifikasi($id_laporan_akuntansi)
    {
        if (!Session::get('role')) {
            return redirect()->route('login');
        }

        $laporanAkuntansi = LaporanAkuntansis::find($id_laporan_akuntansi);
        $laporanAkuntansi->verifikasi_akuntansi = 'Sudah Disetujui';
        $laporanAkuntansi->id_verifikator = Session::get('id_user');
        $laporanAkuntansi->save();

        return back()->with('success', 'Data berhasil diverifikasi!');
    }

    public function prosesVerifikasiDetail($id_laporan_akuntansi)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }
        
        $laporanAkuntansi = LaporanAkuntansiDetails::find($id_laporan_akuntansi);
        $laporanAkuntansi->status = 1;
        $laporanAkuntansi->id_verifikator = Session()->get('id_user');
        $laporanAkuntansi->save();
        
        return back()->with('success', 'Data berhasil diverifikasi!');
    }

    public function prosesBukaVerifikasiDetail($id_laporan_akuntansi)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }
        
        $laporanAkuntansi = LaporanAkuntansiDetails::find($id_laporan_akuntansi);
        $laporanAkuntansi->status = 0;
        $laporanAkuntansi->id_verifikator = Session()->get('id_user');
        $laporanAkuntansi->save();
        
        return back()->with('success', 'Data berhasil diverifikasi!');
    }

    public function prosesTolakVerifikasiDetail(Request $request, $id_laporan_akuntansi)
    {
        if (!Session::get('role')) {
            return redirect()->route('login');
        }
    
        // Validasi input komentar agar tidak kosong
        $request->validate([
            'comment' => 'required|string|max:255'
        ]);
    
        // Cari data laporan proyek berdasarkan ID
        $laporanAkuntansi = LaporanAkuntansiDetails::find($id_laporan_akuntansi);
    
        if (!$laporanAkuntansi) {
            return back()->with('fail', 'Laporan tidak ditemukan!');
        }
    
        // Update status menjadi 2 (Verifikasi Ditolak) dan simpan komentar penolakan
        $laporanAkuntansi->status = 2;
        $laporanAkuntansi->id_verifikator = Session()->get('id_user');
        $laporanAkuntansi->komentar = $request->comment; // Pastikan kolom komentar tersedia di database
        $laporanAkuntansi->save();
    
        return back()->with('success', 'Data berhasil ditolak verifikasinya dengan komentar!');
    }
}
