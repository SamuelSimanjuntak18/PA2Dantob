<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFasilitasWisataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fasilitas_wisata', function (Blueprint $table) {
            $table->increments('id_fasilitas');
            $table->string('nama_fasilitas');
            $table->text('deskripsi');
            $table->text('lokasi'); 
            $table->string('nama_pemilik');
            $table->string('kontak');
            $table->string('jenis_fasilitas');
            $table->string('file_foto');
            $table->integer('id_sampul_fasilitas')->unsigned();
            $table->foreign('id_sampul_fasilitas')->references('id')->on('sampul_fasilitas')->onDelete('cascade'); 
            $table->bigInteger('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade'); 
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
        Schema::dropIfExists('fasilitas_wisata');
    }
}
