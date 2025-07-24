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
        Schema::create('vendor_metrics', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('store_id');
            $table->integer('product_count')->default(0);
            $table->integer('order_count')->default(0);
            $table->timestamp('last_login')->nullable();
            $table->enum('status', ['active', 'suspended'])->default('active');
            $table->timestamps();

            $table->foreign('store_id')->references('id')->on('stores')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendor_metrics');
    }
};
