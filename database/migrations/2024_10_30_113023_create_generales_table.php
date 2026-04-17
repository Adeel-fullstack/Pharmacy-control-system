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
        Schema::create('generales', function (Blueprint $table) {
            $table->id();
            $table->string('logo');
            $table->string('name');
            $table->string('email');
            $table->string('whatsapp');
            $table->string('landline');
            $table->string('address');
            $table->string('website');
            $table->timestamps();
        });

        DB::statement('ALTER TABLE generales CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;');

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('generales');
    }
};
