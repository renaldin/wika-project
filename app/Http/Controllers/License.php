<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ModelDetailCsi;
use App\Models\ModelUser;
use App\Models\ModelSoftware;
use App\Models\ModelLicense;
use App\Models\ModelLog;
use App\Models\ModelDetailLicense;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;

class License extends Controller
{

    private $ModelUser, $public_path, $ModelSoftware, $ModelLicense, $ModelDetailLicense;

    public function __construct()
    {
        $this->ModelUser = new ModelUser();
        $this->ModelSoftware = new ModelSoftware();
        $this->ModelLicense = new ModelLicense();
        $this->ModelDetailLicense = new ModelDetailLicense();
    }

    public function index()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'License Software',
            'subTitle'          => 'Daftar',
            'daftarLicense'     => $this->ModelLicense->data(),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman Daftar Lincese Software.';
        $log->feature   = 'LICENSE SOFTWARE';
        $log->save();

        return view('license.index', $data);
    }

    public function detail($id_license)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'License Software',
            'subTitle'          => 'Detail',
            'daftarSoftware'    => $this->ModelSoftware->data(),
            'detailLicense'     => $this->ModelLicense->detail($id_license),
            'daftarDetailLicense'     => $this->ModelDetailLicense->data(),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman Detail Lincese Software.';
        $log->feature   = 'LICENSE SOFTWARE';
        $log->save();

        return view('license.detail', $data);
    }

    public function prosesTambah()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'id_device'         => Request()->id_device,
            'id_user'           => Session()->get('id_user'),
            'tanggal_license'   => date('Y-m-d')
        ];

        $this->ModelLicense->tambah($data);

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Menambah Data Lincese Software.';
        $log->feature   = 'LICENSE SOFTWARE';
        $log->save();

        return back()->with('success', 'Data berhasil ditambahkan!');
    }

    public function prosesEdit($id_license)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'id_license'        => $id_license,
            'id_device'         => Request()->id_device
        ];

        $this->ModelLicense->edit($data);

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Mengedit Data Lincese Software.';
        $log->feature   = 'LICENSE SOFTWARE';
        $log->save();

        return back()->with('success', 'Data berhasil diedit!');
    }

    public function prosesHapus($id_license)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $this->ModelLicense->hapus($id_license);
        $this->ModelDetailLicense->hapusLicense($id_license);

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Menghapus Data Lincese Software.';
        $log->feature   = 'LICENSE SOFTWARE';
        $log->save();

        return back()->with('success', 'Data berhasil dihapus!');
    }

    public function progress()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'License Software',
            'subTitle'          => 'Progress',
            'daftarSoftware'    => $this->ModelSoftware->data(),
            'progress'          => $this->ModelDetailLicense->progress(),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman Progress Lincese Software.';
        $log->feature   = 'LICENSE SOFTWARE';
        $log->save();

        return view('license.progress', $data);
    }

    public function monitoring()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Monitoring License Software',
            'subTitle'          => 'Daftar',
            'daftarLicense'     => ModelLicense::with('user')->orderBy('id_license', 'DESC')->limit(300)->get(),
            'user'              => ModelUser::find(Session()->get('id_user')),
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman Monitoring Lincese Software.';
        $log->feature   = 'MONITORING LICENSE SOFTWARE';
        $log->save();

        return view('license.monitoring', $data);
    }

    public function detailMonitoring($id_license)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Monitoring License Software',
            'subTitle'          => 'Detail',
            'detailLicense'     => ModelLicense::with('user')->find($id_license),
            'daftarDetailLicense'   => ModelDetailLicense::with('software', 'license')->orderBy('id_detail_license', 'DESC')->limit(200)->get(),
            'user'              => ModelUser::find(Session()->get('id_user')),
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman Detail Lincese Software.';
        $log->feature   = 'MONITORING LICENSE SOFTWARE';
        $log->save();

        return view('license.detailMonitoring', $data);
    }

    public function downloadPdf()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $namaFile = 'Laporan License Software';

        $pdf = PDF::loadview('license.downloadPdf', [
            'namaFile'          => $namaFile,
            'detailLicense'     => ModelDetailLicense::with('license', 'software')->limit(300)->get()
          ])->setPaper('a4', 'landscape');
      
        return $pdf->stream($namaFile . '.pdf');
    }
}
