<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DokumenTimelines;
use App\Models\ModelUser;
use App\Models\ModelProyek;
use App\Models\ModelSoftware;
use App\Models\ModelRkp;
use App\Models\ModelRkpMankon;
use App\Models\ModelDetailCsi;
use App\Models\ModelTechnicalSupporting;
use App\Models\ModelDetailLicense;
use App\Models\ModelCsi;
use App\Models\ModelRencana;
use App\Models\ModelKiKm;
use App\Models\ModelLps;
use App\Models\ModelAkhlak;
use App\Models\ModelAspekAkhlak;
use App\Models\ModelDetailAkhlak;
use App\Models\ModelDokumenLps;
use App\Models\LaporanKeuangans;
use App\Models\LaporanKeuanganDetails;
use App\Models\LaporanAkuntansis;
use App\Models\LaporanAkuntansiDetails;
use App\Models\LaporanPajaks;
use App\Models\LaporanPajakDetails;
use App\Models\LaporanQas;
use App\Models\LaporanQaDetails;
use App\Models\LaporanHses;
use App\Models\LaporanHseDetails;
use App\Models\LaporanProyeks;
use App\Models\LaporanProyekDetails;
use App\Models\ModelKategoriPekerjaan;
use App\Models\ModelMasterActivity;
use App\Models\ModelEngineeringActivity;
use App\Models\ModelLog;
use App\Models\DokumenKeuangans;
use App\Models\DokumenAkuntansis;
use App\Models\DokumenPajaks;
use App\Models\DokumenQas;
use App\Models\DokumenHses;
use App\Models\DokumenProyeks;
use App\Models\Temuans;
use App\Models\Timelines;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


use stdClass;

class DashboardMankon extends Controller
{

    private $ModelUser, $ModelProyek, $ModelSoftware, $ModelRkp, $ModelRkpMankon,$Temuans, $LaporanKeuangans, $LaporanAkuntansis, $LaporanPajaks, $LaporanProyek, $LaporanQas, $LaporanHses, $ModelDetailCsi, $ModelDetailAkhlak, $ModelTechnicalSupporting, $ModelDetailLicense, $ModelCsi, $ModelRencana, $ModelKiKm, $ModelLps, $ModelAkhlak, $ModelDokumenLps, $ModelKategoriPekerjaan, $ModelMasterActivity, $ModelEngineeringActivity;

    public function __construct()
    {
        $this->ModelUser = new ModelUser();
        $this->ModelProyek = new ModelProyek();
        $this->ModelSoftware = new ModelSoftware();
        $this->ModelRkp = new ModelRkp();
        $this->ModelRkpMankon = new ModelRkpMankon();
        $this->ModelDetailCsi = new ModelDetailCsi();
        $this->ModelDetailAkhlak = new ModelDetailAkhlak();
        $this->ModelTechnicalSupporting = new ModelTechnicalSupporting();
        $this->ModelDetailLicense = new ModelDetailLicense();
        $this->ModelCsi = new ModelCsi();
        $this->ModelRencana = new ModelRencana();
        $this->ModelKiKm = new ModelKiKm();
        $this->ModelLps = new ModelLps();
        $this->ModelAkhlak = new ModelAkhlak();
        $this->ModelDokumenLps = new ModelDokumenLps();
        $this->LaporanKeuangans = new LaporanKeuangans();
        $this->LaporanAkuntansis = new LaporanAkuntansis();
        $this->LaporanPajaks = new LaporanPajaks();
        $this->LaporanQas = new LaporanQas();
        $this->LaporanHses = new LaporanHses();
        $this->LaporanProyeks = new LaporanProyeks();
        $this->Temuans = new Temuans();
        $this->ModelKategoriPekerjaan = new ModelKategoriPekerjaan();
        $this->ModelMasterActivity = new ModelMasterActivity();
        $this->ModelEngineeringActivity = new ModelEngineeringActivity();
    }
    
