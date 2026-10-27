<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->enum('payment_status', ['pending', 'paid', 'partial'])->default('pending')->after('status');
            $table->decimal('amount_paid', 10, 2)->nullable()->after('payment_status');
            $table->string('payment_method')->nullable()->after('amount_paid');
            $table->string('transaction_id')->nullable()->after('payment_method');
        });
    }

    public function down(): void
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->dropColumn(['payment_status', 'amount_paid', 'payment_method', 'transaction_id']);
        });
    }
};
