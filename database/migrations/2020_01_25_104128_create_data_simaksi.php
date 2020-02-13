<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataSimaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_simaksi', function (Blueprint $table) {
            $table->string('id_simaksi',30)->primary();
            $table->integer('id_user');
            $table->date('tanggal_naik');
            $table->date('tanggal_turun');
            $table->integer('jumlah_peserta');
            $table->integer('status');
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
        Schema::dropIfExists('data_simaksi');
    }
}
