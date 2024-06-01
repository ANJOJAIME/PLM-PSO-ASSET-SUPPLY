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
        Schema::create('semi_ex', function (Blueprint $table) {
            $table->string('s_item_no');
            $table->string('s_po_number');
            $table->string('s_ics_no');
            $table->string('s_quantity');
            $table->string('s_acquisition_cost');
            $table->string('s_site');
            $table->string('s_location');
            $table->string('s_office');
            $table->string('s_accountable_id');
            $table->string('s_remarks');
            $table->string('s_updated_by');
            $table->string('s_transaction_date');
            $table->id();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('semi_ex');
    }
};
