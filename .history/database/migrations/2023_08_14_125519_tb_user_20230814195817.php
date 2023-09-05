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
        Schema::create('users', function (Blueprint $table) {
            $table->string('MS_User')->primary();
            $table->string('Ten_User');
            $table->string('Key');
            $table->string('Email')->unique();
            $table->string('Pass');
            $table->string('SĐT');
            $table->string('STK');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
