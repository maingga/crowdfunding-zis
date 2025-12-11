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
    Schema::create('mustahik', function (Blueprint $table) {
        $table->id('mustahik_id');
        $table->string('nama',150);
        $table->enum('kategori_asnaf', ['fakir','miskin','amil','mualaf','riqab','gharim','ibnu_sabil','fi_sabilillah']);
        $table->text('alamat')->nullable();
        $table->string('no_hp',20)->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mustahik');
    }
};
