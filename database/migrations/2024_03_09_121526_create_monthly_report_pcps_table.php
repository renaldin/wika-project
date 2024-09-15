<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonthlyReportPcpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monthly_report_pcps', function (Blueprint $table) {
            $table->id();
            $table->integer('id_monthly_report')->nullable();
            $table->integer('id_proyek')->nullable();
            $table->string('bulan_report')->nullable();
            $table->text('evaluasi_hasil_usaha')->nullable();
            $table->text('laporan_lc')->nullable();
            $table->text('laporan_vendor')->nullable();
            $table->text('update_inventaris')->nullable();
            $table->text('prognosa_hasil_usaha')->nullable();
            $table->text('ms_project_file')->nullable();
            $table->text('laporan_bulanan_ikn')->nullable();
            $table->text('laporan_upaya_klaim')->nullable();
            $table->text('laporan_potob')->nullable();
            $table->text('laporan_spi')->nullable();
            $table->string('status_report_pcp', 255)->nullable();

            $table->foreign('id_monthly_report')->references('id_monthly_report')->on('monthly_report');
            $table->foreign('id_proyek')->references('id_proyek')->on('proyek');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('monthly_report_pcps');
    }
}
