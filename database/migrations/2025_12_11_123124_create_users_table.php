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
    Schema::create('users', function (Blueprint $table) {
        $table->id('user_id');
        $table->string('nama', 150);
        $table->string('email', 150)->unique();
        $table->string('password', 255);
        $table->enum('role', ['donatur', 'takmir', 'admin']);
        $table->string('no_hp', 20)->nullable();
        $table->text('alamat')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
