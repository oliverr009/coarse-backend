<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('mpesa_logs', function (Blueprint $table) {
            $table->id();
            $table->string('checkout_request_id')->nullable()->index();
            $table->string('merchant_request_id')->nullable();
            $table->string('phone')->nullable();
            $table->decimal('amount', 12, 2)->default(0);
            $table->enum('status', ['pending','success','cancelled','timeout','insufficient_funds','failed'])->default('pending');
            $table->string('result_code')->nullable();
            $table->text('result_description')->nullable();
            $table->json('raw_payload')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('mpesa_logs');
    }
};
