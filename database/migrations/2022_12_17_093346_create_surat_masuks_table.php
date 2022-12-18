<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratMasuksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_masuks', function (Blueprint $table) {
            $table->id();
            $table->string('surat_dari', 20);
            $table->integer('nomor_surat');
            $table->date('tanggal_surat');
            $table->date('tanggal_surat_masuk');
            $table->string('perihal', 20);
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
        Schema::dropIfExists('surat_masuks');
    }
}
