<?php

namespace App\Http\Controllers\QHSE;

use App\Http\Controllers\Controller;
use App\Models\Temuans;
use App\Models\ModelUser;
use App\Models\Agendas;
use App\Models\ModelProyek;
use App\Models\ProyekUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class Temuan extends Controller
{
    private $ModelUser, $ModelProyek, $public_path;

    public function __construct()
    {
        $this->ModelUser = new ModelUser();
        $this->ModelProyek = new ModelProyek();
        $this->public_path = 'file_dokumen_temuan';
    }

    public function index(Request $request)
    {
        if (!Session::get('role')) {
            return redirect()->route('login');
        }
    
        $user = $this->ModelUser->detail(Session::get('id_user'));  // Menambahkan data user ke dalam view
    
        // Menambahkan relasi ke agenda dan proyek
        $query = Temuans::with(['proyek'])->limit(400); // Mengambil proyek terkait dengan temuan
    
        if ($request->has('bulan') && !empty($request->bulan)) {
            $query->where('tanggal_temuan', 'like', $request->bulan . '%');
        }
    
        if (Session::get('role') == 'Tim Proyek') {
            $proyekUser = ProyekUsers::where('id_user', Session::get('id_user'))->get();
            $idProyek = $proyekUser->pluck('id_proyek')->toArray();
    
            $daftarTemuan = $query->whereIn('id_proyek', $idProyek)->get();
        } elseif (Session::get('role') == 'Head Office') {
            $daftarTemuan = $query->get();
        } else {
            $daftarTemuan = collect();
        }
    
        foreach ($daftarTemuan as $temuan) {
            $agenda = Agendas::find($temuan->id_agenda);
            Log::info('Agenda: ' . $agenda->nama_kegiatan . ' - Proyek ID: ' . $agenda->id_proyek);
        }
        
    
        $data = [
            'title' => 'Data Temuan',
            'subTitle' => 'Daftar Temuan',
            'daftarTemuan' => $daftarTemuan,
            'user' => $user,  // Mengirimkan data user ke view
        ];
    
        return view('qhse.temuan.index', $data);
    }
    

    public function tambah()
    {
        if (!Session::get('role')) {
            return redirect()->route('login');
        }

        // Ambil daftar agenda
        $daftarAgenda = Agendas::all();

        // Ambil data user yang sedang login
        $user = $this->ModelUser->detail(Session::get('id_user'));

        // Kirimkan data agenda dan user ke view
        $data = [
            'title'             => 'Tambah Temuan QA',
            'subTitle'          => 'Tambah Temuan QA Baru',
            'daftarAgenda'      => $daftarAgenda,
            'user'              => $user,  // Kirimkan data user ke view
        ];

        return view('qhse.temuan.form', $data);
    }
 

    public function prosesTambah(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'id_agenda'   => 'required|exists:agendas,id',// Memastikan id_agenda valid
            'temuan'       => 'nullable|string|max:255',
            'tanggal_temuan'   => 'required|date',
            'duedate'          => 'required|date|after_or_equal:tanggal_temuan', // Due date harus setelah tanggal temuan
            'file_dokumen_temuan' => 'nullable|mimes:pdf,jpeg,png,jpg|max:2048',  // Validasi file
            'keterangan'       => 'nullable|string|max:255',  // Validasi keterangan
        ]);

        // Ambil data proyek berdasarkan user yang sedang login
    


        // Cek apakah temuan sudah ada pada proyek yang sama


        DB::beginTransaction();

        try {
            // Buat objek temuan baru
            $temuan = new Temuans();
            $temuan->id_agenda = $validatedData['id_agenda'];
            $temuan->temuan = $validatedData['temuan'] ?? null;  
            $temuan->tanggal_temuan = $validatedData['tanggal_temuan'];
            $temuan->duedate = $validatedData['duedate'];
            $temuan->keterangan = $validatedData['keterangan'] ?? null;  // Simpan keterangan

            // Menyimpan file dokumen jika ada
            if ($request->hasFile('file_dokumen_temuan')) {
                $file = $request->file('file_dokumen_temuan');
                $fileName = time() . '-' . $file->getClientOriginalName();
                $file->move(public_path($this->public_path), $fileName);
                $temuan->file_dokumen_temuan = $fileName;  // Simpan nama file
            }

            // Log informasi sebelum menyimpan
            Log::info('Menyimpan temuan :', [
                'id_proyek' => $temuan->id_proyek,
                'tanggal_temuan' => $temuan->tanggal_temuan,
            ]);

            // Simpan temuan
            $temuan->save();

            DB::commit(); // Komit transaksi jika berhasil
            return redirect('/daftar-temuan')->with('success', 'Temuan berhasil ditambahkan!');
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback jika terjadi kesalahan
            Log::error('Kesalahan saat menyimpan temuan : ' . $e->getMessage());
            return back()->with('fail', 'Terjadi kesalahan sistem!');
        }
    }


    public function edit($id)
    {
        // Check if user is logged in
        if (!Session::get('role')) {
            return redirect()->route('login');
        }
    
        // Find the temuan by ID
        $temuan = Temuans::findOrFail($id);
    
        // Get data for agendas and user
        $daftarAgenda = Agendas::all();
        $user = $this->ModelUser->detail(Session::get('id_user'));
    
        // Pass temuan data, agenda data, and user data to the view
        $data = [
            'title'            => 'Edit Temuan QA',
            'subTitle'         => 'Edit Temuan QA',
            'temuan'           => $temuan,  // Passing temuan to the view
            'daftarAgenda'     => $daftarAgenda,
            'user'             => $user,
        ];
    
        return view('qhse.temuan.edit', $data);
    }
    
    public function prosesEdit(Request $request, $id)
    {
        // Validate input
        $validatedData = $request->validate([
            'id_agenda'        => 'required|exists:agendas,id', // Ensure id_agenda is valid
            'temuan'            => 'nullable|string|max:255',
            'tanggal_temuan'    => 'required|date',
            'duedate'           => 'required|date|after_or_equal:tanggal_temuan',
            'file_dokumen_temuan' => 'nullable|mimes:pdf,jpeg,png,jpg|max:2048',
            'keterangan'        => 'nullable|string|max:255',
        ]);
    
        // Begin a database transaction
        DB::beginTransaction();
    
        try {
            // Find the temuan and update it
            $temuan = Temuans::findOrFail($id);
            $temuan->id_agenda = $validatedData['id_agenda'];
            $temuan->temuan = $validatedData['temuan'] ?? null;
            $temuan->tanggal_temuan = $validatedData['tanggal_temuan'];
            $temuan->duedate = $validatedData['duedate'];
            $temuan->keterangan = $validatedData['keterangan'] ?? null;
    
            // Handle file upload if a new file is provided
            if ($request->hasFile('file_dokumen_temuan')) {
                // Delete the old file if it exists
                if ($temuan->file_dokumen_temuan && file_exists(public_path($this->public_path . '/' . $temuan->file_dokumen_temuan))) {
                    unlink(public_path($this->public_path . '/' . $temuan->file_dokumen_temuan));
                }
    
                // Save the new file
                $file = $request->file('file_dokumen_temuan');
                $fileName = time() . '-' . $file->getClientOriginalName();
                $file->move(public_path($this->public_path), $fileName);
                $temuan->file_dokumen_temuan = $fileName;
            }
    
            // Log before saving
            Log::info('Updating temuan:', [
                'id_proyek' => $temuan->id_proyek,
                'tanggal_temuan' => $temuan->tanggal_temuan,
            ]);
    
            // Save the updated temuan
            $temuan->save();
    
            DB::commit(); // Commit the transaction
            return redirect('/daftar-temuan')->with('success', 'Temuan berhasil diperbarui!');
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback if an error occurs
            Log::error('Error updating temuan: ' . $e->getMessage());
            return back()->with('fail', 'Terjadi kesalahan sistem!');
        }
    }
    
    
    public function prosesHapus($id_temuan)
    {
        if (!Session::get('role')) {
            return redirect()->route('login');
        }

        try {
            $temuan = Temuans::findOrFail($id_temuan);

            // Hapus file dokumen jika ada
            if ($temuan->file_dokumen != "") {
                unlink(public_path($this->public_path) . '/' . $temuan->file_dokumen);
            }

            // Hapus temuan dari database
            $temuan->delete();

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
