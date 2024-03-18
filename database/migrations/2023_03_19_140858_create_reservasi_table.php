<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservasi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pelanggan') ;
            $table->foreign('id_pelanggan')->references('id')->on('pelanggan')->onDelete('cascade')->onUpdate('cascade') ;
            $table->unsignedBigInteger('id_daftar_paket') ;
            $table->foreign('id_daftar_paket')->references('id')->on('daftar_paket')->onDelete('cascade')->onUpdate('cascade') ;
            $table->dateTime('tgl_reservasi_wisata') ;
            $table->integer('harga') ;
            $table->integer('jumlah_peserta') ;
            $table->decimal('diskon') ;
            $table->float('nilai_diskon') ;
            $table->unsignedBigInteger('total_bayar') ;
            $table->text('file_bukti_tf') ;
            $table->enum('status_reservasi_wisata',['pesan', 'dibayar', 'selesai']) ;
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
        Schema::dropIfExists('reservasi');
    }
};
