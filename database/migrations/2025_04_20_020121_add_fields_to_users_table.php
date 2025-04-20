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
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone')->nullable();
            $table->date('birthday')->nullable();
            $table->integer('sex')->default(0);
            $table->integer('region_id')->nullable();
            $table->integer('city_id')->nullable();
            $table->integer('ward_id')->nullable();
            $table->text('address')->nullable();
            $table->boolean('subscribe')->default(0);
        });
    }
};
