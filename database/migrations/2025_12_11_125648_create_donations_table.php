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
    Schema::create('donations', function (Blueprint $table) {
        $table->id('donation_id');
        $table->foreignId('user_id')->nullable()->constrained('users','user_id')->onDelete('cascade'); // support anonim
        $table->foreignId('program_id')->constrained('programs','program_id')->onDelete('cascade');
        $table->decimal('nominal', 15,2);
        $table->enum('metode_pembayaran', ['midtrans','transfer_manual','tunai']);
        $table->enum('status', ['pending','berhasil','gagal'])->default('pending');
        $table->boolean('is_anonymous')->default(false);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};
