<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->time('waktu_mulai');
            $table->time('waktu_selesai');
            $table->string('user_id');
            $table->string('coach_id');
            $table->string('lokasi');
            $table->text('keterangan');
            $table->timestamps();
        });
    }
       
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
};
