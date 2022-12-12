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
            $table->string('no_surat');
            $table->string('name');
            $table->string('kode_klasifikasi');
            $table->foreignId('sumber_id');
            $table->foreignId('ruangan_id');
            $table->foreignId('rak_id');
            $table->string('perkembangan');
            $table->string('sampul');
            $table->string('box');
            $table->integer('jumlah');
            $table->foreignId('satuan_id');
            $table->text('keterangan');
            $table->string('file')->nullable();
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
