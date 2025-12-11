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
    Schema::create('programs', function (Blueprint $table) {
        $table->id('program_id');
        $table->string('nama_program', 200);
        $table->enum('kategori', ['zakat', 'infak', 'sedekah', 'wakaf', 'umum']);
        $table->text('deskripsi');
        $table->decimal('target_dana', 15,2);
        $table->decimal('dana_terkumpul', 15,2)->default(0);
        $table->enum('status', ['aktif','selesai'])->default('aktif');
        $table->foreignId('created_by')->constrained('users','user_id')->onDelete('cascade');
        $table->foreignId('zakat_type_id')->nullable()->constrained('zakat_types','zakat_type_id')->onDelete('set null');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};
