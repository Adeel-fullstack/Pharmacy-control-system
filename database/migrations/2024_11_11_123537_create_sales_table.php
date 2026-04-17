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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('medicine_id');
            $table->integer('quantity');
            $table->decimal('sale_price');
            $table->decimal('purchase_price');
            $table->integer('discount');
            $table->date('date_of_sale');
            $table->string('customer_id');
            $table->timestamps();
        });

        DB::statement('ALTER TABLE sales CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;');

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
