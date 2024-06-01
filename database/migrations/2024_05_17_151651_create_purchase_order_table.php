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
        Schema::create('purchase_order', function (Blueprint $table) {
            $table->id();
            $table->string('item_no');
            $table->string('description');
            $table->string('supplier');
            $table->string('tin_no');
            $table->string('po_no');
            $table->string('pr_no');
            $table->string('mode_of_proc');
            $table->string('price_val');
            $table->string('payment_term');
            $table->string('quantity');
            $table->string('unit');
            $table->string('unit_cost');
            $table->boolean('is_delivered')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_order');
    }
};
