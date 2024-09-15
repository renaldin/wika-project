<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateMonthlyReportPcp3 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('monthly_report_pcps', function (Blueprint $table) {
            $table->text('link_evaluasi_hasil_usaha')->nullable();
            $table->text('link_laporan_lc')->nullable();
            $table->text('link_laporan_vendor')->nullable();
            $table->text('link_update_inventaris')->nullable();
            $table->text('link_prognosa_hasil_usaha')->nullable();
            $table->text('link_ms_project_file')->nullable();
            $table->text('link_laporan_bulanan_ikn')->nullable();
            $table->text('link_laporan_upaya_klaim')->nullable();
            $table->text('link_laporan_potob')->nullable();
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
            $table->dropColumn('link_evaluasi_hasil_usaha');
            $table->dropColumn('link_laporan_lc');
            $table->dropColumn('link_laporan_vendor');
            $table->dropColumn('link_update_inventaris');
            $table->dropColumn('link_prognosa_hasil_usaha');
            $table->dropColumn('link_ms_project_file');
            $table->dropColumn('link_laporan_bulanan_ikn');
            $table->dropColumn('link_laporan_upaya_klaim');
            $table->dropColumn('link_laporan_potob');
        });
    }
}
