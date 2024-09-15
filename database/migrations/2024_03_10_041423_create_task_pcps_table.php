<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskPcpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_pcps', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_permintaan')->nullable();
            $table->string('judul_tugas', 255)->nullable();
            $table->text('instruksi_pekerjaan')->nullable();
            $table->dateTime('batas_waktu')->nullable();
            $table->text('link_pengumpulan_tugas')->nullable();
            $table->string('status_tugas', 255)->nullable();
            $table->text('komentar')->nullable();
            $table->integer('created_by')->nullable();
            $table->timestamps();
            
            $table->foreign('created_by')->references('id_user')->on('user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task_pcps');
    }
}
