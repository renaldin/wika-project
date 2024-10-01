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
use App\Models\ModelKategoriPekerjaan;
use App\Models\ModelMasterActivity;
use App\Models\ModelEngineeringActivity;
use App\Models\ModelLog;
use App\Models\Timelines;
use Illuminate\Support\Facades\DB;
use stdClass;

class Dashboard extends Controller
{

    private $ModelUser, $ModelProyek, $ModelSoftware, $ModelRkp, $ModelRkpMankon, $ModelDetailCsi, $ModelDetailAkhlak, $ModelTechnicalSupporting, $ModelDetailLicense, $ModelCsi, $ModelRencana, $ModelKiKm, $ModelLps, $ModelAkhlak, $ModelDokumenLps, $ModelKategoriPekerjaan, $ModelMasterActivity, $ModelEngineeringActivity;

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
        $this->ModelKategoriPekerjaan = new ModelKategoriPekerjaan();
        $this->ModelMasterActivity = new ModelMasterActivity();
        $this->ModelEngineeringActivity = new ModelEngineeringActivity();
    }

    public function index()
    {

        if (!Session()->get('role')) {
            return redirect()->route('login');
        }
        $user_id = session()->get('id_user');
        if (!$user_id) {
            return redirect()->route('login'); // Redirect if no user ID is found
        }
        $tahun = date('Y');
        if (Request()->tahun) {
            $tahun = Request()->tahun;
        }

        $jumlahUser = $this->ModelUser->jumlahUser();
        $jumlahHeadOffice = $this->ModelUser->jumlahHeadOffice();
        $jumlahProyek = $this->ModelProyek->jumlahProyek();
        $jumlahSoftware = $this->ModelSoftware->jumlahSoftware();
        $jumlahDokumen = $this->ModelDokumenLps->jumlahData();
        $jumlahDokumenLps = $jumlahDokumen['utama'] + $jumlahDokumen['pendukung'];

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
        $persen_0_30 = 0;
        $persen_30_50 = 0;
        $persen_50_70 = 0;
        $persen_70_100 = 0;
        foreach ($daftarProyek as $item) {
            if ($item->realisasi <= 30) {
                $persen_0_30 += 1;
            } elseif ($item->realisasi <= 50) {
                $persen_30_50 += 1;
            } elseif ($item->realisasi <= 70) {
                $persen_50_70 += 1;
            } elseif ($item->realisasi <= 100) {
                $persen_70_100 += 1;
            }
        }

        $role = Session()->get('role');
        $divisi = Session()->get('divisi');

        if ($role == 'Admin' && $divisi == 'Engineering') {
            $route = 'engineering.admin.dashboard';
            $user = $this->ModelUser->detail(Session()->get('id_user'));
            $data = [
                'title'                     => null,
                'user'                      => $user,
                'jumlahUser'                => $jumlahUser,
                'jumlahHeadOffice'          => $jumlahHeadOffice,
                'jumlahProyek'              => $jumlahProyek,
                'jumlahSoftware'            => $jumlahSoftware,
                'jumlahDokumenLps'          => $jumlahDokumenLps,
                'daftarRkp'                 => $this->ModelRkp->dataIsRespon(1),
                'daftarRkpMankon'           => $this->ModelRkpMankon->dataIsRespon(1),
                'akumulasiCsi'              => $akumulasiCsi / $jumlahCsi,
                'akumulasiTechnicalSupport' => $persenTechnicalSupport,
                'akumulasiKiKm'             => $persenKiKm,
                'proyekLps'                 => $progressLps,
                'dokumenLps'                => $dokumenLps,
                'daftarProyek'              => $daftarProyek,
                'persen_0_30'               => $persen_0_30,
                'persen_30_50'              => $persen_30_50,
                'persen_50_70'              => $persen_50_70,
                'persen_70_100'             => $persen_70_100,
                'productivityJan'           => $this->productivity($tahun . '-01'),
                'productivityFeb'           => $this->productivity($tahun . '-02'),
                'productivityMar'           => $this->productivity($tahun . '-03'),
                'productivityApr'           => $this->productivity($tahun . '-04'),
                'productivityMei'           => $this->productivity($tahun . '-05'),
                'productivityJun'           => $this->productivity($tahun . '-06'),
                'productivityJul'           => $this->productivity($tahun . '-07'),
                'productivityAug'           => $this->productivity($tahun . '-08'),
                'productivitySep'           => $this->productivity($tahun . '-09'),
                'productivityOct'           => $this->productivity($tahun . '-10'),
                'productivityNov'           => $this->productivity($tahun . '-11'),
                'productivityDes'           => $this->productivity($tahun . '-12'),
                'bukanPrioritas'            => $this->ModelProyek->jumlah('Bukan Prioritas'),
                'prioritas1'                => $this->ModelProyek->jumlah('Prioritas 1'),
                'prioritas2'                => $this->ModelProyek->jumlah('Prioritas 2'),
                'prioritas3'                => $this->ModelProyek->jumlah('Prioritas 3'),
                'realisasiPrioritas1'       => $this->prioritasProyek('Prioritas 1'),
                'realisasiPrioritas2'       => $this->prioritasProyek('Prioritas 2'),
                'realisasiPrioritas3'       => $this->prioritasProyek('Prioritas 3'),
                'realisasiBukanPrioritas'   => $this->prioritasProyek('Bukan Prioritas'),
                'chartLicense'              => $this->ModelDetailLicense->progress(),
                'tahun'                     => $tahun,
                'subTitle'                  => 'Dashboard',
            ];
        } elseif ($role == 'Divisi') {
            $route = 'Divisi.index';
            $user = $this->ModelUser->detail(Session()->get('id_user'));
            $daftarAkhlak = $this->ModelAkhlak->data();
            $daftarDetailAkhlak = $this->ModelDetailAkhlak->data();
            $data = [
                'title'                 => null,
                'user'                  => $user,
                'jumlahUser'                => $jumlahUser,
                'jumlahHeadOffice'          => $jumlahHeadOffice,
                'jumlahProyek'              => $jumlahProyek,
                'jumlahSoftware'            => $jumlahSoftware,
                'jumlahDokumenLps'          => $jumlahDokumenLps,
                'daftarRkp'                 => $this->ModelRkp->dataIsRespon(1),
                'daftarRkpMankon'           => $this->ModelRkpMankon->dataIsRespon(1),
                'akumulasiCsi'              => $akumulasiCsi / $jumlahCsi,
                'akumulasiTechnicalSupport' => $persenTechnicalSupport,
                'akumulasiKiKm'             => $persenKiKm,
                'proyekLps'                 => $progressLps,
                'dokumenLps'                => $dokumenLps,
                'daftarProyek'              => $daftarProyek,
                'persen_0_30'               => $persen_0_30,
                'persen_30_50'              => $persen_30_50,
                'persen_50_70'              => $persen_50_70,
                'persen_70_100'             => $persen_70_100,
                'productivityJan'           => $this->productivity($tahun . '-01'),
                'productivityFeb'           => $this->productivity($tahun . '-02'),
                'productivityMar'           => $this->productivity($tahun . '-03'),
                'productivityApr'           => $this->productivity($tahun . '-04'),
                'productivityMei'           => $this->productivity($tahun . '-05'),
                'productivityJun'           => $this->productivity($tahun . '-06'),
                'productivityJul'           => $this->productivity($tahun . '-07'),
                'productivityAug'           => $this->productivity($tahun . '-08'),
                'productivitySep'           => $this->productivity($tahun . '-09'),
                'productivityOct'           => $this->productivity($tahun . '-10'),
                'productivityNov'           => $this->productivity($tahun . '-11'),
                'productivityDes'           => $this->productivity($tahun . '-12'),
                'bukanPrioritas'            => $this->ModelProyek->jumlah('Bukan Prioritas'),
                'prioritas1'                => $this->ModelProyek->jumlah('Prioritas 1'),
                'prioritas2'                => $this->ModelProyek->jumlah('Prioritas 2'),
                'prioritas3'                => $this->ModelProyek->jumlah('Prioritas 3'),
                'realisasiPrioritas1'       => $this->prioritasProyek('Prioritas 1'),
                'realisasiPrioritas2'       => $this->prioritasProyek('Prioritas 2'),
                'realisasiPrioritas3'       => $this->prioritasProyek('Prioritas 3'),
                'realisasiBukanPrioritas'   => $this->prioritasProyek('Bukan Prioritas'),
                'chartLicense'              => $this->ModelDetailLicense->progress(),
                'tahun'                     => $tahun,
                'subTitle'              => 'Dashboard',
                'daftarAkhlak' => $daftarAkhlak,
            ];
        } elseif ($role == 'HC') {
            $route = 'Divisi.changeLeader';
            $user = $this->ModelUser->detail(Session()->get('id_user'));
            $daftarAkhlak = $this->ModelAkhlak->data();
            $daftarDetailAkhlak = $this->ModelDetailAkhlak->data();
            $data = [
                'title'                 => null,
                'user'                  => $user,
                'jumlahUser'                => $jumlahUser,
                'jumlahHeadOffice'          => $jumlahHeadOffice,
                'jumlahProyek'              => $jumlahProyek,
                'jumlahSoftware'            => $jumlahSoftware,
                'jumlahDokumenLps'          => $jumlahDokumenLps,
                'daftarRkp'                 => $this->ModelRkp->dataIsRespon(1),
                'daftarRkpMankon'           => $this->ModelRkpMankon->dataIsRespon(1),
                'akumulasiCsi'              => $akumulasiCsi / $jumlahCsi,
                'akumulasiTechnicalSupport' => $persenTechnicalSupport,
                'akumulasiKiKm'             => $persenKiKm,
                'proyekLps'                 => $progressLps,
                'dokumenLps'                => $dokumenLps,
                'daftarProyek'              => $daftarProyek,
                'persen_0_30'               => $persen_0_30,
                'persen_30_50'              => $persen_30_50,
                'persen_50_70'              => $persen_50_70,
                'persen_70_100'             => $persen_70_100,
                'productivityJan'           => $this->productivity($tahun . '-01'),
                'productivityFeb'           => $this->productivity($tahun . '-02'),
                'productivityMar'           => $this->productivity($tahun . '-03'),
                'productivityApr'           => $this->productivity($tahun . '-04'),
                'productivityMei'           => $this->productivity($tahun . '-05'),
                'productivityJun'           => $this->productivity($tahun . '-06'),
                'productivityJul'           => $this->productivity($tahun . '-07'),
                'productivityAug'           => $this->productivity($tahun . '-08'),
                'productivitySep'           => $this->productivity($tahun . '-09'),
                'productivityOct'           => $this->productivity($tahun . '-10'),
                'productivityNov'           => $this->productivity($tahun . '-11'),
                'productivityDes'           => $this->productivity($tahun . '-12'),
                'bukanPrioritas'            => $this->ModelProyek->jumlah('Bukan Prioritas'),
                'prioritas1'                => $this->ModelProyek->jumlah('Prioritas 1'),
                'prioritas2'                => $this->ModelProyek->jumlah('Prioritas 2'),
                'prioritas3'                => $this->ModelProyek->jumlah('Prioritas 3'),
                'realisasiPrioritas1'       => $this->prioritasProyek('Prioritas 1'),
                'realisasiPrioritas2'       => $this->prioritasProyek('Prioritas 2'),
                'realisasiPrioritas3'       => $this->prioritasProyek('Prioritas 3'),
                'realisasiBukanPrioritas'   => $this->prioritasProyek('Bukan Prioritas'),
                'chartLicense'              => $this->ModelDetailLicense->progress(),
                'tahun'                     => $tahun,
                'subTitle'              => 'Dashboard',
                'daftarAkhlak' => $daftarAkhlak,
            ];
        } elseif ($role == 'Tim Proyek' && $divisi == 'Engineering') {
            // if ($divisi == 'PCP') {
            //     $route = 'pcp.dashboard';
            // } elseif ($divisi == 'Mankon') {
            //     $route = 'mankon.dashboard';
            // } else {
            //     $route = 'timProyek.dashboard';
            // }
            $route          = 'engineering.admin.dashboard';
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
                'persen_0_30'           => $persen_0_30,
                'persen_30_50'          => $persen_30_50,
                'persen_50_70'          => $persen_50_70,
                'persen_70_100'         => $persen_70_100,
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
        } elseif ($role == 'Head Office' && $divisi == 'Engineering') {
            // if ($divisi == 'PCP') {
            //     $route = 'pcp.dashboard';
            // } elseif ($divisi == 'Mankon') {
            //     $route = 'mankon.dashboard';
            // } else {
            //     $route = 'headOffice.dashboard';
            // }
            $route          = 'engineering.admin.dashboard';
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
                ->where('timelines.verifikasi_timeline', 'Sudah Disetujui')
                ->groupBy('timelines.id', 'proyek.nama_proyek')
                ->orderBy('timelines.id')
                ->limit(400)
                ->get();

            $data = [
                'title'                     => null,
                'user'                      => $user,
                'jumlahUser'                => $jumlahUser,
                'jumlahHeadOffice'          => $jumlahHeadOffice,
                'jumlahProyek'              => $jumlahProyek,
                'jumlahSoftware'            => $jumlahSoftware,
                'jumlahDokumenLps'          => $jumlahDokumenLps,
                'daftarRkp'                 => $this->ModelRkp->dataIsRespon(1),
                'daftarRkpMankon'           => $this->ModelRkpMankon->dataIsRespon(1),
                'akumulasiCsi'              => $akumulasiCsi / $jumlahCsi,
                'akumulasiTechnicalSupport' => $persenTechnicalSupport,
                'akumulasiKiKm'             => $persenKiKm,
                'proyekLps'                 => $progressLps,
                'dokumenLps'                => $dokumenLps,
                'daftarProyek'              => $daftarProyek,
                'persen_0_30'               => $persen_0_30,
                'persen_30_50'              => $persen_30_50,
                'persen_50_70'              => $persen_50_70,
                'persen_70_100'             => $persen_70_100,
                'productivityJan'           => $this->productivity($tahun . '-01'),
                'productivityFeb'           => $this->productivity($tahun . '-02'),
                'productivityMar'           => $this->productivity($tahun . '-03'),
                'productivityApr'           => $this->productivity($tahun . '-04'),
                'productivityMei'           => $this->productivity($tahun . '-05'),
                'productivityJun'           => $this->productivity($tahun . '-06'),
                'productivityJul'           => $this->productivity($tahun . '-07'),
                'productivityAug'           => $this->productivity($tahun . '-08'),
                'productivitySep'           => $this->productivity($tahun . '-09'),
                'productivityOct'           => $this->productivity($tahun . '-10'),
                'productivityNov'           => $this->productivity($tahun . '-11'),
                'productivityDes'           => $this->productivity($tahun . '-12'),
                'bukanPrioritas'            => $this->ModelProyek->jumlah('Bukan Prioritas'),
                'prioritas1'                => $this->ModelProyek->jumlah('Prioritas 1'),
                'prioritas2'                => $this->ModelProyek->jumlah('Prioritas 2'),
                'prioritas3'                => $this->ModelProyek->jumlah('Prioritas 3'),
                'realisasiPrioritas1'       => $this->prioritasProyek('Prioritas 1'),
                'realisasiPrioritas2'       => $this->prioritasProyek('Prioritas 2'),
                'realisasiPrioritas3'       => $this->prioritasProyek('Prioritas 3'),
                'realisasiBukanPrioritas'   => $this->prioritasProyek('Bukan Prioritas'),
                'chartLicense'              => $this->ModelDetailLicense->progress(),
                'tahun'                     => $tahun,
                'timelineMonitor'           => $timelineMonitor,
                'dokumenTimeline'           => DokumenTimelines::get(),
                'subTitle'                  => 'Dashboard',
            ];
        } elseif ($role == 'Manajemen') {
            $route = 'manajemen.dashboard';
            $user = $this->ModelUser->detail(Session()->get('id_user'));

            $data = [
                'title'                 => null,
                'user'                  => $user,
                'jumlahUser'                => $jumlahUser,
                'jumlahHeadOffice'          => $jumlahHeadOffice,
                'jumlahProyek'              => $jumlahProyek,
                'jumlahSoftware'            => $jumlahSoftware,
                'jumlahDokumenLps'          => $jumlahDokumenLps,
                'daftarRkp'                 => $this->ModelRkp->dataIsRespon(1),
                'daftarRkpMankon'           => $this->ModelRkpMankon->dataIsRespon(1),
                'akumulasiCsi'              => $akumulasiCsi / $jumlahCsi,
                'akumulasiTechnicalSupport' => $persenTechnicalSupport,
                'akumulasiKiKm'             => $persenKiKm,
                'proyekLps'                 => $progressLps,
                'dokumenLps'                => $dokumenLps,
                'daftarProyek'              => $daftarProyek,
                'persen_0_30'               => $persen_0_30,
                'persen_30_50'              => $persen_30_50,
                'persen_50_70'              => $persen_50_70,
                'persen_70_100'             => $persen_70_100,
                'productivityJan'           => $this->productivity($tahun . '-01'),
                'productivityFeb'           => $this->productivity($tahun . '-02'),
                'productivityMar'           => $this->productivity($tahun . '-03'),
                'productivityApr'           => $this->productivity($tahun . '-04'),
                'productivityMei'           => $this->productivity($tahun . '-05'),
                'productivityJun'           => $this->productivity($tahun . '-06'),
                'productivityJul'           => $this->productivity($tahun . '-07'),
                'productivityAug'           => $this->productivity($tahun . '-08'),
                'productivitySep'           => $this->productivity($tahun . '-09'),
                'productivityOct'           => $this->productivity($tahun . '-10'),
                'productivityNov'           => $this->productivity($tahun . '-11'),
                'productivityDes'           => $this->productivity($tahun . '-12'),
                'bukanPrioritas'            => $this->ModelProyek->jumlah('Bukan Prioritas'),
                'prioritas1'                => $this->ModelProyek->jumlah('Prioritas 1'),
                'prioritas2'                => $this->ModelProyek->jumlah('Prioritas 2'),
                'prioritas3'                => $this->ModelProyek->jumlah('Prioritas 3'),
                'realisasiPrioritas1'       => $this->prioritasProyek('Prioritas 1'),
                'realisasiPrioritas2'       => $this->prioritasProyek('Prioritas 2'),
                'realisasiPrioritas3'       => $this->prioritasProyek('Prioritas 3'),
                'realisasiBukanPrioritas'   => $this->prioritasProyek('Bukan Prioritas'),
                'chartLicense'              => $this->ModelDetailLicense->progress(),
                'tahun'                     => $tahun,
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
}
