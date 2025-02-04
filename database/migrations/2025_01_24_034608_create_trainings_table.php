<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    
    Schema::create('trainings', function (Blueprint $table) {
        $table->id();
        $table->time('time')->after('date');  // Menambahkan kolom 'time' setelah kolom 'date'
        $table->integer('participant');
        $table->string('instructor');
        $table->integer('duration');
        $table->text('notes')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trainings');
    }
};
