<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAngkutansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('angkutans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_angkutan');
            $table->string('nama_supir');
            $table->string('plat_no');
            $table->bigInteger('merk_id');
            $table->bigInteger('type_id');
            $table->string('tahun_kendaraan');
            $table->string('frekuensi');
            $table->string('jumlah_tps');
            $table->string('panjang_rute');
            $table->string('panjang_jalan');
            $table->string('durasi_pengangkutan');
            $table->string('total_waktu');
            $table->longText('trayek');
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
        Schema::dropIfExists('angkutans');
    }
}
