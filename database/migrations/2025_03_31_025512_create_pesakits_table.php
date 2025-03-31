<?php 

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pesakits', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('ic')->unique();
            $table->enum('jantina', ['Lelaki', 'Perempuan']);
            $table->date('tarikh_lahir')->nullable();
            $table->string('telefon')->nullable();
            $table->text('alamat')->nullable();
            $table->timestamps();
            $table->boolean('gov_officer')->default(false); // true = penjawat awam
            $table->string('etnik')->nullable();
            $table->string('citizenship')->nullable();

        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesakits');
    }
};
