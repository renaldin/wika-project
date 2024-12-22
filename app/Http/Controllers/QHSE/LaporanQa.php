<?php

namespace App\Http\Controllers\QHSE;

use App\Http\Controllers\Controller;
use App\Models\DokumenQas;
use App\Models\ModelUser;
use App\Models\LaporanQas;
use App\Models\ModelProyek;
use App\Models\ProyekUsers;
use App\Models\LaporanQaDetails;
use App\Models\LaporanAQaSubDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log; // Pastikan ini ada

class LaporanQa extends Controller
{
    private $ModelUser, $ModelProyek, $public_path;

    public function __construct()
    {
        $this->ModelUser = new ModelUser();
        $this->ModelProyek = new ModelProyek();
        $this->public_path = 'file_laporan_Qa';
    }

    public function index(Request $request)
    {
        if (!Session::get('role')) {
            return redirect()->route('login');
        }
    
        // Mendapatkan query dasar laporan keuangan
        $query = LaporanQas::with('proyek')->limit(400);
    
        // Filter berdasarkan bulan dan tahun jika parameter 'bulan' ada
        if ($request->has('bulan') && !empty($request->bulan)) {
            $query->where('periode', 'like', $request->bulan . '%');
        }
    
        // Filter data sesuai role pengguna
        if (Session::get('role') == 'Tim Proyek') {
            $proyekUser = ProyekUsers::where('id_user', Session::get('id_user'))->get();
            $idProyek = $proyekUser->pluck('id_proyek')->toArray();
    
            $daftarLaporanQa = $query->whereIn('id_proyek', $idProyek)->get();
        } elseif (Session::get('role') == 'Head Office') {
            $daftarLaporanQa = $query->get();
        } else {
            $daftarLaporanQa = collect(); // Menggunakan koleksi kosong jika role tidak dikenali
        }
    
        $data = [
            'title' => 'Data Dokumen Proyek QA',
            'subTitle' => 'Daftar Dokumen Proyek Qa',
            'daftarLaporanQa' => $daftarLaporanQa,
            'user' => $this->ModelUser->detail(Session::get('id_user')),
        ];
    
        return view('qhse.laporanQa.index', $data);
    }
    
    public function detail($id_laporan_qa)
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
    
        $laporanQaDetail = LaporanQaDetails::with(['laporanQa'])
        ->withCount('laporanQaSubDetails') // Hitung jumlah sub-detail
        ->where('id_laporan_qa', $id_laporan_qa)
        ->get();
    
        // Mengambil laporan keuangan dengan proyek terkait
        $laporanQa = LaporanQas::with('proyek')->find($id_laporan_qa);
        
        // Mengambil detail pengguna yang sedang login
        $user = $this->ModelUser->detail(Session()->get('id_user'));
     
        // Mengatur data untuk view
        $data = [
            'title' => 'Data Dokumen Proyek QA',
            'subTitle' => 'Detail Dokumen Proyek QA',
            'form' => 'Detail',
            'daftarProyek' => $dataProyekByUser,
            'laporanQaDetail' => $laporanQaDetail,
            'laporanQa' => $laporanQa,
            'user' => $user,
            'detail' => $laporanQa// Pastikan variabel detail ada dan diisi
        ];
    
