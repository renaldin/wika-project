<?php

namespace App\Http\Controllers\Keuangan;

use App\Http\Controllers\Controller;
use App\Models\DokumenPajaks;
use App\Models\ModelUser;
use App\Models\LaporanPajaks;
use App\Models\ModelProyek;
use App\Models\ProyekUsers;
use App\Models\LaporanPajakDetails;
use App\Models\LaporanPajakSubDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log; // Pastikan ini ada

class LaporanPajak extends Controller
{
    private $ModelUser, $ModelProyek, $public_path;

    public function __construct()
    {
        $this->ModelUser = new ModelUser();
        $this->ModelProyek = new ModelProyek();
        $this->public_path = 'file_laporan_pajak';
    }

    public function index(Request $request)
    {
        if (!Session::get('role')) {
            return redirect()->route('login');
        }
    
        // Mendapatkan query dasar laporan keuangan
        $query = LaporanPajaks::with('proyek')->limit(400);
    
        // Filter berdasarkan bulan dan tahun jika parameter 'bulan' ada
        if ($request->has('bulan') && !empty($request->bulan)) {
            $query->where('periode', 'like', $request->bulan . '%');
        }
    
        // Filter data sesuai role pengguna
        if (Session::get('role') == 'Tim Proyek') {
            $proyekUser = ProyekUsers::where('id_user', Session::get('id_user'))->get();
            $idProyek = $proyekUser->pluck('id_proyek')->toArray();
    
            $daftarLaporanPajak = $query->whereIn('id_proyek', $idProyek)->get();
        } elseif (Session::get('role') == 'Head Office') {
            $daftarLaporanPajak = $query->get();
        } else {
            $daftarLaporanPajak = collect(); // Menggunakan koleksi kosong jika role tidak dikenali
        }
    
        $data = [
            'title' => 'Data Laporan Pajak',
            'subTitle' => 'Daftar Laporan Pajak',
            'daftarLaporanPajak' => $daftarLaporanPajak,
            'user' => $this->ModelUser->detail(Session::get('id_user')),
        ];
    
        return view('keuangan.laporanPajak.index', $data);
    }
    
    public function detail($id_laporan_pajak)
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
    
        $laporanPajakDetail = LaporanPajakDetails::with(['dokumen', 'laporanPajak'])
        ->withCount('laporanPajakSubDetails') // Menghitung jumlah sub-detail
        ->where('id_laporan_pajak', $id_laporan_pajak)
        ->get();
    
        // Mengambil laporan keuangan dengan proyek terkait
        $laporanPajak = LaporanPajaks::with('proyek')->find($id_laporan_pajak);
        
        // Mengambil detail pengguna yang sedang login
        $user = $this->ModelUser->detail(Session()->get('id_user'));
     
        // Mengatur data untuk view
        $data = [
            'title' => 'Data Laporan Pajak',
            'subTitle' => 'Detail Laporan Pajak',
            'form' => 'Detail',
            'daftarProyek' => $dataProyekByUser,
            'laporanPajakDetail' => $laporanPajakDetail,
            'laporanPajak' => $laporanPajak,
            'user' => $user,
            'detail' => $laporanPajak// Pastikan variabel detail ada dan diisi
        ];
    
