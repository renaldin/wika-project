<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePicMonthlyReportPcpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pic_monthly_report_pcps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_monthly_report_pcp')->nullable();
            $table->string('jenis_dokumen', 255)->nullable();
            $table->integer('id_pic')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pic_monthly_report_pcps');
    }
}
