<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePicDivisiTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pic_divisi_tasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_task_pcp')->nullable();
            $table->integer('id_divisi')->nullable();
            $table->timestamps();
            
            $table->foreign('id_divisi')->references('id_user')->on('user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pic_divisi_tasks');
    }
}
