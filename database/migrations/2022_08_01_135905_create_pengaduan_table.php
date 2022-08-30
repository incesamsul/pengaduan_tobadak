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
            $table->unsignedInteger('id_kategori');
            $table->date('tgl_pengaduan');
            $table->string('isi_pengaduan');
            $table->string('foto');
            $table->enum('status_pengaduan', ['antri', 'proses', 'diterima', 'ditolak']);
            $table->enum('selesai', ['0', '1']);
            $table->string('tanggapan');
            $table->timestamps();
            $table->foreign('id_masyarakat')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_kategori')->references('id_kategori')->on('kategori')->onUpdate('cascade')->onDelete('cascade');
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
