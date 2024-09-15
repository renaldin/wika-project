<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimelineDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timeline_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_timeline')->nullable();
            $table->bigInteger('id_dokumen_timeline')->nullable();
            $table->date('tanggal_timeline')->nullable();
            $table->string('nama_dokumen', 255)->nullable();
            $table->text('file_dokumen')->nullable();
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
        Schema::dropIfExists('timeline_details');
    }
}
