<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengaduanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengaduan', function (Blueprint $table) {
            $table->increments('id_pengaduan');
            $table->unsignedBigInteger('id_masyarakat');
            $table->string('isi_pengaduan');
            $table->string('foto');
            $table->enum('status_pengaduan', ['antri', 'proses', 'diterima', 'ditolak', 'selesai']);
            $table->timestamps();
            $table->foreign('id_masyarakat')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengaduan');
    }
}
