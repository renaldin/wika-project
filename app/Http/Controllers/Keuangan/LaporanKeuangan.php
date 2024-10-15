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
            $daftarLaporanKeuangan = LaporanKeuangans::with('proyek') // Memastikan ini benar
                ->whereIn('id_proyek', $idProyek)
                ->limit(400)
                ->get();
        } elseif (Session::get('role') == 'Head Office') {
            $daftarLaporanKeuangan = LaporanKeuangans::with('proyek') // Memastikan ini benar
                ->where('verifikasi_keuangan', 'Sudah Disetujui')
                ->where('id_verifikator', Session::get('id_user'))
                ->limit(400)
                ->get();
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
    
        // Mengambil detail laporan keuangan berdasarkan ID
        $laporanKeuanganDetail = LaporanKeuanganDetails::with(['dokumen', 'laporanKeuangan'])
            ->withCount(['laporanKeuanganSubDetails' => function ($query) use ($id_laporan_keuangan) {
                $query->where('id_laporan_keuangan', $id_laporan_keuangan);
            }])
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
        ]);

        DB::beginTransaction();

        try {
            // Buat objek laporan keuangan baru
            $laporanKeuangan = new LaporanKeuangans();
            $laporanKeuangan->id_proyek = $validatedData['id_proyek']; // Menyimpan id_proyek yang valid
            $laporanKeuangan->verifikasi_keuangan = 'Belum Disetujui'; // Misalnya status default

            // Log informasi sebelum menyimpan
            Log::info('Menyimpan laporan keuangan:', [
                'id_proyek' => $laporanKeuangan->id_proyek,
            ]);

            // Simpan laporan keuangan
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

        $LaporanKeuangan = LaporanKeuangan::find($id_laporan_keuangans);
        $LaporanKeuangan->delete();

        $LaporanKeuanganDetails = LaporanKeuanganDetails::where('id_laporan_keuangan', $id_laporan_keuangans)->get();
        foreach ($LaporanKeuanganDetails as $item) {
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

        $daftarLaporanKeuangan = LaporanKeuangan::with('proyek')->limit(400)->get();

        $data = [
            'title' => 'Data Timeline',
            'subTitle' => 'Verifikasi Timeline',
            'daftarLaporanKeuangan' => $daftarLaporanKeuangan,
            'user' => $this->ModelUser->detail(Session::get('id_user')),
        ];

        return view('keuangan.laporanKeuangan.verifikasi', $data);
    }

    public function prosesVerifikasi($id_laporan_keuangans)
    {
        if (!Session::get('role')) {
            return redirect()->route('login');
        }

        $LaporanKeuangan = LaporanKeuangan::find($id_laporan_keuangans);
        $LaporanKeuangan->verifikasi_keuangan = 'Sudah Disetujui';
        $LaporanKeuangan->id_verifikator = Session::get('id_user');
        $LaporanKeuangan->save();

        return back()->with('success', 'Data berhasil diverifikasi!');
    }

    public function prosesBukaVerifikasiDetail($id_laporan_keuangans)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }
        
        $LaporanKeuangan = LaporanKeuanganDetails::find($id_laporan_keuangans);
        $LaporanKeuangan->status = 0;
        $LaporanKeuangan->id_verifikator = Session()->get('id_user');
        $LaporanKeuangan->save();
        
        return back()->with('success', 'Data berhasil diverifikasi!');
    }
}
