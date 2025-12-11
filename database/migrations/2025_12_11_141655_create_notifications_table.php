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
    Schema::create('notifications', function (Blueprint $table) {
        $table->id('notif_id');
        $table->foreignId('user_id')->constrained('users','user_id')->onDelete('cascade');
        $table->text('pesan');
        $table->enum('tipe', ['donasi','penyaluran','update_program']);
        $table->boolean('is_read')->default(false);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
