<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agendas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kegiatan', 255)->nullable();
            $table->dateTime('tanggal_kegiatan')->nullable();
            $table->text('catatan_agenda')->nullable();
            $table->string('status_agenda', 255)->nullable();
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
        Schema::dropIfExists('agendas');
    }
}
