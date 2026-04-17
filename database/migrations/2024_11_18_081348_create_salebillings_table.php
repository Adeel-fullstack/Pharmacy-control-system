<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('salebillings', function (Blueprint $table) {
            $table->id();
            $table->string('order_id');
            $table->string('medicine_id');
            $table->integer('quantity');
            $table->decimal('discount', 10, 2)->default(0); // NEW
            $table->decimal('price', 8, 2);
            $table->decimal('total_price', 10, 2);
            $table->timestamps();
        });

        DB::statement('ALTER TABLE salebillings CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;');

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salebillings');
    }
};
