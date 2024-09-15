<?php

namespace App\Http\Controllers\Pcp;

use App\Http\Controllers\Controller;
use App\Models\ModelUser;
use App\Models\ModelLog;
use App\Models\ModelMonthlyReport;
use App\Models\ModelProyek;
use App\Models\MonthlyReportPcps;
use App\Models\PicMonthlyReportPcps;
use App\Models\ProyekUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MonthlyReportPcp extends Controller
{

    private $ModelUser, $ModelProyek, $public_path_evaluasi_usaha, $public_path_laporan_lc, $public_path_laporan_vendor, $public_path_update_inventaris, $public_path_prognosa_hasil, $public_path_ms_project, $public_path_laporan_bulanan_ikn, $public_path_laporan_upaya_klaim, $public_path_laporan_potob, $public_path_laporan_spi;

    public function __construct()
    {
        $this->public_path_evaluasi_usaha = 'pcp/evaluasi_usaha';
        $this->public_path_laporan_lc = 'pcp/laporan_lc';
        $this->public_path_laporan_vendor = 'pcp/laporan_vendor';
        $this->public_path_update_inventaris = 'pcp/update_inventaris';
        $this->public_path_prognosa_hasil = 'pcp/prognosa_hasil';
        $this->public_path_ms_project = 'pcp/ms_project';
        $this->public_path_laporan_bulanan_ikn = 'pcp/laporan_bulanan_ikn';
        $this->public_path_laporan_upaya_klaim = 'pcp/laporan_upaya_klaim';
        $this->public_path_laporan_potob = 'pcp/laporan_potob';
        $this->public_path_laporan_spi = 'pcp/laporan_spi';

        $this->ModelUser = new ModelUser();
        $this->ModelProyek = new ModelProyek();
    }

    public function index()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $proyekUser = ProyekUsers::where('id_user', Session()->get('id_user'))->get();
        $idProyek = [];
        foreach($proyekUser as $item) {
            $idProyek[] = $item->id_proyek;
        }

        if (Session()->get('role') == 'Tim Proyek') {
            $daftarMonthlyReport = MonthlyReportPcps::with('monthlyReportEng', 'proyek')
                ->whereIn('id_proyek', $idProyek)
                ->limit(300)
                ->get();
        } else {
            $daftarMonthlyReport = MonthlyReportPcps::with('monthlyReportEng', 'proyek')
                ->limit(300)
                ->get();
        }
        
        $data = [
            'title'                         => 'Data Monthly Report',
            'subTitle'                      => 'Daftar Monthly Report PCP',
            'daftarMonthlyReportPcp'        => $daftarMonthlyReport,
            'user'                          => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman Daftar Monthy Report PCP.';
        $log->feature   = 'Monthly Report PCP';
        $log->save();
        
        return view('pcp.monthlyReport.index', $data);
    }

    public function detail($id_monthly_report_pcp)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Data Monthly Report',
            'subTitle'          => 'Detail Monthly Report PCP',
            'form'              => 'Detail',
            'daftarProyek'      => ModelProyek::get(),
            'picMonthlyReport'  => PicMonthlyReportPcps::with('pic')->where('id_monthly_report_pcp', $id_monthly_report_pcp)->get(),
            'detail'            => MonthlyReportPcps::with('monthlyReportEng', 'proyek')->find($id_monthly_report_pcp),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman Detail Monthly Report PCP.';
        $log->feature   = 'Monthly Report PCP';
        $log->save();

        return view('pcp.monthlyReport.detail', $data);
    }

    public function tambah()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Data Monthly Report',
            'subTitle'          => 'Tambah Monthly Report PCP',
            'form'              => 'Tambah',
            'daftarProyek'      => ModelProyek::get(),
            'daftarPic'         => ModelUser::whereIn('role', ['Head Office', 'Manajemen'])->get(),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];
        
        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman Form Tambah Monthly Report PCP.';
        $log->feature   = 'Monthly Report PCP';
        $log->save();

        return view('pcp.monthlyReport.form', $data);
    }

    public function prosesTambah(Request $request)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        DB::beginTransaction();
        try {

            if ($request->select_all) {
                $proyek = ModelProyek::distinct()->pluck('id_proyek')->toArray();
            } else {
                $proyek = $request->id_proyek;
            }

            foreach ($proyek as $item) {
                $monthlyReportPcpCheck = MonthlyReportPcps::with('proyek')->where('id_proyek', $item)->where('bulan_report', $request->bulan_report)->first();
                $month = date('F', strtotime($request->bulan_report));
                
                if ($monthlyReportPcpCheck) {
                    DB::rollBack();
                    return back()->with('fail', 'Data monthly report proyek ' . $monthlyReportPcpCheck->proyek->nama_proyek . ' di bulan ' . $month . ' sudah ada!');
                }

                $monthlyReportEng = ModelMonthlyReport::where('id_proyek', $item)->where('bulan_report', $request->bulan_report)->first();
        
                $monthlyReportPcp = new MonthlyReportPcps();
                $monthlyReportPcp->id_monthly_report    = $monthlyReportEng?->id_monthly_report ?? null;
                $monthlyReportPcp->id_proyek            = $item;
                $monthlyReportPcp->bulan_report         = $request->bulan_report;
                $monthlyReportPcp->status_report_pcp    = 'Open';
        
                $monthlyReportPcp->narasi_evaluasi_hasil_usaha      = $request->narasi_evaluasi_hasil_usaha;
                $monthlyReportPcp->due_date_evaluasi_hasil_usaha    = $request->due_date_evaluasi_hasil_usaha;
                // $monthlyReportPcp->link_evaluasi_hasil_usaha        = $request->link_evaluasi_hasil_usaha;

                $monthlyReportPcp->narasi_laporan_lc                = $request->narasi_laporan_lc;
                $monthlyReportPcp->due_date_laporan_lc              = $request->due_date_laporan_lc;
                $monthlyReportPcp->link_laporan_lc                  = $request->link_laporan_lc;

                $monthlyReportPcp->narasi_laporan_vendor            = $request->narasi_laporan_vendor;
                $monthlyReportPcp->due_date_laporan_vendor          = $request->due_date_laporan_vendor;
                // $monthlyReportPcp->link_laporan_vendor              = $request->link_laporan_vendor;

                $monthlyReportPcp->narasi_update_inventaris         = $request->narasi_update_inventaris;
                $monthlyReportPcp->due_date_update_inventaris       = $request->due_date_update_inventaris;
                // $monthlyReportPcp->link_update_inventaris           = $request->link_update_inventaris;

                $monthlyReportPcp->narasi_prognosa_hasil_usaha      = $request->narasi_prognosa_hasil_usaha;
                $monthlyReportPcp->due_date_prognosa_hasil_usaha    = $request->due_date_prognosa_hasil_usaha;
                $monthlyReportPcp->link_prognosa_hasil_usaha        = $request->link_prognosa_hasil_usaha;

                $monthlyReportPcp->narasi_ms_project_file           = $request->narasi_ms_project_file;
                $monthlyReportPcp->due_date_ms_project_file         = $request->due_date_ms_project_file;
                $monthlyReportPcp->link_ms_project_file             = $request->link_ms_project_file;

                $monthlyReportPcp->narasi_laporan_bulanan_ikn       = $request->narasi_laporan_bulanan_ikn;
                $monthlyReportPcp->due_date_laporan_bulanan_ikn     = $request->due_date_laporan_bulanan_ikn;
                // $monthlyReportPcp->link_laporan_bulanan_ikn         = $request->link_laporan_bulanan_ikn;

                $monthlyReportPcp->narasi_laporan_upaya_klaim       = $request->narasi_laporan_upaya_klaim;
                $monthlyReportPcp->due_date_laporan_upaya_klaim     = $request->due_date_laporan_upaya_klaim;
                $monthlyReportPcp->link_laporan_upaya_klaim         = $request->link_laporan_upaya_klaim;

                $monthlyReportPcp->narasi_laporan_potob             = $request->narasi_laporan_potob;
                $monthlyReportPcp->due_date_laporan_potob           = $request->due_date_laporan_potob;
                $monthlyReportPcp->link_laporan_potob               = $request->link_laporan_potob;
                $monthlyReportPcp->save();

                $monthlyReportPcpLast = MonthlyReportPcps::orderBy('id', 'DESC')->first();

                foreach ($request->pic_evaluasi_hasil_usaha as $item_1) {
                    $picEvaluasiHasilUsaha = new PicMonthlyReportPcps();
                    $picEvaluasiHasilUsaha->id_monthly_report_pcp   = $monthlyReportPcpLast->id;
                    $picEvaluasiHasilUsaha->jenis_dokumen           = 'Evaluasi Hasil Usaha';
                    $picEvaluasiHasilUsaha->id_pic                  = $item_1;
                    $picEvaluasiHasilUsaha->save();
                }

                foreach ($request->pic_laporan_lc as $item_2) {
                    $picEvaluasiHasilUsaha = new PicMonthlyReportPcps();
                    $picEvaluasiHasilUsaha->id_monthly_report_pcp   = $monthlyReportPcpLast->id;
                    $picEvaluasiHasilUsaha->jenis_dokumen           = 'Laporan LC';
                    $picEvaluasiHasilUsaha->id_pic                  = $item_2;
                    $picEvaluasiHasilUsaha->save();
                }

                foreach ($request->pic_laporan_vendor as $item_3) {
                    $picEvaluasiHasilUsaha = new PicMonthlyReportPcps();
                    $picEvaluasiHasilUsaha->id_monthly_report_pcp   = $monthlyReportPcpLast->id;
                    $picEvaluasiHasilUsaha->jenis_dokumen           = 'Laporan Vendor';
                    $picEvaluasiHasilUsaha->id_pic                  = $item_3;
                    $picEvaluasiHasilUsaha->save();
                }

                foreach ($request->pic_update_inventaris as $item_3) {
                    $picEvaluasiHasilUsaha = new PicMonthlyReportPcps();
                    $picEvaluasiHasilUsaha->id_monthly_report_pcp   = $monthlyReportPcpLast->id;
                    $picEvaluasiHasilUsaha->jenis_dokumen           = 'Update Inventaris';
                    $picEvaluasiHasilUsaha->id_pic                  = $item_3;
                    $picEvaluasiHasilUsaha->save();
                }

                foreach ($request->pic_prognosa_hasil_usaha as $item_3) {
                    $picEvaluasiHasilUsaha = new PicMonthlyReportPcps();
                    $picEvaluasiHasilUsaha->id_monthly_report_pcp   = $monthlyReportPcpLast->id;
                    $picEvaluasiHasilUsaha->jenis_dokumen           = 'Prognosa Hasil Usaha';
                    $picEvaluasiHasilUsaha->id_pic                  = $item_3;
                    $picEvaluasiHasilUsaha->save();
                }

                foreach ($request->pic_ms_project_file  as $item_3) {
                    $picEvaluasiHasilUsaha = new PicMonthlyReportPcps();
                    $picEvaluasiHasilUsaha->id_monthly_report_pcp   = $monthlyReportPcpLast->id;
                    $picEvaluasiHasilUsaha->jenis_dokumen           = 'Ms. Project';
                    $picEvaluasiHasilUsaha->id_pic                  = $item_3;
                    $picEvaluasiHasilUsaha->save();
                }

                foreach ($request->pic_laporan_bulanan_ikn  as $item_3) {
                    $picEvaluasiHasilUsaha = new PicMonthlyReportPcps();
                    $picEvaluasiHasilUsaha->id_monthly_report_pcp   = $monthlyReportPcpLast->id;
                    $picEvaluasiHasilUsaha->jenis_dokumen           = 'Laporan Bulanan IKN';
                    $picEvaluasiHasilUsaha->id_pic                  = $item_3;
                    $picEvaluasiHasilUsaha->save();
                }

                foreach ($request->pic_laporan_upaya_klaim as $item_3) {
                    $picEvaluasiHasilUsaha = new PicMonthlyReportPcps();
                    $picEvaluasiHasilUsaha->id_monthly_report_pcp   = $monthlyReportPcpLast->id;
                    $picEvaluasiHasilUsaha->jenis_dokumen           = 'Laporan Upaya Klaim';
                    $picEvaluasiHasilUsaha->id_pic                  = $item_3;
                    $picEvaluasiHasilUsaha->save();
                }

                foreach ($request->pic_laporan_potob as $item_3) {
                    $picEvaluasiHasilUsaha = new PicMonthlyReportPcps();
                    $picEvaluasiHasilUsaha->id_monthly_report_pcp   = $monthlyReportPcpLast->id;
                    $picEvaluasiHasilUsaha->jenis_dokumen           = 'Laporan Potob & SPI';
                    $picEvaluasiHasilUsaha->id_pic                  = $item_3;
                    $picEvaluasiHasilUsaha->save();
                }
            }
    
            $log            = new ModelLog();
            $log->id_user   = Session()->get('id_user');
            $log->activity  = 'Menambah Data Monthly Report PCP.';
            $log->feature   = 'Monthly Report PCP';
            $log->save();
    
            DB::commit();
            return redirect()->route('daftar-monthly-report-pcp')->with('success', 'Data berhasil ditambahkan!');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('fail', 'Terjadi Kesalagan Sistem!');
        }
    }

    public function edit($id_monthly_report_pcp)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Data Monthly Report',
            'subTitle'          => 'Edit Monthly Report PCP',
            'form'              => 'Edit',
            'daftarProyek'      => ModelProyek::get(),
            'picMonthlyReport'  => PicMonthlyReportPcps::with('pic')->where('id_monthly_report_pcp', $id_monthly_report_pcp)->get(),
            'detail'            => MonthlyReportPcps::with('monthlyReportEng', 'proyek')->find($id_monthly_report_pcp),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman Form Edit Monthly Report.';
        $log->feature   = 'Monthly Report';
        $log->save();

        return view('pcp.monthlyReport.form', $data);
    }

    public function prosesEdit(Request $request, $id_monthly_report_pcp)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        DB::beginTransaction();
        try {
            $monthlyReportPcp = MonthlyReportPcps::find($id_monthly_report_pcp);
            $monthlyReportPcp->status_report_pcp                = $request->status_report_pcp;

            // persentase
            // if (Session()->get('role') == 'Head Office') {
            //     $monthlyReportPcp->persentase_evaluasi_hasil_usaha  = $request->persentase_evaluasi_hasil_usaha;
            //     $monthlyReportPcp->persentase_laporan_vendor        = $request->persentase_laporan_vendor;
            //     $monthlyReportPcp->persentase_update_inventaris     = $request->persentase_update_inventaris;
            //     $monthlyReportPcp->persentase_laporan_bulanan_ikn   = $request->persentase_laporan_bulanan_ikn;
            //     $monthlyReportPcp->persentase_laporan_lc            = $request->persentase_laporan_lc;
            //     $monthlyReportPcp->persentase_prognosa_hasil_usaha  = $request->persentase_prognosa_hasil_usaha;
            //     $monthlyReportPcp->persentase_ms_project_file       = $request->persentase_ms_project_file;
            //     $monthlyReportPcp->persentase_laporan_upaya_klaim   = $request->persentase_laporan_upaya_klaim;
            //     $monthlyReportPcp->persentase_laporan_potob         = $request->persentase_laporan_potob;
            // }

            // status
            if ($request->status_evaluasi_hasil_usaha) {
                $monthlyReportPcp->status_evaluasi_hasil_usaha  = $request->status_evaluasi_hasil_usaha;
            }
            if ($request->status_laporan_vendor) {
                $monthlyReportPcp->status_laporan_vendor        = $request->status_laporan_vendor;
            }
            if ($request->status_update_inventaris) {
                $monthlyReportPcp->status_update_inventaris     = $request->status_update_inventaris;
            }
            if ($request->status_laporan_bulanan_ikn) {
                $monthlyReportPcp->status_laporan_bulanan_ikn   = $request->status_laporan_bulanan_ikn;
            }
            if ($request->status_laporan_lc) {
                $monthlyReportPcp->status_laporan_lc            = $request->status_laporan_lc;
            }
            if ($request->status_prognosa_hasil_usaha) {
                $monthlyReportPcp->status_prognosa_hasil_usaha  = $request->status_prognosa_hasil_usaha;
            }
            if ($request->status_ms_project_file) {
                $monthlyReportPcp->status_ms_project_file       = $request->status_ms_project_file;
            }
            if ($request->status_laporan_upaya_klaim) {
                $monthlyReportPcp->status_laporan_upaya_klaim   = $request->status_laporan_upaya_klaim;
            }
            if ($request->status_laporan_potob) {
                $monthlyReportPcp->status_laporan_potob         = $request->status_laporan_potob;
            }

            // komentar
            if ($request->komentar_evaluasi_hasil_usaha) {
                $monthlyReportPcp->komentar_evaluasi_hasil_usaha  = $request->komentar_evaluasi_hasil_usaha;
            }
            if ($request->komentar_laporan_vendor) {
                $monthlyReportPcp->komentar_laporan_vendor  = $request->komentar_laporan_vendor;
            }
            if ($request->komentar_update_inventaris) {
                $monthlyReportPcp->komentar_update_inventaris  = $request->komentar_update_inventaris;
            }
            if ($request->komentar_laporan_bulanan_ikn) {
                $monthlyReportPcp->komentar_laporan_bulanan_ikn  = $request->komentar_laporan_bulanan_ikn;
            }
            if ($request->komentar_laporan_lc) {
                $monthlyReportPcp->komentar_laporan_lc  = $request->komentar_laporan_lc;
            }
            if ($request->komentar_prognosa_hasil_usaha) {
                $monthlyReportPcp->komentar_prognosa_hasil_usaha  = $request->komentar_prognosa_hasil_usaha;
            }
            if ($request->komentar_ms_project_file) {
                $monthlyReportPcp->komentar_ms_project_file  = $request->komentar_ms_project_file;
            }
            if ($request->komentar_laporan_upaya_klaim) {
                $monthlyReportPcp->komentar_laporan_upaya_klaim  = $request->komentar_laporan_upaya_klaim;
            }
            if ($request->komentar_laporan_potob) {
                $monthlyReportPcp->komentar_laporan_potob  = $request->komentar_laporan_potob;
            }

            // link
            // if ($request->link_evaluasi_hasil_usaha) {
            //     $monthlyReportPcp->link_evaluasi_hasil_usaha  = $request->link_evaluasi_hasil_usaha;
            // }
            // if ($request->link_laporan_vendor) {
            //     $monthlyReportPcp->link_laporan_vendor  = $request->link_laporan_vendor;
            // }
            // if ($request->link_update_inventaris) {
            //     $monthlyReportPcp->link_update_inventaris  = $request->link_update_inventaris;
            // }
            // if ($request->link_laporan_bulanan_ikn) {
            //     $monthlyReportPcp->link_laporan_bulanan_ikn  = $request->link_laporan_bulanan_ikn;
            // }
            if ($request->link_laporan_lc) {
                $monthlyReportPcp->link_laporan_lc  = $request->link_laporan_lc;
            }
            if ($request->link_prognosa_hasil_usaha) {
                $monthlyReportPcp->link_prognosa_hasil_usaha  = $request->link_prognosa_hasil_usaha;
            }
            if ($request->link_ms_project_file) {
                $monthlyReportPcp->link_ms_project_file  = $request->link_ms_project_file;
            }
            if ($request->link_laporan_upaya_klaim) {
                $monthlyReportPcp->link_laporan_upaya_klaim  = $request->link_laporan_upaya_klaim;
            }
            if ($request->link_laporan_potob) {
                $monthlyReportPcp->link_laporan_potob  = $request->link_laporan_potob;
            }

            // checklist
            if(Session()->get('role') == 'Tim Proyek' && $request->laporan_lc) {
                $monthlyReportPcp->laporan_lc   = 'Ya';
            } elseif(Session()->get('role') == 'Tim Proyek') {
                $monthlyReportPcp->laporan_lc   = 'Tidak';
            }
            if(Session()->get('role') == 'Tim Proyek' && $request->prognosa_hasil_usaha) {
                $monthlyReportPcp->prognosa_hasil_usaha = 'Ya';
            } elseif(Session()->get('role') == 'Tim Proyek') {
                $monthlyReportPcp->prognosa_hasil_usaha = 'Tidak';
            }
            if(Session()->get('role') == 'Tim Proyek' && $request->ms_project_file) {
                $monthlyReportPcp->ms_project_file  = 'Ya';
            } elseif(Session()->get('role') == 'Tim Proyek') {
                $monthlyReportPcp->ms_project_file  = 'Tidak';
            }
            if(Session()->get('role') == 'Tim Proyek' && $request->laporan_upaya_klaim) {
                $monthlyReportPcp->laporan_upaya_klaim  = 'Ya';
            } elseif(Session()->get('role') == 'Tim Proyek') {
                $monthlyReportPcp->laporan_upaya_klaim  = 'Tidak';
            }
            if(Session()->get('role') == 'Tim Proyek' && $request->laporan_potob) {
                $monthlyReportPcp->laporan_potob    = 'Ya';
            } elseif(Session()->get('role') == 'Tim Proyek') {
                $monthlyReportPcp->laporan_potob    = 'Tidak';
            }

            // upload
            if ($request->evaluasi_hasil_usaha <> "") {
                if ( $monthlyReportPcp->evaluasi_hasil_usaha <> "") {
                    unlink(public_path($this->public_path_evaluasi_usaha) . '/' . $monthlyReportPcp->evaluasi_hasil_usaha);
                }

                $file1 = $request->evaluasi_hasil_usaha;
                $name1 = explode(".", $file1->getClientOriginalName());
                $fileName1 = date('mdYHis') . '1 '. $name1[0] . '.' . $file1->extension();
                $file1->move(public_path($this->public_path_evaluasi_usaha), $fileName1);

                $monthlyReportPcp->evaluasi_hasil_usaha = $fileName1;
            }
            if ($request->laporan_vendor <> "") {
                if ( $monthlyReportPcp->laporan_vendor <> "") {
                    unlink(public_path($this->public_path_laporan_vendor) . '/' . $monthlyReportPcp->laporan_vendor);
                }

                $file3 = $request->laporan_vendor;
                $name3 = explode(".", $file3->getClientOriginalName());
                $fileName3 = date('mdYHis') . '3 '. $name3[0] . '.' . $file3->extension();
                $file3->move(public_path($this->public_path_laporan_vendor), $fileName3);

                $monthlyReportPcp->laporan_vendor = $fileName3;
            }
            if ($request->update_inventaris <> "") {
                if ( $monthlyReportPcp->update_inventaris <> "") {
                    unlink(public_path($this->public_path_update_inventaris) . '/' . $monthlyReportPcp->update_inventaris);
                }

                $file4 = $request->update_inventaris;
                $name4 = explode(".", $file4->getClientOriginalName());
                $fileName4 = date('mdYHis') . '4 '. $name4[0] . '.' . $file4->extension();
                $file4->move(public_path($this->public_path_update_inventaris), $fileName4);

                $monthlyReportPcp->update_inventaris = $fileName4;
            }
            if ($request->laporan_bulanan_ikn <> "") {
                if ( $monthlyReportPcp->laporan_bulanan_ikn <> "") {
                    unlink(public_path($this->public_path_laporan_bulanan_ikn) . '/' . $monthlyReportPcp->laporan_bulanan_ikn);
                }

                $file7 = $request->laporan_bulanan_ikn;
                $name7 = explode(".", $file7->getClientOriginalName());
                $fileName7 = date('mdYHis') . '7 '. $name7[0] . '.' . $file7->extension();
                $file7->move(public_path($this->public_path_laporan_bulanan_ikn), $fileName7);

                $monthlyReportPcp->laporan_bulanan_ikn = $fileName7;
            }

            $monthlyReportPcp->save();

            $log            = new ModelLog();
            $log->id_user   = Session()->get('id_user');
            $log->activity  = 'Mengedit Data Monthly Report PCP.';
            $log->feature   = 'Monthly Report PCP';
            $log->save();

            DB::commit();
            return redirect()->route('daftar-monthly-report-pcp')->with('success', 'Data berhasil diedit!');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('fail', 'Terjadi kesalahan sistem!');
        }
    }

    public function prosesHapus($id_monthly_report_pcp)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $monthlyReportPcp = MonthlyReportPcps::find($id_monthly_report_pcp);

        if (!$monthlyReportPcp) {
            return back()->with('fail', 'Data tidak ada!');
        }

        if ( $monthlyReportPcp->evaluasi_hasil_usaha <> "") {
            unlink(public_path($this->public_path_evaluasi_usaha) . '/' . $monthlyReportPcp->evaluasi_hasil_usaha);
        }
        
        if ( $monthlyReportPcp->laporan_lc <> "") {
            unlink(public_path($this->public_path_laporan_lc) . '/' . $monthlyReportPcp->laporan_lc);
        }
        
        if ( $monthlyReportPcp->laporan_vendor <> "") {
            unlink(public_path($this->public_path_laporan_vendor) . '/' . $monthlyReportPcp->laporan_vendor);
        }
        
        if ( $monthlyReportPcp->update_inventaris <> "") {
            unlink(public_path($this->public_path_update_inventaris) . '/' . $monthlyReportPcp->update_inventaris);
        }

        if ( $monthlyReportPcp->prognosa_hasil_usaha <> "") {
            unlink(public_path($this->public_path_prognosa_hasil) . '/' . $monthlyReportPcp->prognosa_hasil_usaha);
        }

        if ( $monthlyReportPcp->ms_project_file <> "") {
            unlink(public_path($this->public_path_ms_project) . '/' . $monthlyReportPcp->ms_project_file);
        }

        if ( $monthlyReportPcp->laporan_bulanan_ikn <> "") {
            unlink(public_path($this->public_path_laporan_bulanan_ikn) . '/' . $monthlyReportPcp->laporan_bulanan_ikn);
        }

        if ( $monthlyReportPcp->laporan_upaya_klaim <> "") {
            unlink(public_path($this->public_path_laporan_upaya_klaim) . '/' . $monthlyReportPcp->laporan_upaya_klaim);
        }

        if ( $monthlyReportPcp->laporan_potob <> "") {
            unlink(public_path($this->public_path_laporan_potob) . '/' . $monthlyReportPcp->laporan_potob);
        }

        if ( $monthlyReportPcp->laporan_spi <> "") {
            unlink(public_path($this->public_path_laporan_spi) . '/' . $monthlyReportPcp->laporan_spi);
        }

        $pic = PicMonthlyReportPcps::where('id_monthly_report_pcp', $id_monthly_report_pcp)->get();
        foreach ($pic as $item) {
            $item->delete();
        }

        $monthlyReportPcp->delete();

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Menghapus Data Monthly Report PCP.';
        $log->feature   = 'Monthly Report PCP';
        $log->save();

        return back()->with('success', 'Data berhasil dihapus !');
    }

    public function downloadFile($id_monthly_report_pcp, $jenis)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = MonthlyReportPcps::find($id_monthly_report_pcp);
        
        if ($jenis == 'evaluasi_hasil_usaha') {
            $fileName = $data->evaluasi_hasil_usaha;
            $publicPath = $this->public_path_evaluasi_usaha;
        }
        
        if ( $jenis == 'laporan_lc') {
            $fileName = $data->laporan_lc;
            $publicPath = $this->public_path_laporan_lc;
        }
        
        if ( $jenis == 'laporan_vendor') {
            $fileName = $data->laporan_vendor;
            $publicPath = $this->public_path_laporan_vendor;
        }
        
        if ( $jenis == 'update_inventaris') {
            $fileName = $data->update_inventaris;
            $publicPath = $this->public_path_update_inventaris;
        }

        if ( $jenis == 'prognosa_hasil_usaha') {
            $fileName = $data->prognosa_hasil_usaha;
            $publicPath = $this->public_path_prognosa_hasil;
        }

        if ( $jenis == 'ms_project_file') {
            $fileName = $data->ms_project_file;
            $publicPath = $this->public_path_ms_project;
        }

        if ( $jenis == 'laporan_bulanan_ikn') {
            $fileName = $data->laporan_bulanan_ikn;
            $publicPath = $this->public_path_laporan_bulanan_ikn;
        }

        if ( $jenis == 'laporan_upaya_klaim') {
            $fileName = $data->laporan_upaya_klaim;
            $publicPath = $this->public_path_laporan_upaya_klaim;
        }

        if ( $jenis == 'laporan_potob') {
            $fileName = $data->laporan_potob;
            $publicPath = $this->public_path_laporan_potob;
        }

        if ( $jenis == 'laporan_spi') {
            $fileName = $data->laporan_spi;
            $publicPath = $this->public_path_laporan_spi;
        }

        return response()->download(public_path($publicPath) . '/' . $fileName);
    }
}
