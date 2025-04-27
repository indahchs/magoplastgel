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
        Schema::table('transactions', function (Blueprint $table) {
            //
            // $table->string('transaction_status')->nullable()->change();
            $table->enum('transaction_status', ['capture', 'settlement', 'pending', 'cancel', 'expired'])->default('pending')->change();
            $table->string('payment_method')->nullable()->change();
            $table->timestamp('transaction_time')->nullable()->change();
            $table->longText('midtrans_response')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            //
        });
    }
};
