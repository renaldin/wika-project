<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateMonthlyReport1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('monthly_report', function (Blueprint $table) {
            $table->integer('is_check')->default(1);
            $table->integer('dua_d_temp')->default(0);
            $table->integer('tiga_d_temp')->default(0);
            $table->integer('empat_d_temp')->default(0);
            $table->integer('lima_d_temp')->default(0);
            $table->integer('cde_d_temp')->default(0);
            $table->string('kesiapan_bim5d_temp', 255)->nullable();
            $table->integer('id_ho')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('monthly_report', function (Blueprint $table) {
            $table->dropColumn('is_check');
            $table->dropColumn('dua_d_temp');
            $table->dropColumn('tiga_d_temp');
            $table->dropColumn('empat_d_temp');
            $table->dropColumn('lima_d_temp');
            $table->dropColumn('cde_d_temp');
            $table->dropColumn('kesiapan_bim5d_temp');
            $table->dropColumn('id_ho');
        });
    }
}
