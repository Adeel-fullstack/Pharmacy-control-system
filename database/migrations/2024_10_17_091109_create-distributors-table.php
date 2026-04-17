<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


class CreateDistributorsTable extends Migration
{
    public function up()
    {
        Schema::create('distributors', function (Blueprint $table) {
            $table->id();
            $table->string('company_id');
            $table->string('distributor_name');
            $table->string('distributor_email');
            $table->string('contact_person');
            $table->string('phone');
            $table->text('address');
            $table->timestamps();
        });

        DB::statement('ALTER TABLE distributors CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;');

    }

    public function down()
    {
        Schema::dropIfExists('distributors');
    }
}
