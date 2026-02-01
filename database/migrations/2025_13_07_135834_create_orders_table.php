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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_code')->unique();
            $table->foreignId('material_id')->constrained()->onDelete('cascade');
            $table->foreignId('pelanggan_id')->constrained()->onDelete('cascade');
            $table->foreignId('area_id')->constrained()->onDelete('cascade');
            $table->foreignId('pabrik_id')->constrained()->onDelete('cascade');
            $table->foreignId('planner_id')->constrained()->onDelete('cascade');
            $table->timestamp('order_date');
            $table->integer('quantity');
            $table->enum('status', ['true', 'false'])->default('false');
            $table->enum('shift', ['rutin', 'ta'])->default('rutin');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