        // Mengembalikan view dengan data yang telah diambil
        return view('keuangan.laporanPajak.edit', $data);
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
            'title'             => 'Data Laporan Pajak',
            'subTitle'          => 'Tambah Laporan Pajak',
            'form'              => 'Tambah',
            'dokumenPajak'   => DokumenPajaks::get(),
            'daftarProyek'      => $dataProyekByUser,
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        return view('keuangan/laporanPajak.form', $data);
    }

    public function prosesTambah(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'id_proyek' => 'required|exists:proyek,id_proyek', // Memastikan id_proyek valid
            'periode'   => 'required|date_format:Y-m',
        ]);
    
        // Cek apakah kombinasi id_proyek dan periode sudah ada
        $existingReport = LaporanPajaks::where('id_proyek', $validatedData['id_proyek'])
                        ->where('periode', $validatedData['periode'])
                        ->first();
    
        if ($existingReport) {
            return back()->with('fail', 'Data dengan proyek dan periode tersebut sudah ada!');
        }
    
        DB::beginTransaction();
    
        try {
            // Buat objek laporan keuangan baru
            $laporanPajak = new LaporanPajaks();
            $laporanPajak->id_proyek = $validatedData['id_proyek']; // Menyimpan id_proyek yang valid
            $laporanPajak->verifikasi_pajak = 'Belum Disetujui'; // Misalnya status default
            $laporanPajak->periode = $validatedData['periode']; 
    
            // Log informasi sebelum menyimpan
            Log::info('Menyimpan laporan pajak:', [
                'id_proyek' => $laporanPajak->id_proyek,
            ]);
    
            // Simpan laporan pajak
            $laporanPajak->save();
    
            DB::commit(); // Komit transaksi jika berhasil
            return redirect('/daftar-laporan-pajak')->with('success', 'Laporan pajak berhasil ditambahkan!');
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback jika terjadi kesalahan
            Log::error('Kesalahan saat menyimpan laporan pajak: ' . $e->getMessage());
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
            'title'             => 'Data Laporan Pajak',
            'subTitle'          => 'Edit Laporan Pajak',
            'form'              => 'Edit',
            'daftarProyek'      => $dataProyekByUser,
            'LaporanPajakDetail'    => LaporanPajakDetails::with(['dokumen', 'LaporanPajak'])
                                    ->withCount(['LaporanPajakSubDetails' => function ($query) use ($id_laporan_pajak) {
                                        $query->where('id_laporan_pajaks', $id_laporan_pajak);
                                    }])
                                    ->where('id_laporan_pajaks', $id_laporan_pajak)
                                    ->get(),
            'detail'            => LaporanPajaks::with('proyek')->find($id_laporan_pajak),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];
        
        return view('keuangan/laporanPajak.edit', $data);
    }
    
    public function prosesHapus($id_laporan_pajak)
    {
        if (!Session::get('role')) {
            return redirect()->route('login');
        }
    
        try {
            $laporanPajak = LaporanPajaks::findOrFail($id_laporan_pajak);
            $laporanPajak->delete();
    
            // Jika ada file yang perlu dihapus juga
            $laporanPajakDetail = LaporanPajakDetails::where('id_laporan_pajak', $id_laporan_pajak)->get();
            foreach ($laporanPajakDetail as $item) {
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

        $daftarLaporanPajak = LaporanPajaks::with('proyek')->limit(400)->get();

        $data = [
            'title' => 'Data Laporan Pajak',
            'subTitle' => 'Verifikasi Laporan Pajak',
            'daftarLaporanPajak' => $daftarLaporanPajak,
            'user' => $this->ModelUser->detail(Session::get('id_user')),
        ];

        return view('keuangan.laporanPajak.verifikasi', $data);
    }

    public function prosesVerifikasi($id_laporan_pajak)
    {
        if (!Session::get('role')) {
            return redirect()->route('login');
        }

        $laporanPajak = LaporanPajaks::find($id_laporan_pajak);
        $laporanPajak->verifikasi_pajak = 'Sudah Disetujui';
        $laporanPajak->id_verifikator = Session::get('id_user');
        $laporanPajak->save();

        return back()->with('success', 'Data berhasil diverifikasi!');
    }

    public function prosesVerifikasiDetail($id_laporan_pajak)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }
        
        $laporanPajak = LaporanPajakDetails::find($id_laporan_pajak);
        $laporanPajak->status = 1;
        $laporanPajak->id_verifikator = Session()->get('id_user');
        $laporanPajak->save();
        
        return back()->with('success', 'Data berhasil diverifikasi!');
    }

    public function prosesBukaVerifikasiDetail($id_laporan_pajak)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }
        
        $laporanPajak = LaporanPajakDetails::find($id_laporan_pajak);
        $laporanPajak->status = 0;
        $laporanPajak->id_verifikator = Session()->get('id_user');
        $laporanPajak->save();
        
        return back()->with('success', 'Data berhasil diverifikasi!');
    }

    public function prosesTolakVerifikasiDetail(Request $request, $id_laporan_pajak)
    {
        if (!Session::get('role')) {
            return redirect()->route('login');
        }
    
        // Validasi input komentar agar tidak kosong
        $request->validate([
            'comment' => 'required|string|max:255'
        ]);
    
        // Cari data laporan proyek berdasarkan ID
        $laporanPajak = LaporanPajakDetails::find($id_laporan_pajak);
    
        if (!$laporanPajak) {
            return back()->with('fail', 'Laporan tidak ditemukan!');
        }
    
        // Update status menjadi 2 (Verifikasi Ditolak) dan simpan komentar penolakan
        $laporanPajak->status = 2;
        $laporanPajak->id_verifikator = Session()->get('id_user');
        $laporanPajak->komentar = $request->comment; // Pastikan kolom komentar tersedia di database
        $laporanPajak->save();
    
        return back()->with('success', 'Data berhasil ditolak verifikasinya dengan komentar!');
    }
}
