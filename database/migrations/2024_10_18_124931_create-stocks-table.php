<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateStocksTable extends Migration
{
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();

            $table->string('medicinelogo')->nullable();

            // Barcode search ready (future use)
            $table->string('barcode')->index();

            // 🔥 Medicine name with INDEX for live search
            $table->string('medicineName')->index();

            $table->string('type');
            $table->string('packaging_type');

            $table->foreignId('distributor_id')
                ->constrained()
                ->onDelete('cascade');

            $table->foreignId('company_id')
                ->constrained()
                ->onDelete('cascade');

            // Stock & Discount
            $table->integer('quantity');              // string ❌ → integer ✅
            $table->decimal('maxDiscount', 8, 2);     // string ❌ → decimal ✅

            // Box based
            $table->integer('number_of_boxes')->nullable();
            $table->integer('items_per_box')->nullable();
            $table->integer('total_items')->nullable();

            // Prices (DECIMAL best for MySQL)
            $table->decimal('purchase_price_box', 10, 2)->nullable();
            $table->decimal('purchase_price_each', 10, 2)->nullable();
            $table->decimal('sale_price_box', 10, 2)->nullable();
            $table->decimal('sale_price_each', 10, 2)->nullable();

            // Blister based
            $table->integer('tablets_per_blister')->nullable();
            $table->decimal('purchase_price_blister', 10, 2)->nullable();
            $table->decimal('sale_price_blister', 10, 2)->nullable();

            $table->timestamps();
        });

        // ✅ UTF8MB4 for proper text & LIKE search
        DB::statement(
            'ALTER TABLE stocks 
             CONVERT TO CHARACTER SET utf8mb4 
             COLLATE utf8mb4_unicode_ci'
        );
    }

    public function down()
    {
        Schema::dropIfExists('stocks');
    }
}
