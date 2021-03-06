<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catatans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_pengajuan')->comment = 'ID Pengajuan';
            $table->string('id_status')->comment = 'Status Pengajuan';
            $table->text('catatan')->comment = 'Catatan';
            $table->unsignedBigInteger('iduser')->comment = 'ID User Pengirim';
            $table->timestamps();

            $table->foreign('id_pengajuan')->references('id')->on('pengajuans');
            $table->foreign('iduser')->references('id_user')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('catatans');
    }
}