    public function index(Request $request)
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }
        $user_id = session()->get('id_user');
        if (!$user_id) {
            return redirect()->route('login'); // Redirect if no user ID is found
        }
       
        $jumlahUser = $this->ModelUser->jumlahUser();
        $jumlahHeadOffice = $this->ModelUser->jumlahHeadOffice();
        $jumlahProyek = $this->ModelProyek->jumlahProyek();
        $jumlahSoftware = $this->ModelSoftware->jumlahSoftware();
        $jumlahDokumen = $this->ModelDokumenLps->jumlahData();
        $jumlahKIKM = $this->ModelKiKm->jumlahKIKM();
        $laporanKeuangan = $this->LaporanKeuangans->all();
        $jumlahDokumenLps = $jumlahDokumen['utama'] + $jumlahDokumen['pendukung'];
    
        // Data untuk pie chart
        $dokumenCharts = $this->getDokumenKeuanganCharts();
        $statusCounts = $this->getDokumenKeuanganPieChart(); 
        $dokumenKeuanganData = $this->getDokumenKeuanganPieChart();
    
        $bulan = $request->get('bulan'); // Ambil parameter bulan dari input
        $tahun = date('Y'); // Default tahun saat ini
    
        if ($request->tahun) {
            $tahun = $request->tahun;
        }
    
        // Jika bulan ada, pisahkan bulan dan tahun dari input
        if ($bulan) {
            [$tahun, $bulan] = explode('-', $bulan); // Pisahkan tahun dan bulan
        }
     
        // Ambil data dokumen keuangan untuk digunakan di header tabel
        $daftarDokumenKeuangan = DokumenKeuangans::all();
        $daftarLaporanKeuangan = LaporanKeuangans::with([
            'proyek',
            'laporanKeuanganDetails' => function ($query) {
                $query->withCount('laporanKeuanganSubDetails');
            }
            ])
            ->when($bulan, function ($query) use ($tahun, $bulan) {
                return $query->where('periode', "{$tahun}-{$bulan}"); // Filter berdasarkan periode
            })
            ->get()
            ->map(function ($laporan) use ($daftarDokumenKeuangan) {
                $statusDokumen = [];
                foreach ($daftarDokumenKeuangan as $dokumen) {
                    $detail = $laporan->laporanKeuanganDetails->firstWhere('id_dokumen_keuangans', $dokumen->id);
                    $statusDokumen[$dokumen->dokumen] = [
                        'status' => $detail ? $detail->status : null,
                        'jumlah_file' => $detail ? $detail->laporan_keuangan_sub_details_count : 0,
                        'id_laporan_keuangan_details' => $detail ? $detail->id : null,
                    ];
                }
                return (object)[
                    'id' => $laporan->id,
                    'nama_proyek' => $laporan->proyek->nama_proyek,
                    'periode' => $laporan->periode,
                    'status_dokumen' => $statusDokumen,
                ];
            });

            // Ambil data dokumen keuangan untuk digunakan di header tabel
            $daftarDokumenAkuntansi = DokumenAkuntansis::all();

            $daftarLaporanAkuntansi = LaporanAkuntansis::with([
                'proyek',
                'laporanAkuntansiDetails' => function ($query) {
                    $query->withCount('laporanAkuntansiSubDetails');
                }
                ])
                ->when($bulan, function ($query) use ($tahun, $bulan) {
                    return $query->where('periode', "{$tahun}-{$bulan}"); // Filter berdasarkan periode
                })
                ->get()
                ->map(function ($laporan) use ($daftarDokumenAkuntansi) {
                    $statusDokumen = [];
                    foreach ($daftarDokumenAkuntansi as $dokumen) {
                        $detail = $laporan->laporanAkuntansiDetails->firstWhere('id_dokumen_akuntansis', $dokumen->id);
                        $statusDokumen[$dokumen->dokumen] = [
                            'status' => $detail ? $detail->status : null,
                            'jumlah_file' => $detail ? $detail->laporan_akuntansi_sub_details_count : 0,
                            'id_laporan_akuntansi_details' => $detail ? $detail->id : null,
                        ];
                    }
                    return (object)[
                        'id' => $laporan->id,
                        'nama_proyek' => $laporan->proyek->nama_proyek,
                        'periode' => $laporan->periode,
                        'status_dokumen' => $statusDokumen,
                    ];
                });


            $daftarDokumenPajak = DokumenPajaks::all();
            $daftarLaporanPajak = LaporanPajaks::with([
                'proyek',
                'laporanPajakDetails' => function ($query) {
                    $query->withCount('laporanPajakSubDetails');
                }
                ])
                ->when($bulan, function ($query) use ($tahun, $bulan) {
                    return $query->where('periode', "{$tahun}-{$bulan}"); // Filter berdasarkan periode
                })
                ->get()
                ->map(function ($laporan) use ($daftarDokumenPajak) {
                    $statusDokumen = [];
                    foreach ($daftarDokumenPajak as $dokumen) {
                        $detail = $laporan->laporanPajakDetails->firstWhere('id_dokumen_pajaks', $dokumen->id);
                        $statusDokumen[$dokumen->dokumen] = [
                            'status' => $detail ? $detail->status : null,
                            'jumlah_file' => $detail ? $detail->laporan_pajak_sub_details_count : 0,
                            'id_laporan_pajak_details' => $detail ? $detail->id : null,
                        ];
                    }
                    return (object)[
                        'id' => $laporan->id,
                        'nama_proyek' => $laporan->proyek->nama_proyek,
                        'periode' => $laporan->periode,
                        'status_dokumen' => $statusDokumen,
                    ];
                });
        
            $daftarDokumenProyek = DokumenProyeks::all();

            $daftarLaporanProyek = LaporanProyeks::with([
                'proyek',
                'laporanProyekDetails' => function ($query) {
                    $query->withCount('laporanProyekSubDetails');
                }
                ])
                ->when($bulan, function ($query) use ($tahun, $bulan) {
                    return $query->where('periode', "{$tahun}-{$bulan}"); // Filter berdasarkan periode
                })
                ->get()
                ->map(function ($laporan) use ($daftarDokumenProyek) {
                    $statusDokumen = [];
                    foreach ($daftarDokumenProyek as $dokumen) {
                        $detail = $laporan->laporanProyekDetails->firstWhere('id_dokumen_proyeks', $dokumen->id);
                        $statusDokumen[$dokumen->dokumen] = [
                            'status' => $detail ? $detail->status : null,
                            'jumlah_file' => $detail ? $detail->laporan_proyek_sub_details_count : 0,
                            'id_laporan_proyek_details' => $detail ? $detail->id : null,
                        ];
                    }
                    return (object)[
                        'id' => $laporan->id,
                        'nama_proyek' => $laporan->proyek->nama_proyek,
                        'periode' => $laporan->periode,
                        'status_dokumen' => $statusDokumen,
                    ];
                });

                $daftarDokumenPajak = DokumenPajaks::all();
                $daftarLaporanPajak = LaporanPajaks::with([
                    'proyek',
                    'laporanPajakDetails' => function ($query) {
                        $query->withCount('laporanPajakSubDetails');
                    }
                    ])
                    ->when($bulan, function ($query) use ($tahun, $bulan) {
                        return $query->where('periode', "{$tahun}-{$bulan}"); // Filter berdasarkan periode
                    })
                    ->get()
                    ->map(function ($laporan) use ($daftarDokumenPajak) {
                        $statusDokumen = [];
                        foreach ($daftarDokumenPajak as $dokumen) {
                            $detail = $laporan->laporanPajakDetails->firstWhere('id_dokumen_pajaks', $dokumen->id);
                            $statusDokumen[$dokumen->dokumen] = [
                                'status' => $detail ? $detail->status : null,
                                'jumlah_file' => $detail ? $detail->laporan_pajak_sub_details_count : 0,
                                'id_laporan_pajak_details' => $detail ? $detail->id : null,
                            ];
                        }
                        return (object)[
                            'id' => $laporan->id,
                            'nama_proyek' => $laporan->proyek->nama_proyek,
                            'periode' => $laporan->periode,
                            'status_dokumen' => $statusDokumen,
                        ];
                    });
            

        // Eager load proyek setelah filter periode diterapkan
        $daftarDokumenQa = DokumenQas::all();
        $daftarLaporanQa = LaporanQas::with([
            'proyek',
            'laporanQaDetails' => function ($query) {
                $query->withCount('laporanQaSubDetails');
            }
            ])
            ->when($bulan, function ($query) use ($tahun, $bulan) {
                return $query->where('periode', "{$tahun}-{$bulan}"); // Filter berdasarkan periode
            })
            ->get()
            ->map(function ($laporan) use ($daftarDokumenQa) {
                $statusDokumen = [];
                foreach ($daftarDokumenQa as $dokumen) {
                    $detail = $laporan->laporanQaDetails->firstWhere('id_dokumen_qa', $dokumen->id);
                    $statusDokumen[$dokumen->dokumen] = [
                        'status' => $detail ? $detail->status : null,
                        'jumlah_file' => $detail ? $detail->laporan_qa_sub_details_count : 0,
                        'id_laporan_qa_details' => $detail ? $detail->id : null,
                    ];
                }
                return (object)[
                    'id' => $laporan->id,
                    'nama_proyek' => $laporan->proyek ? $laporan->proyek->nama_proyek : null,
                    'periode' => $laporan->periode,
                    'status_dokumen' => $statusDokumen,
                ];
            });
   
        $daftarDokumenHse = DokumenHses::all();
        $daftarLaporanHse = LaporanHses::with([
                'proyek',
                'laporanHseDetails' => function ($query) {
                    $query->withCount('laporanHseSubDetails');
                }
                ])
                ->when($bulan, function ($query) use ($tahun, $bulan) {
                    return $query->where('periode', "{$tahun}-{$bulan}"); // Filter berdasarkan periode
                })
                ->get()
                ->map(function ($laporan) use ($daftarDokumenHse) {
                    $statusDokumen = [];
                    foreach ($daftarDokumenHse as $dokumen) {
                        $detail = $laporan->laporanHseDetails->firstWhere('id_dokumen_hse', $dokumen->id);
                        $statusDokumen[$dokumen->dokumen] = [
                            'status' => $detail ? $detail->status : null,
                            'jumlah_file' => $detail ? $detail->laporan_hse_sub_details_count : 0,
                            'id_laporan_hse_details' => $detail ? $detail->id : null,
                        ];
                    }
                    return (object)[
                        'id' => $laporan->id,
                        'nama_proyek' => $laporan->proyek ? $laporan->proyek->nama_proyek : null,
                        'periode' => $laporan->periode,
                        'status_dokumen' => $statusDokumen,
                    ];
                });
       
        // Lain-lain seperti biasa
        $daftarDetailCsi = $this->ModelDetailCsi->data();
        $totalNilai = 0;
        foreach ($daftarDetailCsi as $item) {
            $nilai = $item->nilai != 0 ? round($item->nilai * $item->bobot / 100, 2) : 0;
            $totalNilai = $totalNilai + $nilai;
        }
        $akumulasiCsi = number_format($totalNilai != 0 ? $totalNilai * 5 / 5 : 0, 2);
        $jumlahCsi = $this->ModelCsi->jumlah();
    
        $persenTechnicalSupport = $this->progress('Technical Support');
        $persenKiKm = $this->progress('KI/KM');
        $progressLps = $this->ModelLps->progress();
        $dokumenLps = $this->ModelDokumenLps->jumlahData();
    
        $daftarProyek = $this->ModelProyek->dataProyek();
        $persen_0_20 = 0;
        $persen_20_50 = 0;
        $persen_50_70 = 0;
        $persen_70_99 = 0;
        $persen_100 = 0;
        foreach ($daftarProyek as $item) {
            if ($item->realisasi <= 20) {
                $persen_0_20 += 1;
            } elseif ($item->realisasi <= 50) {
                $persen_20_50 += 1;
            } elseif ($item->realisasi <= 70) {
                $persen_50_70 += 1;
            } elseif ($item->realisasi < 100) {
                $persen_70_99 += 1;
            } elseif ($item->realisasi = 100) {
                $persen_100 += 1;
            }
        }
    
        // Mengambil data Laporan Keuangan dan menghitung jumlah file terkait
        $dokumenKeuangan = LaporanKeuanganDetails::with(['dokumen'])
            ->withCount('laporanKeuanganSubDetails') // Menghitung jumlah file
            ->get();
    
        $dokumenAkuntansi = LaporanAkuntansiDetails::with(['dokumen'])
            ->withCount('laporanAkuntansiSubDetails') // Menghitung jumlah file
            ->get();
    
        $dokumenPajak = LaporanPajakDetails::with(['dokumen'])
            ->withCount('laporanPajakSubDetails') // Menghitung jumlah file
            ->get();
    
        $dokumenProyek = LaporanProyekDetails::with(['dokumen'])
            ->withCount('laporanProyekSubDetails') // Menghitung jumlah file
            ->get();
        
            $latestTemuan = Temuans::with('proyek')->orderBy('tanggal_temuan', 'desc')->take(2)->get();
            $upcomingTemuan = Temuans::with('proyek')
                                      ->whereNotNull('duedate')
                                      ->where('duedate', '>=', now()) // Deadline mendekati
                                      ->orderBy('duedate', 'asc')
                                      ->take(2)
                                      ->get();

    
        // Data untuk grafik dan status pie chart
        $dokumenKeuanganCharts = $this->getDokumenKeuanganCharts();
        $dokumenAkuntansiCharts = $this->getDokumenAkuntansiCharts();
        $statusAkuntansiCounts = $this->getDokumenAkuntansiPieChart(); 
        $dokumenPajakCharts = $this->getDokumenPajakCharts();
        $statusPajakCounts = $this->getDokumenPajakPieChart(); 
        $dokumenProyekCharts = $this->getDokumenProyekCharts();
        $statusProyekCounts = $this->getDokumenProyekPieChart(); 
        $role = Session()->get('role');
        $divisi = Session()->get('divisi');
    
        if ($role == 'Manajemen' && $divisi == 'Engineering') {
            $route          = 'engineering.admin.dashboardM';
            $user           = $this->ModelUser->detail(Session()->get('id_user'));
            $maxDokumenId   = DokumenTimelines::count();
            $select         = ['timelines.id', 'proyek.nama_proyek'];

            for ($i = 1; $i <= $maxDokumenId; $i++) {
                $select[] = DB::raw("SUM(CASE WHEN timeline_details.id_dokumen_timeline = $i THEN 1 ELSE 0 END) as jumlah_dokumen_$i");
            }

            $timelineMonitor = DB::table('timelines')
                ->join('proyek', 'timelines.id_proyek', '=', 'proyek.id_proyek')
                ->join('timeline_details', 'timelines.id', '=', 'timeline_details.id_timeline')
                ->join('timeline_sub_details', 'timeline_details.id', '=', 'timeline_sub_details.id_timeline_detail')
                ->select($select)
                ->groupBy('timelines.id', 'proyek.nama_proyek')
                ->orderBy('timelines.id')
                ->limit(400)
                ->get();

            $data = [
                'title'                 => null,
                'user'                  => $user,
                'jumlahUser'            => $jumlahUser,
                'jumlahHeadOffice'      => $jumlahHeadOffice,
                'jumlahProyek'          => $jumlahProyek,
                'jumlahKIKM'              => $jumlahKIKM,
                'jumlahSoftware'        => $jumlahSoftware,
                'jumlahDokumenLps'      => $jumlahDokumenLps,
                'daftarRkp'             => $this->ModelRkp->dataIsRespon(1),
                'daftarRkpMankon'       => $this->ModelRkpMankon->dataIsRespon(1),
                'akumulasiCsi'          => $akumulasiCsi / $jumlahCsi,
                'akumulasiTechnicalSupport' => $persenTechnicalSupport,
                'akumulasiKiKm'         => $persenKiKm,
                'proyekLps'             => $progressLps,
                'dokumenLps'            => $dokumenLps,
                'daftarProyek'          => $daftarProyek,
                'persen_0_20'               => $persen_0_20,
                'persen_20_50'              => $persen_20_50,
                'persen_50_70'              => $persen_50_70,
                'persen_70_99'             => $persen_70_99,
                'persen_100'             => $persen_100,
                'productivityJan'       => $this->productivity($tahun . '-01'),
                'productivityFeb'       => $this->productivity($tahun . '-02'),
                'productivityMar'       => $this->productivity($tahun . '-03'),
                'productivityApr'       => $this->productivity($tahun . '-04'),
                'productivityMei'       => $this->productivity($tahun . '-05'),
                'productivityJun'       => $this->productivity($tahun . '-06'),
                'productivityJul'       => $this->productivity($tahun . '-07'),
                'productivityAug'       => $this->productivity($tahun . '-08'),
                'productivitySep'       => $this->productivity($tahun . '-09'),
                'productivityOct'       => $this->productivity($tahun . '-10'),
                'productivityNov'       => $this->productivity($tahun . '-11'),
                'productivityDes'       => $this->productivity($tahun . '-12'),
                'bukanPrioritas'        => $this->ModelProyek->jumlah('Bukan Prioritas'),
                'prioritas1'            => $this->ModelProyek->jumlah('Prioritas 1'),
                'prioritas2'            => $this->ModelProyek->jumlah('Prioritas 2'),
                'prioritas3'            => $this->ModelProyek->jumlah('Prioritas 3'),
                'realisasiPrioritas1'   => $this->prioritasProyek('Prioritas 1'),
                'realisasiPrioritas2'   => $this->prioritasProyek('Prioritas 2'),
                'realisasiPrioritas3'   => $this->prioritasProyek('Prioritas 3'),
                'realisasiBukanPrioritas' => $this->prioritasProyek('Bukan Prioritas'),
                'chartLicense'          => $this->ModelDetailLicense->progress(),
                'tahun'                 => $tahun,
                'timelineMonitor'       => $timelineMonitor,
                'dokumenTimeline'       => DokumenTimelines::get(),
                'subTitle'              => 'Dashboard',
            ];
        };
        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman Dashboard.';
        $log->feature   = 'DASHBOARD';
        $log->save();
      
        return view($route, $data);
    }

    public function progress($tipe)
    {
        if ($tipe == 'Technical Support') {
            $dataRencanaTechnicalSupport = $this->ModelRencana->checkData('Technical Supporting', date('Y'));
            // dd($dataRencanaTechnicalSupport);
            $detailProgress = $this->ModelTechnicalSupporting->progress(date('Y'));

            $realisasiJan = $detailProgress['januari']->realisasi;
            $realisasiFeb = $realisasiJan + $detailProgress['februari']->realisasi;
            $realisasiMar = $realisasiFeb + $detailProgress['maret']->realisasi;
            $realisasiApr = $realisasiMar + $detailProgress['april']->realisasi;
            $realisasiMei = $realisasiApr + $detailProgress['mei']->realisasi;
            $realisasiJun = $realisasiMei + $detailProgress['juni']->realisasi;
            $realisasiJul = $realisasiJun + $detailProgress['juli']->realisasi;
            $realisasiAgu = $realisasiJul + $detailProgress['agustus']->realisasi;
            $realisasiSep = $realisasiAgu + $detailProgress['september']->realisasi;
            $realisasiOkt = $realisasiSep + $detailProgress['oktober']->realisasi;
            $realisasiNov = $realisasiOkt + $detailProgress['november']->realisasi;
            $realisasiDes = $realisasiNov + $detailProgress['desember']->realisasi;

            if (date('m') == '01') {
                $rencana = $dataRencanaTechnicalSupport ? $dataRencanaTechnicalSupport->januari : 0;
                $realisasi = $realisasiJan;
            } elseif (date('m') == '02') {
                $rencana = $dataRencanaTechnicalSupport ? $dataRencanaTechnicalSupport->februari : 0;
                $realisasi = $realisasiFeb;
            } elseif (date('m') == '03') {
                $rencana = $dataRencanaTechnicalSupport ? $dataRencanaTechnicalSupport->maret : 0;
                $realisasi = $realisasiMar;
            } elseif (date('m') == '04') {
                $rencana = $dataRencanaTechnicalSupport ? $dataRencanaTechnicalSupport->april : 0;
                $realisasi = $realisasiApr;
            } elseif (date('m') == '05') {
                $rencana = $dataRencanaTechnicalSupport ? $dataRencanaTechnicalSupport->mei : 0;
                $realisasi = $realisasiMei;
            } elseif (date('m') == '06') {
                $rencana = $dataRencanaTechnicalSupport ? $dataRencanaTechnicalSupport->juni : 0;
                $realisasi = $realisasiJun;
            } elseif (date('m') == '07') {
                $rencana = $dataRencanaTechnicalSupport ? $dataRencanaTechnicalSupport->juli : 0;
                $realisasi = $realisasiJul;
            } elseif (date('m') == '08') {
                $rencana = $dataRencanaTechnicalSupport ? $dataRencanaTechnicalSupport->agustus : 0;
                $realisasi = $realisasiAgu;
            } elseif (date('m') == '09') {
                $rencana = $dataRencanaTechnicalSupport ? $dataRencanaTechnicalSupport->september : 0;
                $realisasi = $realisasiSep;
            } elseif (date('m') == '10') {
                $rencana = $dataRencanaTechnicalSupport ? $dataRencanaTechnicalSupport->oktober : 0;
                $realisasi = $realisasiOkt;
            } elseif (date('m') == '11') {
                $rencana = $dataRencanaTechnicalSupport ? $dataRencanaTechnicalSupport->november : 0;
                $realisasi = $realisasiNov;
            } elseif (date('m') == '12') {
                $rencana = $dataRencanaTechnicalSupport ? $dataRencanaTechnicalSupport->desember : 0;
                $realisasi = $realisasiDes;
            }

            return $rencana != 0 ? round($realisasi / $rencana * 100, 1) : 0;
        } elseif ($tipe == 'KI/KM') {
            $detailProgress = $this->ModelKiKm->progress(date('Y'));
            $rencanaKiKm = $this->ModelRencana->checkData('KI/KM', date('Y'));

            $realisasiJan = $detailProgress['januari']->realisasi;
            $realisasiFeb = $realisasiJan + $detailProgress['februari']->realisasi;
            $realisasiMar = $realisasiFeb + $detailProgress['maret']->realisasi;
            $realisasiApr = $realisasiMar + $detailProgress['april']->realisasi;
            $realisasiMei = $realisasiApr + $detailProgress['mei']->realisasi;
            $realisasiJun = $realisasiMei + $detailProgress['juni']->realisasi;
            $realisasiJul = $realisasiJun + $detailProgress['juli']->realisasi;
            $realisasiAgu = $realisasiJul + $detailProgress['agustus']->realisasi;
            $realisasiSep = $realisasiAgu + $detailProgress['september']->realisasi;
            $realisasiOkt = $realisasiSep + $detailProgress['oktober']->realisasi;
            $realisasiNov = $realisasiOkt + $detailProgress['november']->realisasi;
            $realisasiDes = $realisasiNov + $detailProgress['desember']->realisasi;

            if ($rencanaKiKm) {
                $rencanaKiKm = $rencanaKiKm;
            } else {
                $rencanaKiKm = new stdClass();
                $rencanaKiKm->januari = 0;
                $rencanaKiKm->februari = 0;
                $rencanaKiKm->maret = 0;
                $rencanaKiKm->april = 0;
                $rencanaKiKm->mei = 0;
                $rencanaKiKm->juni = 0;
                $rencanaKiKm->juli = 0;
                $rencanaKiKm->agustus = 0;
                $rencanaKiKm->september = 0;
                $rencanaKiKm->oktober = 0;
                $rencanaKiKm->november = 0;
                $rencanaKiKm->desember = 0;
            }

            if (date('m') == '01') {
                $rencana = $rencanaKiKm->januari;
                $realisasi = $realisasiJan;
            } elseif (date('m') == '02') {
                $rencana = $rencanaKiKm->februari;
                $realisasi = $realisasiFeb;
            } elseif (date('m') == '03') {
                $rencana = $rencanaKiKm->maret;
                $realisasi = $realisasiMar;
            } elseif (date('m') == '04') {
                $rencana = $rencanaKiKm->april;
                $realisasi = $realisasiApr;
            } elseif (date('m') == '05') {
                $rencana = $rencanaKiKm->mei;
                $realisasi = $realisasiMei;
            } elseif (date('m') == '06') {
                $rencana = $rencanaKiKm->juni;
                $realisasi = $realisasiJun;
            } elseif (date('m') == '07') {
                $rencana = $rencanaKiKm->juli;
                $realisasi = $realisasiJul;
            } elseif (date('m') == '08') {
                $rencana = $rencanaKiKm->agustus;
                $realisasi = $realisasiAgu;
            } elseif (date('m') == '09') {
                $rencana = $rencanaKiKm->september;
                $realisasi = $realisasiSep;
            } elseif (date('m') == '10') {
                $rencana = $rencanaKiKm->oktober;
                $realisasi = $realisasiOkt;
            } elseif (date('m') == '11') {
                $rencana = $rencanaKiKm->november;
                $realisasi = $realisasiNov;
            } elseif (date('m') == '12') {
                $rencana = $rencanaKiKm->desember;
                $realisasi = $realisasiDes;
            }

            return $rencana == 0 ? 0 : round($realisasi / $rencana * 100, 1);
        }
    }

    private function getDokumenProyekPieChart()
    {
        // Initialize status counts
        $statusProyekCounts = [
            'Pending' => 0,    // Status untuk null
            'Disetujui' => 0,  // Status untuk 1
            'Ditolak' => 0,    // Status untuk 0
        ];

        // Fetch status counts from laporan_keuangan_details table
        $dokumenProyeks = DB::table('laporan_proyek_details')->select('status')->get();

        // Count statuses using a foreach loop
        foreach ($dokumenProyeks as $dokumen) {
            // Use a switch statement for better readability
            switch (true) {
                case is_null($dokumen->status):
                    $statusProyekCounts['Pending']++;
                    break;
                case $dokumen->status === 1:
                    $statusProyekCounts['Disetujui']++;
                    break;
                case $dokumen->status === 0:
                    $statusProyekCounts['Ditolak']++;
                    break;
            }
        }

        return $statusProyekCounts;
    }
    
    public function productivity($bulan)
    {
        $daftarKategoriPekerjaan = $this->ModelKategoriPekerjaan->dataFungsi();
        $masterActivity          = $this->ModelMasterActivity->masterFungsi($bulan);
        $activity                = $this->ModelEngineeringActivity->dataProductivityTeam($bulan);
        //   dd($activity);
        $totalSubtotal = 0;
        $totalWork = 0;
        foreach ($daftarKategoriPekerjaan as $item) {
            if ($item->fungsi !== null) {
                $subTotal = 0;
                $totalWorkHours = 0;
                foreach ($masterActivity as $row) {
                    if ($row->fungsi == $item->fungsi) {
                        $totalWorkHours = $totalWorkHours + $row->work_hours;
                    }
                }
                foreach ($activity as $row) {
                    if ($row->validasi == 1) {
                        if ($row->fungsi == $item->fungsi) {
                            $subTotal = $subTotal + $row->jumlah_durasi;
                        }
                    }
                }
                if ($totalWorkHours == 0) {
                    $persen = 0;
                } else {
                    $persen = round(($subTotal / $totalWorkHours) * 100, 1);
                }

                $totalSubtotal = $totalSubtotal + $subTotal;
                $totalWork = $totalWork + $totalWorkHours;
            }
        }

        return  round($totalWork == 0 ? 0 : ($totalSubtotal / $totalWork) * 100);
    }

    public function prioritasProyek($prioritas)
    {
        $daftarProyek = $this->ModelProyek->prioritas($prioritas);
        $jumlahProyekByPrioritas = $this->ModelProyek->jumlah($prioritas);

        $prioritas = 0;
        foreach ($daftarProyek as $item) {
            $prioritas += $item->realisasi;
        }

        return $jumlahProyekByPrioritas != 0 ? round($prioritas / $jumlahProyekByPrioritas, 2) : 0;
    }

    public function akhlak()
    {
        if (!Session()->get('role')) {
            return redirect()->route('login');
        }

        $user = $this->ModelUser->detail(Session()->get('id_user'));

        $data = [
            'title'                     => 'Transformation Space',
            'subTitle'                  => 'Pengisian Perilaku Akhlak',
            'akhlak'                    => true,
            'daftarAkhlak'              => $this->ModelAkhlak->data(),
            'user'                      => $this->ModelUser->detail(Session()->get('id_user')),
        ];

        $log            = new ModelLog();
        $log->id_user   = Session()->get('id_user');
        $log->activity  = 'Melihat Halaman Spesifik Akhlak';
        $log->feature   = 'Akhlak';
        $log->save();

        return view('Divisi.index', $data);
    }

    private function getDokumenKeuanganCharts()
    {
        // Inisialisasi array untuk menyimpan hasil per id_dokumen_keuangans
        $chartsData = [];
    
        // Ambil semua data laporan_keuangan_details dan kelompokkan berdasarkan id_dokumen_keuangans
        $dokumenKeuanganDetails = DB::table('laporan_keuangan_details')
            ->select('id_dokumen_keuangans', 'status')
            ->get()
            ->groupBy('id_dokumen_keuangans');
    
        // Loop melalui setiap id_dokumen_keuangans untuk menghitung jumlah status
        foreach ($dokumenKeuanganDetails as $idDokumenKeuangan => $details) {
            $statusCounts = [
                'Pending' => 0,
                'Disetujui' => 0,
                'Ditolak' => 0,
            ];
    
            foreach ($details as $detail) {
                if (is_null($detail->status)) {
                    $statusCounts['Pending']++;
                } elseif ($detail->status == 1) {
                    $statusCounts['Disetujui']++;
                } elseif ($detail->status == 0) {
                    $statusCounts['Ditolak']++;
                }
            }
    
            // Simpan data status per id_dokumen_keuangans
            $chartsData[$idDokumenKeuangan] = $statusCounts;
        }
    
        return $chartsData;
    }

    private function getDokumenAkuntansiCharts()
    {
        // Inisialisasi array untuk menyimpan hasil per id_dokumen_keuangans
        $chartsData = [];
    
        // Ambil semua data laporan_keuangan_details dan kelompokkan berdasarkan id_dokumen_keuangans
        $dokumenAkuntansiDetails = DB::table('laporan_akuntansi_details')
            ->select('id_dokumen_akuntansis', 'status')
            ->get()
            ->groupBy('id_dokumen_akuntansis');
    
        // Loop melalui setiap id_dokumen_keuangans untuk menghitung jumlah status
        foreach ($dokumenAkuntansiDetails as $idDokumenAkuntansi => $details) {
            $statusAkuntansiCounts = [
                'Pending' => 0,
                'Disetujui' => 0,
                'Ditolak' => 0,
            ];
    
            foreach ($details as $detail) {
                if (is_null($detail->status)) {
                    $statusAkuntansiCounts['Pending']++;
                } elseif ($detail->status == 1) {
                    $statusAkuntansiCounts['Disetujui']++;
                } elseif ($detail->status == 0) {
                    $statusAkuntansiCounts['Ditolak']++;
                }
            }
    
            // Simpan data status per id_dokumen_keuangans
            $chartsData[$idDokumenAkuntansi] = $statusAkuntansiCounts;
        }
    
        return $chartsData;
    }

    private function getDokumenPajakCharts()
    {
        // Inisialisasi array untuk menyimpan hasil per id_dokumen_keuangans
        $chartsData = [];
    
        // Ambil semua data laporan_keuangan_details dan kelompokkan berdasarkan id_dokumen_keuangans
        $dokumenPajakDetails = DB::table('laporan_pajak_details')
            ->select('id_dokumen_pajaks', 'status')
            ->get()
            ->groupBy('id_dokumen_pajaks');
    
        // Loop melalui setiap id_dokumen_keuangans untuk menghitung jumlah status
        foreach ($dokumenPajakDetails as $idDokumenPajak => $details) {
            $statusPajakCounts = [
                'Pending' => 0,
                'Disetujui' => 0,
                'Ditolak' => 0,
            ];
    
            foreach ($details as $detail) {
                if (is_null($detail->status)) {
                    $statusPajakCounts['Pending']++;
                } elseif ($detail->status == 1) {
                    $statusPajakCounts['Disetujui']++;
                } elseif ($detail->status == 0) {
                    $statusPajakCounts['Ditolak']++;
                }
            }
    
            // Simpan data status per id_dokumen_keuangans
            $chartsData[$idDokumenPajak] = $statusPajakCounts;
        }
    
        return $chartsData;
    }

    private function getDokumenProyekCharts()
    {
        // Inisialisasi array untuk menyimpan hasil per id_dokumen_keuangans
        $chartsData = [];
    
        // Ambil semua data laporan_keuangan_details dan kelompokkan berdasarkan id_dokumen_keuangans
        $dokumenProyekDetails = DB::table('laporan_proyek_details')
            ->select('id_dokumen_proyeks', 'status')
            ->get()
            ->groupBy('id_dokumen_proyeks');
    
        // Loop melalui setiap id_dokumen_keuangans untuk menghitung jumlah status
        foreach ($dokumenProyekDetails as $idDokumenProyek => $details) {
            $statusProyekCounts = [
                'Pending' => 0,
                'Disetujui' => 0,
                'Ditolak' => 0,
            ];
    
            foreach ($details as $detail) {
                if (is_null($detail->status)) {
                    $statusProyekCounts['Pending']++;
                } elseif ($detail->status == 1) {
                    $statusProyekCounts['Disetujui']++;
                } elseif ($detail->status == 0) {
                    $statusProyekCounts['Ditolak']++;
                }
            }
    
            // Simpan data status per id_dokumen_keuangans
            $chartsData[$idDokumenProyek] = $statusProyekCounts;
        }
    
        return $chartsData;
    }

    private function getDokumenKeuanganPieChart()
    {
        // Initialize status counts
        $statusCounts = [
            'Pending' => 0,    // Status untuk null
            'Disetujui' => 0,  // Status untuk 1
            'Ditolak' => 0,    // Status untuk 0
        ];

        // Fetch status counts from laporan_keuangan_details table
        $dokumenKeuangans = DB::table('laporan_keuangan_details')->select('status')->get();

        // Count statuses using a foreach loop
        foreach ($dokumenKeuangans as $dokumen) {
            // Use a switch statement for better readability
            switch (true) {
                case is_null($dokumen->status):
                    $statusCounts['Pending']++;
                    break;
                case $dokumen->status === 1:
                    $statusCounts['Disetujui']++;
                    break;
                case $dokumen->status === 0:
                    $statusCounts['Ditolak']++;
                    break;
            }
        }

        return $statusCounts;
    }
    
    private function getDokumenAkuntansiPieChart()
    {
        // Initialize status counts
        $statusAkuntansiCounts = [
            'Pending' => 0,    // Status untuk null
            'Disetujui' => 0,  // Status untuk 1
            'Ditolak' => 0,    // Status untuk 0
        ];

        // Fetch status counts from laporan_keuangan_details table
        $dokumenAkuntansis = DB::table('laporan_akuntansi_details')->select('status')->get();

        // Count statuses using a foreach loop
        foreach ($dokumenAkuntansis as $dokumen) {
            // Use a switch statement for better readability
            switch (true) {
                case is_null($dokumen->status):
                    $statusAkuntansiCounts['Pending']++;
                    break;
                case $dokumen->status === 1:
                    $statusAkuntansiCounts['Disetujui']++;
                    break;
                case $dokumen->status === 0:
                    $statusAkuntansiCounts['Ditolak']++;
                    break;
            }
        }

        return $statusAkuntansiCounts;
    }

    private function getDokumenPajakPieChart()
    {
        // Initialize status counts
        $statusPajakCounts = [
            'Pending' => 0,    // Status untuk null
            'Disetujui' => 0,  // Status untuk 1
            'Ditolak' => 0,    // Status untuk 0
        ];

        // Fetch status counts from laporan_keuangan_details table
        $dokumenPajaks = DB::table('laporan_pajak_details')->select('status')->get();

        // Count statuses using a foreach loop
        foreach ($dokumenPajaks as $dokumen) {
            // Use a switch statement for better readability
            switch (true) {
                case is_null($dokumen->status):
                    $statusPajakCounts['Pending']++;
                    break;
                case $dokumen->status === 1:
                    $statusPajakCounts['Disetujui']++;
                    break;
                case $dokumen->status === 0:
                    $statusPajakCounts['Ditolak']++;
                    break;
            }
        }

        return $statusPajakCounts;
    }

}