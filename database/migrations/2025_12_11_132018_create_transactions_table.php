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
    Schema::create('transactions', function (Blueprint $table) {
        $table->id('transaction_id');
        $table->foreignId('donation_id')->constrained('donations','donation_id')->onDelete('cascade');
        $table->string('midtrans_order_id',100)->nullable();
        $table->string('payment_type',50)->nullable();
        $table->string('transaction_status',50)->nullable();
        $table->dateTime('transaction_time')->nullable();
        $table->decimal('gross_amount', 15,2)->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
