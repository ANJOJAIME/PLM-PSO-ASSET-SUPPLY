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
        Schema::create('delivered', function (Blueprint $table) {
            $table->id();
            $table->string('delivery_date');
            $table->string('actual_delivery_date');
            $table->string('acceptance_date');
            $table->string('iar_no');
            $table->string('item_no');
            $table->string('stock_no');
            $table->string('item_description');
            $table->string('delivered');
            $table->string('unit');
            $table->string('dr_no');
            $table->string('check_no');
            $table->string('po_no');
            $table->string('po_date');
            $table->string('po_amount');
            $table->string('pr_number');
            $table->string('price_per_purchase_request');
            $table->string('bur');
            $table->string('remarks');
            $table->timestamps();
            $table->softDeletes();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delivered');
    }
};
