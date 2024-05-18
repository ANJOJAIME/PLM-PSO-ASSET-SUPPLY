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
        Schema::create('delivered_asset', function (Blueprint $table) {
            $table->string('d_item_no');
            $table->string('d_description');
            $table->string('d_unit');
            $table->string('d_iar_no');
            $table->string('d_supplier');
            $table->string('d_pr_no');
            $table->string('d_po_no');
            $table->string('d_bur_no');
            $table->string('d_invoice_no');
            $table->date('d_date_invoice');
            $table->string('d_requesting_office');
            $table->string('d_qty');
            $table->string('d_unit_cost');
            $table->string('d_total_cost');
            $table->id();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delivered_asset');
    }
};