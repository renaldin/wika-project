<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateMonthlyReportPcp2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('monthly_report_pcps', function (Blueprint $table) {
            $table->text('narasi_evaluasi_hasil_usaha')->nullable();
            $table->text('narasi_laporan_lc')->nullable();
            $table->text('narasi_laporan_vendor')->nullable();
            $table->text('narasi_update_inventaris')->nullable();
            $table->text('narasi_prognosa_hasil_usaha')->nullable();
            $table->text('narasi_ms_project_file')->nullable();
            $table->text('narasi_laporan_bulanan_ikn')->nullable();
            $table->text('narasi_laporan_upaya_klaim')->nullable();
            $table->text('narasi_laporan_potob')->nullable();

            $table->string('status_evaluasi_hasil_usaha', 255)->nullable();
            $table->string('status_laporan_lc', 255)->nullable();
            $table->string('status_laporan_vendor', 255)->nullable();
            $table->string('status_update_inventaris', 255)->nullable();
            $table->string('status_prognosa_hasil_usaha', 255)->nullable();
            $table->string('status_ms_project_file', 255)->nullable();
            $table->string('status_laporan_bulanan_ikn', 255)->nullable();
            $table->string('status_laporan_upaya_klaim', 255)->nullable();
            $table->string('status_laporan_potob', 255)->nullable();

            $table->text('komentar_evaluasi_hasil_usaha')->nullable();
            $table->text('komentar_laporan_lc')->nullable();
            $table->text('komentar_laporan_vendor')->nullable();
            $table->text('komentar_update_inventaris')->nullable();
            $table->text('komentar_prognosa_hasil_usaha')->nullable();
            $table->text('komentar_ms_project_file')->nullable();
            $table->text('komentar_laporan_bulanan_ikn')->nullable();
            $table->text('komentar_laporan_upaya_klaim')->nullable();
            $table->text('komentar_laporan_potob')->nullable();

            $table->date('due_date_evaluasi_hasil_usaha')->nullable();
            $table->date('due_date_laporan_lc')->nullable();
            $table->date('due_date_laporan_vendor')->nullable();
            $table->date('due_date_update_inventaris')->nullable();
            $table->date('due_date_prognosa_hasil_usaha')->nullable();
            $table->date('due_date_ms_project_file')->nullable();
            $table->date('due_date_laporan_bulanan_ikn')->nullable();
            $table->date('due_date_laporan_upaya_klaim')->nullable();
            $table->date('due_date_laporan_potob')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('monthly_report_pcps', function (Blueprint $table) {
            $table->dropColumn('narasi_evaluasi_hasil_usaha');
            $table->dropColumn('narasi_laporan_lc');
            $table->dropColumn('narasi_laporan_vendor');
            $table->dropColumn('narasi_update_inventaris');
            $table->dropColumn('narasi_prognosa_hasil_usaha');
            $table->dropColumn('narasi_ms_project_file');
            $table->dropColumn('narasi_laporan_bulanan_ikn');
            $table->dropColumn('narasi_laporan_upaya_klaim');
            $table->dropColumn('narasi_laporan_potob');

            $table->dropColumn('status_evaluasi_hasil_usaha');
            $table->dropColumn('status_laporan_lc');
            $table->dropColumn('status_laporan_vendor');
            $table->dropColumn('status_update_inventaris');
            $table->dropColumn('status_prognosa_hasil_usaha');
            $table->dropColumn('status_ms_project_file');
            $table->dropColumn('status_laporan_bulanan_ikn');
            $table->dropColumn('status_laporan_upaya_klaim');
            $table->dropColumn('status_laporan_potob');

            $table->dropColumn('komentar_evaluasi_hasil_usaha');
            $table->dropColumn('komentar_laporan_lc');
            $table->dropColumn('komentar_laporan_vendor');
            $table->dropColumn('komentar_update_inventaris');
            $table->dropColumn('komentar_prognosa_hasil_usaha');
            $table->dropColumn('komentar_ms_project_file');
            $table->dropColumn('komentar_laporan_bulanan_ikn');
            $table->dropColumn('komentar_laporan_upaya_klaim');
            $table->dropColumn('komentar_laporan_potob');

            $table->dropColumn('due_date_evaluasi_hasil_usaha');
            $table->dropColumn('due_date_laporan_lc');
            $table->dropColumn('due_date_laporan_vendor');
            $table->dropColumn('due_date_update_inventaris');
            $table->dropColumn('due_date_prognosa_hasil_usaha');
            $table->dropColumn('due_date_ms_project_file');
            $table->dropColumn('due_date_laporan_bulanan_ikn');
            $table->dropColumn('due_date_laporan_upaya_klaim');
            $table->dropColumn('due_date_laporan_potob');
        });
    }
}
