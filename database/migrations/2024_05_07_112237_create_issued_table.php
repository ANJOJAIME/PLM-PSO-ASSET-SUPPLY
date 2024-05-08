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
        Schema::create('issued', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('date_issuance');
            $table->string('stock_no');
            $table->string('report_no');
            $table->string('requesting_office');
            $table->integer('quantity_issued');
            $table->string('ris_no');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('issued');
    }
};
