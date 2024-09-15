<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ModelUser;
use App\Models\ModelProyek;
use App\Models\ModelCsi;
use App\Models\ModelAspekCsi;
use App\Models\ModelDetailCsi;
use App\Models\ModelLog;
use App\Models\ProyekUsers;
use Barryvdh\DomPDF\Facade\Pdf;

class Csi extends Controller
{

    private $ModelAspekCsi, $ModelUser, $ModelProyek, $ModelCsi, $ModelDetailCsi;

    public function __construct()
    {
        $this->ModelUser        = new ModelUser();
        $this->ModelProyek      = new ModelProyek();
        $this->ModelCsi         = new ModelCsi();
        $this->ModelAspekCsi    = new ModelAspekCsi();
        $this->ModelDetailCsi   = new ModelDetailCsi();
    }

    public function index()
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
            'title'                     => 'CSI',
            'subTitle'                  => 'Daftar Proyek CSI',
            'daftarProyek'              => $dataProyekByUser,
            'monitoring'                => true,
            'daftarCsi'                 => $this->ModelCsi->data(),
            'user'                      => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman Daftar Proyek CSI.';
        $log->feature   = 'CSI';
        $log->save();
        
        return view('csi.index', $data);
    }

    public function monitoring()
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
            'title'                     => 'CSI',
            'subTitle'                  => 'Monitoring Proyek CSI',
            'monitoring'                => true,
            'daftarProyek'              => $dataProyekByUser,
            'daftarCsi'                 => $this->ModelCsi->data(),
            'user'                      => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman Monitoring Proyek CSI.';
        $log->feature   = 'CSI';
        $log->save();
        
        return view('csi.index', $data);
    }

    public function detail($id_csi)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'                     => 'CSI',
            'subTitle'                  => 'Detail CSI',
            'detailCsi'                 => $this->ModelCsi->detail($id_csi),
            'daftarDetailCsi'           => $this->ModelDetailCsi->data(),
            'user'                      => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman Detail Proyek CSI.';
        $log->feature   = 'CSI';
        $log->save();
        
        return view('csi.detail', $data);
    }

    public function prosesTambah() 
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $check = $this->ModelCsi->checkData(Request()->id_proyek, Request()->periode);
        if($check) {
            return back()->with('fail', 'Data proyek dan periode tersebut sudah ada!');
        }

        $data = [
            'id_proyek'     => Request()->id_proyek,
            'id_user'       => Session()->get('id_user'),
            'periode'       => Request()->periode
        ];
        $this->ModelCsi->tambah($data);

        $lastDataCsi = $this->ModelCsi->lastData();

        $dataAspekCsi = $this->ModelAspekCsi->data();
        foreach($dataAspekCsi as $item) {
            $dataDetailCsi = [
                'id_csi'        => $lastDataCsi->id_csi,
                'id_aspek_csi'  => $item->id_aspek_csi
            ];
            $this->ModelDetailCsi->tambah($dataDetailCsi);
        }

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Menambah Data Proyek CSI.';
        $log->feature   = 'CSI';
        $log->save();
        
        return back()->with('success', 'Data berhasil ditambahkan!');
    }

    public function prosesEdit($id_csi) 
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'id_csi'        => $id_csi,
            'id_proyek'     => Request()->id_proyek,
            'id_user'       => Session()->get('id_user'),
            'periode'       => Request()->periode
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Mengedit Data Proyek CSI.';
        $log->feature   = 'CSI';
        $log->save();

        $this->ModelCsi->edit($data);
        return back()->with('success', 'Data berhasil diedit!');
    }

    public function pendapat($id_csi) 
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'id_csi'        => $id_csi,
            'pendapat'     => Request()->pendapat
        ];
        $this->ModelCsi->edit($data);

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Memberikan Pendapat Proyek CSI.';
        $log->feature   = 'CSI';
        $log->save();

        return back()->with('success', 'Data pendapat berhasil ditambahkan!');
    }

    public function updateDetailCsi($id_detail_csi) 
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        if(Request()->penilaian == 'Sangat Baik') {
            $nilai = 5;
        } else if(Request()->penilaian == 'Baik') {
            $nilai = 4;
        } else if(Request()->penilaian == 'Cukup') {
            $nilai = 3;
        } else if(Request()->penilaian == 'Kurang') {
            $nilai = 2;
        } else if(Request()->penilaian == 'Sangat Kurang') {
            $nilai = 1;
        }

        $data = [
            'id_detail_csi' => $id_detail_csi,
            'penilaian'     => Request()->penilaian,
            'nilai'         => $nilai
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Mengedit Data Detail Proyek CSI.';
        $log->feature   = 'CSI';
        $log->save();

        $this->ModelDetailCsi->edit($data);
        return back()->with('success', 'Data berhasil diedit!');
    }

    public function updateDetailCsiNew($id_detail_csi, $penilaian) 
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        
        if($penilaian == 'sangat-baik') {
            $nilai = 5;
            $pen = 'Sangat Baik';
        } else if($penilaian == 'baik') {
            $nilai = 4;
            $pen = 'Baik';
        } else if($penilaian == 'cukup') {
            $nilai = 3;
            $pen = 'Cukup';
        } else if($penilaian == 'kurang') {
            $nilai = 2;
            $pen = 'Kurang';
        } else if($penilaian == 'sangat-kurang') {
            $nilai = 1;
            $pen = 'Sangat Kurang';
        }

        $data = [
            'id_detail_csi' => $id_detail_csi,
            'penilaian'     => $pen,
            'nilai'         => $nilai
        ];

        $this->ModelDetailCsi->edit($data);
        return back()->with('success', 'Data berhasil diedit!');
    }

    public function prosesHapus($id_csi)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Menghapus Data Proyek CSI.';
        $log->feature   = 'CSI';
        $log->save();

        $this->ModelCsi->hapus($id_csi);
        $this->ModelDetailCsi->hapusByCsi($id_csi);
        return back()->with('success', 'Data berhasil dihapus!');
    }

    public function downloadPdf($id_csi)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $namaFile = 'Laporan CSI';

        $pdf = Pdf::loadview('csi.downloadPdf', [
            'namaFile'          => $namaFile,
            'csi'               => ModelCsi::with('user', 'proyek')->find($id_csi),
            'daftarDetailCsi'   => ModelDetailCsi::with('aspekCsi', 'csi')
                                    ->where('id_csi', $id_csi)
                                    ->orderBy('id_detail_csi', 'ASC')
                                    ->get()
          ])->setPaper('a4', 'landscape');
      
        return $pdf->stream($namaFile . '.pdf');
    }
}
