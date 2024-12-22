<?php

namespace App\Http\Controllers\QHSE;

use App\Http\Controllers\Controller;
use App\Models\DokumenHses;
use App\Models\ModelUser;
use App\Models\LaporanHses;
use App\Models\ModelProyek;
use App\Models\ProyekUsers;
use App\Models\LaporanHseDetails;
use App\Models\LaporanHseSubDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log; // Pastikan ini ada

class LaporanHse extends Controller
{
    private $ModelUser, $ModelProyek, $public_path;

    public function __construct()
    {
        $this->ModelUser = new ModelUser();
        $this->ModelProyek = new ModelProyek();
        $this->public_path = 'file_laporan_Hse';
    }

    public function index(Request $request)
    {
        if (!Session::get('role')) {
            return redirect()->route('login');
        }
    
        // Mendapatkan query dasar laporan keuangan
        $query = LaporanHses::with('proyek')->limit(400);
    
        // Filter berdasarkan bulan dan tahun jika parameter 'bulan' ada
        if ($request->has('bulan') && !empty($request->bulan)) {
            $query->where('periode', 'like', $request->bulan . '%');
        }
    
        // Filter data sesuai role pengguna
        if (Session::get('role') == 'Tim Proyek') {
            $proyekUser = ProyekUsers::where('id_user', Session::get('id_user'))->get();
            $idProyek = $proyekUser->pluck('id_proyek')->toArray();
    
            $daftarLaporanHse = $query->whereIn('id_proyek', $idProyek)->get();
        } elseif (Session::get('role') == 'Head Office') {
            $daftarLaporanHse = $query->get();
        } else {
            $daftarLaporanHse = collect(); // Menggunakan koleksi kosong jika role tidak dikenali
        }
    
        $data = [
            'title' => 'Data Dokumen Proyek HSE',
            'subTitle' => 'Daftar Dokumen Proyek HSE',
            'daftarLaporanHse' => $daftarLaporanHse,
            'user' => $this->ModelUser->detail(Session::get('id_user')),
        ];
    
        return view('qhse.laporanHse.index', $data);
    }
    
    public function detail($id_laporan_hse)
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
    
        $laporanHseDetail = LaporanHseDetails::with(['laporanHse'])
        ->withCount('laporanHseSubDetails') // Hitung jumlah sub-detail
        ->where('id_laporan_hse', $id_laporan_hse)
        ->get();
    
        // Mengambil laporan keuangan dengan proyek terkait
        $laporanHse = LaporanHses::with('proyek')->find($id_laporan_hse);
        
        // Mengambil detail pengguna yang sedang login
        $user = $this->ModelUser->detail(Session()->get('id_user'));
     
        // Mengatur data untuk view
        $data = [
            'title' => 'Data Dokumen Proyek QA',
            'subTitle' => 'Detail Dokumen Proyek QA',
            'form' => 'Detail',
            'daftarProyek' => $dataProyekByUser,
            'laporanHseDetail' => $laporanHseDetail,
            'laporanHse' => $laporanHse,
            'user' => $user,
            'detail' => $laporanHse// Pastikan variabel detail ada dan diisi
        ];
    
