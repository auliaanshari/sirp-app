<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsensisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absensi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('krs_id')->constrained('krs')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('pertemuan_id')->constrained('pertemuan')->onUpdate('cascade')->onDelete('cascade');
            $table->time('jam_masuk');
            $table->time('jam_keluar');
            $table->integer('durasi');
            $table->string('file');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('absensi');
    }
}
