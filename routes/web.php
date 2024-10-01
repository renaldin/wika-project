<?php

use App\Http\Controllers\Engineering\Divisi;
use App\Http\Controllers\Engineering\Jabatan;
use App\Http\Controllers\Engineering\User;

use App\Http\Controllers\Achievement;
use App\Http\Controllers\Activity;
use App\Http\Controllers\Csi;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\HC;
use App\Http\Controllers\DetailAchievement;
use App\Http\Controllers\DetailLicense;
use App\Http\Controllers\DetailTimProyek;
use App\Http\Controllers\DokumenLps;
use App\Http\Controllers\EngineeringActivity;
use App\Http\Controllers\Event;
use App\Http\Controllers\Carousel;
use App\Http\Controllers\Chat;
use App\Http\Controllers\InfraNews;
use App\Http\Controllers\KiKm;
use App\Http\Controllers\Landing;
use App\Http\Controllers\License;
use App\Http\Controllers\Log;
use App\Http\Controllers\Login;
use App\Http\Controllers\Lps;
use App\Http\Controllers\MasterActivity;
use App\Http\Controllers\MonthlyReport;
use App\Http\Controllers\MonthlyReportAdmin;
use App\Http\Controllers\Pcp\Agenda;
use App\Http\Controllers\Pcp\DokumenTimeline;
use App\Http\Controllers\Productivity;
use App\Http\Controllers\Proyek;
use App\Http\Controllers\Rencana;
use App\Http\Controllers\Rkp;
use App\Http\Controllers\RkpMankon;
use App\Http\Controllers\Software;
use App\Http\Controllers\Sni;
use App\Http\Controllers\Task;
use App\Http\Controllers\Akhlak;
use App\Http\Controllers\TechnicalSupporting;
use App\Http\Controllers\TimProyek;
use App\Http\Controllers\PCP\PicTujuanTask;
use App\Http\Controllers\PCP\PicDivisiTask;
use App\Http\Controllers\Pcp\MonthlyReportPcp;
use App\Http\Controllers\Pcp\PicAgenda;
use App\Http\Controllers\Pcp\PicMonthlyReportPcp;
use App\Http\Controllers\Pcp\PicTujuanProyekTask;
use App\Http\Controllers\Pcp\TaskPcp;
use App\Http\Controllers\Pcp\Timeline;
use App\Http\Controllers\Pcp\TimelineDetail;
use App\Http\Controllers\Pcp\TimelineSubDetail;
use App\Http\Controllers\ProyekUser;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/unduh-format-excel', [KelolaMahasiswa::class, 'unduhFormatExcel']);
Route::get('/download-file-ki-km/{id}', [KiKm::class, 'downloadFile']);
Route::get('/download-file-hasil-ki-km/{id}', [KiKm::class, 'downloadFileHasil']);
Route::get('/download-file-technical-supporting/{id}', [TechnicalSupporting::class, 'downloadFile']);
Route::get('/download-file-hasil-technical-supporting/{id}', [TechnicalSupporting::class, 'downloadFileHasil']);
Route::get('/download-file-rkp/{id}', [Rkp::class, 'downloadFile']);
Route::get('/download-file-hasil-rkp/{id}', [Rkp::class, 'downloadFileHasil']);
Route::get('/download-file-rkp-mankon/{id}', [RkpMankon::class, 'downloadFile']);
Route::get('/download-file-hasil-rkp-mankon/{id}', [RkpMankon::class, 'downloadFileHasil']);

