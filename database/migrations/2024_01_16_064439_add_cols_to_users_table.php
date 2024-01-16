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
            $table->string('contact')->nullable();
            $table->string('pincode',6);
            $table->text('address')->nullable();
            $table->boolean('status')->comment("1:active, 0:inactive")->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('contact')->nullable();
            $table->string('pincode',6)->nullable();
            $table->text('address')->nullable();
            $table->boolean('status')->comment("1:active, 0:inactive")->default(1);
        });
    }
};
