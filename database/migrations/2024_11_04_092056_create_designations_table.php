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
        Schema::create('designations', function (Blueprint $table) {
            $table->id();
            $table->string('department_id');
            $table->string('designation_id');
            $table->string('responsibilities');
            $table->timestamps();
        });

        DB::statement('ALTER TABLE designations CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;');

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('designations');
    }
};
