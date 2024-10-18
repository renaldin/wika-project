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
            $daftarLaporanPajak = LaporanPajaks::with('proyek') // Memastikan ini benar
                ->whereIn('id_proyek', $idProyek)
                ->limit(400)
                ->get();
        } elseif (Session::get('role') == 'Head Office') {
            $daftarLaporanPajak = LaporanPajaks::with('proyek') // Memastikan ini benar
                ->where('verifikasi_pajak', 'Sudah Disetujui')
                ->where('id_verifikator', Session::get('id_user'))
                ->limit(400)
                ->get();
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
    
        // Mengambil detail laporan keuangan berdasarkan ID
        $laporanPajakDetail = LaporanPajakDetails::with(['dokumen', 'laporanPajak'])
            ->withCount(['laporanPajakSubDetails' => function ($query) use ($id_laporan_pajak) {
                $query->where('id_laporan_pajak', $id_laporan_pajak);
            }])
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
        ]);

        DB::beginTransaction();

        try {
            // Buat objek laporan keuangan baru
            $laporanPajak = new LaporanPajaks();
            $laporanPajak->id_proyek = $validatedData['id_proyek']; // Menyimpan id_proyek yang valid
            $laporanPajak->verifikasi_pajak = 'Belum Disetujui'; // Misalnya status default

            // Log informasi sebelum menyimpan
            Log::info('Menyimpan laporan pajak:', [
                'id_proyek' => $laporanPajak->id_proyek,
            ]);

            // Simpan laporan keuangan
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

        $LaporanPajak = LaporanPajak::find($id_laporan_pajak);
        $LaporanPajak->delete();

        $LaporanPajakDetails = LaporanPajakDetails::where('id_laporan_pajak', $id_laporan_pajak)->get();
        foreach ($LaporanPajakDetails as $item) {
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

        $daftarLaporanPajak = LaporanPajak::with('proyek')->limit(400)->get();

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

        $LaporanPajak = LaporanAkuntansi::find($id_laporan_pajak);
        $LaporanPajak->verifikasi_akuntansi = 'Sudah Disetujui';
        $LaporanPajak->id_verifikator = Session::get('id_user');
        $LaporanPajak->save();

        return back()->with('success', 'Data berhasil diverifikasi!');
    }

    public function prosesBukaVerifikasiDetail($id_laporan_pajak)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }
        
        $LaporanPajak = LaporanPajakDetails::find($id_laporan_pajak);
        $LaporanPajak->status = 0;
        $LaporanPajak->id_verifikator = Session()->get('id_user');
        $LaporanPajak->save();
        
        return back()->with('success', 'Data berhasil diverifikasi!');
    }
}
