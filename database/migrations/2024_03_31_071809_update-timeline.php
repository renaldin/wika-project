<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTimeline extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('timelines', function (Blueprint $table) {
            $table->renameColumn('kontrak_induk', 'link_kontrak_induk');
            $table->renameColumn('spmk', 'link_spmk');
            $table->renameColumn('dokumen_rkp', 'link_dokumen_rkp');
            $table->renameColumn('checkpoint_20', 'link_checkpoint_20');
            $table->renameColumn('checkpoint_50', 'link_checkpoint_50');
            $table->renameColumn('checkpoint_75', 'link_checkpoint_75');
            $table->renameColumn('foureyes_principal', 'link_foureyes_principal');
            $table->renameColumn('dokumen_lps', 'link_dokumen_lps');
            $table->string('nama_kontrak_induk')->nullable();
            $table->string('nama_spmk')->nullable();
            $table->string('nama_dokumen_rkp')->nullable();
            $table->string('nama_checkpoint_20')->nullable();
            $table->string('nama_checkpoint_50')->nullable();
            $table->string('nama_checkpoint_75')->nullable();
            $table->string('nama_foureyes_principal')->nullable();
            $table->string('nama_dokumen_lps')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('timelines', function (Blueprint $table) {
            $table->renameColumn('link_kontrak_induk', 'kontrak_induk');
            $table->renameColumn('link_spmk', 'spmk');
            $table->renameColumn('link_dokumen_rkp', 'dokumen_rkp');
            $table->renameColumn('link_checkpoint_20', 'checkpoint_20');
            $table->renameColumn('link_checkpoint_50', 'checkpoint_50');
            $table->renameColumn('link_checkpoint_75', 'checkpoint_75');
            $table->renameColumn('link_foureyes_principal', 'foureyes_principal');
            $table->renameColumn('link_dokumen_lps', 'dokumen_lps');
            $table->dropColumn('nama_kontrak_induk');
            $table->dropColumn('nama_spmk');
            $table->dropColumn('nama_dokumen_rkp');
            $table->dropColumn('nama_checkpoint_20');
            $table->dropColumn('nama_checkpoint_50');
            $table->dropColumn('nama_checkpoint_75');
            $table->dropColumn('nama_foureyes_principal');
            $table->dropColumn('nama_dokumen_lps');
        });
    }
}
