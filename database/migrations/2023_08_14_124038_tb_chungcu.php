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
        Schema::create('tb_chungcu', function (Blueprint $table) {
            $table->string('MS_ChungCu')->primary();
            $table->string('Ten_ChungCu');
            $table->string('email')->unique();
            $table->string('SĐT');
            $table->string('DiaChi');
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
