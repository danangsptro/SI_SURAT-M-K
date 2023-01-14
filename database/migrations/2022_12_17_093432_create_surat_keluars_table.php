<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratKeluarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_keluars', function (Blueprint $table) {
            $table->id();
            $table->string('tujuan_surat', 50);
            $table->integer('nomor_surat');
            $table->date('tanggal_surat');
            $table->date('tanggal_surat_keluar');
            $table->string('perihal',50);
            $table->foreignId('index_surat_id')->constrained('index_surats')->onDelete('cascade');
            $table->text('softcopy_surat');
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
        Schema::dropIfExists('surat_keluars');
    }
}