        // Mengembalikan view dengan data yang telah diambil
        return view('qhse/laporanQa.edit', $data);
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
            'title'             => 'Data Dokumen Proyek QA',
            'subTitle'          => 'Tambah Dokumen Proyek QA',
            'form'              => 'Tambah',
            'dokumenQa'   => DokumenQas::get(),
            'daftarProyek'      => $dataProyekByUser,
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        return view('qhse/laporanQa.form', $data);
    }

    public function prosesTambah(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'id_proyek' => 'required|exists:proyek,id_proyek', // Memastikan id_proyek valid
            'periode'   => 'required|date_format:Y-m',
        ]);
    
        // Cek apakah kombinasi id_proyek dan periode sudah ada
        $existingReport = LaporanQas::where('id_proyek', $validatedData['id_proyek'])
                        ->where('periode', $validatedData['periode'])
                        ->first();
    
        if ($existingReport) {
            return back()->with('fail', 'Data dengan proyek dan periode tersebut sudah ada!');
        }
    
        DB::beginTransaction();
    
        try {
            // Buat objek laporan keuangan baru
            $laporanQa = new LaporanQas();
            $laporanQa->id_proyek = $validatedData['id_proyek']; // Menyimpan id_proyek yang valid
            $laporanQa->verifikasi_qa = 'Belum Disetujui'; // Misalnya status default
            $laporanQa->periode = $validatedData['periode']; 
    
            // Log informasi sebelum menyimpan
            Log::info('Menyimpan laporan qa:', [
                'id_proyek' => $laporanQa->id_proyek,
            ]);
    
            // Simpan laporan keuangan
            $laporanQa->save();
    
            DB::commit(); // Komit transaksi jika berhasil
            return redirect('/daftar-laporan-qa')->with('success', 'Laporan QA berhasil ditambahkan!');
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback jika terjadi kesalahan
            Log::error('Kesalahan saat menyimpan laporan qa: ' . $e->getMessage());
            return back()->with('fail', 'Terjadi kesalahan sistem!'); 
        }
    }
    

    public function edit($id_laporan_qa)
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
            'LaporanQaDetail'    => LaporanQaDetails::with(['dokumen', 'LaporanAkuntansi'])
                                    ->withCount(['LaporanQaSubDetails' => function ($query) use ($id_laporan_qa) {
                                        $query->where('id_laporan_qas', $id_laporan_qa);
                                    }])
                                    ->where('id_laporan_qas', $id_laporan_qa)
                                    ->get(),
            'detail'            => LaporanQas::with('proyek')->find($id_laporan_qa),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];
        
        return view('qhse/laporanQa.edit', $data);
    }
    
    public function prosesHapus($id_laporan_qa)
    {
        if (!Session::get('role')) {
            return redirect()->route('login');
        }
    
        try {
            $laporanQa = LaporanQas::findOrFail($id_laporan_qa);
            $laporanQa->delete();
    
            // Jika ada file yang perlu dihapus juga
            $laporanQaDetail = LaporanQaDetails::where('id_laporan_qa', $id_laporan_qa)->get();
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

        $daftarLaporanQa = LaporanQa::with('proyek')->limit(400)->get();

        $data = [
            'title' => 'Data Laporan QA',
            'subTitle' => 'Verifikasi Laporan QA',
            'daftarLaporanQa' => $daftarLaporanQa,
            'user' => $this->ModelUser->detail(Session::get('id_user')),
        ];

        return view('qhse.laporanQa.verifikasi', $data);
    }

    public function prosesVerifikasi($id_laporan_qa)
    {
        if (!Session::get('role')) {
            return redirect()->route('login');
        }

        $laporanQa = LaporanQas::find($id_laporan_qa);
        $laporanQa->verifikasi_qa = 'Sudah Disetujui';
        $laporanQa->id_verifikator = Session::get('id_user');
        $laporanQa->save();

        return back()->with('success', 'Data berhasil diverifikasi!');
    }

    public function prosesVerifikasiDetail($id_laporan_qa)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }
        
        $laporanQa = LaporanQaDetails::find($id_laporan_qa);
        $laporanQa->status = 1;
        $laporanQa->id_verifikator = Session()->get('id_user');
        $laporanQa->save();
        
        return back()->with('success', 'Data berhasil diverifikasi!');
    }

    public function prosesBukaVerifikasiDetail($id_laporan_qa)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }
        
        $laporanQa = LaporanQaDetails::find($id_laporan_qa);
        $laporanQa->status = 0;
        $laporanQa->id_verifikator = Session()->get('id_user');
        $laporanQa->save();
        
        return back()->with('success', 'Data berhasil diverifikasi!');
    }

    public function prosesTolakVerifikasiDetail(Request $request, $id_laporan_qa)
    {
        if (!Session::get('role')) {
            return redirect()->route('login');
        }
    
        // Validasi input komentar agar tidak kosong
        $request->validate([
            'comment' => 'required|string|max:255'
        ]);
    
        // Cari data laporan proyek berdasarkan ID
        $laporanQa = LaporanQaDetails::find($id_laporan_qa);
    
        if (!$laporanQa) {
            return back()->with('fail', 'Laporan tidak ditemukan!');
        }
    
        // Update status menjadi 2 (Verifikasi Ditolak) dan simpan komentar penolakan
        $laporanQa->status = 2;
        $laporanQa->id_verifikator = Session()->get('id_user');
        $laporanQa->komentar = $request->comment; // Pastikan kolom komentar tersedia di database
        $laporanQa->save();
    
        return back()->with('success', 'Data berhasil ditolak verifikasinya dengan komentar!');
    }
}
