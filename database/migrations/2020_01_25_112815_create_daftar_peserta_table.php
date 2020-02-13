<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaftarPesertaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftar_peserta', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_simaksi',50);
            $table->string('nama_peserta',50);
            $table->string('jenis_kelamin',10);
            $table->bigInteger('no_ktp');
            $table->date('tanggal_lahir');
            $table->string('no_tlpn',12);
            $table->text('alamat');
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
        Schema::dropIfExists('daftar_peserta');
    }
}
