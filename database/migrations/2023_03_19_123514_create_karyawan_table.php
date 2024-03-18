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
        Schema::create('karyawan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_karyawan', 50) ;
            $table->text("alamat") ;
            $table->string('no_hp', 15) ;
            $table->enum('jabatan',['administrator', 'operator', 'pemilik']) ;
            $table->timestamps();
            $table->unsignedBigInteger('id_user') ;
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade') ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('karyawan');
    }
};
