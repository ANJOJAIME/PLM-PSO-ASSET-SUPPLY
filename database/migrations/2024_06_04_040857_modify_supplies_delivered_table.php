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
        Schema::table('delivered', function (Blueprint $table) {
            // Add columns
            $table->string('supplier');
            $table->string('dr_date');
            $table->string('photo');
            $table->string('stock_type');

            // Drop columns
            $table->dropColumn('acceptance_date');
            $table->dropColumn('delivery_date');
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
