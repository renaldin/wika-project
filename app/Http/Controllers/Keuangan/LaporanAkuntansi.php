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
            $daftarLaporanAkuntansi = LaporanAkuntansis::with('proyek') // Memastikan ini benar
                ->whereIn('id_proyek', $idProyek)
                ->limit(400)
                ->get();
        } elseif (Session::get('role') == 'Head Office') {
            $daftarLaporanAkuntansi = LaporanAkuntansis::with('proyek') // Memastikan ini benar
                ->where('verifikasi_akuntansi', 'Sudah Disetujui')
                ->where('id_verifikator', Session::get('id_user'))
                ->limit(400)
                ->get();
        }
    
        $data = [
            'title' => 'Data Laporan Keuangan',
            'subTitle' => 'Daftar Laporan Keuangan',
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
    
        // Mengambil detail laporan keuangan berdasarkan ID
        $laporanAkuntansiDetail = LaporanAkuntansiDetails::with(['dokumen', 'laporanAkuntansi'])
            ->withCount(['laporanAkuntansiSubDetails' => function ($query) use ($id_laporan_akuntansi) {
                $query->where('id_laporan_akuntansi', $id_laporan_akuntansi);
            }])
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
        ]);

        DB::beginTransaction();

        try {
            // Buat objek laporan keuangan baru
            $laporanAkuntansi = new LaporanAkuntansis();
            $laporanAkuntansi->id_proyek = $validatedData['id_proyek']; // Menyimpan id_proyek yang valid
            $laporanAkuntansi->verifikasi_akuntansi = 'Belum Disetujui'; // Misalnya status default

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

        $LaporanAkuntansi = LaporanAkuntansi::find($id_laporan_akuntansi);
        $LaporanAkuntansi->delete();

        $LaporanAkuntansiDetails = LaporanAkuntansiDetails::where('id_laporan_akuntansi', $id_laporan_akuntansi)->get();
        foreach ($LaporanAkuntansiDetails as $item) {
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

        $LaporanAkuntansi = LaporanAkuntansi::find($id_laporan_akuntansi);
        $LaporanAkuntansi->verifikasi_akuntansi = 'Sudah Disetujui';
        $LaporanAkuntansi->id_verifikator = Session::get('id_user');
        $LaporanAkuntansi->save();

        return back()->with('success', 'Data berhasil diverifikasi!');
    }

    public function prosesBukaVerifikasiDetail($id_laporan_akuntansi)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }
        
        $LaporanAkuntansi = LaporanAkuntansiDetails::find($id_laporan_akuntansi);
        $LaporanAkuntansi->status = 0;
        $LaporanAkuntansi->id_verifikator = Session()->get('id_user');
        $LaporanAkuntansi->save();
        
        return back()->with('success', 'Data berhasil diverifikasi!');
    }
}