        // Mengembalikan view dengan data yang telah diambil
        return view('qhse/laporanHse.edit', $data);
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
            'title'             => 'Data Dokumen Proyek HSE',
            'subTitle'          => 'Tambah Dokumen Proyek HSE',
            'form'              => 'Tambah',
            'dokumenHse'   => DokumenHses::get(),
            'daftarProyek'      => $dataProyekByUser,
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        return view('qhse/laporanHse.form', $data);
    }

    public function prosesTambah(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'id_proyek' => 'required|exists:proyek,id_proyek', // Memastikan id_proyek valid
            'periode'   => 'required|date_format:Y-m',
        ]);
    
        // Cek apakah kombinasi id_proyek dan periode sudah ada
        $existingReport = LaporanHses::where('id_proyek', $validatedData['id_proyek'])
                        ->where('periode', $validatedData['periode'])
                        ->first();
    
        if ($existingReport) {
            return back()->with('fail', 'Data dengan proyek dan periode tersebut sudah ada!');
        }
    
        DB::beginTransaction();
    
        try {
            // Buat objek laporan keuangan baru
            $laporanHse = new LaporanHses();
            $laporanHse->id_proyek = $validatedData['id_proyek']; // Menyimpan id_proyek yang valid
            $laporanHse->verifikasi_hse = 'Belum Disetujui'; // Misalnya status default
            $laporanHse->periode = $validatedData['periode']; 
    
            // Log informasi sebelum menyimpan
            Log::info('Menyimpan laporan hse:', [
                'id_proyek' => $laporanHse->id_proyek,
            ]);
    
            // Simpan laporan keuangan
            $laporanHse->save();
    
            DB::commit(); // Komit transaksi jika berhasil
            return redirect('/daftar-laporan-hse')->with('success', 'Laporan HSE berhasil ditambahkan!');
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback jika terjadi kesalahan
            Log::error('Kesalahan saat menyimpan laporan hse: ' . $e->getMessage());
            return back()->with('fail', 'Terjadi kesalahan sistem!'); 
        }
    }
    

    public function edit($id_laporan_hse)
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
            'title'             => 'Data Laporan HSE',
            'subTitle'          => 'Edit Laporan HSE',
            'form'              => 'Edit',
            'daftarProyek'      => $dataProyekByUser,
            'LaporanHseDetail'    => LaporanHseDetails::with(['dokumen', 'LaporanHse'])
                                    ->withCount(['LaporanHseSubDetails' => function ($query) use ($id_laporan_hse) {
                                        $query->where('id_laporan_hses', $id_laporan_hse);
                                    }])
                                    ->where('id_laporan_hses', $id_laporan_hse)
                                    ->get(),
            'detail'            => LaporanHses::with('proyek')->find($id_laporan_hse),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];
        
        return view('qhse/laporanHse.edit', $data);
    }
    
    public function prosesHapus($id_laporan_hse)
    {
        if (!Session::get('role')) {
            return redirect()->route('login');
        }
    
        try {
            $laporanHse = LaporanHses::findOrFail($id_laporan_hse);
            $laporanHse->delete();
    
            // Jika ada file yang perlu dihapus juga
            $laporanHseDetail = LaporanHseDetails::where('id_laporan_hse', $id_laporan_hse)->get();
            foreach ($laporanQaDetail as $item) {
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

        $daftarLaporanHse = LaporanHse::with('proyek')->limit(400)->get();

        $data = [
            'title' => 'Data Laporan HSE',
            'subTitle' => 'Verifikasi Laporan HSE',
            'daftarLaporanHse' => $daftarLaporanHse,
            'user' => $this->ModelUser->detail(Session::get('id_user')),
        ];

        return view('qhse.laporanHse.verifikasi', $data);
    }

    public function prosesVerifikasi($id_laporan_hse)
    {
        if (!Session::get('role')) {
            return redirect()->route('login');
        }

        $laporanHse = LaporanHses::find($id_laporan_hse);
        $laporanHse->verifikasi_hse = 'Sudah Disetujui';
        $laporanHse->id_verifikator = Session::get('id_user');
        $laporanHse->save();

        return back()->with('success', 'Data berhasil diverifikasi!');
    }

    public function prosesVerifikasiDetail($id_laporan_hse)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }
        
        $laporanHse = LaporanHseDetails::find($id_laporan_hse);
        $laporanHse->status = 1;
        $laporanHse->id_verifikator = Session()->get('id_user');
        $laporanHse->save();
        
        return back()->with('success', 'Data berhasil diverifikasi!');
    }

    public function prosesBukaVerifikasiDetail($id_laporan_hse)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }
        
        $laporanHse = LaporanHseDetails::find($id_laporan_hse);
        $laporanHse->status = 0;
        $laporanHse->id_verifikator = Session()->get('id_user');
        $laporanHse->save();
        
        return back()->with('success', 'Data berhasil diverifikasi!');
    }

    public function prosesTolakVerifikasiDetail(Request $request, $id_laporan_hse)
    {
        if (!Session::get('role')) {
            return redirect()->route('login');
        }
    
        // Validasi input komentar agar tidak kosong
        $request->validate([
            'comment' => 'required|string|max:255'
        ]);
    
        // Cari data laporan proyek berdasarkan ID
        $laporanHse = LaporanHseDetails::find($id_laporan_hse);
    
        if (!$laporanHse) {
            return back()->with('fail', 'Laporan tidak ditemukan!');
        }
    
        // Update status menjadi 2 (Verifikasi Ditolak) dan simpan komentar penolakan
        $laporanHse->status = 2;
        $laporanHse->id_verifikator = Session()->get('id_user');
        $laporanHse->komentar = $request->comment; // Pastikan kolom komentar tersedia di database
        $laporanHse->save();
    
        return back()->with('success', 'Data berhasil ditolak verifikasinya dengan komentar!');
    }
}
