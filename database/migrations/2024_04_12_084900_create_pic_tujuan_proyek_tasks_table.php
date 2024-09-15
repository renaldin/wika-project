<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePicTujuanProyekTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pic_tujuan_proyek_tasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_task_pcp')->nullable();
            $table->integer('id_proyek')->nullable();
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
        Schema::dropIfExists('pic_tujuan_proyek_tasks');
    }
}
