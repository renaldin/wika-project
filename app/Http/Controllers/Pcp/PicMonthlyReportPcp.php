<?php

namespace App\Http\Controllers\Pcp;

use App\Http\Controllers\Controller;
use App\Models\ModelUser;
use App\Models\PicMonthlyReportPcps;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PicMonthlyReportPcp extends Controller
{

    private $ModelUser;

    public function __construct()
    {
        $this->ModelUser = new ModelUser();
    }

    public function index($id_monthly_report_pcp, $jenis_dokumen)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        if ($jenis_dokumen == 'evaluasi_hasil_usaha') {
            $dokumen = 'Evaluasi Hasil Usaha';
        } else if($jenis_dokumen == 'laporan_lc') {
            $dokumen = 'Laporan LC';
        } else if ($jenis_dokumen == 'laporan_vendor') {
            $dokumen = 'Laporan Vendor';
        } else if ($jenis_dokumen == 'update_inventaris') {
            $dokumen = 'Update Inventaris';
        } else if ($jenis_dokumen == 'laporan_bulanan_ikn') {
            $dokumen = 'Laporan Bulanan IKN';
        } else if ($jenis_dokumen == 'prognosa_hasil_usaha') {
            $dokumen = 'Prognosa Hasil Usaha';
        } else if ($jenis_dokumen == 'ms_project_file') {
            $dokumen = 'Ms. Project';
        } else if ($jenis_dokumen == 'Laporan Upaya Klaim') {
            $dokumen = 'Laporan Upaya Klaim';
        } else if ($jenis_dokumen == 'laporan_potob') {
            $dokumen = 'Laporan Potob & SPI';
        }
        
        $data = [
            'title'                         => 'PIC Monthly Report PCP',
            'subTitle'                      => $dokumen,
            'daftarPicMonthlyReport'        => PicMonthlyReportPcps::with('pic')->where('id_monthly_report_pcp', $id_monthly_report_pcp)->where('jenis_dokumen', $dokumen)->get(),
            'id_monthly_report_pcp'         => $id_monthly_report_pcp,
            'jenis_dokumen'                 => $jenis_dokumen,
            'user'                          => $this->ModelUser->detail(Session()->get('id_user')),
        ];
        
        return view('pcp.picMonthlyReport.index', $data);
    }

    public function tambah($id_monthly_report_pcp, $jenis_dokumen)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        if ($jenis_dokumen == 'evaluasi_hasil_usaha') {
            $dokumen = 'Evaluasi Hasil Usaha';
        } else if($jenis_dokumen == 'laporan_lc') {
            $dokumen = 'Laporan LC';
        } else if ($jenis_dokumen == 'laporan_vendor') {
            $dokumen = 'Laporan Vendor';
        } else if ($jenis_dokumen == 'update_inventaris') {
            $dokumen = 'Update Inventaris';
        } else if ($jenis_dokumen == 'laporan_bulanan_ikn') {
            $dokumen = 'Laporan Bulanan IKN';
        } else if ($jenis_dokumen == 'prognosa_hasil_usaha') {
            $dokumen = 'Prognosa Hasil Usaha';
        } else if ($jenis_dokumen == 'ms_project_file') {
            $dokumen = 'Ms. Project';
        } else if ($jenis_dokumen == 'Laporan Upaya Klaim') {
            $dokumen = 'Laporan Upaya Klaim';
        } else if ($jenis_dokumen == 'laporan_potob') {
            $dokumen = 'Laporan Potob & SPI';
        }

        $data = [
            'title'             => 'PIC Monthly Report PCP',
            'subTitle'          => 'Tambah Pic ' . $dokumen,
            'form'              => 'Tambah',
            'id_monthly_report_pcp' => $id_monthly_report_pcp,
            'jenis_dokumen'     => $jenis_dokumen,
            'daftarPic'         => ModelUser::whereIn('role', ['Head Office', 'Manajemen'])->get(),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        return view('pcp.picMonthlyReport.form', $data);
    }

    public function prosesTambah(Request $request)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        DB::beginTransaction();
        try {
            
            if ($request->jenis_dokumen == 'evaluasi_hasil_usaha') {
                $dokumen = 'Evaluasi Hasil Usaha';
            } else if($request->jenis_dokumen == 'laporan_lc') {
                $dokumen = 'Laporan LC';
            } else if ($request->jenis_dokumen == 'laporan_vendor') {
                $dokumen = 'Laporan Vendor';
            } else if ($request->jenis_dokumen == 'update_inventaris') {
                $dokumen = 'Update Inventaris';
            } else if ($request->jenis_dokumen == 'laporan_bulanan_ikn') {
                $dokumen = 'Laporan Bulanan IKN';
            } else if ($request->jenis_dokumen == 'prognosa_hasil_usaha') {
                $dokumen = 'Prognosa Hasil Usaha';
            } else if ($request->jenis_dokumen == 'ms_project_file') {
                $dokumen = 'Ms. Project';
            } else if ($request->jenis_dokumen == 'Laporan Upaya Klaim') {
                $dokumen = 'Laporan Upaya Klaim';
            } else if ($request->jenis_dokumen == 'laporan_potob') {
                $dokumen = 'Laporan Potob & SPI';
            }
            
            foreach ($request->pic as $item) {
                $pic = new PicMonthlyReportPcps();
                $pic->id_monthly_report_pcp   = $request->id_monthly_report_pcp;
                $pic->jenis_dokumen           = $dokumen;
                $pic->id_pic                  = $item;
                $pic->save();
            }
    
            DB::commit();
            return redirect("/pic-monthly-report/$request->id_monthly_report_pcp/$request->jenis_dokumen")->with('success', 'Data berhasil ditambahkan!');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('fail', 'Terjadi Kesalagan Sistem!');
        }
    }

    public function prosesHapus($id_pic_monthly_report_pcp)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $pic = PicMonthlyReportPcps::find($id_pic_monthly_report_pcp);
        $pic->delete();

        return back()->with('success', 'Data berhasil dihapus !');
    }
}
