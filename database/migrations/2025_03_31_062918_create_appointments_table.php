<?php
// database/migrations/xxxx_xx_xx_create_appointments_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pesakit_id')->constrained()->onDelete('cascade');
            $table->foreignId('modality_id')->constrained()->onDelete('cascade');
            $table->date('tarikh_temujanji');
            $table->time('masa_mula');
            $table->time('masa_tamat');
            $table->string('status')->default('pending'); // confirmed, done, cancelled
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
