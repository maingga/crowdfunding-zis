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
    Schema::create('penyaluran', function (Blueprint $table) {
        $table->id('penyaluran_id');
        $table->foreignId('program_id')->constrained('programs','program_id')->onDelete('cascade');
        $table->foreignId('mustahik_id')->constrained('mustahik','mustahik_id')->onDelete('cascade');
        $table->decimal('nominal_disalurkan',15,2);
        $table->dateTime('tanggal_penyaluran');
        $table->string('bukti_penyaluran',255)->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penyaluran');
    }
};