Route::group(['middleware' => 'revalidate'], function () {

    Route::get('/', [Landing::class, 'index'])->name('landing');
    Route::get('/about', [Landing::class, 'about'])->name('about');
    Route::get('/contact', [Landing::class, 'contact'])->name('contact');
    Route::get('/blog', [Landing::class, 'blog'])->name('blog');
    Route::get('/news/{id}', [Landing::class, 'detailNews']);
    Route::get('/daftar-sni', [Sni::class, 'index'])->name('daftar-sni');

    Route::get('/login', [Login::class, 'index'])->name('login');
    Route::post('/login', [Login::class, 'loginProcess']);
    Route::get('/logout', [Login::class, 'logout'])->name('logout');

    Route::get('/dashboard', [Dashboard::class, 'index'])->name('dashboard');
    Route::post('/dashboard', [Dashboard::class, 'index']);
    Route::get('/perilaku-spesifikasi', [Dashboard::class, 'akhlak']);


    //  divisi
    Route::get('/daftar-akhlak', [Akhlak::class, 'index']);
    Route::post('/tambah-akhlak', [Akhlak::class, 'prosesTambah']);
    Route::get('/edit-akhlak/{id}', [Akhlak::class, 'prosesEdit']);
    Route::delete('/hapus-akhlak/{id}', [Akhlak::class, 'prosesHapus']);  // Ubah menjadi DELETE jika aksi hapus
    Route::post('/detail-akhlak/{id}', [Akhlak::class, 'detail']);
    Route::post('/edit-detail-akhlak/{id}', [Akhlak::class, 'updateDetailAkhlak']);
    Route::post('/edit-detail-akhlak/{id}/{penilaian}', [Akhlak::class, 'updateDetailAkhlakNew']);
    Route::get('/monitoring-akhlak', [Akhlak::class, 'monitoring']);
    Route::get('/download-monitoring-akhlak/{id}', [Akhlak::class, 'downloadPdf']);
    Route::get('/change-leader', [Akhlak::class, 'changeLeader']);
    Route::get('/dashboard-change', [Akhlak::class, 'dashboardChange']);
    Route::get('/panduan-spesifik', [Akhlak::class, 'panduanSpesifik']);
    Route::get('/export-detail-akhlak/{id}', [Akhlak::class, 'exportDetailAkhlak'])->name('export-detail-akhlak');
    




    // Penilaian HC
    Route::get('/daftar-akhlak-hc', [HC::class, 'index'])->name('daftar-akhlak-hc.index');
    Route::post('/tambah-akhlak', [Akhlak::class, 'prosesTambah'])->name('daftar-akhlak.store');
    Route::put('/daftar-akhlak/{id}', [Akhlak::class, 'update'])->name('daftar-akhlak.update');
    Route::get('/hc/detail/{id_akhlak}', [HC::class, 'detail'])->name('hc.detail');
    Route::post('/edit-nilai-akhlak/{id_detail_akhlak}', [HC::class, 'updateNilaiAkhlak'])->name('updateNilaiAkhlak');



    // Di dalam web.php atau route file yang sesuai
    Route::post('/update-detail-akhlak/{id}', [HC::class, 'updateDetailAkhlak'])->name('update-detail-akhlak');

    Route::get('/hapus-akhlak/{id}', [Akhlak::class, 'prosesHapus'])->name('daftar-akhlak.delete');

    Route::get('/detail-akhlak/{id}', [Akhlak::class, 'detail']);
    Route::post('/edit-detail-akhlak/{id}', [Akhlak::class, 'updateDetailAkhlak']);
    Route::post('/edit-detail-akhlak/{id}/{penilaian}', [Akhlak::class, 'updateDetailAkhlakNew']);
    Route::get('/monitoring-akhlak', [Akhlak::class, 'monitoring']);
    Route::post('/pendapat-akhlak/{id}', [Akhlak::class, 'pendapat']);
    Route::get('/download-monitoring-akhlak/{id}', [Akhlak::class, 'downloadPdf']);

    Route::post('/Change-leader-program', [Divisi::class, 'change']);
    Route::post('/Panduan-spesifikasi-akhlak', [Divisi::class, 'panduan']);

    Route::get('/profil', [User::class, 'profil'])->name('profil');
    Route::post('/edit-profil/{id}', [User::class, 'prosesEditProfil']);
    Route::get('/ubah-password', [User::class, 'ubahPassword'])->name('ubah-password');
    Route::post('/ubah-password/{id}', [User::class, 'prosesUbahPassword']);

    Route::get('/daftar-activity', [EngineeringActivity::class, 'index'])->name('daftar-activity');

    Route::get('/permintaan-technical-supporting', [TechnicalSupporting::class, 'permintaan'])->name('permintaan-technical-supporting');
    Route::get('/update-technical-supporting', [TechnicalSupporting::class, 'update'])->name('update-technical-supporting');
    Route::get('/receive-technical-supporting/{id}', [TechnicalSupporting::class, 'receive']);
    Route::get('/updated-technical-supporting/{id}', [TechnicalSupporting::class, 'edit']);
    Route::post('/edit-technical-supporting/{id}', [TechnicalSupporting::class, 'prosesEdit']);

    Route::get('/update-ki-km', [KiKm::class, 'update'])->name('update-ki-km');
    Route::get('/edit-ki-km/{id}', [KiKm::class, 'edit']);
    Route::post('/edit-ki-km/{id}', [KiKm::class, 'prosesEdit']);

    Route::get('/monitoring-rkp', [Rkp::class, 'index'])->name('monitoring-rkp');
    Route::get('/update-dokumen-rkp', [Rkp::class, 'updateDokumen'])->name('update-dokumen-rkp');
    Route::post('/update-dokumen-rkp/{id}', [Rkp::class, 'prosesUpdateDokumen']);

    Route::get('/monitoring-rkp-mankon', [RkpMankon::class, 'index'])->name('monitoring-rkp');
    Route::get('/update-dokumen-rkp-mankon', [RkpMankon::class, 'updateDokumen'])->name('update-dokumen-rkp');
    Route::post('/update-dokumen-rkp-mankon/{id}', [RkpMankon::class, 'prosesUpdateDokumen']);

    // export
    Route::post('/export-activity', [EngineeringActivity::class, 'exportExcel']);
    Route::get('/export-rkp', [Rkp::class, 'exportExcel']);
    Route::get('/export-rkp-mankon', [RkpMankon::class, 'exportExcel']);
    Route::get('/export-ki-km', [KiKm::class, 'exportExcel']);
    Route::post('/export-technical-support', [TechnicalSupporting::class, 'exportExcel']);
    Route::get('/export-by-team', [Productivity::class, 'exportExcel']);

    Route::get('/input-lps', [Lps::class, 'index'])->name('input-lps');
    Route::post('/tambah-proyek-lps', [Lps::class, 'prosesTambah']);
    Route::post('/update-tanggal-pho/{id_proyek}', [Lps::class, 'updateTanggalPho']);
    Route::get('/hapus-proyek-lps/{id_proyek}', [Lps::class, 'prosesHapus']);
    Route::get('/detail-proyek-lps/{id_proyek}', [Lps::class, 'detail']);
    Route::get('/detail-proyek-lps-tim/{id_proyek}', [Lps::class, 'detailTim']);
    Route::post('/edit-proyek-lps/{id_lps}', [Lps::class, 'prosesEdit']);
    Route::get('/monitoring-lps', [Lps::class, 'monitoring'])->name('monitoring-lps');
    Route::get('/detail-monitoring-lps/{id_proyek}', [Lps::class, 'detailMonitoring']);
    Route::get('/progress-lps', [Lps::class, 'progress'])->name('progress-lps');
    Route::get('/download-monitoring-lps/{id_proyek}', [Lps::class, 'downloadPdf']);
    Route::post('/edit-proyek-lps/{id_lps}/{jenis}', [Lps::class, 'prosesEditDokumen']);

    Route::get('/daftar-license', [License::class, 'index'])->name('daftar-license');
    Route::post('/tambah-license', [License::class, 'prosesTambah']);
    Route::post('/edit-license/{id}', [License::class, 'prosesEdit']);
    Route::get('/hapus-license/{id}', [License::class, 'prosesHapus']);
    Route::get('/detail-license/{id}', [License::class, 'detail']);
    Route::get('/progress-license', [License::class, 'progress']);
    Route::get('/monitoring-license', [License::class, 'monitoring']);
    Route::get('/detail-monitoring-license/{id}', [License::class, 'detailMonitoring']);
    Route::get('/download-license-software', [License::class, 'downloadPdf']);

    Route::post('/tambah-detail-license', [DetailLicense::class, 'prosesTambah']);
    Route::post('/edit-detail-license/{id}', [DetailLicense::class, 'prosesEdit']);
    Route::get('/hapus-detail-license/{id}', [DetailLicense::class, 'prosesHapus']);

    Route::get('/daftar-proyek-csi', [Csi::class, 'index']);
    Route::post('/tambah-proyek-csi', [Csi::class, 'prosesTambah']);
    Route::post('/edit-proyek-csi/{id}', [Csi::class, 'prosesEdit']);
    Route::get('/hapus-proyek-csi/{id}', [Csi::class, 'prosesHapus']);
    Route::get('/detail-proyek-csi/{id}', [Csi::class, 'detail']);
    Route::post('/edit-detail-csi/{id}', [Csi::class, 'updateDetailCsi']);
    Route::post('/edit-detail-csi/{id}/{penilaian}', [Csi::class, 'updateDetailCsiNew']);
    Route::get('/monitoring-csi', [Csi::class, 'monitoring']);
    Route::post('/pendapat-csi/{id}', [Csi::class, 'pendapat']);
    Route::get('/download-monitoring-csi/{id}', [Csi::class, 'downloadPdf']);

    Route::get('/rencana-ki-km', [Rencana::class, 'index']);
    Route::get('/rencana-technical-supporting', [Rencana::class, 'technicalSupport']);
    Route::post('/tambah-rencana', [Rencana::class, 'prosesTambah']);
    Route::post('/edit-rencana/{id}', [Rencana::class, 'prosesEdit']);
    Route::get('/hapus-rencana/{id}', [Rencana::class, 'prosesHapus']);
    Route::get('/detail-rencana-ki-km/{id}', [Rencana::class, 'detailKiKm']);
    Route::get('/detail-rencana-technical-supporting/{id}', [Rencana::class, 'detailTechnicalSupport']);
    Route::post('/edit-rencana-detail/{id}', [Rencana::class, 'prosesEditDetail']);
    Route::get('/productivity-by-team', [Productivity::class, 'index'])->name('productivity-by-team');
    Route::post('/productivity-by-team', [Productivity::class, 'index']);
    Route::get('/download-productivity-by-team-pdf/{bulan}', [Productivity::class, 'downloadPdfByTeam']);

    Route::get('/productivity-by-person', [Productivity::class, 'byPerson'])->name('productivity-by-person');
    Route::post('/productivity-by-person', [Productivity::class, 'byPerson']);
    Route::get('/productivity-by-person/{id_user}/{detail_bulan}', [Productivity::class, 'detailByPerson']);
    Route::get('/validasi-activity', [EngineeringActivity::class, 'validasi'])->name('validasi-activity');
    Route::get('/validasi-activity/{id}', [EngineeringActivity::class, 'validasiProses']);
    Route::get('/download-productivity-by-person-pdf/{id_user}/{detail_bulan}', [Productivity::class, 'downloadPdfByPerson']);

    Route::get('/daftar-task', [Task::class, 'index'])->name('daftar-task');
    Route::get('/detail-task/{id}', [Task::class, 'detail'])->name('detail-task');
    Route::get('/tambah-task', [Task::class, 'tambah'])->name('tambah-chat');
    Route::post('/tambah-task', [Task::class, 'prosesTambah']);
    Route::get('/edit-task/{id}', [Task::class, 'edit']);
    Route::post('/edit-task/{id}', [Task::class, 'prosesEdit']);
    Route::get('/hapus-task/{id}', [Task::class, 'prosesHapus']);

    Route::get('/daftar-chat', [Chat::class, 'index'])->name('daftar-chat');
    Route::get('/detail-chat/{id}', [Chat::class, 'detail'])->name('detail-chat');
    Route::get('/tambah-chat', [Chat::class, 'tambah'])->name('tambah-chat');
    Route::post('/tambah-chat', [Chat::class, 'prosesTambah']);
    Route::get('/edit-chat/{id}', [Chat::class, 'edit']);
    Route::post('/edit-chat/{id}', [Chat::class, 'prosesEdit']);
    Route::get('/hapus-chat/{id}', [Chat::class, 'prosesHapus']);

    Route::post('/tambah-detail-chat', [Chat::class, 'prosesTambahDetailChat']);



    // ============================== PCP =========================================================
    Route::get('/daftar-monthly-report-pcp', [MonthlyReportPcp::class, 'index'])->name('daftar-monthly-report-pcp');
    Route::get('/detail-monthly-report-pcp/{id_proyek}', [MonthlyReportPcp::class, 'detail'])->name('detail-monthly-report-pcp');
    Route::get('/tambah-monthly-report-pcp', [MonthlyReportPcp::class, 'tambah'])->name('tambah-monthly-report-pcp');
    Route::post('/tambah-monthly-report-pcp', [MonthlyReportPcp::class, 'prosesTambah']);
    Route::get('/edit-monthly-report-pcp/{id}', [MonthlyReportPcp::class, 'edit'])->name('edit-monthly-report-pcp');
    Route::post('/edit-monthly-report-pcp/{id}', [MonthlyReportPcp::class, 'prosesEdit']);
    Route::get('/hapus-monthly-report-pcp/{id}', [MonthlyReportPcp::class, 'prosesHapus']);
    Route::get('/download-monthly-report-pcp/{id}/{jenis}', [MonthlyReportPcp::class, 'downloadFile']);

    Route::get('/pic-monthly-report/{id_monthly_report_pcp}/{jenis_dokumen}', [PicMonthlyReportPcp::class, 'index']);
    Route::get('/tambah-pic-monthly-report/{id_monthly_report_pcp}/{jenis_dokumen}', [PicMonthlyReportPcp::class, 'tambah']);
    Route::post('/tambah-pic-monthly-report-pcp', [PicMonthlyReportPcp::class, 'prosesTambah']);
    Route::get('/hapus-pic-monthly-report/{id}', [PicMonthlyReportPcp::class, 'prosesHapus']);

    Route::get('/daftar-task-pcp', [TaskPcp::class, 'index'])->name('daftar-task-pcp');
    Route::get('/detail-task-pcp/{id}', [TaskPcp::class, 'detail'])->name('detail-task-pcp');
    Route::get('/tambah-task-pcp', [TaskPcp::class, 'tambah'])->name('tambah-chat');
    Route::post('/tambah-task-pcp', [TaskPcp::class, 'prosesTambah']);
    Route::get('/edit-task-pcp/{id}', [TaskPcp::class, 'edit']);
    Route::post('/edit-task-pcp/{id}', [TaskPcp::class, 'prosesEdit']);
    Route::get('/hapus-task-pcp/{id}', [TaskPcp::class, 'prosesHapus']);

    Route::get('/daftar-task-pcp-per-orang', [TaskPcp::class, 'taskPerOrang'])->name('daftar-task-pcp-per-orang');
    Route::get('/detail-task-pcp-per-orang/{id}', [TaskPcp::class, 'detailPerOrang'])->name('detail-task-pcp-per-orang');
    Route::get('/edit-task-pcp-per-orang/{id}', [TaskPcp::class, 'editPerOrang']);
    Route::post('/edit-task-pcp-per-orang/{id}', [TaskPcp::class, 'prosesEditPerOrang']);

    Route::get('/daftar-task-pcp-proyek', [TaskPcp::class, 'taskProyek'])->name('daftar-task-pcp-proyek');
    Route::get('/detail-task-pcp-proyek/{id}', [TaskPcp::class, 'detailProyek'])->name('detail-task-pcp-proyek');
    Route::get('/edit-task-pcp-proyek/{id}', [TaskPcp::class, 'editProyek']);
    Route::post('/edit-task-pcp-proyek/{id}', [TaskPcp::class, 'prosesEditProyek']);

    Route::get('/tambah-pic-tujuan-task-pcp/{id_task_pcp}', [PicTujuanTask::class, 'index']);
    Route::post('/tambah-pic-tujuan-task-pcp', [PicTujuanTask::class, 'prosesTambah']);
    Route::get('/hapus-pic-tujuan-task-pcp/{id}', [PicTujuanTask::class, 'prosesHapus']);

    Route::get('/tambah-pic-tujuan-proyek-task-pcp/{id_task_pcp}', [PicTujuanProyekTask::class, 'index']);
    Route::post('/tambah-pic-tujuan-proyek-task-pcp', [PicTujuanProyekTask::class, 'prosesTambah']);
    Route::get('/hapus-pic-tujuan-proyek-task-pcp/{id}', [PicTujuanProyekTask::class, 'prosesHapus']);

    Route::get('/tambah-pic-divisi-task-pcp/{id_task_pcp}', [PicDivisiTask::class, 'index']);
    Route::post('/tambah-pic-divisi-task-pcp', [PicDivisiTask::class, 'prosesTambah']);
    Route::get('/hapus-pic-divisi-task-pcp/{id}', [PicDivisiTask::class, 'prosesHapus']);

    Route::get('/daftar-agenda', [Agenda::class, 'index'])->name('daftar-agenda');
    Route::get('/detail-agenda/{id}', [Agenda::class, 'detail'])->name('detail-agenda');
    Route::get('/tambah-agenda', [Agenda::class, 'tambah'])->name('tambah-chat');
    Route::post('/tambah-agenda', [Agenda::class, 'prosesTambah']);
    Route::get('/edit-agenda/{id}', [Agenda::class, 'edit']);
    Route::post('/edit-agenda/{id}', [Agenda::class, 'prosesEdit']);
    Route::get('/hapus-agenda/{id}', [Agenda::class, 'prosesHapus']);
    Route::get('/kalender', [Agenda::class, 'kalender'])->name('kalender');
    Route::get('/getAgenda', [Agenda::class, 'getAgenda']);
    Route::get('/getAgenda/{id_proyek}', [Agenda::class, 'getAgendaProyek']);

    Route::get('/pic-agenda/{id_agenda}', [PicAgenda::class, 'index']);
    Route::get('/tambah-pic-agenda/{id_agenda}', [PicAgenda::class, 'tambah']);
    Route::post('/tambah-pic-agenda', [PicAgenda::class, 'prosesTambah']);
    Route::get('/hapus-pic-agenda/{id}', [PicAgenda::class, 'prosesHapus']);

    Route::get('/daftar-timeline', [Timeline::class, 'index'])->name('daftar-timeline');
    Route::get('/detail-timeline/{id}', [Timeline::class, 'detail'])->name('detail-timeline');
    Route::get('/tambah-timeline', [Timeline::class, 'tambah'])->name('tambah-chat');
    Route::post('/tambah-timeline', [Timeline::class, 'prosesTambah']);
    Route::get('/edit-timeline/{id}', [Timeline::class, 'edit']);
    Route::post('/edit-timeline/{id}', [Timeline::class, 'prosesEdit']);
    Route::get('/hapus-timeline/{id}', [Timeline::class, 'prosesHapus']);
    Route::get('/verifikasi-timeline', [Timeline::class, 'verifikasi'])->name('verifikasi-timeline');
    Route::get('/verifikasi-timeline/{id}', [Timeline::class, 'prosesVerifikasi']);
    Route::get('/verifikasi-detailtimeline/{id}', [Timeline::class, 'prosesVerifikasiDetail']);
    Route::get('/bukaverifikasi-detailtimeline/{id}', [Timeline::class, 'prosesBukaVerifikasiDetail']);
    Route::get('/edit-detail-timeline/{id}', [TimelineDetail::class, 'edit']);
    Route::post('/edit-detail-timeline/{id}', [TimelineDetail::class, 'prosesEdit']);
    Route::get('/download-file-dokumen-timeline/{id}', [TimelineDetail::class, 'downloadFile']);
    Route::get('/proses-verifikasi-timeline-detail/{id}', [TimelineDetail::class, 'prosesVerifikasi'])->name('proses-verifikasi-timeline-detail');
    Route::get('/download-file-timeline-detail/{id}', [TimelineDetail::class, 'downloadFile'])->name('download-file-timeline-detail');
    Route::get('/edit-timeline-detail/{id}', [TimelineDetail::class, 'edit'])->name('edit-timeline-detail');


    Route::get('/sub-detail-timeline/{id_timeline_detail}', [TimelineSubDetail::class, 'index']);
    Route::get('/tambah-timeline-sub-detail/{id_timeline_detail}', [TimelineSubDetail::class, 'tambah']);
    Route::post('/tambah-timeline-sub-detail/{id_timeline_detail}', [TimelineSubDetail::class, 'prosesTambah']);
    Route::get('/edit-timeline-sub-detail/{id_timeline_detail}/{id_timeline_sub_detail}', [TimelineSubDetail::class, 'edit']);
    Route::post('/edit-timeline-sub-detail/{id_timeline_detail}/{id_timeline_sub_detail}', [TimelineSubDetail::class, 'prosesEdit']);
    Route::get('/hapus-timeline-sub-detail/{id_timeline_sub_detail}', [TimelineSubDetail::class, 'prosesHapus']);
    Route::get('/download-file-sub-dokumen-timeline/{id}', [TimelineSubDetail::class, 'downloadFile']);

    Route::get('/daftar-dokumen-timeline', [DokumenTimeline::class, 'index'])->name('daftar-dokumen-timeline');
    Route::get('/detail-dokumen-timeline/{id}', [DokumenTimeline::class, 'detail'])->name('detail-dokumen-timeline');
    Route::get('/tambah-dokumen-timeline', [DokumenTimeline::class, 'tambah'])->name('tambah-dokumen-timeline');
    Route::post('/tambah-dokumen-timeline', [DokumenTimeline::class, 'prosesTambah']);
    Route::get('/edit-dokumen-timeline/{id}', [DokumenTimeline::class, 'edit']);
    Route::post('/edit-dokumen-timeline/{id}', [DokumenTimeline::class, 'prosesEdit']);
    Route::post('/hapus-dokumen-timeline/{id}', [DokumenTimeline::class, 'prosesHapus']);

    // ============================== end PCP =========================================================


    Route::get('/validasi-monthly-report', [MonthlyReport::class, 'validasi'])->name('validasi-monthly-report');
    Route::get('/rollback-monthly-report/{id}', [MonthlyReport::class, 'prosesRollback'])->name('/{id}');
    Route::get('/monitoring-monthly-report', [MonthlyReport::class, 'monitoring'])->name('monitoring-monthly-report');
    Route::get('/proses-validasi-monthly-report/{id}', [MonthlyReport::class, 'prosesValidasi']);

    Route::post('/download-rkp-pdf', [Rkp::class, 'downloadPdf']);

    Route::post('/download-rkp-pdf-mankon', [RkpMankon::class, 'downloadPdf']);

    Route::group(['middleware' => 'admin-engineering'], function () {
        Route::get('/data-activities', [Activity::class, 'index'])->name('data-activities');
        Route::get('/tambah-activities', [Activity::class, 'tambah']);
        Route::get('/edit-activities/{id}', [Activity::class, 'edit']);
        Route::post('/tambah-activities', [Activity::class, 'prosesTambah']);
        Route::post('/edit-activities/{id}', [Activity::class, 'prosesEdit']);
        Route::get('/hapus-activities/{id}', [Activity::class, 'prosesHapus']);

        Route::get('/data-events', [Event::class, 'index'])->name('data-events');
        Route::post('/tambah-events', [Event::class, 'prosesTambah']);
        Route::post('/edit-events/{id}', [Event::class, 'prosesEdit']);
        Route::get('/hapus-events/{id}', [Event::class, 'prosesHapus']);

        Route::get('/data-achievement', [Achievement::class, 'index'])->name('data-achievement');
        Route::post('/tambah-achievement', [Achievement::class, 'prosesTambah']);
        Route::post('/edit-achievement/{id}', [Achievement::class, 'prosesEdit']);
        Route::get('/hapus-achievement/{id}', [Achievement::class, 'prosesHapus']);
        Route::get('/detail-achievement/{id}', [Achievement::class, 'detail']);

        Route::post('/tambah-detail-achievement', [DetailAchievement::class, 'prosesTambah']);
        Route::post('/edit-detail-achievement/{id}', [DetailAchievement::class, 'prosesEdit']);
        Route::get('/hapus-detail-achievement/{id}', [DetailAchievement::class, 'prosesHapus']);

        Route::get('/data-news', [InfraNews::class, 'index'])->name('data-news');
        Route::get('/tambah-news', [InfraNews::class, 'tambah']);
        Route::get('/edit-news/{id}', [InfraNews::class, 'edit']);
        Route::post('/tambah-news', [InfraNews::class, 'prosesTambah']);
        Route::post('/edit-news/{id}', [InfraNews::class, 'prosesEdit']);
        Route::get('/hapus-news/{id}', [InfraNews::class, 'prosesHapus']);

        Route::get('/data-carousel', [Carousel::class, 'index'])->name('data-carousel');
        Route::post('/tambah-carousel', [Carousel::class, 'prosesTambah']);
        Route::post('/edit-carousel/{id}', [Carousel::class, 'prosesEdit']);
        Route::get('/hapus-carousel/{id}', [Carousel::class, 'prosesHapus']);

        Route::get('/daftar-user', [User::class, 'index'])->name('daftar-user');
        Route::get('/tambah-user', [User::class, 'tambah'])->name('tambah-user');
        Route::post('/tambah-user', [User::class, 'prosesTambah']);
        Route::get('/edit-user/{id}', [User::class, 'edit'])->name('edit-user');
        Route::post('/edit-user/{id}', [User::class, 'prosesEdit']);
        Route::get('/hapus-user/{id}', [User::class, 'prosesHapus']);

        Route::get('/daftar-proyek', [Proyek::class, 'index'])->name('daftar-proyek');
        Route::get('/tambah-proyek', [Proyek::class, 'tambah'])->name('tambah-proyek');
        Route::post('/tambah-proyek', [Proyek::class, 'prosesTambah']);
        Route::get('/edit-proyek/{id}', [Proyek::class, 'edit'])->name('edit-proyek');
        Route::post('/edit-proyek/{id}', [Proyek::class, 'prosesEdit']);
        Route::get('/hapus-proyek/{id}', [Proyek::class, 'prosesHapus']);
        Route::get('/export-proyek', [Proyek::class, 'exportExcel']);
        Route::get('/export-proyek-pdf', [Proyek::class, 'exportPdf']);

        Route::get('/daftar-proyek-user/{id_proyek}', [ProyekUser::class, 'index'])->name('daftar-proyek-user');
        Route::post('/tambah-proyek-user', [ProyekUser::class, 'prosesTambah']);
        Route::get('/hapus-proyek-user/{id}', [ProyekUser::class, 'prosesHapus']);

        Route::get('/daftar-tim-proyek', [TimProyek::class, 'index'])->name('daftar-tim-proyek');
        Route::get('/tambah-tim-proyek', [TimProyek::class, 'tambah'])->name('tambah-tim-proyek');
        Route::post('/tambah-tim-proyek', [TimProyek::class, 'prosesTambah']);
        Route::get('/edit-tim-proyek/{id}', [TimProyek::class, 'edit'])->name('edit-tim-proyek');
        Route::post('/edit-tim-proyek/{id}', [TimProyek::class, 'prosesEdit']);
        Route::get('/hapus-tim-proyek/{id}', [TimProyek::class, 'prosesHapus']);

        Route::get('/daftar-dokumen-lps', [DokumenLps::class, 'index'])->name('daftar-dokumen-lps');
        Route::post('/tambah-dokumen-lps', [DokumenLps::class, 'prosesTambah']);
        Route::post('/edit-dokumen-lps/{id}', [DokumenLps::class, 'prosesEdit']);
        Route::get('/hapus-dokumen-lps/{id}', [DokumenLps::class, 'prosesHapus']);

        Route::post('/tambah-detail-tim-proyek', [DetailTimProyek::class, 'prosesTambah']);
        Route::get('/hapus-detail-tim-proyek/{id}', [DetailTimProyek::class, 'prosesHapus']);

        Route::get('/daftar-monthly-report-admin', [MonthlyReportAdmin::class, 'index'])->name('daftar-monthly-report-admin');
        Route::get('/detail-monthly-report-admin/{id_proyek}', [MonthlyReportAdmin::class, 'detail'])->name('detail-monthly-report-admin');
        Route::get('/edit-monthly-report-admin/{id}', [MonthlyReportAdmin::class, 'edit'])->name('edit-monthly-report-admin');
        Route::post('/edit-monthly-report-admin/{id}', [MonthlyReportAdmin::class, 'prosesEdit']);
        Route::get('/hapus-monthly-report-admin/{id}', [MonthlyReportAdmin::class, 'prosesHapus']);
        Route::get('/export-all-monthly-report-admin', [MonthlyReportAdmin::class, 'exportExcel']);
        Route::get('/export-proyek-monthly-report-admin/{id_proyek}', [MonthlyReportAdmin::class, 'exportExcel']);

        Route::get('/pilih-bulan', [MasterActivity::class, 'pilihBulan'])->name('pilih-bulan');
        Route::post('/pilih-bulan', [MasterActivity::class, 'index']);
        Route::post('/tambah-master-activity', [MasterActivity::class, 'prosesTambah']);
        Route::post('/hapus-master-activity', [MasterActivity::class, 'prosesHapus']);

        Route::get('/progress-technical-supporting', [TechnicalSupporting::class, 'progress']);
        Route::post('/progress-technical-supporting', [TechnicalSupporting::class, 'progress']);

        Route::get('/progress-ki-km', [KiKm::class, 'progress']);
        Route::post('/progress-ki-km', [KiKm::class, 'progress']);

        Route::get('/daftar-software', [Software::class, 'index'])->name('daftar-software');
        Route::get('/tambah-software', [Software::class, 'tambah'])->name('tambah-software');
        Route::post('/tambah-software', [Software::class, 'prosesTambah']);
        Route::get('/edit-software/{id}', [Software::class, 'edit'])->name('edit-software');
        Route::post('/edit-software/{id}', [Software::class, 'prosesEdit']);
        Route::get('/hapus-software/{id}', [Software::class, 'prosesHapus']);


        Route::get('/tambah-sni', [Sni::class, 'tambah'])->name('tambah-sni');
        Route::post('/tambah-sni', [Sni::class, 'prosesTambah']);
        Route::get('/edit-sni/{id}', [Sni::class, 'edit'])->name('edit-sni');
        Route::post('/edit-sni/{id}', [Sni::class, 'prosesEdit']);
        Route::get('/hapus-sni/{id}', [Sni::class, 'prosesHapus']);

        Route::get('/daftar-log', [Log::class, 'index'])->name('daftar-log');
        Route::get('/detail-log/{id}', [Log::class, 'detail'])->name('detail-log');
        Route::get('/hapus-log/{id}', [Log::class, 'prosesHapus']);

        // ENGINEERING

        Route::get('/engineering/pilih-bulan', [MasterActivity::class, 'pilihBulan'])->name('pilih-bulan');
        Route::post('/engineering/pilih-bulan', [MasterActivity::class, 'index']);

        Route::get('/engineering/daftar-monthly-report-admin', [MonthlyReportAdmin::class, 'index'])->name('daftar-monthly-report-admin');
        Route::get('/engineering/detail-monthly-report-admin/{id_proyek}', [MonthlyReportAdmin::class, 'detail'])->name('detail-monthly-report-admin');
        Route::get('/engineering/edit-monthly-report-admin/{id}', [MonthlyReportAdmin::class, 'edit'])->name('edit-monthly-report-admin');
        Route::post('/engineering/edit-monthly-report-admin/{id}', [MonthlyReportAdmin::class, 'prosesEdit']);
        Route::get('/engineering/hapus-monthly-report-admin/{id}', [MonthlyReportAdmin::class, 'prosesHapus']);
        Route::get('/engineering/export-all-monthly-report-admin', [MonthlyReportAdmin::class, 'exportExcel']);
        Route::get('/engineering/export-proyek-monthly-report-admin/{id_proyek}', [MonthlyReportAdmin::class, 'exportExcel']);

        Route::get('/engineering/daftar-sni', [Sni::class, 'index'])->name('daftar-sni');
        Route::get('/engineering/tambah-sni', [Sni::class, 'tambah'])->name('tambah-sni');
        Route::post('/engineering/tambah-sni', [Sni::class, 'prosesTambah']);
        Route::get('/engineering/edit-sni/{id}', [Sni::class, 'edit'])->name('edit-sni');
        Route::post('/engineering/edit-sni/{id}', [Sni::class, 'prosesEdit']);
        Route::get('/engineering/hapus-sni/{id}', [Sni::class, 'prosesHapus']);

        Route::get('/engineering/daftar-software', [Software::class, 'index'])->name('daftar-software');
        Route::get('/engineering/tambah-software', [Software::class, 'tambah'])->name('tambah-software');
        Route::post('/engineering/tambah-software', [Software::class, 'prosesTambah']);
        Route::get('/engineering/edit-software/{id}', [Software::class, 'edit'])->name('edit-software');
        Route::post('/engineering/edit-software/{id}', [Software::class, 'prosesEdit']);
        Route::get('/engineering/hapus-software/{id}', [Software::class, 'prosesHapus']);

        Route::get('/engineering/daftar-dokumen-lps', [DokumenLps::class, 'index'])->name('daftar-dokumen-lps');
        Route::post('/engineering/tambah-dokumen-lps', [DokumenLps::class, 'prosesTambah']);
        Route::post('/engineering/edit-dokumen-lps/{id}', [DokumenLps::class, 'prosesEdit']);
        Route::get('/engineering/hapus-dokumen-lps/{id}', [DokumenLps::class, 'prosesHapus']);

        Route::get('/engineering/kelola-proyek', [Proyek::class, 'index'])->name('engineering-daftar-proyek');
        Route::get('/engineering/detail-proyek/{id}', [Proyek::class, 'detail'])->name('engineering-detail-proyek');
        Route::get('/engineering/tambah-proyek', [Proyek::class, 'tambah'])->name('engineering-tambah-proyek');
        Route::post('/engineering/tambah-proyek', [Proyek::class, 'prosesTambah']);
        Route::get('/engineering/edit-proyek/{id}', [Proyek::class, 'edit'])->name('engineering-edit-proyek');
        Route::post('/engineering/edit-proyek/{id}', [Proyek::class, 'prosesEdit']);
        Route::get('/engineering/hapus-proyek/{id}', [Proyek::class, 'prosesHapus']);
        Route::get('/engineering/export-proyek', [Proyek::class, 'exportExcel']);
        Route::get('/engineering/export-proyek-pdf', [Proyek::class, 'exportPdf']);

        Route::get('/engineering/kelola-user', [User::class, 'index'])->name('engineering-kelola-user');
        Route::get('/engineering/detail-user/{id}', [User::class, 'detail'])->name('engineering-detail-user');
        Route::get('/engineering/tambah-user', [User::class, 'tambah'])->name('engineering-tambah-user');
        Route::post('/engineering/tambah-user', [User::class, 'prosesTambah']);
        Route::get('/engineering/edit-user/{id}', [User::class, 'edit'])->name('engineering-edit-user');
        Route::post('/engineering/edit-user/{id}', [User::class, 'prosesEdit']);
        Route::get('/engineering/hapus-user/{id}', [User::class, 'prosesHapus']);

        Route::get('/engineering/kelola-jabatan', [Jabatan::class, 'index'])->name('engineering-kelola-jabatan');
        Route::get('/engineering/tambah-jabatan', [Jabatan::class, 'tambah'])->name('engineering-tambah-jabatan');
        Route::post('/engineering/tambah-jabatan', [Jabatan::class, 'prosesTambah']);
        Route::get('/engineering/edit-jabatan/{id}', [Jabatan::class, 'edit']);
        Route::post('/engineering/edit-jabatan/{id}', [Jabatan::class, 'prosesEdit']);
        Route::get('/engineering/hapus-jabatan/{id}', [Jabatan::class, 'prosesHapus']);

        Route::get('/engineering/kelola-divisi', [Divisi::class, 'index'])->name('engineering-kelola-divisi');
        Route::get('/engineering/tambah-divisi', [Divisi::class, 'tambah'])->name('engineering-tambah-divisi');
        Route::post('/engineering/tambah-divisi', [Divisi::class, 'prosesTambah']);
        Route::get('/engineering/edit-divisi/{id}', [Divisi::class, 'edit']);
        Route::post('/engineering/edit-divisi/{id}', [Divisi::class, 'prosesEdit']);
        Route::get('/engineering/hapus-divisi/{id}', [Divisi::class, 'prosesHapus']);

        // ENGINEERING
    });

    Route::group(['middleware' => 'headoffice'], function () {

        Route::get('/tambah-activity', [EngineeringActivity::class, 'tambah'])->name('tambah-activity');
        Route::post('/tambah-activity', [EngineeringActivity::class, 'prosesTambah']);
        Route::get('/check-activity', [EngineeringActivity::class, 'check'])->name('check-activity');
        Route::get('/check-activity/{id}', [EngineeringActivity::class, 'checkProses']);
        Route::get('/edit-activity/{id}', [EngineeringActivity::class, 'edit'])->name('edit-activity');
        Route::post('/edit-activity/{id}', [EngineeringActivity::class, 'prosesEdit']);
        Route::get('/hapus-activity/{id}', [EngineeringActivity::class, 'prosesHapus']);

        Route::get('/pengajuan-ki-km', [KiKm::class, 'pengajuan'])->name('pengajuan-ki-km');
        Route::get('/receive-ki-km/{id}', [KiKm::class, 'receive']);

        // Route::get('/monitoring-rkp', [Rkp::class, 'index'])->name('monitoring-rkp');
        Route::get('/tambah-rkp', [Rkp::class, 'tambah'])->name('tambah-rkp');
        Route::post('/tambah-rkp', [Rkp::class, 'prosesTambah']);
        Route::get('/update-rkp', [Rkp::class, 'update'])->name('update-rkp');
        Route::get('/edit-rkp/{id}', [Rkp::class, 'edit']);
        Route::post('/edit-rkp/{id}', [Rkp::class, 'prosesEdit']);

        Route::get('/tambah-rkp-mankon', [RkpMankon::class, 'tambah'])->name('tambah-rkp-mankon');
        Route::post('/tambah-rkp-mankon', [RkpMankon::class, 'prosesTambah']);
        Route::get('/update-rkp-mankon', [RkpMankon::class, 'update'])->name('update-rkp-mankon');
        Route::get('/edit-rkp-mankon/{id}', [RkpMankon::class, 'edit']);
        Route::post('/edit-rkp-mankon/{id}', [RkpMankon::class, 'prosesEdit']);
        Route::get('/hapus-rkp-mankon/{id}', [RkpMankon::class, 'prosesHapus']);


        // Route::get('/review-rkp', [\App\Http\Controllers\Rkp::class, 'tambah'])->name('tambah');
        // Route::get('/receive-rkp/{id}', [Rkp::class, 'receive']);
        // Route::get('/edit-rkp/{id}', [\App\Http\Controllers\Rkp::class, 'edit']);
        // Route::post('/edit-rkp/{id}', [\App\Http\Controllers\Rkp::class, 'prosesEdit']);

    });

    Route::group(['middleware' => 'timproyek'], function () {
        Route::get('/pilih-proyek', [MonthlyReport::class, 'pilihProyek'])->name('pilih-proyek');
        Route::post('/pilih-proyek', [MonthlyReport::class, 'prosesPilihProyek']);
        Route::get('/tambah-monthly-report', [MonthlyReport::class, 'tambah'])->name('tambah-monthly-report');
        Route::post('/tambah-monthly-report', [MonthlyReport::class, 'prosesTambah']);
        Route::get('/daftar-monthly-report', [MonthlyReport::class, 'index'])->name('daftar-monthly-report');
        Route::get('/detail-monthly-report/{id_proyek}', [MonthlyReport::class, 'detail'])->name('detail-monthly-report');
        Route::get('/edit-monthly-report/{id}', [MonthlyReport::class, 'edit'])->name('edit-monthly-report');
        Route::post('/edit-monthly-report/{id}', [MonthlyReport::class, 'prosesEdit']);
        Route::get('/hapus-monthly-report/{id}', [MonthlyReport::class, 'prosesHapus']);
        Route::get('/export-all-monthly-report', [MonthlyReport::class, 'exportExcel']);
        Route::get('/export-proyek-monthly-report/{id_proyek}', [MonthlyReport::class, 'exportExcel']);
        Route::get('/check-monthly-report', [MonthlyReport::class, 'check'])->name('check-monthly-report');
        Route::get('/edit-check-monthly-report/{id}', [MonthlyReport::class, 'editCheck'])->name('edit-check-monthly-report');
        Route::post('/edit-check-monthly-report/{id}', [MonthlyReport::class, 'prosesEditCheck'])->name('edit-check-monthly-report');
        Route::get('/kirim-validasi-monthly-report/{id}', [MonthlyReport::class, 'sendValidasi']);

        Route::get('/monitoring-technical-supporting', [TechnicalSupporting::class, 'indeX'])->name('monitoring-technical-supporting');
        Route::get('/tambah-technical-supporting', [TechnicalSupporting::class, 'tambah'])->name('tambah-technical-supporting');
        Route::post('/tambah-technical-supporting', [TechnicalSupporting::class, 'prosesTambah']);

        Route::get('/monitoring-ki-km', [KiKm::class, 'index'])->name('monitoring-ki-km');
        Route::get('/tambah-ki-km', [KiKm::class, 'tambah'])->name('tambah-ki-km');
        Route::post('/tambah-ki-km', [KiKm::class, 'prosesTambah']);

        Route::get('/daftar-proyek-lps', [Lps::class, 'monitoringTimProyek'])->name('monitoring-tim-proyek');
    });
});
