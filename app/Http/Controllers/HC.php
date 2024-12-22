<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ModelUser;
use App\Models\ModelAkhlak;
use App\Models\ModelAspekAkhlak;
use App\Models\ModelDetailAkhlak;
use App\Models\ModelLog;
use Barryvdh\DomPDF\Facade\Pdf;

class HC extends Controller
{

    private $ModelAspekAkhlak, $ModelUser, $ModelAkhlak, $ModelDetailAkhlak;

    public function __construct()
    {
        $this->ModelUser        = new ModelUser();
        $this->ModelAkhlak         = new ModelAkhlak();
        $this->ModelAspekAkhlak    = new ModelAspekAkhlak();
        $this->ModelDetailAkhlak  = new ModelDetailAkhlak();
        $this->public_path = 'file_akhlak';
    }

    public function index()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'                     => 'AKHLAK',
            'subTitle'                  => 'Daftar AKHLAK',
            'monitoring'                => true,
            'daftarAkhlak'              => $this->ModelAkhlak->data(),
            'user'                      => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman Daftar AKHLAK.';
        $log->feature   = 'AKHLAK';
        $log->save();
        
        return view('Divisi.index', $data);
    }

    public function monitoring()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'                     => 'AKHLAK',
            'subTitle'                  => 'Daftar AKHLAK',
            'monitoring'                => true,
            'daftarAkhlak'              => $this->ModelAkhlak->data(),
            'user'                      => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman Monitoring AKHLAK.';
        $log->feature   = 'AKHLAK';
        $log->save();
        
        return view('Divisi.index', $data);
    }

    public function detail($id_akhlak)
    {
        // Cek user role
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'                     => 'AKHLAK',
            'subTitle'                  => 'Daftar AKHLAK',
            'monitoring'                => true,
            'detailAkhlak'              => $this->ModelAkhlak->detail($id_akhlak),
            'daftarDetailAkhlak'        => $this->ModelDetailAkhlak->data(),
            'user'                      => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman Detail AKHLAK.';
        $log->feature   = 'AKHLAK';
        $log->save();
        
        return view('Divisi.detail', $data);
    }


    public function prosesTambah() 
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }
    
        // Mengecek apakah data user sudah ada
        $check = $this->ModelAkhlak->checkData(Request()->id_user);
        if ($check) {
            return back()->with('fail', 'Data user sudah ada!');
        }
    
        // Menyimpan hanya id_user
        $data = [
            'id_user' => Request()->id_user,
        ];
        $this->ModelAkhlak->tambah($data); 
    
        // Mendapatkan data akhlak terakhir
        $lastDataAkhlak = $this->ModelAkhlak->lastData();
    
        // Mendapatkan data aspek akhlak
        $dataAspekAkhlak = $this->ModelAspekAkhlak->data();
        foreach ($dataAspekAkhlak as $item) {
            $dataDetailAkhlak = [
                'id_akhlak'        => $lastDataAkhlak->id_akhlak,
                'id_aspek_akhlak'  => $item->id_aspek_akhlak
            ];
            $this->ModelDetailAkhlak->tambah($dataDetailAkhlak);
        }
    
        $log = new ModelLog();
        $log->id_user = Session()->get('id_user');
        $log->activity = 'Menambah Data AKHLAK.';
        $log->feature = 'AKHLAK';
        $log->save();
        
        return back()->with('success', 'Data berhasil ditambahkan!');
    }
    

    public function prosesEdit($id_akhlak) 
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'id_akhlak'        => $id_akhlak,
            'id_user' => Request()->id_user
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Mengedit Data AKHLAK.';
        $log->feature   = 'AKHLAK';
        $log->save();

        $this->ModelAkhlak->edit($data);
        return back()->with('success', 'Data berhasil diedit!');
    }

    public function updateDetailAkhlak(Request $request, $id_detail_akhlak)
    {
        // Validasi input
        $request->validate([
            'deskripsi' => 'nullable|string',
            'deskripsi2' => 'nullable|string',
            'deskripsi3' => 'nullable|string',
            'evidence' => 'nullable|file|mimes:pdf,jpg,jpeg,png', // Validasi untuk evidence
            'evidence2' => 'nullable|string',
            'evidence3' => 'nullable|string',
            'penilaian' => 'nullable|string'
        ]);
    
        // Temukan detail akhlak berdasarkan ID
        $detailAkhlak = ModelDetailAkhlak::findOrFail($id_detail_akhlak);
    
        // Update semua kolom deskripsi dan penilaian
        $detailAkhlak->update([
            'deskripsi' => $request->input('deskripsi'),
            'deskripsi2' => $request->input('deskripsi2'),
            'deskripsi3' => $request->input('deskripsi3'),
            'penilaian' => $request->input('penilaian'),
            'nilai' => $request->input('deskripsi') ? 10 : null, // Mengisi nilai sesuai deskripsi
            'nilai2' => $request->input('deskripsi2') ? 10 : null, // Mengisi nilai2 sesuai deskripsi2
            'nilai3' => $request->input('deskripsi3') ? 10 : null, // Mengisi nilai3 sesuai deskripsi3
        ]);
    
        // Menangani upload file untuk evidence
        if ($request->hasFile('evidence')) {
            $file = $request->file('evidence');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('file_akhlak'), $filename);
            $detailAkhlak->evidence = 'file_akhlak/' . $filename;
        }
    
        // Simpan perubahan pada model
        $detailAkhlak->save();
    
        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Detail Akhlak updated successfully.');
    }
    

    public function updateDetailAkhlakNew($id_detail_akhlak, $penilaian) 
    {
        if (!Session()->get('role') == 'HC') {
            return back()->with('fail', 'You do not have permissions');
        }
    
        if ($penilaian == 'sangat-baik') {
            $nilai = 5;
            $pen = 'Sangat Baik';
        } else if ($penilaian == 'baik') {
            $nilai = 4;
            $pen = 'Baik';
        } else if ($penilaian == 'cukup') {
            $nilai = 3;
            $pen = 'Cukup';
        } else if ($penilaian == 'kurang') {
            $nilai = 2;
            $pen = 'Kurang';
        } else if ($penilaian == 'sangat-kurang') {
            $nilai = 1;
            $pen = 'Sangat Kurang';
        }
    
        $data = [
            'penilaian' => $pen,
            'nilai'     => $nilai
        ];
    
        $this->ModelDetailAkhlak->edit($id_detail_akhlak, $data);
    
        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Mengedit Penilaian Data Detail AKHLAK.';
        $log->feature   = 'AKHLAK';
        $log->save();
    
        return back()->with('success', 'Penilaian berhasil diedit!');
    }
    
    

    public function prosesHapus($id_akhlak)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        if ($request->file_dokumen <> "") {

            $file = $request->file_dokumen;
            $fileName = date('mdYHis') .' '. $request->nama_dokumen . '.' . $file->extension();
            $file->move(public_path($this->public_path), $fileName);

            $timelineDetail->file_dokumen = $fileName;
        }

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Menghapus Data AKHLAK.';
        $log->feature   = 'AKHLAK';
        $log->save();

        $this->ModelAkhlak->hapus($id_akhlak);
        $this->ModelDetailAkhlak->hapusByAkhlak($id_akhlak);
        return back()->with('success', 'Data berhasil dihapus!');
    }

    public function downloadPdf($id_akhlak)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $namaFile = 'Laporan Akhlak';

        $pdf = Pdf::loadview('Divisi.downloadPdf', [
            'namaFile'          => $namaFile,
            'akhlak'               => ModelAkhlak::with('user')->find($id_akhlak),
            'daftarDetailAkhlak'   => ModelDetailAkhlak::with('aspekAkhlak', 'akhlak')
                                    ->where('id_akhlak', $id_akhlak)
                                    ->orderBy('id_detail_akhlak', 'ASC')
                                    ->get()
          ])->setPaper('a4', 'landscape');
      
        return $pdf->stream($namaFile . '.pdf');
    }
}
