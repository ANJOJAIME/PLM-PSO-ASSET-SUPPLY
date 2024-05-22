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
        Schema::create('issued_asset', function (Blueprint $table) {
            $table->id();
            $table->string('i_par_no');
            $table->string('i_description');
            $table->string('i_date_acquired');
            $table->string('i_property_no');
            $table->string('i_unit');
            $table->string('i_req_office');
            $table->string('i_quantity');
            $table->string('i_unit_value');
            $table->string('i_total_value');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('issued_asset');
    }
};
