<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ModelLps;
use App\Models\ModelUser;
use App\Models\ModelProyek;
use App\Models\ModelDokumenLps;
use App\Models\ModelLog;
use App\Models\ProyekUsers;
use Barryvdh\DomPDF\Facade\Pdf;

class Lps extends Controller
{

    private $ModelLps, $ModelUser, $ModelProyek, $ModelDokumenLps;

    public function __construct()
    {
        $this->ModelLps         = new ModelLps();
        $this->ModelUser        = new ModelUser();
        $this->ModelProyek      = new ModelProyek();
        $this->ModelDokumenLps  = new ModelDokumenLps();
    }

    public function index()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'                     => 'LPS',
            'subTitle'                  => 'Review LPS',
            'daftarProyekLps'           => $this->ModelLps->dataProyek(),
            'daftarProyek'              => $this->ModelProyek->data(),
            'user'                      => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman Review LPS.';
        $log->feature   = 'LPS';
        $log->save();
        
        return view('lps.index', $data);
    }

    public function monitoringTimProyek()
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
            'title'                     => 'LPS',
            'subTitle'                  => 'Review LPS',
            'daftarProyekLps'           => $dataProyekByUser,
            'daftarProyek'              => $this->ModelProyek->data(),
            'user'                      => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman Monitoring LPS Tim Proyek.';
        $log->feature   = 'LPS';
        $log->save();
        
        return view('lps.monitoringTimProyek', $data);
    }

    public function monitoring()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'                     => 'LPS',
            'subTitle'                  => 'Monitoring LPS',
            'daftarProyekLps'           => $this->ModelLps->dataProyek(),
            'user'                      => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman Monitoring LPS.';
        $log->feature   = 'LPS';
        $log->save();
        
        return view('lps.monitoring', $data);
    }

    public function detailMonitoring($id_proyek)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'                     => 'LPS',
            'subTitle'                  => 'Monitoring LPS',
            'monitoring'                => true,
            'detailProyek'              => $this->ModelProyek->detailLps($id_proyek),
            'detailProyekLps'           => $this->ModelLps->data(),
            'user'                      => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman Detail Monitoring LPS.';
        $log->feature   = 'LPS';
        $log->save();

        return view('lps.detail', $data);
    }

    public function detail($id_proyek)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'                     => 'LPS',
            'subTitle'                  => 'Detail LPS',
            'monitoring'                => false,
            'detailProyek'              => $this->ModelProyek->detailLps($id_proyek),
            'detailProyekLps'           => $this->ModelLps->data(),
            'user'                      => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman Detail LPS.';
        $log->feature   = 'LPS';
        $log->save();

        return view('lps.detail', $data);
    }

    public function detailTim($id_proyek)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'                     => 'LPS',
            'subTitle'                  => 'Detail LPS',
            'monitoring'                => false,
            'detailProyek'              => $this->ModelProyek->detailLps($id_proyek),
            'detailProyekLps'           => $this->ModelLps->data(),
            'user'                      => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman Detail LPS Tim.';
        $log->feature   = 'LPS';
        $log->save();

        return view('lps.detailTim', $data);
    }

    public function prosesTambah()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $daftarDokumenLps = $this->ModelDokumenLps->data();

        foreach($daftarDokumenLps as $item) {
            $data = [
                'id_dokumen_lps'    => $item->id_dokumen_lps,
                'id_proyek'         => Request()->id_proyek,
                'tanggal_lps'       => date('Y-m-d'),
                'id_user_respon'    => Session()->get('id_user'),
                'is_respon'         => 1
            ];
            $this->ModelLps->tambah($data);
        }

        $dataProyek = [
            'id_proyek'     => Request()->id_proyek,
            // 'kode_spk_lps'  => Request()->kode_spk_lps,
            'status_lps'    => 1,
            'id_user_lps'   => Session()->get('id_user')
        ];

        $this->ModelProyek->edit($dataProyek);

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Menambah Data LPS.';
        $log->feature   = 'LPS';
        $log->save();

        return back()->with('success', 'Data berhasil ditambahkan!');
    }

    public function prosesEdit($id_lps)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        if(Request()->pdf) {
            $pdf = 1;
        } else {
            $pdf = 0;
        }

        if(Request()->native) {
            $native = 1;
        } else {
            $native = 0;
        }

        $data = [
            'id_lps'             => $id_lps,
            'pdf'               => $pdf,
            'native'            => $native,
            'tanggal_lps'       => date('Y-m-d'),
            'id_user_respon_lps'=> Session()->get('id_user')
        ];

        if(Request()->jenis_dokumen == 'Utama') {
            $pesan = 'successUtama';
        } else {
            $pesan = 'successPendukung';
        }

        $this->ModelLps->edit($data);

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Mengedit Data LPS.';
        $log->feature   = 'LPS';
        $log->save();

        return back()->with($pesan, 'Data berhasil diedit!');
    }

    public function prosesEditDokumen($id_lps, $jenis)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'id_lps'            => $id_lps,
            'tanggal_lps'       => date('Y-m-d'),
            'id_user_respon_lps'=> Session()->get('id_user')
        ];

        if ($jenis == 'pdf') {
            if(Request()->pdf) {
                $pdf = 1;
            } else {
                $pdf = 0;
            }

            $data['pdf'] = $pdf;
        } else if($jenis == 'native') {
            if(Request()->native) {
                $native = 1;
            } else {
                $native = 0;
            }
            
            $data['native'] = $native;
        }

        if(Request()->jenis_dokumen == 'Utama') {
            $pesan = 'successUtama';
        } else {
            $pesan = 'successPendukung';
        }

        $this->ModelLps->edit($data);

        return back()->with($pesan, 'Data berhasil diedit!');
    }

    public function prosesHapus($id_proyek)
    {
        $data = [
            'where' => 'id_proyek',
            'value' => $id_proyek
        ];

        $dataProyek = [
            'id_proyek'     => $id_proyek,
            'status_lps'    => 0,
            'id_user_lps'   => null,
            // 'kode_spk_lps'   => null,
            'dokumen_lps'   => null
        ];

        $this->ModelLps->hapus($data);
        $this->ModelProyek->edit($dataProyek);

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Menghapus Data LPS.';
        $log->feature   = 'LPS';
        $log->save();

        return back()->with('success', 'Data berhasil dihapus!');
    }

    public function updateTanggalPho($id_proyek)
    {
        if(Request()->dokumen_lps) {
            $dataProyek = [
                'id_proyek'         => $id_proyek,
                'dokumen_lps'   => Request()->dokumen_lps
            ];
        } else {
            $dataProyek = [
                'id_proyek'         => $id_proyek,
                'tanggal_pho_lps'   => Request()->tanggal_pho_lps,
                // 'kode_spk_lps'   => Request()->kode_spk_lps
            ];
        }

        $this->ModelProyek->edit($dataProyek);

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Mengupdate Tanggal PHO LPS.';
        $log->feature   = 'LPS';
        $log->save();

        return back()->with('success', 'Data berhasil diupdate!');
    }

    public function progress()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'                     => 'LPS',
            'subTitle'                  => 'Progress',
            'daftarProgress'            => $this->ModelLps->progress(),
            'jumlahDokumen'             => $this->ModelDokumenLps->jumlahData(),
            'user'                      => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman Progress LPS.';
        $log->feature   = 'LPS';
        $log->save();

        return view('lps.progress', $data);
    }

    public function downloadPdf($id_proyek)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $namaFile = 'Laporan LPS';

        $pdf = Pdf::loadview('lps.downloadPdf', [
            'namaFile'          => $namaFile,
            'proyek'            => ModelProyek::with('userLps')->find($id_proyek),
            'daftarLps'         => ModelLps::with(['proyek', 'dokumenLps' => function ($query) {
                                        $query->orderBy('no_urut', 'ASC');
                                    }])
                                    ->where('id_proyek', $id_proyek)
                                    ->get()
          ])->setPaper('a4', 'potrait');
      
        return $pdf->stream($namaFile . '.pdf');
    }
}
