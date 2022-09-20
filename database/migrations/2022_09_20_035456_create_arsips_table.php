<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArsipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arsips', function (Blueprint $table) {
            $table->id();
            $table->timestamp('tanggal_masuk');
            $table->string('sumber_arsip');
            $table->string('kode_klasifikasi');
            $table->text('uraian_informasi');
            $table->date('kurun_waktu');
            $table->bigInteger('jumlah');
            $table->string('proses');
            $table->string('lokasi');
            $table->text('keterangan');
            $table->string('file');
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
        Schema::dropIfExists('arsips');
    }
}
