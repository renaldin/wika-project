<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailAkhlakTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_akhlak', function (Blueprint $table) {
            $table->id('id_detail_akhlak');
            $table->unsignedBigInteger('id_akhlak');
            $table->unsignedBigInteger('id_aspek_akhlak');
            $table->timestamps();

            $table->foreign('id_akhlak')->references('id_akhlak')->on('akhlak')->onDelete('cascade');
            $table->foreign('id_aspek_akhlak')->references('id_aspek_akhlak')->on('aspek_akhlak')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_akhlak');
    }
}

