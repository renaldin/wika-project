<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ModelProyek;
use App\Models\ModelTimProyek;
use App\Models\ModelMonthlyReport;
use App\Models\ModelDetailTimProyek;
use App\Models\ModelUser;
use App\Models\ModelLog;
use App\Models\ProyekUsers;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class MonthlyReport extends Controller
{

    private $ModelProyek, $ModelTimProyek, $ModelMonthlyReport, $ModelDetailTimProyek, $ModelUser;

    public function __construct()
    {
        $this->ModelProyek          = new ModelProyek();
        $this->ModelTimProyek       = new ModelTimProyek();
        $this->ModelMonthlyReport       = new ModelMonthlyReport();
        $this->ModelDetailTimProyek = new ModelDetailTimProyek();
        $this->ModelUser            = new ModelUser();
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
            'title'             => 'Monthly Report',
            'subTitle'          => 'Daftar Monthly Report',
            'daftarProyek'      => $dataProyekByUser,
            'daftarDetailTimProyek'     => $this->ModelDetailTimProyek->data(),
            'user'                      => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman Daftar Monthly Report.';
        $log->feature   = 'MONTHLY REPORT';
        $log->save();

        return view('admin.monthlyReport.index', $data);
    }

    public function check()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $proyekUser = ProyekUsers::where('id_user', Session()->get('id_user'))->get();
        $idProyek = [];
        foreach($proyekUser as $item) {
            $idProyek[] = $item->id_proyek;
        }

        $data = [
            'title'                     => 'Monthly Report',
            'subTitle'                  => 'Check Monthly Report',
            'daftarMonthlyReport'       => ModelMonthlyReport::whereIn('id_proyek', $idProyek)->whereIn('is_check', [0, 2])->orderBy('id_monthly_report', 'DESC')->get(),
            'user'                      => ModelUser::find(Session()->get('id_user')),
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman Check Monthly Report.';
        $log->feature   = 'MONTHLY REPORT';
        $log->save();

        return view('admin.monthlyReport.check', $data);
    }

    public function monitoring()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'                     => 'Monthly Report',
            'subTitle'                  => 'Monitoring Monthly Report',
            'daftarMonthlyReport'       => ModelMonthlyReport::where('is_check', 1)->orderBy('id_monthly_report', 'DESC')->get(),
            'user'                      => ModelUser::find(Session()->get('id_user')),
        ];

        return view('admin.monthlyReport.monitoring', $data);
    }

    public function validasi()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'                     => 'Monthly Report',
            'subTitle'                  => 'Validasi Monthly Report',
            'daftarMonthlyReport'       => ModelMonthlyReport::where('is_check', 2)->orderBy('id_monthly_report', 'DESC')->get(),
            'user'                      => ModelUser::find(Session()->get('id_user')),
        ];

        return view('admin.monthlyReport.validasi', $data);
    }

    public function detail($id_proyek)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'                     => 'Monthly Report',
            'subTitle'                  => 'Detail Monthly Report',
            'detail'                    => ModelProyek::find($id_proyek),
            'daftarMonthlyReport'       => ModelMonthlyReport::where('id_proyek', $id_proyek)->where('is_check', 1)->orderBy('id_monthly_report', 'DESC')->get(),
            'user'                      => ModelUser::find(Session()->get('id_user')),
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman Detail Monthly Report.';
        $log->feature   = 'MONTHLY REPORT';
        $log->save();

        return view('admin.monthlyReport.detail', $data);
    }

    public function pilihProyek()
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
            'title'             => 'Monthly Report',
            'subTitle'          => 'Pilih Proyek',
            'daftarProyek'      => $dataProyekByUser,
            'user'              => ModelUser::find(Session()->get('id_user')),
            'form'              => 'Tambah',
        ];

        return view('admin.monthlyReport.pilihProyek', $data);
    }

    public function prosesPilihProyek()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Monthly Report',
            'subTitle'          => 'Tambah Monthly Report',
            'detail'            => ModelProyek::find(Request()->id_proyek),
            'user'              => ModelUser::find(Session()->get('id_user')),
            'form'              => 'Tambah',
        ];

        return view('admin.monthlyReport.form', $data);
    }

    public function sendValidasi($id_monthly_report)
    {
        $monthlyReport = ModelMonthlyReport::find($id_monthly_report);
        $monthlyReport->is_check = 2;
        $monthlyReport->timestamps = false;
        $monthlyReport->save();

        return back()->with('success', 'Berhasil mengirimkan data ke Head Office!');
    }

    public function prosesValidasi($id_monthly_report)
    {
        $monthlyReport = ModelMonthlyReport::find($id_monthly_report);
        $monthlyReport->is_check = 1;
        $monthlyReport->id_ho = Session()->get('id_user');
        $monthlyReport->timestamps = false;

        $proyek = ModelProyek::find($monthlyReport->id_proyek);
        $proyek->realisasi             = $monthlyReport->realisasi_proyek;
        $proyek->dua_d                 = $monthlyReport->dua_d_temp;
        $proyek->tiga_d                = $monthlyReport->tiga_d_temp;
        $proyek->empat_d               = $monthlyReport->empat_d_temp;
        $proyek->lima_d                = $monthlyReport->lima_d_temp;
        $proyek->cde                   = $monthlyReport->cde_d_temp;
        $proyek->kesiapan_bim5d        = $monthlyReport->kesiapan_bim5d_temp;
        $proyek->timestamps = false;
        
        $monthlyReport->save();
        $proyek->save();

        return back()->with('success', 'Berhasil divalidasi!');
    }

    public function prosesRollback($id_monthly_report)
    {
        $monthlyReport = ModelMonthlyReport::find($id_monthly_report);
        $monthlyReport->is_check = 0;
        $monthlyReport->id_ho = Session()->get('id_user');
        $monthlyReport->timestamps = false;
        
        $monthlyReport->save();

        return back()->with('success', 'Berhasil dikembalikan!');
    }

    public function prosesTambah()
    {

        if(Request()->dua_d == 'on') {
            $dua_d = 1;
            $kesiapan_bim5d = 'Belum Siap Implementasi BIM 5D';
        } else {
            $dua_d = 0;
        }
        if(Request()->tiga_d == 'on') {
            $tiga_d = 1;
            $kesiapan_bim5d = 'Belum Siap Implementasi BIM 5D';
        } else {
            $tiga_d = 0;
        }
        if(Request()->empat_d == 'on') {
            $empat_d = 1;
            $kesiapan_bim5d = 'Persiapan Implementasi BIM 5D';
        } else {
            $empat_d = 0;
        }
        if(Request()->lima_d == 'on') {
            $lima_d = 1;
            $kesiapan_bim5d = 'Siap Implementasi BIM 5D';
        } else {
            $lima_d = 0;
        }
        if(Request()->cde == 'on') {
            $cde = 1;
        } else {
            $cde = 0;
        }

        $data = [
            'id_proyek'                         => Request()->id_proyek,
            'tanggal_report'                    => Request()->tanggal_report,
            'realisasi_proyek'                  => Request()->realisasi_proyek,
            'kendala_implementasi_bim'          => Request()->kendala_implementasi_bim,
            'engineering_issue_berjalan'        => Request()->engineering_issue_berjalan,
            'masalah_produksi_berjalan'         => Request()->masalah_produksi_berjalan,
            'konsep_lean_construction_berjalan' => Request()->konsep_lean_construction_berjalan,
            'feedback_untuk_perusahaan'         => Request()->feedback_untuk_perusahaan,
            'evidence_link'                     => Request()->evidence_link,
            'bulan_report'                      => Request()->bulan_report,
            'is_check'                          => 0,
            'dua_d_temp'                        => $dua_d,
            'tiga_d_temp'                       => $tiga_d,
            'empat_d_temp'                      => $empat_d,
            'lima_d_temp'                       => $lima_d,
            'cde_d_temp'                        => $cde,
            'kesiapan_bim5d_temp'               => $kesiapan_bim5d,
        ];

        // $dataProyek = [
        //     'id_proyek'             => Request()->id_proyek,
        //     'realisasi'             => Request()->realisasi_proyek,
        //     'dua_d'                 => $dua_d,
        //     'tiga_d'                => $tiga_d,
        //     'empat_d'               => $empat_d,
        //     'lima_d'                => $lima_d,
        //     'cde'                   => $cde,
        //     'kesiapan_bim5d'        => $kesiapan_bim5d,
        // ];

        $this->ModelMonthlyReport->tambah($data);
        // $this->ModelProyek->edit($dataProyek);

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Menambah Data Monthly Report.';
        $log->feature   = 'MONTHLY REPORT';
        $log->save();

        return redirect()->route('check-monthly-report')->with('success', 'Data Monthly Report berhasil ditambahkan!');
    }

    public function edit($id_monthly_report)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'                     => 'Monthly Report',
            'subTitle'                  => 'Edit Monthly Report',
            'form'                      => 'Edit',
            'detail'                     => $this->ModelMonthlyReport->detail($id_monthly_report),
            'user'                      => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman Form Edit Monthly Report.';
        $log->feature   = 'MONTHLY REPORT';
        $log->save();

        return view('admin.monthlyReport.form', $data);
    }

    public function editCheck($id_monthly_report)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $data = [
            'title'                     => 'Monthly Report',
            'subTitle'                  => 'Edit Check',
            'form'                      => 'Edit',
            'detail'                    => $this->ModelMonthlyReport->detail($id_monthly_report),
            'user'                      => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman Form Edit Check Monthly Report.';
        $log->feature   = 'MONTHLY REPORT';
        $log->save();

        return view('admin.monthlyReport.formCheck', $data);
    }

    public function prosesEdit($id_monthly_report)
    {

        if(Request()->dua_d == 'on') {
            $dua_d = 1;
            $kesiapan_bim5d = 'Belum Siap Implementasi BIM 5D';
        } else {
            $dua_d = 0;
        }
        if(Request()->tiga_d == 'on') {
            $tiga_d = 1;
            $kesiapan_bim5d = 'Belum Siap Implementasi BIM 5D';
        } else {
            $tiga_d = 0;
        }
        if(Request()->empat_d == 'on') {
            $empat_d = 1;
            $kesiapan_bim5d = 'Persiapan Implementasi BIM 5D';
        } else {
            $empat_d = 0;
        }
        if(Request()->lima_d == 'on') {
            $lima_d = 1;
            $kesiapan_bim5d = 'Siap Implementasi BIM 5D';
        } else {
            $lima_d = 0;
        }
        if(Request()->cde == 'on') {
            $cde = 1;
        } else {
            $cde = 0;
        }

        $data = [
            'id_monthly_report'                 => $id_monthly_report,
            'tanggal_report'                    => Request()->tanggal_report,
            'realisasi_proyek'                  => Request()->realisasi_proyek,
            'kendala_implementasi_bim'          => Request()->kendala_implementasi_bim,
            'engineering_issue_berjalan'        => Request()->engineering_issue_berjalan,
            'masalah_produksi_berjalan'         => Request()->masalah_produksi_berjalan,
            'konsep_lean_construction_berjalan' => Request()->konsep_lean_construction_berjalan,
            'feedback_untuk_perusahaan'         => Request()->feedback_untuk_perusahaan,
            'evidence_link'                     => Request()->evidence_link,
            'bulan_report'                      => Request()->bulan_report,
        ];

        $dataProyek = [
            'id_proyek'             => Request()->id_proyek,
            'realisasi'             => Request()->realisasi_proyek,
            'dua_d'                 => $dua_d,
            'tiga_d'                => $tiga_d,
            'empat_d'               => $empat_d,
            'lima_d'                => $lima_d,
            'cde'                   => $cde,
            'kesiapan_bim5d'        => $kesiapan_bim5d,
        ];

        $this->ModelMonthlyReport->edit($data);
        $this->ModelProyek->edit($dataProyek);

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Mengedit Data Monthly Report.';
        $log->feature   = 'MONTHLY REPORT';
        $log->save();

        return redirect('/detail-monthly-report/'.Request()->id_proyek)->with('success', 'Data Monthly Report berhasil diedit!');
    }

    public function prosesEditCheck($id_monthly_report)
    {

        if(Request()->dua_d_temp == 'on') {
            $dua_d_temp = 1;
            $kesiapan_bim5d_temp = 'Belum Siap Implementasi BIM 5D';
        } else {
            $dua_d_temp = 0;
        }
        if(Request()->tiga_d_temp == 'on') {
            $tiga_d_temp = 1;
            $kesiapan_bim5d_temp = 'Belum Siap Implementasi BIM 5D';
        } else {
            $tiga_d_temp = 0;
        }
        if(Request()->empat_d_temp == 'on') {
            $empat_d_temp = 1;
            $kesiapan_bim5d_temp = 'Persiapan Implementasi BIM 5D';
        } else {
            $empat_d_temp = 0;
        }
        if(Request()->lima_d_temp == 'on') {
            $lima_d_temp = 1;
            $kesiapan_bim5d_temp = 'Siap Implementasi BIM 5D';
        } else {
            $lima_d_temp = 0;
        }
        if(Request()->cde_d_temp == 'on') {
            $cde_d_temp = 1;
        } else {
            $cde_d_temp = 0;
        }

        $data = [
            'id_monthly_report'                 => $id_monthly_report,
            'tanggal_report'                    => Request()->tanggal_report,
            'realisasi_proyek'                  => Request()->realisasi_proyek,
            'kendala_implementasi_bim'          => Request()->kendala_implementasi_bim,
            'engineering_issue_berjalan'        => Request()->engineering_issue_berjalan,
            'masalah_produksi_berjalan'         => Request()->masalah_produksi_berjalan,
            'konsep_lean_construction_berjalan' => Request()->konsep_lean_construction_berjalan,
            'feedback_untuk_perusahaan'         => Request()->feedback_untuk_perusahaan,
            'evidence_link'                     => Request()->evidence_link,
            'bulan_report'                      => Request()->bulan_report,
            'dua_d_temp'                        => $dua_d_temp,
            'tiga_d_temp'                       => $tiga_d_temp,
            'empat_d_temp'                      => $empat_d_temp,
            'lima_d_temp'                       => $lima_d_temp,
            'cde_d_temp'                        => $cde_d_temp,
            'kesiapan_bim5d_temp'               => $kesiapan_bim5d_temp,
        ];

        $this->ModelMonthlyReport->edit($data);

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Mengedit Data Monthly Report.';
        $log->feature   = 'MONTHLY REPORT';
        $log->save();

        return redirect()->route('check-monthly-report')->with('success', 'Data Monthly Report berhasil diedit!');
    }

    public function prosesHapus($id_monthly_report)
    {
        $this->ModelMonthlyReport->hapus($id_monthly_report);

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Menghapus Data Monthly Report.';
        $log->feature   = 'MONTHLY REPORT';
        $log->save();

        return back()->with('success', 'Data Monthly Report berhasil dihapus !');
    }

    public function exportExcel($id_proyek = null)
    {
        $data = $this->ModelMonthlyReport->data();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Nama Proyek');
        $sheet->setCellValue('C1', 'Realisasi Proyek');
        $sheet->setCellValue('D1', 'Kendala Implementasi BIM');
        $sheet->setCellValue('E1', 'Engineering Issue Berjalan');
        $sheet->setCellValue('F1', 'Masalah Produksi Berjalan');
        $sheet->setCellValue('G1', 'Konsep Lean Construction Berjalan');
        $sheet->setCellValue('H1', 'Feedback Untuk Perusahaan');
        $sheet->setCellValue('I1', 'Evidence Link');
        $sheet->setCellValue('J1', 'Remarks');
        $sheet->setCellValue('K1', 'Tanggal Report');

        $row = 2;
        $no = 1;
        if($id_proyek == null) {
            foreach ($data as $item) {
                $sheet->setCellValue('A' . $row, $no++);
                $sheet->setCellValue('B' . $row, $item->nama_proyek);
                $sheet->setCellValue('C' . $row, $item->realisasi_proyek);
                $sheet->setCellValue('D' . $row, $item->kendala_implementasi_bim);
                $sheet->setCellValue('E' . $row, $item->engineering_issue_berjalan);
                $sheet->setCellValue('F' . $row, $item->masalah_produksi_berjalan);
                $sheet->setCellValue('G' . $row, $item->konsep_lean_construction_berjalan);
                $sheet->setCellValue('H' . $row, $item->feedback_untuk_perusahaan);
                $sheet->setCellValue('I' . $row, $item->evidence_link);
                $sheet->setCellValue('J' . $row, $item->remarks);
                $sheet->setCellValue('K' . $row, $item->tanggal_report);
                $row++;
            }
        } else {
            foreach ($data as $item) {
                if($item->id_proyek == $id_proyek) {
                    $sheet->setCellValue('A' . $row, $no++);
                    $sheet->setCellValue('B' . $row, $item->nama_proyek);
                    $sheet->setCellValue('C' . $row, $item->realisasi_proyek);
                    $sheet->setCellValue('D' . $row, $item->kendala_implementasi_bim);
                    $sheet->setCellValue('E' . $row, $item->engineering_issue_berjalan);
                    $sheet->setCellValue('F' . $row, $item->masalah_produksi_berjalan);
                    $sheet->setCellValue('G' . $row, $item->konsep_lean_construction_berjalan);
                    $sheet->setCellValue('H' . $row, $item->feedback_untuk_perusahaan);
                    $sheet->setCellValue('I' . $row, $item->evidence_link);
                    $sheet->setCellValue('J' . $row, $item->remarks);
                    $sheet->setCellValue('K' . $row, $item->tanggal_report);
                    $row++;
                }
            }
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'monthly-report.xlsx';
        $writer->save($filename);

        return response()->download($filename)->deleteFileAfterSend(true);
    }
}
