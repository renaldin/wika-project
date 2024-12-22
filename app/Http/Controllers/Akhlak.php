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
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Support\Facades\DB;  

class Akhlak extends Controller
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
    
    public function index(Request $request)
    {
        // Pastikan ada session untuk id_user
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }
    
        // Ambil data Akhlak
        $daftarAkhlak = $this->ModelAkhlak->data();
    
        // Ambil periode yang dipilih dari filter
        $periode = $request->get('periode');
    
        // Jika periode tidak ada di request, set periode default ke bulan dan tahun saat ini
        if (!$periode) {
            $periode = now()->format('Y-m'); // Format default "yyyy-mm"
        }
    
        // Filter data berdasarkan periode (meskipun tidak ada data untuk periode tersebut)
        $daftarAkhlak = $daftarAkhlak->where('periode', $periode);
    
        // Hitung total nilai untuk setiap Akhlak dan urutkan berdasarkan total nilai terbesar
        $totalNilaiKosong = true; // Flag untuk cek apakah semua nilai total 0
        foreach ($daftarAkhlak as $akhlak) {
            $totalNilai = $this->ModelDetailAkhlak
                                 ->where('id_akhlak', $akhlak->id_akhlak)
                                 ->sum(DB::raw('COALESCE(nilai, 0) + COALESCE(nilai2, 0) + COALESCE(nilai3, 0)'));
    
            $akhlak->total_nilai = $totalNilai;
    
            // Cek apakah ada nilai yang tidak nol
            if ($totalNilai > 0) {
                $totalNilaiKosong = false;
            }
        }
    
        // Jika periode yang dipilih tidak ada data dengan total nilai lebih dari 0
        if ($totalNilaiKosong) {
            // Pastikan data kosong, dan hanya tampilkan pesan kosong
            $topThreeAkhlak = collect(); // Kosongkan hasil topThreeAkhlak
        } else {
            // Urutkan berdasarkan total nilai terbesar dan ambil 3 teratas
            $topThreeAkhlak = $daftarAkhlak->sortByDesc('total_nilai')->take(3);
        }
    
        // Ambil data user
        $user = $this->ModelUser->detail(Session()->get('id_user'));
    
        // Siapkan data untuk dikirim ke view
        $data = [
            'title' => 'AKHLAK',
            'subTitle' => 'Daftar AKHLAK',
            'monitoring' => true,
            'daftarAkhlak' => $daftarAkhlak,
            'topThreeAkhlak' => $topThreeAkhlak,
            'user' => $user,  // Pastikan ini dikirim ke view
            'periodeList' => $this->getPeriodeList(),  // Jika ada filter periode
            'selectedPeriode' => $periode,  // Kirimkan periode yang dipilih
            'isZeroData' => $totalNilaiKosong, // Flag apakah semua data 0
        ];
    
        // Log aktivitas
        $log = new ModelLog();
        $log->id_user = Session()->get('id_user');
        $log->activity = 'Melihat Halaman Daftar AKHLAK.';
        $log->feature = 'AKHLAK';
        $log->save();
    
        // Kembalikan view dengan data
        return view('Divisi.index', $data);
    }
    
    
    
