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
        Schema::create('paket_wisata', function (Blueprint $table) {
            $table->id();
            $table->string('nama_paket')->unique() ;
            $table->text('deskripsi') ;
            $table->string('fasilitas') ;
            $table->text('itinerary') ;
            $table->decimal('diskon') ;
            $table->text('foto1')->nullable() ;
            $table->text('foto2')->nullable() ;
            $table->text('foto3')->nullable() ;
            $table->text('foto4')->nullable() ;
            $table->text('foto5')->nullable() ;
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
        Schema::dropIfExists('paket_wisata');
    }
};
