<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateMonthlyReportPcp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('monthly_report_pcps', function (Blueprint $table) {
            $table->string('persentase_evaluasi_hasil_usaha', 255)->nullable();
            $table->string('persentase_laporan_lc', 255)->nullable();
            $table->string('persentase_laporan_vendor', 255)->nullable();
            $table->string('persentase_update_inventaris', 255)->nullable();
            $table->string('persentase_prognosa_hasil_usaha', 255)->nullable();
            $table->string('persentase_ms_project_file', 255)->nullable();
            $table->string('persentase_laporan_bulanan_ikn', 255)->nullable();
            $table->string('persentase_laporan_upaya_klaim', 255)->nullable();
            $table->string('persentase_laporan_potob', 255)->nullable();
            $table->string('persentase_laporan_spi', 255)->nullable();
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
            $table->dropColumn('persentase_evaluasi_hasil_usaha');
            $table->dropColumn('persentase_laporan_lc');
            $table->dropColumn('persentase_laporan_vendor');
            $table->dropColumn('persentase_update_inventaris');
            $table->dropColumn('persentase_prognosa_hasil_usaha');
            $table->dropColumn('persentase_ms_project_file');
            $table->dropColumn('persentase_laporan_bulanan_ikn');
            $table->dropColumn('persentase_laporan_upaya_klaim');
            $table->dropColumn('persentase_laporan_potob');
            $table->dropColumn('persentase_laporan_spi');
        });
    }
}