// Menambahkan fungsi getPeriodeList() di dalam controller Akhlak
    public function getPeriodeList()
    {
        // Ambil daftar periode unik dari tabel akhlak
        return $this->ModelAkhlak
            ->select('periode')
            ->distinct()  // Menyaring periode yang sama
            ->orderBy('periode', 'desc') // Urutkan berdasarkan periode, misalnya dari yang terbaru
            ->pluck('periode');
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
        $check = $this->ModelAkhlak->checkData(Request()->id_user, Request()->periode);
        if ($check) {
            return back()->with('fail', 'Data user dan periode sudah ada!');
        }
    
        // Menyimpan id_user dan periode
        $data = [
            'id_user' => Request()->id_user,
            'periode' => Request()->periode, // Pastikan periode ditambahkan di sini
        ];
        
        $this->ModelAkhlak->tambah($data); 
    
        // Mendapatkan data akhlak terakhir
        $lastDataAkhlak = $this->ModelAkhlak->lastData();
    
        // Mendapatkan data aspek akhlak
        $dataAspekAkhlak = $this->ModelAspekAkhlak->data();
        foreach ($dataAspekAkhlak as $item) {
            $dataDetailAkhlak = [
                'id_akhlak'        => $lastDataAkhlak->id_akhlak,
                'id_aspek_akhlak'  => $item->id_aspek_akhlak,
                'periode'          => Request()->periode // Pastikan periode ditambahkan di detail akhlak juga
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
        // dd(Request()->all());
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'id_akhlak'        => $id_akhlak,
            'id_user' => Request()->id_user,
            'periode'       => Request()->periode

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
        $request->validate([
            'deskripsi' => 'required|string',
            'periode' => 'required|string',
            'evidence' => 'nullable|file|mimes:pdf,doc,docx,jpg,png|max:2048',
            'penilaian' => 'nullable|string'
        ]);
    
     
        $detailAkhlak->deskripsi = $request->input('deskripsi');
        $detailAkhlak->periode = $request->input('periode');
        
        if ($request->hasFile('evidence')) {
            $file = $request->file('evidence');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('file_akhlak'), $filename);
            $detailAkhlak->evidence = 'file_akhlak/' . $filename;
        }
    
        if ($request->has('penilaian')) {
            $detailAkhlak->penilaian = $request->input('penilaian');
        }
    
        $detailAkhlak->save();
    
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
            'daftarDetailAkhlak'   => $this->ModelDetailAkhlak->dataByIdAkhlak($id_akhlak)
          ])->setPaper('a4', 'landscape');
      
        return $pdf->stream($namaFile . '.pdf');
    }

    public function changeLeader()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'                     => 'AKHLAK',
            'subTitle'                  => 'Change Leader Program',
            'user'                      => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman Change Leader Program.';
        $log->feature   = 'AKHLAK';
        $log->save();
        
        return view('Divisi.changeLeader', $data);
    }

    public function dashboardChange()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'                     => 'AKHLAK',
            'subTitle'                  => 'Dashboard Change Leader',
            'user'                      => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman Dashboard Change Leader.';
        $log->feature   = 'AKHLAK';
        $log->save();
        
        return view('Divisi.dashboardChange', $data);
    }

    public function panduanSpesifik()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'                     => 'AKHLAK',
            'subTitle'                  => 'Panduan Spesifik AKHLAK',
            'user'                      => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman Panduan Spesifik AKHLAk.';
        $log->feature   = 'AKHLAK';
        $log->save();
        
        return view('Divisi.panduanSpesifik', $data);
    }

    public function leaderProject()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'                     => 'AKHLAK',
            'subTitle'                  => 'Change Leader Project',
            'user'                      => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman Change Leader Project.';
        $log->feature   = 'AKHLAK';
        $log->save();
        
        return view('Divisi.leaderProject', $data);
    }

    public function ruangTransformasi()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'                     => 'AKHLAK',
            'subTitle'                  => 'Ruang Transformasi',
            'user'                      => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman Ruang Tranformasi.';
        $log->feature   = 'AKHLAK';
        $log->save();
        
        return view('Divisi.ruangTransformasi', $data);
    }

    public function exportDetailAkhlak($id_akhlak)
    {
        // Ambil data detail akhlak dari model
        $data = [
            'detailAkhlak'              => $this->ModelAkhlak->detail($id_akhlak),
            'daftarDetailAkhlak'        => $this->ModelDetailAkhlak->data(),
            'user'                      => $this->ModelUser->detail(Session()->get('id_user')),
        ];
        
        $daftarDetailAkhlak        = $this->ModelDetailAkhlak->dataAkhlak($id_akhlak);
        // Membuat instance spreadsheet
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Menambahkan header kolom
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Aspek');
        $sheet->setCellValue('C1', 'Parameter');
        $sheet->setCellValue('D1', 'Deskripsi');
        $sheet->setCellValue('E1', 'Periode');
        $sheet->setCellValue('F1', 'Evidence');
        $sheet->setCellValue('G1', 'Penilaian');
        $sheet->setCellValue('H1', 'Nilai');

        // Mengisi data ke dalam sheet
        $row = 2;
        $no = 1;
        foreach ($daftarDetailAkhlak as $item) {
            $sheet->setCellValue('A' . $row, $no++);
            $sheet->setCellValue('B' . $row, $item->aspek); // Ganti dengan nama kolom yang sesuai dari data
            $sheet->setCellValue('C' . $row, $item->parameter); // Ganti dengan nama kolom yang sesuai dari data
            $sheet->setCellValue('D' . $row, $item->deskripsi); // Ganti dengan nama kolom yang sesuai dari data
            $sheet->setCellValue('E' . $row, $item->periode); // Ganti dengan nama kolom yang sesuai dari data
            $sheet->setCellValue('F' . $row, $item->evidence); // Ganti dengan nama kolom yang sesuai dari data
            $sheet->setCellValue('G' . $row, $item->penilaian); // Ganti dengan nama kolom yang sesuai dari data
            $sheet->setCellValue('H' . $row, $item->nilai); // Ganti dengan nama kolom yang sesuai dari data
            $row++;
        }

        // Membuat writer untuk file Excel
        $writer = new Xlsx($spreadsheet);
        $filename = 'detail_akhlak.xlsx';

        // Menyimpan dan mengunduh file Excel
        $writer->save($filename);
        return response()->download($filename)->deleteFileAfterSend(true);
    }

}
